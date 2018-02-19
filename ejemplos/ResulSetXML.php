?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "shop";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT * FROM categories";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
$xmlDom = new DOMDocument();
$xmlDom->appendChild($xmlDom->createElement('resultados'));
$xmlRoot = $xmlDom->documentElement;
while ($row = mysqli_fetch_assoc($result)) {
$xmlRowElementNode = $xmlDom->createElement('fila');
foreach ($row as $k => $v) {
$xmlRowElement = $xmlDom->createElement($k);
// echo $k . " => " . $v . " , ";
$xmlText = $xmlDom->createTextNode($v);
$xmlRowElement->appendChild($xmlText);
$xmlRowElementNode->appendChild($xmlRowElement);
}
//  echo "<br/>";
$xmlRoot->appendChild($xmlRowElementNode);
}
} else  echo "No hay registros";
$conn->close();
header('Content-type:  text/xml');
echo $xmlDom->saveXML();
?>