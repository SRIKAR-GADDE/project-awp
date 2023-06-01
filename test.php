<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <title>Upload Word Document</title>
  <script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>
</head>
<body>
  <div id="output">

  </div>
  <h1>Upload a Word Document</h1>
  <input type="file" id="fileInput">  
  <script src="https://cdn.jsdelivr.net/npm/mammoth@1.4.8/mammoth.browser.min.js" >
    function handleFileSelect(evt) {
      var files = evt.target.files;
      var reader = new FileReader();
      reader.onload = function (e) {
        var content = e.target.result;
        mammoth.convertToHtml({ arrayBuffer: content })
          .then(function (result) {
            const searchStringArray = ["c++", "java","Java Script","HTML","joshi"];
            var large = (result.value).toLowerCase();

            for (let i = 0; i < searchStringArray.length; i++) {
              const searchString = searchStringArray[i].toLowerCase();
              if (large.indexOf(searchString) !== -1) {
                console.log(`Found '${searchString}' in the large string!`);
              } else {
                console.log(`'${searchString}' not found in the large string.`);
              }
            }
            $.post(
                "validate.php",{content:large},
                function(data){
                    $('#output').innerhtml(data);
                }
              )
            // document.getElementById('documentContent').innerHTML = large;
            // document.cookie = "doc "+large;
          })
          .done();
      };
      reader.readAsArrayBuffer(files[0]);
    }

    document.getElementById('fileInput').addEventListener('change', handleFileSelect, false);
    
  </script>
</body>

</html>



