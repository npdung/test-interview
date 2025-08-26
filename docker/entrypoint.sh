#!/bin/sh
set -e

# Run composer install if Bedrock vendor not exist
if [ -f "composer.json" ] && [ ! -d "vendor" ]; then
    echo "Installing composer dependencies for Bedrock..."
    composer install --no-interaction --prefer-dist
fi

# Run composer install if Sage vendor not exist
SAGE_PATH="web/app/themes/sage"
if [ -f "$SAGE_PATH/composer.json" ] && [ ! -d "$SAGE_PATH/vendor" ]; then
    echo "Installing composer dependencies for Sage..."
    (cd "$SAGE_PATH" && composer install --no-interaction --prefer-dist)
fi

# run npm install if Sage node_modules not exist
if [ -f "$SAGE_PATH/package.json" ] && [ ! -d "$SAGE_PATH/node_modules" ]; then
    echo "Installing npm dependencies for Sage..."
    (cd "$SAGE_PATH" && npm install && npm run build)
fi

echo '#!/bin/sh' >> /usr/local/bin/wp
echo '/srv/app/vendor/bin/wp --allow-root "$@"' >> /usr/local/bin/wp
chmod +x /usr/local/bin/wp

# run main command (php-fpm)
exec "$@"
