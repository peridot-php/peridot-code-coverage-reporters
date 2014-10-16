<?php

use Evenement\EventEmitterInterface;
use Peridot\Reporter\ReporterFactory;
use Symfony\Component\Console\Input\InputInterface;

/**
 * Register the code coverage reporters.
 *
 */
return function(EventEmitterInterface $emitter) {
    $emitter->on('peridot.reporters', function(InputInterface $input, ReporterFactory $reporterFactory) {
        $reporterFactory->register(
            'clover-code-coverage',
            'Code coverage with a PHP_CodeCoverage style Clover report',
            'Peridot\CodeCoverage\Reporter\CloverCodeCoverageReporter'
        );

        $reporterFactory->register(
            'crap4j-code-coverage',
            'Code coverage with a PHP_CodeCoverage style Crap4J report',
            'Peridot\CodeCoverage\Reporter\Crap4JCodeCoverageReporter'
        );

        $reporterFactory->register(
            'html-code-coverage',
            'Code coverage with a PHP_CodeCoverage style HTML report',
            'Peridot\CodeCoverage\Reporter\HTMLCodeCoverageReporter'
        );

        $reporterFactory->register(
            'php-code-coverage',
            'Code coverage with a PHP_CodeCoverage style PHP report',
            'Peridot\CodeCoverage\Reporter\PHPCodeCoverageReporter'
        );

        $reporterFactory->register(
            'text-code-coverage',
            'Code coverage with a PHP_CodeCoverage style Text report',
            'Peridot\CodeCoverage\Reporter\TextCodeCoverageReporter'
        );

        $reporterFactory->register(
            'xml-code-coverage',
            'Code coverage with a PHP_CodeCoverage style XML report',
            'Peridot\CodeCoverage\Reporter\XMLCodeCoverageReporter'
        );
    });
};
