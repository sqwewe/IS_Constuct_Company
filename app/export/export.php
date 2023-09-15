<?php  
//export.php  
$connect = mysqli_connect("localhost", "root", "", "yl2");
$output = '';
if(isset($_POST["export"]))
{
 $query = "SELECT * FROM blank";
 $result = mysqli_query($connect, $query);
 if(mysqli_num_rows($result) > 0)
 {
  $output .= '
   <table class="table" bordered="1">  
                    <tr>  
                         <th>Идентификатор</th>  
                         <th>Телефон клиента</th>  
                         <th>Дата заявки</th>
                    </tr>
  ';
  while($row = mysqli_fetch_array($result))
  {
   $output .= '
    <tr>  
                         <td>'.$row["id"].'</td>  
                         <td>'.$row["number"].'</td>  
                         <td>'.$row["date_time_blank"].'</td>
                    </tr>
   ';
  }
  $output .= '</table>';
  header('Content-Type: application/.xls');
  header('Content-Disposition: attachment; filename=download.xls');
  echo $output;
 }
}
