<?php  
//export.php  
$connect = mysqli_connect("localhost", "root", "", "yl");
$output = '';
if(isset($_POST["export"]))
{
 $query = "SELECT * FROM masters";
 $result = mysqli_query($connect, $query);
 if(mysqli_num_rows($result) > 0)
 {
  $output .= '
   <table class="table" bordered="1">  
                    <tr>  
                         <th>Идентификатор</th>  
                         <th>ФИО</th>  
                         <th>Телефон</th>
                         <th>Почта</th>
                         <th>Должность</th>
                    </tr>
  ';
  while($row = mysqli_fetch_array($result))
  {
   $output .= '
    <tr>  
                         <td>'.$row["id_master"].'</td>  
                         <td>'.$row["FIO"].'</td>  
                         <td>'.$row["number_master"].'</td>  
                         <td>'.$row["email"].'</td>  
                         <td>'.$row["role"].'</td>  

                    </tr>
   ';
  }
  $output .= '</table>';
  header('Content-Type: application/.xls');
  header('Content-Disposition: attachment; filename=download.xls');
  echo $output;
 }
}
