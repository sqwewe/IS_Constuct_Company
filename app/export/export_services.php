<?php  
//export.php  
$connect = mysqli_connect("localhost", "root", "", "yl");
$output = '';
if(isset($_POST["export"]))
{
 $query = "SELECT * FROM services";
 $result = mysqli_query($connect, $query);
 if(mysqli_num_rows($result) > 0)
 {
  $output .= '
   <table class="table" bordered="1">  
                    <tr>  
                         <th>Идентификатор</th>  
                         <th>Название</th>  
                         <th>Описание</th>
                         <th>Цена</th>
                         <th>Продолжительность</th>  
                    </tr>
  ';
  while($row = mysqli_fetch_array($result))
  {
   $output .= '
    <tr>  
                         <td>'.$row["id_services"].'</td>  
                         <td>'.$row["name"].'</td>
                         <td>'.$row["description"].'</td>  
                         <td>'.$row["price"].'</td>    
                         <td>'.$row["period"].'</td>  

                    </tr>
   ';
  }
  $output .= '</table>';
  header('Content-Type: application/.xls');
  header('Content-Disposition: attachment; filename=download.xls');
  echo $output;
 }
}
