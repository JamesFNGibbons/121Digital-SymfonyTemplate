
const Encore = require('@symfony/webpack-encore');
Encore.configureRuntimeEnvironment(process.env.NODE_ENV || 'dev');

Encore
    .setOutputPath('public/build/')
    .setPublicPath('/build')
    .addEntry('app', './assets/js/app.js')
    .addStyleEntry('app-style', './assets/less/app.less')
    .enableSingleRuntimeChunk()
    .enableSourceMaps(!Encore.isProduction())
    .enableVersioning(Encore.isProduction())
    .enableLessLoader()
    .autoProvidejQuery()
    .configureBabel((config) => {
        config.plugins.push('@babel/plugin-proposal-class-properties');
    })
    .configureBabelPresetEnv((config) => {
        config.useBuiltIns = 'usage';
        config.corejs = 3;
    });

const config = Encore.getWebpackConfig();

// Configure LESS loader to resolve node_modules
if (config.module && config.module.rules && Array.isArray(config.module.rules)) {
    config.module.rules.forEach((rule) => {
        if (rule && rule.test && rule.test.toString().includes('less')) {
            if (rule.use && Array.isArray(rule.use)) {
                rule.use.forEach((use) => {
                    if (use && use.loader && use.loader.includes('less-loader')) {
                        use.options = use.options || {};
                        use.options.lessOptions = use.options.lessOptions || {};
                        use.options.lessOptions.paths = [
                            require('path').resolve(__dirname, 'node_modules')
                        ];
                    }
                });
            } else if (rule.use && typeof rule.use === 'object' && rule.use.loader) {
                // Handle single use object
                if (rule.use.loader.includes('less-loader')) {
                    rule.use.options = rule.use.options || {};
                    rule.use.options.lessOptions = rule.use.options.lessOptions || {};
                    rule.use.options.lessOptions.paths = [
                        require('path').resolve(__dirname, 'node_modules')
                    ];
                }
            }
        }
    });
}

module.exports = config;