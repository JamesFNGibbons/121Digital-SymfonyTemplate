# REG 121 Frontend Assets Setup

## 🎨 Frontend Stack

- **Bootstrap**: `@121digital/bootstrap` (Custom 121 Digital mirror)
- **Bootstrap Icons**: Latest version
- **jQuery**: 3.7.0
- **Webpack Encore**: Symfony's asset management
- **Sass**: For CSS preprocessing

## 📁 Asset Structure

```
assets/
├── js/
│   └── app.js              # Main JavaScript entry point
├── scss/
│   └── app.scss            # Main SCSS file with REG 121 styles
└── images/                 # Image assets

public/
├── build/                  # Compiled assets (generated)
├── css/                    # Compiled CSS (generated)
└── js/                     # Compiled JS (generated)
```

## 🚀 Available Commands

### Using REG 121 CLI
```bash
# Install npm dependencies
./121 npm install
# OR use the shortcut:
./npm install

# Build assets for production
./121 build-assets

# Watch for changes during development
./121 watch-assets

# Install new packages
./121 npm install bootstrap-icons
# OR use the shortcut:
./npm install bootstrap-icons
```

### Shortcuts
- `./npm` - Shortcut for `./121 npm` (maintains REG 121 branding)

### Direct npm Commands
```bash
# Development
npm run dev                 # Start development mode
npm run watch               # Watch for changes
npm run build               # Build for production

# Individual builds
npm run build:css           # Build CSS only
npm run build:js            # Build JS only
npm run watch:css           # Watch CSS only
npm run watch:js             # Watch JS only
```

## 🎨 REG 121 Custom Styles

### CSS Variables
```scss
:root {
  --reg121-orange: #FF8C00;
  --reg121-white: #FFFFFF;
  --reg121-dark: #212529;
  --reg121-light: #F8F9FA;
}
```

### Utility Classes
- `.reg121-brand` - Orange brand color
- `.reg121-bg-orange` - Orange background
- `.reg121-btn-primary` - Primary button style
- `.reg121-card` - Card component with hover effects
- `.reg121-hero` - Hero section styling
- `.reg121-footer` - Footer styling

## 📦 Package Management

### Adding New Packages
```bash
# Add a new package
./121 npm install package-name

# Add as dev dependency
./121 npm install --save-dev package-name

# Add specific version
./121 npm install package-name@version
```

### Common Frontend Packages
```bash
# UI Libraries
./121 npm install bootstrap-icons
./121 npm install @fortawesome/fontawesome-free

# JavaScript Libraries
./121 npm install axios
./121 npm install lodash

# Build Tools
./121 npm install --save-dev autoprefixer
./121 npm install --save-dev postcss
```

## 🔧 Development Workflow

### 1. Start Development Environment
```bash
./121 start
```

### 2. Install Dependencies (First Time)
```bash
./121 npm install
```

### 3. Start Asset Watching
```bash
./121 watch-assets
```

### 4. Develop Your Frontend
- Edit files in `assets/scss/` and `assets/js/`
- Assets automatically rebuild on changes
- View at http://localhost

### 5. Build for Production
```bash
./121 build-assets
```

## 📝 Asset Integration in Twig Templates

### Include Compiled Assets
```twig
{# In your base template #}
{% block stylesheets %}
    {{ encore_entry_link_tags('app') }}
{% endblock %}

{% block javascripts %}
    {{ encore_entry_script_tags('app') }}
{% endblock %}
```

### Using REG 121 Styles
```twig
<div class="reg121-hero">
    <h1 class="reg121-brand">Welcome to REG 121</h1>
    <button class="btn reg121-btn-primary">Get Started</button>
</div>
```

## 🐛 Troubleshooting

### Assets Not Building
1. Check if container is running: `./121 status`
2. Rebuild container: `./121 restart`
3. Clear npm cache: `./121 npm cache clean --force`

### Bootstrap Not Loading
1. Verify package installation: `./121 npm list @121digital/bootstrap`
2. Check import in `assets/scss/app.scss`
3. Rebuild assets: `./121 build-assets`

### Permission Issues
1. Fix file permissions: `chmod -R 755 .`
2. Rebuild container: `./121 restart`

## 📚 Next Steps

1. **Create your first controller**: `./121 console make:controller HomeController`
2. **Design your homepage**: Use REG 121 custom styles
3. **Add Bootstrap components**: Leverage `@121digital/bootstrap`
4. **Customize branding**: Modify CSS variables in `app.scss`
5. **Add images**: Place in `assets/images/` directory

---

**Happy coding with REG 121! 🎉**
