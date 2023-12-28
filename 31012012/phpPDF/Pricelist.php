<?php

// The location of the PDF file
// on the server
$filename = "../PDF/Pricelist_2wahka.pdf";

// Header content type
header("Content-type: application/pdf");

header("Content-Length: " . filesize($filename));

// Send the file to the browser.
readfile($filename);