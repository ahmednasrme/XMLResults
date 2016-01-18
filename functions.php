<?php
function OCI_XML($stmt){
//Oracle DB, pass the stmt parameter after executed!
//all field names will be used as xml tags, make aliases in your SQL query if you want different tags other than fieldnames
$oXMLWriter = new XMLWriter;
$oXMLWriter->openMemory();
$oXMLWriter->setIndent(true);
$oXMLWriter->startDocument('1.0', 'UTF-8');
$oXMLWriter->startElement('Record');

while (($row = oci_fetch_array($stmt, OCI_ASSOC))){
	$oXMLWriter->startElement('row');
	foreach ($row as $key => $value){
	$oXMLWriter->startElement($key);
	$oXMLWriter->text($value);
	$oXMLWriter->endElement();
	}
	$oXMLWriter->endElement();
}
$oXMLWriter->endElement();
$oXMLWriter->endDocument();
$xmldump = $oXMLWriter->outputMemory(TRUE);

return $xmldump;
}

//The following function is deprecated in php 5.5.0 removed from php 7.0.0
function MySQL_XML($stmt){
//MySQL DB, pass the stmt parameter after executed!
//all field names will be used as xml tags, make aliases in your SQL query if you want different tags other than fieldnames
$oXMLWriter = new XMLWriter;
$oXMLWriter->openMemory();
$oXMLWriter->setIndent(true);
$oXMLWriter->startDocument('1.0', 'UTF-8');
$oXMLWriter->startElement('Record');

while (($row = mysql_fetch_array($stmt, MYSQL_ASSOC))){
	$oXMLWriter->startElement('row');
	foreach ($row as $key => $value){
	$oXMLWriter->startElement($key);
	$oXMLWriter->text($value);
	$oXMLWriter->endElement();
	}
	$oXMLWriter->endElement();
}
$oXMLWriter->endElement();
$oXMLWriter->endDocument();
$xmldump = $oXMLWriter->outputMemory(TRUE);

return $xmldump;
}
?>
