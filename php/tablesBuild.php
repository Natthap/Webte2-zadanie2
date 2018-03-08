<?php
/**
 * Created by PhpStorm.
 * User: mzikl
 * Date: 6.3.2018
 * Time: 22:42
 */

    function createMainTable($params, $result, $sortParams) {
        echo "<h1>Hlavná stránka</h1>";
        echo "<table id=" . "myTable".">
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
                                Vytvoriť osobu
                            </button>
                        </a>
                    </th>
                    <th>
                        <a href="."index.php?page=newDetail>
                            <button>
                                Vytvoriť detail
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
            echo "<td><a href="."index.php?page=userDataEdit&osoba=".$row["idOsoba"]."><button>Upraviť osobu</button></td>";
            echo "<td><a href="."index.php?page=userDetailEdit&osoba=".$row["idOsoba"]."&oh=".$row["idOh"]."><button>Upraviť detail</button></td>";
            echo "<td>
                      <form action=\"index.php\" method=\"post\" name=\"deleteData\">
                      <input type='hidden' name='idOh' value=".$row["idOh"].">
                      <input type=\"submit\" value=\"Vymazať zaznam\" name=\"deleteData\">
                      </form>
                  </td>";
            echo "<td>
                      <form action=\"index.php\" method=\"post\" name=\"deleteUser\">
                      <input type='hidden' name='idOsoba' value=".$row["idOsoba"].">
                      <input type=\"submit\" value=\"Vymazať uzivatela\" name=\"deleteUser\">
                      </form>
                  </td>";
            echo "</tr>";
        }
        echo "</tbody></table>";
}

    function createUserTable($result) {
        echo "<a href=\"index.php\" class=\"container\" style=\"float: right\">
                 <img src=\"img/back.png\" class=\"image\" alt=\"Back image\">
                 <div class=\"middle\">
                     <div class=\"text\">Späť</div>
                 </div>
              </a>";
        echo "<h1>Stránka osoby</h1>";
        echo "<table id="."myTable>
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
                    <a href="."index.php?page=newDetail>
                        <button>
                            Vytvoriť detail
                        </button>
                    </a>
                </th>
            </tr>
        </thead>
        <tbody>";
        while($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>".$row["Meno"]."</td>";
            echo "<td>".$row["Priezvisko"]."</td>";
            echo "<td>".$row["Rok"]."</td>";
            echo "<td>".$row["Miesto"]."</td>";
            echo "<td>".$row["Typ"]."</td>";
            echo "<td>".$row["Disciplina"]."</td>";
            echo "<td>".$row["Umiestnenie"]."</td>";
            echo "<td><a href="."index.php?page=userDataEdit&osoba=".$row["idOsoba"]."><button>Upraviť osobu</button></td>";
            echo "<td><a href="."index.php?page=userDetailEdit&osoba=".$row["idOsoba"]."&oh=".$row["idOh"]."><button>Upraviť detail</button></td>";
            echo "<td>
                  <form action=\"index.php\" method=\"post\" name=\"deleteData\">
                  <input type='hidden' name='idOh' value=".$row["idOh"].">
                  <input type=\"submit\" value=\"Vymazať zaznam\" name=\"deleteData\">
                  </form>
              </td>";
            echo "<td>
                  <form action=\"index.php\" method=\"post\" name=\"deleteUser\">
                  <input type='hidden' name='idOsoba' value=".$row["idOsoba"].">
                  <input type=\"submit\" value=\"Vymazať uzivatela\" name=\"deleteUser\">
                  </form>
              </td>";
            echo "</tr>";
        }
        echo "</tbody></table>";
    }

    function editUserDataForm($result) {
        echo "<a href=\"index.php\" class=\"container\" style=\"float: right\">
                 <img src=\"img/back.png\" class=\"image\" alt=\"Back image\">
                 <div class=\"middle\">
                     <div class=\"text\">Späť</div>
                 </div>
              </a>";
        echo "<h1>Stránka úpravy osoby</h1>";
        echo  "<div id=myTable class='formClass'>";
        echo "<form action=\"index.php\" method=\"post\" name=\"updateData\">
              <input type='hidden' name='osobaId' value=\"".$result["idOsoba"]."\">
              <br>
              Meno:
              <input type=\"text\" name=\"meno\" value=\"".$result["Meno"]."\">
              <br>
              Priezvisko:
              <input type=\"text\" name=\"priezvisko\" value=\"".$result["Priezvisko"]."\">
              <br>
              Den narodenia:
              <input type=\"text\" name=\"bday\" value=\"".$result["bday"]."\">
              <br>
              Miesto narodenia:
              <input type=\"text\" name=\"bplace\" value=\"".$result["bplace"]."\">
              <br>
              Krajina narodenia:
              <input type=\"text\" name=\"bcountry\" value=\"".$result["bcountry"]."\">
              <br>
              Den umrtia:
              <input type=\"text\" name=\"dday\" value=\"".$result["dday"]."\">
              <br>
              Miesto umrtia:
              <input type=\"text\" name=\"dplace\" value=\"".$result["dplace"]."\">
              <br>
              Krajina umrtia:
              <input type=\"text\" name=\"dcountry\" value=\"".$result["dcountry"]."\">
              <br>
              <br>
              <input type=\"submit\" value=\"Odoslat\" name=\"updateData\">
            </form></div>";
    }

    function editUserDetailForm($result, $idOsoba, $idOh) {
        echo "<a href=\"index.php\" class=\"container\" style=\"float: right\">
                 <img src=\"img/back.png\" class=\"image\" alt=\"Back image\">
                 <div class=\"middle\">
                     <div class=\"text\">Späť</div>
                 </div>
              </a>";
        echo "<h1>Stránka úpravy umiestnenia</h1>";
        echo  "<div id=myTable class='formClass'>";
        echo "<form action=\"index.php\" method=\"post\" name=\"updateDetail\">
              <input type='hidden' name='idOsoba' value=\"".$idOsoba."\">
              <input type='hidden' name='idOh' value=\"".$idOh."\">
              <br>              
              Umiestnenie:
              <input type=\"text\" name=\"place\" maxlength=\"40\" value=\"".$result["place"]."\">
              <br>
              Disciplina:
              <input type=\"text\" name=\"discipline\" maxlength=\"40\" value=\"".$result["discipline"]."\">
              <br>
              <br>
              <input type=\"submit\" value=\"Odoslat\" name=\"updateDetail\">
            </form></div> ";
    }

    function createUserDataForm() {
        echo "<a href=\"index.php\" class=\"container\" style=\"float: right\">
                 <img src=\"img/back.png\" class=\"image\" alt=\"Back image\">
                 <div class=\"middle\">
                     <div class=\"text\">Späť</div>
                 </div>
              </a>";
        echo "<h1>Stránka vytvorenia osoby</h1>";
        echo  "<div id=myTable class='formClass'>";
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
            </form></div>";
    }

    function createUserDetailForm($dataOsoba, $dataOh) {
        $select1 = "";
        $select2 = "";

        while($row = $dataOsoba->fetch_assoc()) {
            $select1 .= "<option value=".$row["id"].">".$row["name"]. " ".$row["surname"]."</option>";
        }

        while($row = $dataOh->fetch_assoc()) {
            $select2 .= "<option value=".$row["id"].">".$row["typ"]." ".$row["rok"]." ".$row["mesto"]."</option>";
        }

        echo "<a href=\"index.php\" class=\"container\" style=\"float: right\">
                 <img src=\"img/back.png\" class=\"image\" alt=\"Back image\">
                 <div class=\"middle\">
                     <div class=\"text\">Späť</div>
                 </div>
              </a>";
        echo "<h1>Stránka zadania umiestnenia</h1>";
        echo  "<div id=myTable class='formClass'>";
        echo "<form action=\"index.php\" method=\"post\" name=\"createDetail\">
              Meno Priezvisko: 
              <select name=\"idOsoba\">".
              $select1."
              </select>
              <br>              
              Typ, Rok, Miesto:
              <select name='idOh'>".
              $select2."
              </select>
              <br>   
              Umiestnenie:
              <input type=\"text\" name=\"place\" value=\"\">
              <br>
              Disciplina:
              <input type=\"text\" name=\"discipline\" value=\"\">
              <br>
              <br>
              <input type=\"submit\" value=\"Odoslat\" name=\"createDetail\">
            </form></div>";
    }

?>