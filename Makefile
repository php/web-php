.EXPORT_ALL_VARIABLES:

HTTP_HOST:=localhost:8080

.PHONY: it
it: coding-standards tests ## Runs all the targets

.PHONY: help
help: ## Displays this list of targets with descriptions
	@grep -E '^[a-zA-Z0-9_-]+:.*?## .*$$' $(MAKEFILE_LIST) | sort | awk 'BEGIN {FS = ":.*?## "}; {printf "\033[32m%-30s\033[0m %s\n", $$1, $$2}'

.PHONY: code-coverage
code-coverage: vendor ## Collects coverage from running tests with phpunit/phpunit
	tests/server start; vendor/bin/phpunit --configuration=tests/phpunit.xml --coverage-text; tests/server stop

.PHONY: coding-standards
coding-standards: vendor ## Fixes code style issues with friendsofphp/php-cs-fixer
	vendor/bin/php-cs-fixer fix --config=.php-cs-fixer.php --diff --show-progress=dots --verbose

.PHONY: tests
tests: vendor ## Runs tests with phpunit/phpunit
	rm -rf tests/server.log
	tests/server start; vendor/bin/phpunit --configuration=tests/phpunit.xml; tests/server stop

vendor: composer.json composer.lock
	composer validate --strict
	composer install --no-interaction --no-progress
