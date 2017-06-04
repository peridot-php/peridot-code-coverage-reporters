<?php

namespace Peridot\Reporter\CodeCoverage;

use SebastianBergmann\CodeCoverage\Report\Text;

/**
 * Class TextCodeCoverageReporter
 * @package Peridot\Reporter\CodeCoverage
 */
class TextCodeCoverageReporter extends AbstractCodeCoverageReporter
{
    /**
     * Handle the runner.end event.
     */
    public function onRunnerEnd()
    {
        $this->footer();

        $output = $this->getCoverageReporter()->process($this->coverage, true);
        $this->eventEmitter->emit('code-coverage.end', [$this]);

        $this->output->writeln($output);
    }

    /**
     * Create the desired code coverage reporter.
     *
     * @return Text
     */
    protected function createCoverageReporter()
    {
        return new Text(50, 90, true, false);
    }
}
