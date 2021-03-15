<?php
    if( !empty( $_POST['data'] ) && !is_null( $_POST['id'] ) )
    {
        include "./conn.php";

        $id = $_POST['id'];
        $array = json_decode ( $_POST['data'] );

        if( $array[6] == "on" )
            $platnik = 1;
        else
            $platnik = 0;

        $sql = "UPDATE `kontrahenci` SET
            `nip`='{$array[0]}',
            `regon`='{$array[1]}',
            `nazwa`='{$array[2]}',
            `ulica`='{$array[3]}',
            `nr_domu`='{$array[4]}',
            `nr_mieszkania`='{$array[5]}',
            `platnik`=$platnik
            WHERE `id`=$id
        ";

        mysqli_query( $conn, $sql );

        mysqli_close($conn);
    }

?>