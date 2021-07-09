<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
  
  
  <form class="form-inline" method="POST" id="1" action="http://diagnosticar.com.co/moodle/register/get_certificate.php">
    <input type="hidden" name="id" value="1">
    <input type="hidden" name="cedula" value="14297510">
    <input type="hidden" name="email" value="wsgestor@gmail.com">
    <input type="hidden" name="firstname" value="Darwin Yusef">
    <input type="hidden" name="lastname" value="Gonzalez Triana">
    <input type="hidden" name="certificate">
  <div class="form-group">
    <label for="pwd">Comentario de la Certificación:</label>
    
    <input type="text" class="form-control" name="certificate_description">
  </div>
  <div class="checkbox">
    <label data-id="1"><input type="checkbox" class="certificate">Certifica</label>
  </div>
  <button type="submit" class="btn btn-default">Submit</button>
</form>

<script
  src="https://code.jquery.com/jquery-3.3.1.min.js"
  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  crossorigin="anonymous"></script>
  
  <script>
    $('input.certificate').click(function(){
    var parent = $(this).parent().attr('data-id');
    	if( $('#'+parent+' input.certificate').is(':checked') ){
            $('#'+parent+' input[name="certificate"]').val('true');
        }else{
            $('#'+parent+' input[name="certificate"]').val('false');
        }
    });
  </script>
</body>
</html>

