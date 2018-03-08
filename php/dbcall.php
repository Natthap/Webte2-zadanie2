<?php
include "php/tablesBuild.php";

    function getMainTable() {
        include "php/config.php";

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $conn->set_charset("utf8");

        $sortParams = array("ASC", "DESC");
        $params = array($_GET["field"], $_GET["sort"]);

        if (is_null($params[0])) {
            $sql = "SELECT OSOBY.name AS Meno, OSOBY.surname AS Priezvisko, OH.year AS Rok, OH.city AS Miesto, OH.type AS Typ, UMIESTNENIE.discipline AS Disciplina, UMIESTNENIE.place AS Umiestnenie, OSOBY._person AS idOsoba, OH._OH AS idOh
    FROM OSOBY 
    JOIN UMIESTNENIE 
        ON id_person = OSOBY._person 
    JOIN OH
        ON OH._OH = UMIESTNENIE.ID_OH";
        } else {
            $sql = "SELECT OSOBY.name AS Meno, OSOBY.surname AS Priezvisko, OH.year AS Rok, OH.city AS Miesto, OH.type AS Typ, UMIESTNENIE.discipline AS Disciplina, UMIESTNENIE.place AS Umiestnenie, OSOBY._person AS idOsoba, OH._OH AS idOh
    FROM OSOBY 
    JOIN UMIESTNENIE 
        ON id_person = OSOBY._person 
    JOIN OH
        ON OH._OH = UMIESTNENIE.ID_OH
    ORDER BY ";
            $sql .= $params[0];
            $sql .= " ";
            $sql .= $params[1];

        }

        switch ($params[1]) {
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
    }

    function getUserData($id) {
        include "php/config.php";

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $conn->set_charset("utf8");

        $sql = "SELECT OSOBY.name AS Meno, OSOBY.surname AS Priezvisko, OH.year AS Rok, OH.city AS Miesto, OH.type AS Typ, UMIESTNENIE.discipline AS Disciplina, UMIESTNENIE.place AS Umiestnenie, OSOBY._person AS idOsoba, OH._OH AS idOh
    FROM OSOBY 
    JOIN UMIESTNENIE 
        ON id_person = OSOBY._person 
    JOIN OH
        ON OH._OH = UMIESTNENIE.ID_OH
        WHERE OSOBY._person = ".$id;

        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            createUserTable($result);
        } else {
            echo "RESULTS: 0";
        }
        $conn->close();
    }

    function getUserDataEdit($idOsoba) {

        include "php/config.php";

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $conn->set_charset("utf8");

        $sql = "SELECT OSOBY.name AS Meno, OSOBY.surname AS Priezvisko, OSOBY.birthDay AS bday, OSOBY.birthPlace AS bplace, OSOBY.birthCountry AS bcountry, OSOBY.deathDay AS dday, OSOBY.deathPlace AS dplace, OSOBY.deathCountry AS dcountry, OSOBY._person AS idOsoba
    FROM OSOBY 
        WHERE OSOBY._person = ".$idOsoba;

        $result = $conn->query($sql);

        editUserDataForm($result->fetch_assoc(), $idOsoba);

        $conn->close();
    }

    function getUserDetailEdit($idOsoba, $idOh) {

        include "php/config.php";

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $conn->set_charset("utf8");

        $sql = "SELECT UMIESTNENIE.place AS place, UMIESTNENIE.discipline AS discipline
    FROM UMIESTNENIE 
        WHERE UMIESTNENIE.id_person= ".$idOsoba." AND UMIESTNENIE.ID_OH=".$idOh;

        $result = $conn->query($sql);

        editUserDetailForm($result->fetch_assoc(), $idOsoba, $idOh);

        $conn->close();
    }

    function updateUser($meno, $priezvisko, $bday, $bplace, $bcountry, $dday, $dplace, $dcountry, $osobaId) {

        include "php/config.php";

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $conn->set_charset("utf8");

        $sql = "UPDATE OSOBY SET ";
        $sql .= $meno ? "name='".$meno."'" : "name=''";
        $sql .= $priezvisko ? ", surname='".$priezvisko."'" : ", surname=''";
        $sql .= $bday ? ", birthDay='".$bday."'" : ", birthDay=''";
        $sql .= $bplace ? ", birthPlace='".$bplace."'" : ", birthPlace=''";
        $sql .= $bcountry ? ", birthCountry='".$bcountry."'" : ", birthCountry=''";
        $sql .= $dday ? ", deathDay='".$dday."'" : ", deathDay=''";
        $sql .= $dplace ? ", deathPlace='".$dplace."'" : ", deathPlace=''";
        $sql .= $dcountry ? ", deathCountry='".$dcountry."'" : ", deathCountry=''";
        $sql .= " WHERE _person=".$osobaId;

        $conn->query($sql);

        $conn->close();
    }

    function updateUserDetail($idOh, $idOsoba, $place, $discipline) {
        include "php/config.php";

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $conn->set_charset("utf8");

        $sql = "UPDATE UMIESTNENIE SET ";
        $sql .= $place ? "place='".$place."'" : ", place=''";
        $sql .= $discipline ? ", discipline='".$discipline."'" : ", discipline=''";
        $sql .= " WHERE id_person=".$idOsoba;
        $sql .= " AND ID_OH=".$idOh;

        $conn->query($sql);

        $conn->close();
    }

    function deleteUserDetail($idOh) {
        include "php/config.php";

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $conn->set_charset("utf8");

        $sql = "SELECT UMIESTNENIE.ID AS id FROM UMIESTNENIE JOIN OH ON OH._OH = UMIESTNENIE.ID_OH WHERE OH._OH = ".$idOh;

        $result = $conn->query($sql);

        $result = $result->fetch_assoc();

        $sql = "DELETE FROM UMIESTNENIE WHERE UMIESTNENIE.ID=".$result["id"];

        $conn->query($sql);

        $conn->close();
    }

    function deleteUser($osobaId) {
    include "php/config.php";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $conn->set_charset("utf8");

    $sql = "DELETE FROM UMIESTNENIE WHERE UMIESTNENIE.id_person =".$osobaId;

    $conn->query($sql);

    $sql = "DELETE FROM OSOBY WHERE OSOBY._person=".$osobaId;

    $conn->query($sql);

    $conn->close();
}

    function createUserDetail() {}

    function createUser() {}
?>