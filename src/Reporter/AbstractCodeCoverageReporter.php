<?php

namespace Peridot\CodeCoverage\Reporter;

use Peridot\Reporter\AbstractBaseReporter;
use PHP_CodeCoverage;
use PHP_CodeCoverage_Filter;

/**
 * Class AbstractCodeCoverageReporter
 * @package Peridot\CodeCoverage\Reporter
 */
abstract class AbstractCodeCoverageReporter extends AbstractBaseReporter
{
    /**
     * @var \PHP_CodeCoverage
     */
    protected $coverage;

    /**
     * @var \PHP_CodeCoverage_Filter
     */
    protected $filter;

    /**
     * @var mixed
     */
    protected $coverageReporter;

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
     */
    public function addDirectoryToBlacklist($directory, $suffix = '.php', $prefix = '')
    {
        $this->filter->addDirectoryToBlacklist($directory, $suffix, $prefix);
    }

    /**
     * Add a directory to the whitelist (recursively).
     *
     * @param string $directory
     * @param string $suffix
     * @param string $prefix
     */
    public function addDirectoryToWhitelist($directory, $suffix = '.php', $prefix = '')
    {
        $this->filter->addDirectoryToWhitelist($directory, $suffix, $prefix);
    }

    /**
     * Add a file to the blacklist.
     *
     * @param string $filename
     */
    public function addFileToBlacklist($filename)
    {
        $this->filter->addFileToBlacklist($filename);
    }

    /**
     * Add a file to the whitelist.
     *
     * @param string $filename
     */
    public function addFileToWhitelist($filename)
    {
        $this->filter->addFileToWhitelist($filename);
    }

    /**
     * Add files to the blacklist.
     *
     * @param array $files
     */
    public function addFilesToBlacklist(array $files)
    {
        $this->filter->addFilesToBlacklist($files);
    }

    /**
     * Add files to the whitelist.
     *
     * @param array $files
     */
    public function addFilesToWhitelist(array $files)
    {
        $this->filter->addFilesToWhitelist($files);
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
     * Return the desired code coverage report path.
     *
     * @return string
     */
    abstract public function getReportPath();

    /**
     * Handle the runner.end event.
     */
    public function onRunnerEnd()
    {
        $this->coverage->stop();

        $this->getCoverageReporter()->process($this->coverage, $this->getReportPath());
        $this->eventEmitter->emit('code-coverage.end', [$this]);
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
     * Create the desired code coverage reporter.
     *
     * @return mixed
     */
    abstract protected function createCoverageReporter();
}
