<?php

    include "./conn.php";

    if( !empty( $_POST["id"] ) )
    {
        //aternatywne rozwiązanie: usunięcie kontrahenta z bazy danych i przeniesienie go (dzięki triggerowi do bazy danych usuniętych kontrahentów)
        
        //baza danych usuniętych kontrahentów:
        //CREATE TABLE `kontrahenci_usunieci`
        //(
        //`id` int(11) NOT NULL,
        //`nip` char(10) NOT NULL,
        //`regon` varchar(12) NOT NULL,
        //`nazwa` varchar(128) NOT NULL,
        //`platnik` tinyint(1) NOT NULL,
        //`ulica` varchar(32) NOT NULL,
        //`nr_domu` varchar(8) NOT NULL,
        //`nr_mieszkania` varchar(8) NOT NULL,
        //`data_usuniecia` datetime NOT NULL
        //)
        
        //trigger:
        //CREATE TRIGGER `usuwanie_kontrahenta`
        //BEFORE DELETE ON `kontrahenci`
        //FOR EACH ROW INSERT INTO `kontrahenci_usunieci`
        //(`nip`, `regon`, `nazwa`, `platnik`, `ulica`, `nr_domu`, `nr_mieszkania`, `data_usuniecia`)
        //VALUES
        //(OLD.`nip`, OLD.`regon`, OLD.`nazwa`, OLD.`platnik`, OLD.`ulica`, OLD.`nr_domu`, OLD.`nr_mieszkania`, NOW())
        
        //zapytanie w php:
        
        //$sql = "DELETE FROM `kontrahenci` WHERE `id`={$_POST['id']}";
        
        $sql = "UPDATE `kontrahenci` SET `usuniety`=1 WHERE `id`={$_POST['id']}";
        
        mysqli_query( $conn, $sql );

        mysqli_close( $conn );
    }
    
    exit();

?>