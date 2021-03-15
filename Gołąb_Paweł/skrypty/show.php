<?php
    echo @$_SESSION['errors'];
    echo @$_SESSION['success'];

    $sql = 'SELECT * FROM `kontrahenci`';
    $query = mysqli_query( $conn, $sql );

    echo "
        <br><table id=kontrahenci border>
        <tr>
            <th>NIP</th>
            <th>REGON</th>
            <th>NAZWA</th>
            <th>CZY PŁATNIK VAT?</th>
            <th>ULICA</th>
            <th>NUMER DOMU</th>
            <th>NUMER MIESZKANIA</th>
            <th>AKCJA</th>
        </tr>
        <tr>
            <form action='../skrypty/add.php' method=post>
                <td><input type=text name=nip></td>
                <td><input type=number name=regon min=0></td>
                <td><textarea name=nazwa></textarea></td>
                <td><input type=checkbox name=platnik></td>
                <td><textarea name=ulica></textarea></td>
                <td><input type=text name=nrDomu></td>
                <td><input type=text name=nrMieszkania></td>
                <td><input type=submit value=dodaj></td>
            </form>
        </tr>
    ";

    while( $row = mysqli_fetch_array( $query ) )
    {
        if( $row['usuniety'] == 1 )
            continue;
        
        $platnik = $row['platnik'] ? "TAK" : "NIE" ;

        echo "
            <tr class='row {$row["id"]}'>
                <td class=nip>{$row['nip']}</td>
                <td class=regon>{$row['regon']}</td>
                <td class=nazwa>{$row['nazwa']}</td>
                <td class=platnik>$platnik</td>
                <td class=ulica>{$row['ulica']}</td>
                <td class=nrDomu>{$row['nr_domu']}</td>
                <td class=nrMieszkania>{$row['nr_mieszkania']}</td>
                <td>
                    <a class=edit id={$row["id"]} style=color:lime>Edytuj</a><br>
                    <a class=delete id={$row["id"]} style=color:crimson>Usuń</a>
                </td>
            </tr>
        ";
    }

    echo "</table>";
?>