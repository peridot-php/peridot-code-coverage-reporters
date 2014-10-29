<?php

namespace Peridot\Reporter\CodeCoverage;

use Peridot\Reporter\AbstractBaseReporter;
use PHP_CodeCoverage;
use PHP_CodeCoverage_Filter;

/**
 * Class AbstractCodeCoverageReporter
 * @package Peridot\Reporter\CodeCoverage
 */
abstract class AbstractCodeCoverageReporter extends AbstractBaseReporter
{
    /**
     * @var \PHP_CodeCoverage
     */
    protected $coverage;

    /**
     * @var mixed
     */
    protected $coverageReporter;

    /**
     * @var \PHP_CodeCoverage_Filter
     */
    protected $filter;

    /**
     * @var string
     */
    protected $reportPath;

    /**
     * {@inheritdoc}
     */
    public function init()
    {
        $this->filter = new PHP_CodeCoverage_Filter();
        $this->coverage = new PHP_CodeCoverage(null, $this->filter);

        $this->eventEmitter->on('runner.start', [$this, 'onRunnerStart']);
        $this->eventEmitter->on('runner.end', [$this, 'onRunnerEnd']);
    }

    /**
     * Add a directory to the blacklist (recursively).
     *
     * @param string $directory
     * @param string $suffix
     * @param string $prefix
     * @return $this
     */
    public function addDirectoryToBlacklist($directory, $suffix = '.php', $prefix = '')
    {
        $this->filter->addDirectoryToBlacklist($directory, $suffix, $prefix);
        return $this;
    }

    /**
     * Add a directory to the whitelist (recursively).
     *
     * @param string $directory
     * @param string $suffix
     * @param string $prefix
     * @return $this
     */
    public function addDirectoryToWhitelist($directory, $suffix = '.php', $prefix = '')
    {
        $this->filter->addDirectoryToWhitelist($directory, $suffix, $prefix);
        return $this;
    }

    /**
     * Add a file to the blacklist.
     *
     * @param string $filename
     * @return $this
     */
    public function addFileToBlacklist($filename)
    {
        $this->filter->addFileToBlacklist($filename);
        return $this;
    }

    /**
     * Add a file to the whitelist.
     *
     * @param string $filename
     * @return $this
     */
    public function addFileToWhitelist($filename)
    {
        $this->filter->addFileToWhitelist($filename);
        return $this;
    }

    /**
     * Add files to the blacklist.
     *
     * @param array $files
     * @return $this
     */
    public function addFilesToBlacklist(array $files)
    {
        $this->filter->addFilesToBlacklist($files);
        return $this;
    }

    /**
     * Add files to the whitelist.
     *
     * @param array $files
     * @return $this
     */
    public function addFilesToWhitelist(array $files)
    {
        $this->filter->addFilesToWhitelist($files);
        return $this;
    }

    /**
     * Return the code coverage reporter.
     *
     * @return mixed
     */
    public function getCoverageReporter()
    {
        if (!$this->coverageReporter) {
            $this->coverageReporter = $this->createCoverageReporter();
        }

        return $this->coverageReporter;
    }

    /**
     * Handle the runner.end event.
     */
    public function onRunnerEnd()
    {
        $this->coverage->stop();
        $this->footer();

        $this->output->write('Generating code coverage report... ');

        $this->getCoverageReporter()->process($this->coverage, $this->getReportPath());
        $this->eventEmitter->emit('code-coverage.end', [$this]);

        $this->output->write('Done!');
        $this->output->writeln('');
    }

    /**
     * Handle the runner.start event.
     */
    public function onRunnerStart()
    {
        $this->eventEmitter->emit('code-coverage.start', [$this]);
        $this->coverage->start('code-coverage');
    }

    /**
     * @return string
     */
    public function getReportPath()
    {
        return $this->reportPath;
    }

    /**
     * @param string $reportPath
     * @return $this
     */
    public function setReportPath($reportPath)
    {
        $this->reportPath = $reportPath;
        return $this;
    }

    /**
     * Create the desired code coverage reporter.
     *
     * @return mixed
     */
    abstract protected function createCoverageReporter();
}
