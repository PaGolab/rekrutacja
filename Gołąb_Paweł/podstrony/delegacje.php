<?php include "../skrypty/conn.php"; ?>

<!DOCTYPE html>
<html lang="pl-PL">
    <head>
        <meta charset="UTF-8">
        <title>Delegacje</title>
    </head>
    <body>
        <?php include "lewa.php"; ?>

        <div id="prawy">
            <table border>
                <tr>
                    <th>Lp.</th>
                    <th>Imię i nazwisko</th>
                    <th>Data od:</th>
                    <th>Data do:</th>
                    <th>Miejsce wyjazdu</th>
                    <th>Miejsce przyjazdu</th>
                </tr>

                <?php

                    $sql = 'SELECT `Lp.`, concat(`Imie`," ",`Nazwisko`) as `IiN`, `Data_od`,`Data_do`,`Miejsce_wyjazdu`,`Miejsce_przyjazdu` FROM `delegacje`';
                    $query = mysqli_query( $conn, $sql );

                    while( $row = mysqli_fetch_array( $query ) )
                    {
                        echo "
                            <tr>
                                <td>{$row['Lp.']}</td>
                                <td>{$row['IiN']}</td>
                                <td>{$row['Data_od']}</td>
                                <td>{$row['Data_do']}</td>
                                <td>{$row['Miejsce_wyjazdu']}</td>
                                <td>{$row['Miejsce_przyjazdu']}</td>
                            </tr>
                        ";
                    }
                ?>

            </table>
        </div>

    </body>
</html>