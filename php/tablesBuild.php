<?php
/**
 * Created by PhpStorm.
 * User: mzikl
 * Date: 6.3.2018
 * Time: 22:42
 */

function createMainTable($params, $result, $sortParams)
{
    echo "<table id=" . "myTable" . " class=" . "tablesorter" . ">
        <thead> 
            <tr>
                <th>
                    <a class=" . "hrefClass" . " href=" . "index.php?field=name&sort=" . ($params[0] == "name" ? $params[1] : $sortParams[0]) . ">
                        Meno
                    </a>
                </th>
                <th>
                    <a class=" . "hrefClass" . " href=" . "index.php?field=surname&sort=" . ($params[0] == "surname" ? $params[1] : $sortParams[0]) . ">
                        Priezvisko
                    </a>
                </th>
                <th>
                    <a class=" . "hrefClass" . " href=" . "index.php?field=year&sort=" . ($params[0] == "year" ? $params[1] : $sortParams[0]) . ">
                        Rok
                    </a>
                </th>
                <th>
                    <a class=" . "hrefClass" . " href=" . "index.php?field=city&sort=" . ($params[0] == "city" ? $params[1] : $sortParams[0]) . ">
                        Miesto
                    </a>
                </th>
                <th>
                    <a class=" . "hrefClass" . " href=" . "index.php?field=type&sort=" . ($params[0] == "type" ? $params[1] : $sortParams[0]) . ">
                        Typ
                    </a>
                </th>
                <th>
                    <a class=" . "hrefClass" . " href=" . "index.php?field=discipline&sort=" . ($params[0] == "discipline" ? $params[1] : $sortParams[0]) . ">
                        Disciplina
                    </a>
                </th>
                <th>
                    <a class=" . "hrefClass" . " href=" . "index.php?field=place&sort=" . ($params[0] == "place" ? $params[1] : $sortParams[0]) . ">   
                        Umiestnenie
                    </a>
                </th>
            </tr>
        </thead>
    <tbody>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td> 
                <a  class=" . "hrefClass"." href="."index.php?page=userPage&field=".$row["idOsoba"].">".$row["Meno"] . "
                </a>
                </td>";
        echo "<td>" . $row["Priezvisko"] . "</td>";
        echo "<td>" . $row["Rok"] . "</td>";
        echo "<td>" . $row["Miesto"] . "</td>";
        echo "<td>" . $row["Typ"] . "</td>";
        echo "<td>" . $row["Disciplina"] . "</td>";
        echo "<td>" . $row["Umiestnenie"] . "</td>";
        echo "<td><a href="."index.php?page=userEdit&osoba=".$row["idOsoba"]."><button>Edit</button></td>";
        echo "<td>
                  <form action=\"index.php\" method=\"post\" name=\"deleteData\">
                  <input type='hidden' name='idOh' value=".$row["idOh"].">
                  <input type=\"submit\" value=\"Vymazat zaznam\" name=\"deleteData\">
                  </form>
              </td>";
        echo "<td>
                  <form action=\"index.php\" method=\"post\" name=\"deleteUser\">
                  <input type='hidden' name='idOsoba' value=".$row["idOsoba"].">
                  <input type=\"submit\" value=\"Vymazat uzivatela\" name=\"deleteUser\">
                  </form>
              </td>";
        echo "</tr>";
    }
    echo "</tbody></table>";
}


    function createUserTable($result) {
        echo "<table id="."myTable"." class="."tablesorter".">
        <thead> 
            <tr>
                <th>Meno
                </th>
                <th>Priezvisko
                </th>
                <th>Rok
                </th>
                <th>Miesto
                </th>
                <th>Typ
                </th>
                <th>Disciplina
                </th>
                <th>Umiestnenie
                </th>
            </tr>
        </thead>
        <tbody>";
        while($row = $result->fetch_assoc()) {
            echo $row["idOh"];
            echo "<tr>";
            echo "<td>".$row["Meno"]."</td>";
            echo "<td>".$row["Priezvisko"]."</td>";
            echo "<td>".$row["Rok"]."</td>";
            echo "<td>".$row["Miesto"]."</td>";
            echo "<td>".$row["Typ"]."</td>";
            echo "<td>".$row["Disciplina"]."</td>";
            echo "<td>".$row["Umiestnenie"]."</td>";
            echo "<td><a href="."index.php?page=userEdit&osoba=".$row["idOsoba"]."><button>Edit</button></td>";
            echo "<td>
                  <form action=\"index.php\" method=\"post\" name=\"deleteData\">
                  <input type='hidden' name='idOh' value=".$row["idOh"].">
                  <input type=\"submit\" value=\"Vymazat zaznam\" name=\"deleteData\">
                  </form>
              </td>";
            echo "<td>
                  <form action=\"index.php\" method=\"post\" name=\"deleteUser\">
                  <input type='hidden' name='idOsoba' value=".$row["idOsoba"].">
                  <input type=\"submit\" value=\"Vymazat uzivatela\" name=\"deleteUser\">
                  </form>
              </td>";
            echo "</tr>";
        }
        echo "</tbody></table>";
    }


    function editForm($result) {
        echo "<form action=\"index.php\" method=\"post\" name=\"updateData\">
              <input type='hidden' name='osobaId' value=".$result["idOsoba"].">
              <br>
              Meno:
              <input type=\"text\" name=\"meno\" value=".$result["Meno"].">
              <br>
              Priezvisko:
              <input type=\"text\" name=\"priezvisko\" value=".$result["Priezvisko"].">
              <br>
              Den narodenia:
              <input type=\"text\" name=\"bday\" value=".$result["bday"].">
              <br>
              Miesto narodenia:
              <input type=\"text\" name=\"bplace\" value=".$result["bplace"].">
              <br>
              Krajina narodenia:
              <input type=\"text\" name=\"bcountry\" value=".$result["bcountry"].">
              <br>
              Den umrtia:
              <input type=\"text\" name=\"dday\" value=".$result["dday"].">
              <br>
              Miesto umrtia:
              <input type=\"text\" name=\"dplace\" value=".$result["dplace"].">
              <br>
              Krajina umrtia:
              <input type=\"text\" name=\"dcountry\" value=".$result["dcountry"].">
              <br>
              <br>
              <input type=\"submit\" value=\"Odoslat\" name=\"updateData\">
            </form> ";
    }
?>