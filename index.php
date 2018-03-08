<!DOCTYPE html>
<html>
<?php
    include 'subpages/head.php';
?>

<body>
<div id="bodyDiv">
    <div id="bodyId">
        <?php
            include "php/dbcall.php";

            if(isset($_POST['updateData'])) {
                updateUser($_POST["meno"], $_POST["priezvisko"], $_POST["bday"], $_POST["bplace"], $_POST["bcountry"], $_POST["dday"], $_POST["dplace"], $_POST["dcountry"], $_POST["osobaId"]);
            }

            if(isset($_POST['deleteData'])) {
                deleteUserDetail($_POST["idOh"]);
            }

            if(isset($_POST['deleteUser'])) {
                deleteUser($_POST[idOsoba]);
            }

            $page = $_GET["page"];
            switch ($page){
                case "userPage":
                                 getUserData($_GET["field"]);
                                 break;
                case "userEdit":
                                 getUserDataEdit($_GET["osoba"], $_GET["oh"]);
                                 break;
                default:
                         getMainTable();
                         break;
            }
        ?>
    </div>
</div>
</body>
</html>
