<?php

$pageDir = "News";
$pageTitle = "News List";

$newsGet = $data->getAll();

// var_dump($newss);
require_once 'views/template/header.php';
$news = new News();
?>

<!-----------------------------------------------------CSS----------------------------------------------------------------------------------->
<style>
  table {
    border-collapse: collapse;
    width: 100%;
  }

  th,
  td {
    text-align: left;
    padding: 8px;
    border: 1px solid #ddd;
    font-size: 15px;
  }

  tr:nth-child(even) {
    background-color: #f2f2f2
  }

  th {
    background-color: #4CAF50;
    color: white;

  }
</style>
<!------------------------------------------------------------------------------------------------------------------------------------------->


<table>

  <thead>
    <tr>
      <th>NewsID</th>
      <th>Title</th>
      <th>Description</th>
      <th>CreateDate</th>
      <th>UpdateDate</th>
      <th>CRUD</th>
    </tr>
  </thead>

  <tbody>
    <?php
  foreach ($newsGet as $news) {
    echo "<tr>";
    echo "<td>" .  $news->NewsID . "</td>";
    echo "<td>" .  $news->Title . "</td>";
    echo "<td>" .  $news->Description . "</td>";
    echo "<td>" .  $news->CreateDate . "</td>";
    echo "<td>" .  $news->UpdateDate . "</td>";
    echo "<td> 
    <button type=button class='btn btn-primary'>修改</button> 
    <button type=button class='btn btn-danger' name='deleteBuuton'>刪除</button></td>";
    echo "</tr>";
  }
    ?>

  </tbody>


</table>
</body>

<?php

require_once 'views/template/footer.php';

?>

<script>
    
</script>