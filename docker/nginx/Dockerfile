FROM nginx:stable-alpine

# Install Node.js, npm, and Yarn
RUN apk add --no-cache nodejs npm yarn

# Set working directory for convenience
WORKDIR /var/www/app

# Copy your application code first (so build runs after code is present)
COPY ./ /var/www/app

# Copy built assets
COPY public/build /var/www/app/public/build

# Display outbput of files copied...
RUN ls -la /var/www/app/public/build

# Copy your NGINX config
COPY ./docker/nginx/default.conf /etc/nginx/conf.d/default.conf

# RUN npm install && npm run build

# # Copy JS dependencies and build assets from the php container
# COPY --from=php /var/www/html/public/build /var/www/html/public/build

# Expose port 80
EXPOSE 80

# Start NGINX (inherited CMD)