<?php
class PdfToTextConversion
{
    private $document;

    public function __construct($pdfFilePath)
    {
        $this->document = $pdfFilePath;
    }

    public function convertToText()
    {
        if (isset($this->document) && !file_exists($this->document)) {
            return 'File does not exist.';
        }

        $output = shell_exec('pdftotext "' . $this->document . '" -');

        if ($output === null) {
            return 'Error converting PDF to text.';
        }

        return $output;
    }
}
