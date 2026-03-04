.EXPORT_ALL_VARIABLES:

HTTP_HOST:=localhost:8080
CORES?=$(shell (nproc  || sysctl -n hw.ncpu) 2> /dev/null)

.PHONY: it
it: coding-standards tests ## Runs all the targets

.PHONY: code-coverage
code-coverage: vendor ## Collects code coverage from running unit tests with phpunit/phpunit
	vendor/bin/phpunit --configuration=tests/phpunit.xml --coverage-text --testsuite=unit

.PHONY: coding-standards
coding-standards: vendor ## Fixes code style issues with friendsofphp/php-cs-fixer
	vendor/bin/php-cs-fixer fix --diff --show-progress=dots --verbose

.PHONY: help
help: ## Displays this list of targets with descriptions
	@grep -E '^[a-zA-Z0-9_-]+:.*?## .*$$' $(MAKEFILE_LIST) | sort | awk 'BEGIN {FS = ":.*?## "}; {printf "\033[32m%-30s\033[0m %s\n", $$1, $$2}'

.PHONY: tests
tests: vendor ## Runs unit and end-to-end tests with phpunit/phpunit
	vendor/bin/phpunit --configuration=tests/phpunit.xml --testsuite=unit
	rm -rf tests/server.log
	tests/server start;
	vendor/bin/phpunit --configuration=tests/phpunit.xml --testsuite=end-to-end;
	tests/server stop

tests_visual:
	tests/server start;
	npx playwright test --workers=$(CORES)
	tests/server stop

tests_update_snapshots:
	tests/server start;
	npx playwright test --update-snapshots
	tests/server stop

vendor: composer.json composer.lock
	composer validate --strict
	composer install --no-interaction --no-progress
