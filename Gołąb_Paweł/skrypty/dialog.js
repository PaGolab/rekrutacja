// kliknięcie edytuj w kolumnie AKCJA
$(".edit").click( function()
{
    //każdy wiersz ma klasę o wartość identyfikatora z bazy danych
    var editedRowClass = $(this).attr("id")               

    //"pętla" wykonywana dla każdego "dziecka" dialogu - czyli dla każdego inputa    
    $("#dialog-edit").children().each( function()
    {
        //klasa inputa w dialogu jest równa name'owi poszczególnej komórki tabeli
        const editedDataClass =  "." + $(this).attr("name")

        //pobranie wartości z odpowiedniej komórki wiersza (komórka jest "dzieckiem" wiersza)
        const editedData = $( "." + editedRowClass ).children( editedDataClass ).html()
        
        
        $(this).attr( "value", editedData )
        //podstawienie do inputa pod value pobranej wyżej wartości
        
        //ustawienia zaznaczenia checkboxa
        if( editedDataClass == ".platnik" )
        {
            //jeżeli w kolumnie "czy płatnik vat?" wystąpiło TAK, to checkbox ma być zaznaczony
        
            if( editedData == "TAK" )
                $(this).attr( "checked", true )

            else
               $(this).attr( "checked", false )    
        }
        
    })

    //otworzenie dialogu (cały formularz jest już w divie o id "dialog-edit") tutaj dodawany jest jedynie przycisk z działaniem
    $("#dialog-edit").dialog(
    {
        buttons:
        {
            "Zapisz": function()
            {
                let dataToEdit=[]

                //dopisywanie do tablicy poszczególnych wartości z inputów aby rzesłać do pliku .php
                $("#dialog-edit").children("input").each( function()
                {
                    //jeżeli checkbox jest zaznaczony
                    
                    if( $(this).prop( "checked" ) === true )
                        dataToEdit.push( "on" )
                        
                    //jeżeli checkbox jest odznaczony lub input nie jest checkboxem
                    
                    else
                        dataToEdit.push( $(this).val() )
                })
                
                //zamiana danych na format JSON umożliwi bezpieczniejsze przesłanie danych ( przesłanie przez Ajax zwykłej tablicy sprawi, że zostanie ona zamieniona na stringa z przecinkami, jezeli jakaś komórka miałaby przecinek to zepsułoby to format danych)
                
                dataToEdit = JSON.stringify(dataToEdit)

                //połączenie z plikiem .php

                $.ajax(
                {
                    url: "../skrypty/edit.php",
                    method: "POST",
                    data:                                   //zmienne wysyłane do pliku
                    {
                        id: `${editedRowClass}`,            // $_POST['id']
                        data: `${dataToEdit}`,              // $_POST['data']
                    },
                    success: function(output)               //funkcja uruchamiana gdy połączenie się powiedzie
                    {
                        location.reload()                   //odświeżenie strony żeby wyświetlić zmianę
                    },
                    error: function()
                    {
                        alert("Niestety wystąpił problem")
                    },

                })

                $(this).dialog("close")
            }
        }
    })
})

// kliknięcie edytuj w kolumnie AKCJA
$(".delete").click( function()
{
    //każdy wiersz ma klasę o wartość identyfikatora z bazy danych
    let idToDelete = $(this).attr("id")

    //otwarcie dialogu
    $("#dialog-delete").dialog(
    {
        title: "UWAGA",                         //tytuł dialogu wyświetlany na górze
        dialogClass: "delete",                  //dodanie dodatkowej klasy
        resizable: false,                       //zabronienie zmieniania rozmiaru
        buttons:
        {
            "NIE": function()                   //przycisk NIE zamykający dialog
            {
                $(this).dialog("close")
            },

            "TAK": function()                   //przycisk TAK łączący się z plikiem .php
            {

                $.ajax(
                {
                    url: "../skrypty/del.php",
                    data:
                    {
                        id: `${idToDelete}`
                    },
                    method: "POST",

                    success: function(output)
                    {
                        location.reload()
                    },
                    error: function()
                    {
                        alert("Niestety wystąpił problem")
                    },
                })

                $(this).dialog("close")
            },
        }
    })
})