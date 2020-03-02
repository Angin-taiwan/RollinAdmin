<?php

$pageDir = "News";
$pageTitle = "News List";
$newsGet = $data->getAll();

// $NewsID = $this->NewsID;
$news = new News();

if (isset($_POST["delete"])) {
  echo "ttttttttttttttttttttttttt";
  $news->NewsID = $_POST["NewsID"];
  echo $_POST["NewsID"];
  echo "$news->NewsID";
  $data->delete($news->NewsID);
  header("location= /RollinAdmin/News/List");
}

if (isset($_POST['searchButton'])) { //
  $searchTerm = $_POST['keyword'];
  $newsGet = $data->search($searchTerm);   // 欄位名字 , 要跟輸出名字一致
}

if (isset($_POST["checkedDeleteBtn"])){
  $arr = array();
  foreach ($_POST['items'] as $check){
    array_push($arr, $check);
  }
  $str = implode("','",$arr);
  $data->checkdelete($arr);
  var_dump($arr);
  header("location: /RollinAdmin/News/List");
}



require_once 'views/template/header.php';

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

<form method="post" action="News/List">
  <div>
    <input type="button" class="btn btn-outline-info" id="checkedAllBtn" value="全選">
    <input type="button" class="btn btn-outline-info" id="checkedNoBtn" value="全消">
    <input type="button" class="btn btn-outline-info" id="checkedRevBtn" value="反選">
    <input type="submit" class="btn btn-outline-danger" id="checkedDeleteBtn" name="checkedDeleteBtn" value="勾選刪除">
    <div class="float-right form-group">
      <input type="text" placeholder="search" name="keyword">
      <input type="submit" class="btn btn-dark" value="搜尋" name="searchButton">
      <br>
    </div>
  </div>

  <div class="container-fluid">
    <table style="word-break:break-all; word-wrap:break-all">
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
          echo "<td>
                <input type='checkbox' id='check' name='items[]' value='" . $news->NewsID . "'>
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

                <input type='hidden' name='NewsID' value='" . $news->NewsID . "'>

                <a href='delete.php?id=$news->NewsID'>
                <button class='btn btn-danger' type='submit' name='delete'> <i class='fa fa-trash'>&nbsp</i>刪除</button></a>
                </td>";

          echo "</tr>";
        }
        ?>

      </tbody>
    </table>
</form>
</div>


<?php

require_once 'views/template/footer.php';

?>
<script>
  let items = document.getElementsByName("items[]");

  let checkedAllBtn = document.getElementById("checkedAllBtn");
  checkedAllBtn.onclick = function() {
    for (let i = 0; i < items.length; i++) {
      items[i].checked = true;
    }
  }

  let checkedNoBtn = document.getElementById("checkedNoBtn");
  checkedNoBtn.onclick = function() {
    for (let i = 0; i < items.length; i++) {
      items[i].checked = false;
    }
  }

  let checkedRevBtn = document.getElementById("checkedRevBtn");
  checkedRevBtn.onclick = function() {
    for (let i = 0; i < items.length; i++) {
      if (items[i].checked) {
        items[i].checked = false;
      } else {
        items[i].checked = true;
      }
    }
  }
</script>