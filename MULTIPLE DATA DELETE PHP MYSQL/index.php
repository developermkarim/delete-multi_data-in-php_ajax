<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Delete Multiple Data</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <div id="main">
    <div id="header">
        <h1>Delete Multiple Data with <br>PHP & Ajax CRUD</h1>
    </div>
    <div id="sub-header">
      <button id="delete-btn">Delete</button>
    </div>
    <div id="table-data">
      
    </div>

  </div>

  <div id="error-message"></div>
  <div id="success-message"></div>
  
<script type="text/javascript" src="jquery.js"></script>
<script type="text/javascript">

$(document).ready(function(){
    function LoadData(){
    $.ajax({
        url:"load-data.php",
        type: "POST",
        success: function(data){
            $('#table-data').html(data);
        }
    })
}
LoadData();
$('#delete-btn').on('click', function(){
    var id = [];
   $(':checkbox:checked').each(function(key){
    id[key] = $(this).val();
   });
   if (id.length == 0) {
    alert('Please, select at least one data');
   }
   else{
    if (confirm('are you sure to delete the checked data')) {
        $.ajax({
            type:"POST",
            url: 'data-delete.php',
            data: {delete_id : id},
            success: function(data){
                if (data == 1) {
                    $('#success-message').html('Data deleted successfully').slideDown();
                    $('#error-messege').slideUp();
                    LoadData();
                    setTimeout(function() {
                        $('#success-messege').slideUp();
                    },2000);
                }else{
                    $('#error-messege').html('Sorry, data not deleted').slideDown();
                    $('#success-messege').slideUp();
                    setTimeout(function(){
                        $('#error-messege').slideUp();
                    },2000);
                }
            }
        })
    }
   }
})
})
</script>
</body>

</html>
