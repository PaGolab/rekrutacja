<?php
    session_start();
    include "../skrypty/conn.php";
?>

<!DOCTYPE html>
    <html lang="pl-PL">
    <head>
        <meta charset="UTF-8">
        <title>Kontrahenci</title>
    </head>
    <body>
        <?php include "./lewa.php"; ?>

        <div id="prawy">
            
            <!-- wczytanie tabelki na podstawie danych z bd -->
            <?php include "../skrypty/show.php"; ?>
            
            <!-- dialog pokazywany przy kliknięciu "edytuj" -->
            <div id="dialog-edit" title="Modyfikacja rekordu" hidden>
                NIP<input type=text name=nip placeholder="NIP"><br>
                REGON<input type=number name=regon placeholder="REGON" min=0><br>
                NAZWA<input type=text name=nazwa placeholder="NAZWA"><br>
                ULICA<input type=text name=ulica placeholder="ULICA"><br>
                NUMER DOMU<input type=text name=nrDomu placeholder="NUMER DOMU"><br>
                NUMER MIESZKANIA<input type=text name=nrMieszkania placeholder="NUMER MIESZKANIA">
                <br><br>
                <input type=checkbox name=platnik>czy płatnik VAT?
            </div>

            <!-- dialog pokazywany przy klknięciu "usuń" -->
            <div id="dialog-delete" hidden>czy na pewno chcesz usunąć rekord z bazy danych?</div>
            
        </div>
    </body>
    <script src="../skrypty/dialog.js"></script>
</html>

<?php 
    $_SESSION['errors'] = $_SESSION['success'] = '';
?>