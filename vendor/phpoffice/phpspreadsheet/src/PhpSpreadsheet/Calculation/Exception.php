<?php

namespace PhpOffice\PhpSpreadsheet\Calculation;

use PhpOffice\PhpSpreadsheet\Exception as PhpSpreadsheetException;

class Exception extends PhpSpreadsheetException
{
    /**
     * Error handler callback.
     *
     * @param mixed $code
     * @param mixed $string
     * @param mixed $file
     * @param mixed $line
     * @param mixed $context
     */
    public static function errorHandlerCallback($code, $string, $file, $line, /** @scrutinizer ignore-unused */ $context): void
    {
        $e = new self($string, $code);
        $e->line = $line;
        $e->file = $file;

        throw $e;
    }
}
