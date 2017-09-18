# Peridot Code Coverage Reporters Changelog

## Next release

- **[BC BREAK]** Dropped support for [php-code-coverage] < 4.x.
- **[BC BREAK]** Added support for [php-code-coverage] 4.x and 5.x.
- **[BC BREAK]** By default, coverage reports are now placed under `coverage`
  instead of `code-coverage-report`.
- **[NEW]** Introduced the `CodeCoverageReporter` interface for use in
  configuration files.

[php-code-coverage]: https://github.com/sebastianbergmann/php-code-coverage

## 2.0.2 (2017-01-06)

- **[FIXED]** Output from reporters is now displayed ([#11] - thanks [@m6w6]).
- **[IMPROVED]** Support for PHP Code Coverage 3 ([#13]).

[#11]: https://github.com/peridot-php/peridot-code-coverage-reporters/pull/11
[#13]: https://github.com/peridot-php/peridot-code-coverage-reporters/pull/13
[@m6w6]: https://github.com/m6w6
