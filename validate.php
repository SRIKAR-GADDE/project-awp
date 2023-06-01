<?php

    // include("test.php");
    // echo " <script> document.write(large);</script> "
    // //   $doc_cont = $_POST["content"];
    // //   echo $doc_cont;
    // //   foreach($_POST as $key){
    // //         echo $key;
    // //   }

?>


<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Extract Text from Word Document</title>
    <script src="https://appsforoffice.microsoft.com/lib/1/hosted/Office.js"></script>
  </head>
  <body>
    <div id="output"></div>
    <input type="file" id="fileInput" onchange="readFile()">
    <script>
      function readFile() {
        var fileInput = document.getElementById("fileInput");
        var file = fileInput.files[0];
        Office.initialize = function() {
          var doc = new Word.Document(file);
          doc.getParagraphsAsync(function(result) {
            var paragraphs = result.value;
            var text = "";
            for (var i = 0; i < paragraphs.length; i++) {
              text += paragraphs[i].text + "\n";
            }
            document.getElementById("output").innerHTML = text;
          });
        };
      }
    </script>
  </body>
</html>
