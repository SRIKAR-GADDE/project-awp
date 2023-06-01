$(document).on('click', '#submitall', function(event) {
    event.preventDefault();
    $('.my-form').each(function() {
      $.ajax({
        url: 'process-form.php',
        type: 'POST',
        data: $(this).serialize(),
        success: function(response) {
          console.log(response);
        },
        error: function(xhr, status, error) {
          console.log(xhr.responseText);
        }
      }); 
    });
  });
  