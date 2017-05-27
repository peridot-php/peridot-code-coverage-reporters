# Peridot Code Coverage Reporters

[![Packagist Version](https://img.shields.io/packagist/v/peridot-php/peridot-code-coverage-reporters.svg?style=flat-square "Packagist Version")](https://packagist.org/packages/peridot-php/peridot-code-coverage-reporters)
[![Build Status](https://img.shields.io/travis/peridot-php/peridot-code-coverage-reporters/master.svg?style=flat-square "Build Status")](https://travis-ci.org/peridot-php/peridot-code-coverage-reporters)
[![Scrutinizer Code Quality](https://img.shields.io/scrutinizer/g/peridot-php/peridot-code-coverage-reporters.svg?style=flat-square "Scrutinizer Code Quality")](https://scrutinizer-ci.com/g/peridot-php/peridot-code-coverage-reporters/?branch=master)
[![Codecov Coverage](https://img.shields.io/codecov/c/github/peridot-php/peridot-code-coverage-reporters/master.svg?style=flat-square "Codecov Coverage")](https://codecov.io/gh/peridot-php/peridot-code-coverage-reporters)
[![Gitter Chat](https://img.shields.io/gitter/room/peridot-php/lobby.svg?style=flat-square "Gitter Chat")](https://gitter.im/peridot-php/lobby)

## Installation

Add this package as a dependency:

    composer require --dev peridot-php/peridot-code-coverage-reporters

Then register the reporters in your `peridot.php` configuration:

```php
use Evenement\EventEmitterInterface;
use Peridot\Reporter\CodeCoverageReporters;
use Peridot\Reporter\ReporterInterface;

return function (EventEmitterInterface $emitter) {
    $coverage = new CodeCoverageReporters($emitter);
    $coverage->register();

    $emitter->on('code-coverage.start', function (ReporterInterface $reporter) {
        $reporter->addDirectoryToWhitelist(__DIR__ . '/src');
    });
};
```

## Usage

This package provides several *Peridot* reporters that can be used via the
`--reporter` option:

- `html-code-coverage`
- `text-code-coverage`
- `clover-code-coverage`
- `xml-code-coverage`
- `crap4j-code-coverage`
- `php-code-coverage`

These reporters are all driven by [php-code-coverage], which requires the use of
either the `phpdbg` executable, or the `xdebug` PHP extension in order to
produce coverage reports.

### With `phpdbg`

Where available, `phpdbg` is generally recommended for faster coverage
reporting. Most system-level package management tools should be able to install
a version of `phpdbg` with minimal hassle. Under [Homebrew], for example,
`phpdbg` can be installed like so:

    brew tap homebrew/homebrew-php && brew install php71 --with-phpdbg

Once installed, `phpdbg -qrr` can be used in place of `php` when executing
scripts, including the `peridot` binary, allowing code coverage to be generated:

    phpdbr -qrr vendor/bin/peridot --reporter spec --reporter html-code-coverage

The above command will print spec-style output while the suite runs, and
generate an HTML coverage report once the suite has completed.

### With `xdebug`

Use of `xdebug` is no longer recommended, because of the significantly worse
performance compared to `phpdbg`. If `phpdbg` is not an option, simply make sure
the `xdebug` extension is enabled when running `peridot`:

    vendor/bin/peridot --reporter spec --reporter html-code-coverage

The above command will print spec-style output while the suite runs, and
generate an HTML coverage report once the suite has completed.

[homebrew]: https://brew.sh/
[php-code-coverage]: https://github.com/sebastianbergmann/php-code-coverage
