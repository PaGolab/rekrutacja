<?php
    session_start();
    $_SESSION['errors'] = '';
    $_SESSION['success'] = '';
    $countErrors = 0;

    foreach( $_POST as $key => $data )
    {
        if( empty($data) )
        {
            $_SESSION['errors'] .= "Pole $key jest puste<br>";
            $countErrors++;
        }
    }

    if( $countErrors == 0 )
    {
        include "./conn.php";

        if( $_POST['platnik'] == "on" )
            $platnik = 1;
        else
            $platnik = 0;

        $sql = "INSERT INTO `kontrahenci` (`nip`, `regon`, `nazwa`, `platnik`, `ulica`, `nr_domu`, `nr_mieszkania`) VALUES ( '{$_POST["nip"]}','{$_POST["regon"]}','{$_POST["nazwa"]}',$platnik,'{$_POST["ulica"]}','{$_POST["nrDomu"]}','{$_POST["nrMieszkania"]}' )";

        if( mysqli_query( $conn, $sql ) == false )
            $_SESSION['errors'] .= "błąd danych, sprawdź poprawność";

        else
            $_SESSION['success'] = '<div style=color:lime>Udało się dodać użytkownika!</div>';
            
        mysqli_close( $conn );
        
    }
    
    $_SESSION['errors'] = "<div style=color:crimson>".$_SESSION['errors']."</div>";

    header( "location: ../podstrony/kontrahenci.php");

?>