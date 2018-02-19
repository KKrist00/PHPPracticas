
<?php
$myXMLData =
    "<?xml version='1.0' encoding='UTF-8'?>
<notes>
<note>
<to>Tove</to>
<from>Jani</from>
<heading>Reminder</heading>
<body>Don't forget me this weekend!</body>
</note>
<note>
<to>Tove2</to>
<from>Jani2</from>
<heading>Reminder2</heading>
<body>Don't forget2 me this weekend!</body>
</note>
</notes>
";
$xml = simplexml_load_string($myXMLData) or die("Error: Cannot create object");
//echo $xml->note[1]->heading;
header('Content-type:  text/xml');
echo $xml->asXML();
//var_dump($xml);
?>