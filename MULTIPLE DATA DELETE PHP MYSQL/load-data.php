<?php

$conn = new mysqli("localhost","root","","ajax_database") or die("Connection Failed");

$sql = "SELECT * FROM multi_delete_data";
$result = $conn->query($sql) or die("SQL Query Failed.");

$output = "";
if ($result->num_rows > 0){
  $output .= "<table border='0' width='100%' cellpadding='10px' cellspacing='2'>
              <tr>
                <th width='30px'></th>
                <th width='60px'>Id</th>
                <th>Name</th>
                <th width='90px'>Age</th>
                <th width='90px'>City</th>
              </tr>";     
while($row = $result->fetch_assoc()){
  $output .= "<tr>
  <td align='center'><input type='checkbox' value='{$row['id']}'></td>
                <td align='center'>{$row['id']}</td>
                <td align='center'>{$row['student_name']}</td>
                <td align='center'>{$row['age']}</td>
                <td align='center'>{$row['city']}</td>
  </tr>";
}
$output .= "</table>";
echo $output;

}else{
  echo "<h2>No Data Found</h2>";
}
?>
