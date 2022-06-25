<?php
$database = new mysqli("localhost","root","","ajax_database") or die("Connection Failed");
$deleteId = $_POST['delete_id'];
$alldata = implode($deleteId,',');
$deleteQuery = $database->query("DELETE FROM multi_delete_data where id IN ({$alldata})");
if ($deleteQuery) {
   echo 1;
}else{
    echo 0;
}
$database->close();
?>
