<?php
namespace Casa\Logic\Language;

use Casa\Logic\Output\AbstractOutput;
use Casa\Logic\Output\Filter\OutputFilterInterface;
use Casa\Logic\Output\TriggerableInterface;

/**
 * Run all script analysers and outputs their result.
 */
class Php
{
    /**
     * List of PHP analys integration classes.
     * @return string[] array of class names.
     */
    public static function getAnalysisToolsClasses()
    {
        return [
            'Casa\Logic\Tools\CodeSniffer',
            'Casa\Logic\Tools\CopyPasteDetector',
            'Casa\Logic\Tools\MessDetector',
        ];
    }
}