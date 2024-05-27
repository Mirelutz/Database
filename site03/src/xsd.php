<?php

$xml = new DOMDocument;
$xml->load('data2.xml');

$xsl = new DOMDocument;
$xsl->load('data2.xsl');

$proc = new XSLTProcessor;
$proc->importStyleSheet($xsl); 

echo $proc->transformToXML($xml);
