<?php
include "php/config.php";
include "php/tablesBuild.php";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$conn->set_charset("utf8");

$sortParams = array("ASC", "DESC");
$params = array($_GET["field"], $_GET["sort"]);

if(is_null($params[0])){
    $sql = "SELECT OSOBY.name AS Meno, OSOBY.surname AS Priezvisko, OH.year AS Rok, OH.city AS Miesto, OH.type AS Typ, UMIESTNENIE.discipline AS Disciplina, UMIESTNENIE.place AS Umiestnenie
FROM OSOBY 
JOIN UMIESTNENIE 
	ON id_person = OSOBY._person 
JOIN OH
	ON OH._OH = UMIESTNENIE.ID_OH";
} else {
    $sql = "SELECT OSOBY.name AS Meno, OSOBY.surname AS Priezvisko, OH.year AS Rok, OH.city AS Miesto, OH.type AS Typ, UMIESTNENIE.discipline AS Disciplina, UMIESTNENIE.place AS Umiestnenie
FROM OSOBY 
JOIN UMIESTNENIE 
	ON id_person = OSOBY._person 
JOIN OH
	ON OH._OH = UMIESTNENIE.ID_OH
ORDER BY ";
    $sql .=  $params[0];
    $sql .=  " ";
    $sql .=  $params[1];

}

/*echo "<p>"."$sql"."</p>";
echo "<p>"."$params[0]"."</p>";*/

switch($params[1]) {
    case $sortParams[0]:
        $params[1] = $sortParams[1];
        break;
    case $sortParams[1]:
        $params[1] = $sortParams[0];
        break;
    default:
        $params[1] = $sortParams[0];
}

$result = $conn->query($sql);

if ($result->num_rows > 0) {
        createMainTable($params, $result, $sortParams);
} else {
    echo "RESULTS: 0";
}
$conn->close();

?>