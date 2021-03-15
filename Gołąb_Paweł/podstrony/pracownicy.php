<!DOCTYPE html>
<html lang="pl-PL">
    <head>
        <meta charset="UTF-8">
        <title>Pracownicy</title>
    </head>
    <body>
        <?php include "lewa.php"; ?> <!-- załączenie całego lewego diva -->

        <div id="prawy">

            <p>
                <input type="color" class="color-picker" id="colorA">
                <input type="color" class="color-picker" id="colorB">
            </p>
            
            <table border>
                <tr>
                    <th>Lp.</th>
                    <th>Imię</th>
                    <th>Nazwisko</th>
                    <th>Stanowisko</th>
                    <th>Data zatrudnienia</th>
                    <th>Ilość dni urlopowych</th>
                </tr>
                <tr>
                    <td>1</td>
                    <td>Antoni</td>
                    <td>Iksiński</td>
                    <td>Kierownik</td>
                    <td>01.01.2001</td>
                    <td>26</td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Aleksander</td>
                    <td>Igrek</td>
                    <td>Z-ca kierownika</td>
                    <td>02.02.2002</td>
                    <td>26</td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>Jan</td>
                    <td>Nowak</td>
                    <td>Analityk</td>
                    <td>05.05.2005</td>
                    <td>13</td>
                </tr>
                <tr>
                    <td>4</td>
                    <td>Julia</td>
                    <td>Kowalska</td>
                    <td>Księgowa</td>
                    <td>10.10.2010</td>
                    <td>26</td>
                </tr>
                <tr>
                    <td>5</td>
                    <td>Majka</td>
                    <td>Lewandowska</td>
                    <td>Asystentka kierownika</td>
                    <td>12.12.2012</td>
                    <td>20</td>
                </tr>
            </table>
            
        </div>
    </body>
    
    <script>
    
        //w momencie zmiany inputa z klasą color-picker
    
        $(".color-picker").change( function()
        {
        
            //kolor nieparzystych wierszy jest równy pierwszemu inputowi
            
            $( "tr:nth-child(odd)" ).css(
                "background-color",
                $("#colorA").val()
            )
            
            //kolor parzystych wierszy jest równy drugiemu inputowi
            
            $( "tr:nth-child(even)" ).css(
                "background-color",
                $("#colorB").val()
            )
        })
    </script>

</html>
