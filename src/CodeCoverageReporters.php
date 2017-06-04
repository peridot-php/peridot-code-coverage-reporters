<?php

namespace Peridot\Reporter;

use Evenement\EventEmitterInterface;
use Peridot\Console\Environment;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Class CodeCoverageReporters
 * @package Peridot\Reporter
 */
class CodeCoverageReporters
{
    /**
     * @var \Peridot\Reporter\CodeCoverageConfiguration
     */
    protected $configuration;

    /**
     * @var EventEmitterInterface
     */
    protected $eventEmitter;

    /**
     * Constructor.
     *
     * @param EventEmitterInterface $eventEmitter
     * @param CodeCoverageConfiguration|null $configuration
     */
    public function __construct(EventEmitterInterface $eventEmitter, CodeCoverageConfiguration $configuration = null)
    {
        if (!$configuration) {
            $configuration = new CodeCoverageConfiguration($eventEmitter);
        }

        $this->configuration = $configuration;
        $this->eventEmitter = $eventEmitter;
    }

    /**
     * Handle the peridot.execute event.
     *
     * @param InputInterface $input
     * @param OutputInterface $output
     */
    public function onPeridotExecute(InputInterface $input, OutputInterface $output)
    {
        if ($input->hasOption('code-coverage-path')) {
            $this->configuration->setReportPath($input->getOption('code-coverage-path'));
        }
    }

    /**
     * Handle the peridot.reporters event.
     *
     * @param InputInterface $input
     * @param ReporterFactory $reporterFactory
     */
    public function onPeridotReporters(InputInterface $input, ReporterFactory $reporterFactory)
    {
        $reporterFactory->register(
            'clover-code-coverage',
            'Code coverage with a PHP_CodeCoverage style Clover report',
            'Peridot\Reporter\CodeCoverage\CloverCodeCoverageReporter'
        );

        $reporterFactory->register(
            'crap4j-code-coverage',
            'Code coverage with a PHP_CodeCoverage style Crap4J report',
            'Peridot\Reporter\CodeCoverage\Crap4JCodeCoverageReporter'
        );

        $reporterFactory->register(
            'html-code-coverage',
            'Code coverage with a PHP_CodeCoverage style HTML report',
            'Peridot\Reporter\CodeCoverage\HTMLCodeCoverageReporter'
        );

        $reporterFactory->register(
            'php-code-coverage',
            'Code coverage with a PHP_CodeCoverage style PHP report',
            'Peridot\Reporter\CodeCoverage\PHPCodeCoverageReporter'
        );

        $reporterFactory->register(
            'text-code-coverage',
            'Code coverage with a PHP_CodeCoverage style Text report',
            'Peridot\Reporter\CodeCoverage\TextCodeCoverageReporter'
        );

        $reporterFactory->register(
            'xml-code-coverage',
            'Code coverage with a PHP_CodeCoverage style XML report',
            'Peridot\Reporter\CodeCoverage\XMLCodeCoverageReporter'
        );
    }

    public function onPeridotStart(Environment $environment)
    {
        $environment->getDefinition()->option(
            'code-coverage-path',
            'coverage',
            InputOption::VALUE_REQUIRED,
            'Set the output directory for code coverage reporter'
        );
    }

    /**
     * Register the reporters.
     *
     * @return $this
     */
    public function register()
    {
        $this->eventEmitter->on('peridot.start', [$this, 'onPeridotStart']);
        $this->eventEmitter->on('peridot.execute', [$this, 'onPeridotExecute']);
        $this->eventEmitter->on('peridot.reporters', [$this, 'onPeridotReporters']);
        return $this;
    }
}
