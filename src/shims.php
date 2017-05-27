<?php

// Creates class aliases for php-code-coverage v4.0, which switched to namespaces.

if (!class_exists('PHP_CodeCoverage') && class_exists('SebastianBergmann\CodeCoverage\CodeCoverage')) {
    class_alias('SebastianBergmann\CodeCoverage\CodeCoverage', 'PHP_CodeCoverage');
}

if (!class_exists('PHP_CodeCoverage_Filter') && class_exists('SebastianBergmann\CodeCoverage\Filter')) {
    class_alias('SebastianBergmann\CodeCoverage\Filter', 'PHP_CodeCoverage_Filter');
}

if (!class_exists('PHP_CodeCoverage_Report_Clover') && class_exists('SebastianBergmann\CodeCoverage\Report\Clover')) {
    class_alias('SebastianBergmann\CodeCoverage\Report\Clover', 'PHP_CodeCoverage_Report_Clover');
}

if (!class_exists('PHP_CodeCoverage_Report_Crap4j') && class_exists('SebastianBergmann\CodeCoverage\Report\Crap4j')) {
    class_alias('SebastianBergmann\CodeCoverage\Report\Crap4j', 'PHP_CodeCoverage_Report_Crap4j');
}

if (!class_exists('PHP_CodeCoverage_Report_HTML') && class_exists('SebastianBergmann\CodeCoverage\Report\Html\Facade')) {
    class_alias('SebastianBergmann\CodeCoverage\Report\Html\Facade', 'PHP_CodeCoverage_Report_HTML');
}

if (!class_exists('PHP_CodeCoverage_Report_PHP') && class_exists('SebastianBergmann\CodeCoverage\Report\PHP')) {
    class_alias('SebastianBergmann\CodeCoverage\Report\PHP', 'PHP_CodeCoverage_Report_PHP');
}

if (!class_exists('PHP_CodeCoverage_Report_Text') && class_exists('SebastianBergmann\CodeCoverage\Report\Text')) {
    class_alias('SebastianBergmann\CodeCoverage\Report\Text', 'PHP_CodeCoverage_Report_Text');
}

if (!class_exists('PHP_CodeCoverage_Report_XML') && class_exists('SebastianBergmann\CodeCoverage\Report\Xml\Facade')) {
    class_alias('SebastianBergmann\CodeCoverage\Report\Xml\Facade', 'PHP_CodeCoverage_Report_XML');
}
