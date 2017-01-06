# Peridot Code Coverage Reporters

[![Packagist Version](https://img.shields.io/packagist/v/peridot-php/peridot-code-coverage-reporters.svg?style=flat-square "Packagist Version")](https://packagist.org/packages/peridot-php/peridot-code-coverage-reporters)
[![Build Status](https://img.shields.io/travis/peridot-php/peridot-code-coverage-reporters/master.svg?style=flat-square "Build Status")](https://travis-ci.org/peridot-php/peridot-code-coverage-reporters)
[![Scrutinizer Code Quality](https://img.shields.io/scrutinizer/g/peridot-php/peridot-code-coverage-reporters.svg?style=flat-square "Scrutinizer Code Quality")](https://scrutinizer-ci.com/g/peridot-php/peridot-code-coverage-reporters/?branch=master)
[![Codecov Coverage](https://img.shields.io/codecov/c/github/peridot-php/peridot-code-coverage-reporters/master.svg?style=flat-square "Codecov Coverage")](https://codecov.io/gh/peridot-php/peridot-code-coverage-reporters)
[![Gitter Chat](https://img.shields.io/gitter/room/peridot-php/lobby.svg?style=flat-square "Gitter Chat")](https://gitter.im/peridot-php/lobby)

[PHP_CodeCoverage](https://github.com/sebastianbergmann/php-code-coverage) style code coverage reporters can be easily added to any project testing with peridot!

The repository's [peridot.php](https://github.com/peridot-php/peridot-code-coverage-reporters/blob/master/peridot.php) file provides a good example to get started with code coverage reporting:

```php
<?php

use Evenement\EventEmitterInterface;
use Peridot\Reporter\CodeCoverage\AbstractCodeCoverageReporter;
use Peridot\Reporter\CodeCoverageReporters;

/**
 * Configure peridot.
 *
 * @param EventEmitterInterface $eventEmitter
 */
return function (EventEmitterInterface $eventEmitter) {
    (new CodeCoverageReporters($eventEmitter))->register();

    $eventEmitter->on('peridot.start', function (\Peridot\Console\Environment $environment) {
        $environment->getDefinition()->getArgument('path')->setDefault('specs');
    });

    $eventEmitter->on('code-coverage.start', function (AbstractCodeCoverageReporter $reporter) {
        $reporter->addDirectoryToWhitelist(__DIR__ . '/src');
    });
};
```

To make code coverage reporters available, simply register a new `CodeCoverageReporters` object:

```php
(new CodeCoverageReporters($eventEmitter))->register();
```

By default, peridot will look for all tests in the current working directory.  Since we don't want to have to specify the `specs/` every time we run peridot, we set a default path:

```php
$eventEmitter->on('peridot.start', function (\Peridot\Console\Environment $environment) {
    $environment->getDefinition()->getArgument('path')->setDefault('specs');
});
```

Since we only want code coverage reported for our source, we whitelist the `src` directory:

```php
$eventEmitter->on('code-coverage.start', function (AbstractCodeCoverageReporter $reporter) {
    $reporter->addDirectoryToWhitelist(__DIR__ . '/src');
});
```

