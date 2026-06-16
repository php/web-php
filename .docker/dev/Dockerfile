# Development Docker
#
# Provides the main runtime engine as well as tooling for running
# during development
#
# NOTES:
# - Does not copy and files in as it is expected to be handled via a mount

FROM php:8.4-cli

# Codebase doesn't have production flag so we negate it instead with
# the DEVELOPMENT flag
ENV DEVELOPMENT=1

#
# install additional development tooling
#
RUN apt update  \
    && apt-get install -y --no-install-recommends git unzip \
    && rm -rf /var/lib/apt/lists/*

#
# Composer is required for dev dependencies
#
RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');" \
    && php -r "if (hash_file('sha384', 'composer-setup.php') === 'c8b085408188070d5f52bcfe4ecfbee5f727afa458b2573b8eaaf77b3419b0bf2768dc67c86944da1544f06fa544fd47') { echo 'Installer verified'.PHP_EOL; } else { echo 'Installer corrupt'.PHP_EOL; unlink('composer-setup.php'); exit(1); }" \
    && php composer-setup.php \
    && php -r "unlink('composer-setup.php');" \
    && mv composer.phar /usr/local/bin/composer

#
#  node.js - used for socket.dev and other front-end tooling
#
RUN apt-get update && apt-get install -y curl gnupg ca-certificates \
    && mkdir -p /etc/apt/keyrings \
    && curl -fsSL https://deb.nodesource.com/gpgkey/nodesource-repo.gpg.key | gpg --dearmor -o /etc/apt/keyrings/nodesource.gpg \
    && echo "deb [signed-by=/etc/apt/keyrings/nodesource.gpg] https://deb.nodesource.com/node_22.x nodistro main" | tee /etc/apt/sources.list.d/nodesource.list \
    && apt-get update && apt-get install -y nodejs \
    && rm -rf /var/lib/apt/lists/*

#
# Global dependencies and tools brought in via npm
#
RUN npm install -g socket

WORKDIR /app/public
