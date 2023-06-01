<?php

    include "docx_convert.php";

    $converter = new DocxToTextConversion("documents/Abiral_Pandey_Fullstack_Java.docx");

    echo $converter->convertToText();

?>