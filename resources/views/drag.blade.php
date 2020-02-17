<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <link rel="stylesheet" href="a.css">
    <title>Hello, world!</title>
  </head>
  <body>
    <!-- <div class="hp-product-item"> -->
      <div id="MainDiv">
            <img src="http://www.cats.org.uk/uploads/images/pages/photo_latest14.jpg"  width="80"/>
            <div>Test</div>
            <div>Tes2</div>
        </div>
    <div id="draggableHelper" style="display:inline-block">
        <img id="image" src="http://www.google.com.br/images/srpr/logo3w.png" />
    </div>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script>
        $('#draggableHelper').draggable();
        $('#image').resizable();
        $( "#MainDiv" ).draggable({
            handle: "img"
        });
    $('.draggable').draggable({
    cursor: 'move',
    revert: 'invalid',
    helper: 'original',

    start: function (event, ui)
    {


        $(this).parent().find('#adminTimeReservation').css('display','block');

    },
    drag: function (event, ui)
    {
    }

    });//draggable
    $('.droppable').droppable({
        drop: function(ev, ui) {
            $(this).prepend(ui.draggable);
              ui.draggable.position({
                my: 'right top',
                at: 'right top',
                of: this
              });


        }
    });//droppable
    </script>
  </body>
</html>
