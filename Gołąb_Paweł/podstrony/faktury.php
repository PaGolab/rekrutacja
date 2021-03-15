<!DOCTYPE html>
<html lang="pl-PL">
    <head>
        <meta charset="UTF-8">
        <title>Faktury VAT</title>
    </head>
    <body>
        <?php include "./lewa.php"; ?>
        
        <div id="prawy">
            <table border>
                <tr>
                    <th>Lp.</th>
                    <th>Opis</th>
                    <th>MPK</th>
                    <th>Kwota Netto</th>
                    <th>Ilość</th>
                    <th>VAT</th>
                    <th>Kwota Brutto</th>
                    <th>Wartość Netto</th>
                    <th>Wartość Brutto</th>
                </tr>
                <tr>
                    <td>1</td>
                    <td>Myszka</td>
                    <td>Dział IT</td>
                    <td class="netto">40</td>
                    <td>
                        <input class="ilosc" type=number min=0 value=5>
                    </td>
                    <td class="vat">
                        <select class="select">
                            <option value="0%">0%</option>
                            <option value="3%">3%</option>
                            <option value="8%">8%</option>
                            <option value="23%">23%</option>
                        </select>
                    </td>
                    <td class="brutto"></td>
                    <td class="suma_netto"></td>
                    <td class="suma_brutto"></td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Klawiatura</td>
                    <td>Dział IT</td>
                    <td class="netto">60</td>
                    <td>
                        <input class="ilosc" type=number min=0 value=4>
                    </td>
                    <td class="vat">
                        <select class="select">
                            <option value="0%">0%</option>
                            <option value="3%">3%</option>
                            <option value="8%">8%</option>
                            <option value="23%">23%</option>
                        </select>
                    </td>
                    <td class="brutto"></td>
                    <td class="suma_netto"></td>
                    <td class="suma_brutto"></td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>Biała tablica suchościerna</td>
                    <td>Dział szkoleń</td>
                    <td class="netto">1015</td>
                    <td >
                        <input class="ilosc" type=number min=0 value=1>
                    </td>
                    <td class="vat">
                        <select class="select">
                            <option value="0%">0%</option>
                            <option value="3%">3%</option>
                            <option value="8%">8%</option>
                            <option value="23%">23%</option>
                        </select>
                    </td>
                    <td class="brutto"></td>
                    <td class="suma_netto"></td>
                    <td class="suma_brutto"></td>
                </tr>
                <tr>
                    <td>4</td>
                    <td>Monitor</td>
                    <td>Dział IT</td>
                    <td class="netto">400</td>
                    <td>
                        <input class="ilosc" type=number min=0 value=5>
                    </td>
                    <td class="vat">
                        <select class="select">
                            <option value="0%">0%</option>
                            <option value="3%">3%</option>
                            <option value="8%">8%</option>
                            <option value="23%">23%</option>
                        </select>
                    </td>
                    <td class="brutto"></td>
                    <td class="suma_netto"></td>
                    <td class="suma_brutto"></td>
                </tr>
                <tr>
                    <td>5</td>
                    <td>Wielofunkcyjna drukarka</td>
                    <td>Księgowość</td>
                    <td class="netto">2500</td>
                    <td>
                        <input class="ilosc" type=number min=0 value=1>
                    </td>
                    <td class="vat">
                        <select class="select">
                            <option value="0%">0%</option>
                            <option value="3%">3%</option>
                            <option value="8%">8%</option>
                            <option value="23%">23%</option>
                        </select>
                    </td>
                    <td class="brutto"></td>
                    <td class="suma_netto"></td>
                    <td class="suma_brutto"></td>
                </tr>
            </table><br>

            <button>Powyżej 1000,00 zł Netto</button>
        </div>
    </body>
    <script>

    function changeRow()
    {
        $("tr").each( function()
        {
            //zamiana kwoty brutto za 1szt

            $(this).children( ".brutto" ).html
            (
                // kwota netto * ( 100% + wybór w select [%] )
                // wybór z select musi być "zparseIntowany" aby pozbyć się symbolu %
                
                $(this).children( ".netto" ).html() *
                ( 1 + parseInt( $(this).find(".select").val() ) / 100 )
            )

            //netto * ilość szt

            $(this).children( ".suma_netto" ).html
            (
                $(this).children( ".netto" ).html() * $(this).find( ".ilosc" ).val()
            )
            
            //brutto * ilość szt

            $(this).children( ".suma_brutto" ).html
            (
                $(this).children( ".brutto" ).html() * $(this).find( ".ilosc" ).val()
                
            )

        })
    }
    
    //wywoływanie powyższej funkcji w czasie różnych interakcji:

    $(document).ready( function() { changeRow(); })

    $("select, input").keyup( function() { changeRow() } )

    $("select, input").click( function() { changeRow() } )
    
    //sprawdzenie które wiersze maja > 1000

    $("button").click( function()
    {
    
        //dla każdego wiersza
    
        $("tr").each( function()
        {
            //jeżeli komórka z klasą netto > 1000
        
            if( $(this).children( ".netto" ).html() > 1000 )
            {
                //zmieniany jest styl tr
            
                $(this).css(
                    "background-color",
                    "rgba(0,255,0,0.5)"
                )
            }
        })
    })
    </script>
</html>