<!DOCTYPE html>
<html lang="pl-PL">
    <head>
        <meta charset="UTF-8">
        <title>Różne kontrolki</title>
    </head>
    <body>
        <?php include "lewa.php"; ?> <!-- załączenie całego lewego diva -->

        <div id="prawy">
            <p>
                <form action="">
                    <input type="text" name="NIP" placeholder="NIP"><br>
                    <input type="number" name="regon" placeholder="REGON"><br>
                    <input type="text" name="nazwa" placeholder="NAZWA"><br><br>

                    Data powstania<br>
                    <input type="date" name="data"><br><br>

                    <input type="text" name="ulica" placeholder="ULICA"><br>
                    <input type="text" name="nrDomu" placeholder="NUMER DOMU"><br>
                    <input type="text" name="nrMieszkania" placeholder="NUMER MIESZKANIA"><br><br>

                    Uwagi<br>
                    <textarea name="uwagi" cols="30" rows="10"></textarea>
                    
                </form>
            </p>
            <p>
                Proszę wybrać kolor:
                <select name="kolor">
                    <option value="zielony">zielony</option>
                    <option value="niebieski">niebieski</option>
                    <option value="szary">szary</option>
                    <option value="turkusowy">turkusowy</option>
                    <option value="granatowy">granatowy</option>
                    <option value="czerwony">czerwony</option>
                    <option value="biały">biały</option>
                </select><br><br>

                Proszę wybrać stawkę VAT:
                <select name="vat">
                    <option value="ZW">ZW</option>
                    <option value="NP.">NP.</option>
                    <option value="0%">0%</option>
                    <option value="3%">3%</option>
                    <option value="8%">8%</option>
                    <option value="23%">23%</option>
                </select>
            </p>
            <p>
                <ol>
                    <li>Element</li>
                    <li>Element</li>
                    <li>Element</li>
                </ol>
            </p>
        </div>
    </body>
</html>