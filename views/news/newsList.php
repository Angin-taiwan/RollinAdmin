<?php

$pageDir = "News";
$pageTitle = "News List";

$newsGet = $data->getAll();
// $NewsID = $this->NewsID;
require_once 'views/template/header.php';
// $news = new News();

if (isset($_POST["delete"])) {
  $NewsID = intval($_GET["id"]);
  $data->delete($NewsID);
  header("location= ../List");
}
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

<div class="container-fluid">
  <form method="post">
    <table>
      <thead>
        <tr>
          <th type="checkbox"></th>
          <th width="9%">NewsID</th>
          <th width="13%">Title</th>
          <th width="30%">Description</th>
          <th width="10%">CreateDate</th>
          <th width="10%">UpdateDate</th>
          <th width="26%">CRUD</th>
        </tr>
      </thead>

      <tbody>
        <?php

        foreach ($newsGet as $news) {
          echo "<tr>";
          echo "
    <td>
    <input type='checkbox' echo $news->NewsID echo id='$news->NewsID' echo value='$news->NewsID'>
    </td>";
          echo "<td>" .  $news->NewsID . "</td>";
          echo "<td>" .  $news->Title . "</td>";
          echo "<td>" .  $news->Description . "</td>";
          echo "<td>" .  $news->CreateDate . "</td>";
          echo "<td>" .  $news->UpdateDate . "</td>";
          echo "<td> 
    <a href='/RollinAdmin/News/Detail/$news->NewsID' class='btn btn-primary'><i class='fa fa-search'></i>查看</a>

    <a href='/RollinAdmin/News/Update/$news->NewsID' class='btn btn-secondary'>
    <i class='fa fa-edit'></i>修改</a> 
    
    <a href='delete.php?id=$news->NewsID' class='btn btn-danger' type='submit' name='delete'><i class='fa fa-trash'>&nbsp</i>刪除</a>
    </td>";
          echo "</tr>";
        }
        ?>

      </tbody>
    </table>
  </form>
</div>
</body>


<?php

require_once 'views/template/footer.php';

?>
<script>

</script>