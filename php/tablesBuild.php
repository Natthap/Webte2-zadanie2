<?php
/**
 * Created by PhpStorm.
 * User: mzikl
 * Date: 6.3.2018
 * Time: 22:42
 */

    function createMainTable($params, $result, $sortParams) {
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
                <th>
                    <a href="."index.php?page=newUser>
                        <button>
                            Vytvorit uzivatela
                        </button>
                    </a>
                </th>
                <th>
                    <a href="."index.php?page=newDetail>
                        <button>
                            Vytvorit detail
                        </button>
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
        echo "<td><a href="."index.php?page=userDataEdit&osoba=".$row["idOsoba"]."><button>Upravit osobu</button></td>";
        echo "<td><a href="."index.php?page=userDetailEdit&osoba=".$row["idOsoba"]."&oh=".$row["idOh"]."><button>Upravit detail</button></td>";
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
                <th>
                    <a href="."index.php?page=newUser>
                        <button>
                            Vytvorit uzivatela
                        </button>
                    </a>
                </th>
                <th>
                    <a href="."index.php?page=newDetail>
                        <button>
                            Vytvorit detail
                        </button>
                    </a>
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
            echo "<td><a href="."index.php?page=userDataEdit&osoba=".$row["idOsoba"]."><button>Upravit osobu</button></td>";
            echo "<td><a href="."index.php?page=userDetailEdit&osoba=".$row["idOsoba"]."&oh=".$row["idOh"]."><button>Upravit detail</button></td>";
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

    function editUserDataForm($result) {
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

    function editUserDetailForm($result, $idOsoba, $idOh) {
        echo "<form action=\"index.php\" method=\"post\" name=\"updateDetail\">
              <input type='hidden' name='idOsoba' value=".$idOsoba.">
              <input type='hidden' name='idOh' value=".$idOh.">
              <br>              
              Umiestnenie:
              <input type=\"text\" name=\"place\" value=".$result["place"].">
              <br>
              Disciplina:
              <input type=\"text\" name=\"discipline\" value=".$result["discipline"].">
              <br>
              <br>
              <input type=\"submit\" value=\"Odoslat\" name=\"updateDetail\">
            </form> ";
    }

    function createUserDataForm() {
        echo "<form action=\"index.php\" method=\"post\" name=\"createUser\">
              Meno:
              <input type=\"text\" name=\"meno\" value=\"\">
              <br>
              Priezvisko:
              <input type=\"text\" name=\"priezvisko\" value=\"\">
              <br>
              Den narodenia:
              <input type=\"text\" name=\"bday\" value=\"\">
              <br>
              Miesto narodenia:
              <input type=\"text\" name=\"bplace\" value=\"\">
              <br>
              Krajina narodenia:
              <input type=\"text\" name=\"bcountry\" value=\"\">
              <br>
              Den umrtia:
              <input type=\"text\" name=\"dday\" value=\"\">
              <br>
              Miesto umrtia:
              <input type=\"text\" name=\"dplace\" value=\"\">
              <br>
              Krajina umrtia:
              <input type=\"text\" name=\"dcountry\" value=\"\">
              <br>
              <br>
              <input type=\"submit\" value=\"Odoslat\" name=\"createUser\">
            </form> ";
    }

    function createUserDetailForm() {
        echo "<form action=\"index.php\" method=\"post\" name=\"createDetail\">
              Meno:
              <input type=\"text\" name=\"meno\" value=\"\">
              <br>
              Priezvisko:
              <input type=\"text\" name=\"priezvisko\" value=\"\">
              <br>              
              Rok:
              <input type=\"text\" name=\"rok\" value=\"\">
              <br>   
              Miesto:
              <input type=\"text\" name=\"miesto\" value=\"\">
              <br>   
              Typ:
              <input type=\"text\" name=\"typ\" value=\"\">
              <br>   
              Umiestnenie:
              <input type=\"text\" name=\"place\" value=\"\">
              <br>
              Disciplina:
              <input type=\"text\" name=\"discipline\" value=\"\">
              <br>
              <br>
              <input type=\"submit\" value=\"Odoslat\" name=\"createDetail\">
            </form> ";
    }
?>