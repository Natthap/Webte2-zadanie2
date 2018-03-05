<!DOCTYPE html>
<html>
<?php
    include 'subpages/head.php';
?>

<body>
<div id="bodyDiv">
    <div id="headerId"></div>
    <div id="bodyId">
        <?php
            $page = $_GET["page"];
            switch ($page){
                /*case "googleCharts": include('subpages/googleCharts.php');
                    break;
                case "columnCharts": include('subpages/columnCharts.php');
                    break;
                case "pieCharts": include('subpages/pieCharts.php');
                    break;*/
                default;
                    include("subpages/mainPage.php");
                    break;
            }
        ?>
    </div>
</div>
</body>
</html>
