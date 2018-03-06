<!DOCTYPE html>
<html>
<?php
    include 'subpages/head.php';
?>

<body>
<div id="bodyDiv">
    <div id="bodyId">
        <?php
            $page = $_GET["page"];
            switch ($page){
                case "userPage": include('subpages/userPage.php');
                    break;
                default;
                    include("subpages/mainPage.php");
                    break;
            }
        ?>
    </div>
</div>
</body>
</html>
