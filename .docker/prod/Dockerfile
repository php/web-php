# "Production" Docker
#
# Provides the main runtime for PHP when deploying to a "Production"
# or "Testing" environment that needs a full container using
# the inbuilt server (not recommended).

FROM php:8.4-cli

# All of the files from the source location are copied into
# the /app folder
RUN mkdir /app
WORKDIR /app/public
COPY . /app
