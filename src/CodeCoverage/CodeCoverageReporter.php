<?php

namespace Peridot\Reporter\CodeCoverage;

use Peridot\Reporter\ReporterInterface;

interface CodeCoverageReporter extends ReporterInterface
{
    /**
     * Add a directory to the blacklist (recursively).
     *
     * @param string $directory
     * @param string $suffix
     * @param string $prefix
     *
     * @return $this
     */
    public function addDirectoryToBlacklist($directory, $suffix = '.php', $prefix = '');

    /**
     * Add a directory to the whitelist (recursively).
     *
     * @param string $directory
     * @param string $suffix
     * @param string $prefix
     *
     * @return $this
     */
    public function addDirectoryToWhitelist($directory, $suffix = '.php', $prefix = '');

    /**
     * Add a file to the blacklist.
     *
     * @param string $filename
     *
     * @return $this
     */
    public function addFileToBlacklist($filename);

    /**
     * Add a file to the whitelist.
     *
     * @param string $filename
     *
     * @return $this
     */
    public function addFileToWhitelist($filename);

    /**
     * Add files to the blacklist.
     *
     * @param array $files
     *
     * @return $this
     */
    public function addFilesToBlacklist(array $files);

    /**
     * Add files to the whitelist.
     *
     * @param array $files
     *
     * @return $this
     */
    public function addFilesToWhitelist(array $files);

    /**
     * Get the report path.
     *
     * @return string
     */
    public function getReportPath();

    /**
     * Set the report path.
     *
     * @param string $reportPath
     *
     * @return $this
     */
    public function setReportPath($reportPath);
}
