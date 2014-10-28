<?php

namespace Peridot\Reporter;

use Evenement\EventEmitterInterface;
use Peridot\Reporter\CodeCoverage\AbstractCodeCoverageReporter;

/**
 * Class CodeCoverageConfiguration
 * @package Peridot\Reporter
 */
class CodeCoverageConfiguration
{
    /**
     * @var string
     */
    protected $reportPath;

    /**
     * Constructor.
     *
     * @param EventEmitterInterface $eventEmitter
     */
    public function __construct(EventEmitterInterface $eventEmitter)
    {
        $eventEmitter->on('code-coverage.start', [$this, 'onCodeCoverageStart']);
    }

    /**
     * Handle the code-coverage.start event.
     *
     * @param AbstractCodeCoverageReporter $reporter
     */
    public function onCodeCoverageStart(AbstractCodeCoverageReporter $reporter)
    {
        if ($this->reportPath) {
            $reporter->setReportPath($this->getReportPath());
        }
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
}
