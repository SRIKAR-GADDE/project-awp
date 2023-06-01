<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Extract Text from Word Document</title>
    <script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>
  </head>
  <body>
    <div id="output"></div>
    <input type="file" id="fileInput" >
    <input type="submit" value="submit" onclick = "readFile()">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/mammoth/1.4.10/mammoth.browser.min.js"></script>
    <script>
      function readFile() {
        var fileInput = document.getElementById("fileInput");
        var file = fileInput.files[0];
        var reader = new FileReader();
        reader.readAsBinaryString(fileInput);
        reader.onload = function() {
          var arrayBuffer = reader.result;
          mammoth.convertToHtml({arrayBuffer: arrayBuffer})
            .then(function(result) {
              var doc = result.value;
              doc.cont = result.value;
            //   document.getElementById("output").innerHTML = doc;
              $.post(
                "validate.php",{content:doc},
                function(data){
                    $('#output').html(data);
                }
              )
            })
            .done();
        };
      }
    </script>
  </body>
</html>




