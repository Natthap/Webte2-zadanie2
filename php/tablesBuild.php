<?php
/**
 * Created by PhpStorm.
 * User: mzikl
 * Date: 6.3.2018
 * Time: 22:42
 */

function createMainTable($params, $result) {
    echo "<table id="."myTable"." class="."tablesorter".">
        <thead> 
            <tr>
                <th>
                    <a href="."index.php?field=name&sort="."$params[1]>
                        Meno
                    </a>
                </th>
                <th>
                    <a href="."index.php?field=surname&sort="."$params[1]>
                        Priezvisko
                    </a>
                </th>
                <th>
                    <a href="."index.php?field=year&sort="."$params[1]>
                        Rok
                    </a>
                </th>
                <th>
                    <a href="."index.php?field=city&sort="."$params[1]>
                        Miesto
                    </a>
                </th>
                <th>
                    <a href="."index.php?field=type&sort="."$params[1]>
                        Typ
                    </a>
                </th>
                <th>
                    <a href="."index.php?field=discipline&sort="."$params[1]>
                        Disciplina
                    </a>
                </th>
                <th>
                    <a href="."index.php?field=place&sort="."$params[1]>   
                        Umiestnenie
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
        echo "<td><a href=''>Edit</td>";
        echo "<td><a href=''>Delete</td>";
        echo "</tr>";
    }
    echo "</tbody></table>";

    function createUserTable(){

    }
}