<?php
require "config.php";
?>
<!-- <!DOCTYPE html> 
 <html>
  
 <head>
  
     <title>TITLE</title>
  
  
  
     <meta http-equiv="content-type" content="text/html; charset=windows-1251" />
  
  
  
     <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js"></script>
     <script type="text/javascript">
         $(document).ready(function() {
             $('#test_button').click(function() {
                 $.get('get_user.php', {id:2}, function(data) {
                     $('#user_data').html(data);
                 });
             });
         });
     </script>
  
 </head>
  
 <body>
     <input type="button" value="TEST" id="test_button">
  
     <div id="user_data">
  
     </div><!-- user_data -->
<!--   
 </body>
  
 </html> -->
<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo $config['title'] ?></title>

    <script src="style/js/jQuery.js"></script>

    <script type="text/javascript">    
        $(function() {
            // #form - id формы
            $('#bt').click(function(e) {
                e.preventDefault();
                var data = $(this).serialize();
                $.ajax({
                    type: "POST", //тип запроса
                    url: "test.php", //скрипт
                    data: data, // тут хранится информация
                    success: function(result) {
                        $('#result').html(result); // вернуть всё в блок с id="result"
                    }
                });
            });
        })
    </script>



</head>

<body>
    <form id="form">
        <input type="text" name="test">
        <button id="bt" type="button" name="do_do"></button>
    </form>


    <div id="result"></div>
</body>

</html>