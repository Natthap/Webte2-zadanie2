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

            if(isset($_POST['updateDetail'])) {
                updateUserDetail($_POST["idOh"], $_POST["idOsoba"], $_POST["place"], $_POST["discipline"]);
            }

            if(isset($_POST['deleteData'])) {
                deleteUserDetail($_POST["idOh"]);
            }

            if(isset($_POST['deleteUser'])) {
                deleteUser($_POST[idOsoba]);
            }

            if(isset($_POST['createUser'])) {
                createUser($_POST["meno"], $_POST["priezvisko"], $_POST["bday"], $_POST["bplace"], $_POST["bcountry"], $_POST["dday"], $_POST["dplace"], $_POST["dcountry"]);
            }

            if(isset($_POST['createDetail'])) {
                createUserDetail($_POST["idOsoba"], $_POST["idOh"], $_POST["place"], $_POST["discipline"]);
            }

            $page = $_GET["page"];
            switch ($page){
                case "userPage":
                                 getUserData($_GET["field"]);
                                 break;
                case "userDataEdit":
                                 getUserDataEdit($_GET["osoba"], $_GET["oh"]);
                                 break;
                case "userDetailEdit":
                                 getUserDetailEdit($_GET["osoba"], $_GET["oh"]);
                                 break;
                case "newUser":
                                 createUserDataForm();
                                 break;
                case "newDetail":
                                 createUserDetailForm(getAllUserNames(), getAllOh());
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
