test:
	phpdbg --version
	phpdbg -qrr vendor/bin/peridot specs

coverage:
	phpdbg --version
	phpdbg -qrr -d memory_limit=512M vendor/bin/peridot --reporter spec --reporter html-code-coverage specs

open-coverage:
	open code-coverage-report/index.html

travis:
ifeq ($(TRAVIS_PHP_VERSION), nightly)
	phpdbg --version
	phpdbg -qrr vendor/bin/peridot specs
else
ifeq ($(TRAVIS_PHP_VERSION), $(filter $(TRAVIS_PHP_VERSION), 7.0 7.1))
	phpdbg --version
	phpdbg -qrr -d memory_limit=512M vendor/bin/peridot --reporter spec --reporter clover-code-coverage specs
else
	php --version
	vendor/bin/peridot --reporter spec --reporter clover-code-coverage specs
endif
endif

.PHONY: test coverage open-coverage travis
