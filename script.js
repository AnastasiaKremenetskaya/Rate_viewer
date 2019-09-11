//Set up custom date widget
$('#datepicker').datepicker({

  uiLibrary: 'bootstrap4',
  format: 'dd/mm/yyyy'
});

//Set today's date to placeholder
$(document).ready(function () {

  if ($('#datepicker').val() == "") {
    var date = new Date();
    var newDate = date.getDate() + '/' + (date.getMonth() + 1) + '/' + date.getFullYear();
    $("#datepicker").attr("placeholder", newDate);
  }
});

//Serve request
$(document).ready(function () {

  $('form').submit(function (event) {

    event.preventDefault();

    var date = $('#datepicker').val();

    $.ajax({
      type: 'GET',
      url: 'dbsearch.php',
      data: 'fdate=' + date,
      success: function (result) {
        console.log(result);

        //If rate is not found in local db
        if (result != 'invalid') {

          //Get data from cbr API
          var key = '?date_req=' + date;
          var x = new XMLHttpRequest();
          x.open('GET', 'https://cors-anywhere.herokuapp.com/https://www.cbr.ru/scripts/XML_daily.asp' + key);
          x.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
          x.onload = function () {
            
            var USD = x.responseXML.querySelector("Valute[ID='R01235']").lastChild;
            $('#USD').html(USD);

            //Add data to local db
            $.ajax({
              type: "GET",
              url: "dbadd.php",
              data: { fdate: date, fvalue: document.getElementById('USD').innerText}
            })
              .done(function (result) {
                console.log(result);
              });
          }
          x.send();
          console.log("data from cbr api. local db is updated");          

        }

        //Else if rate is found in local db
        else {

          $('#USD').html(result);
          console.log("rate is found in local db");
        }
      },

      error: function () {

        alert("Ошибка выполнения");
      }
    });
  });
});