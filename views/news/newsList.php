<?php

$pageDir = "News";
$pageTitle = "News List";
$newsGet = $data->getAll();

$news = new News();

if (isset($_POST["delete"])) {
  $news->NewsID = $_POST["delete"];
  $data->delete([$news->NewsID]);
  header("location= /RollinAdmin/News/List");
}

if (isset($_POST['searchButton'])) {
  $searchTerm = $_POST['keyword'];
  $newsGet = $data->search($searchTerm);   // 欄位名字 , 要跟輸出名字一致
}

if (isset($_POST["checkedDeleteBtn"])) {
  $arr = array();
  foreach ($_POST['items'] as $check) {
    array_push($arr, $check);
  }
  $str = implode("','", $arr);
  $data->delete($arr);
  header("location: /RollinAdmin/News/List");
}

require_once 'views/template/header.php';

?>



<!-----------------------------------------------------CSS----------------------------------------------------------------------------------->
<style>
  table {
    border-collapse: collapse;
    width: 100%;
    table-layout: fixed;
  }

  th,
  td {
    text-align: left;
    padding: 10px;
    border: 1px solid #ddd;
    font-size: 15px;

    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
  }

  th {
    background-color: #5289AE;
  }

  .col1 {
    height: 100px;
  }
</style>
<!------------------------------------------------------------------------------------------------------------------------------------------->
<div class="form-group">
  <label>每頁顯示多少筆 : </label>
  <select>
    <option name="pageSize" class="form-control"></option>
  </select>
</div>




<form method="post" action="News/List">
  <div>
    <input type="button" class="btn btn-outline-info" id="checkedAllBtn" value="全選">
    <input type="button" class="btn btn-outline-info" id="checkedNoBtn" value="全消">
    <input type="button" class="btn btn-outline-info" id="checkedRevBtn" value="反選">
    <input type="submit" class="btn btn-outline-danger" id="checkedDeleteBtn" name="checkedDeleteBtn" value="勾選刪除" onclick="return confirm('是否確認刪除勾選資料')">
    <div class="float-right form-group">
      <input type="text" placeholder="search" name="keyword">
      <input type="submit" class="btn btn-dark" value="搜尋" name="searchButton">
      <br>
    </div>
  </div>

  <div class="container-fluid">
    <table>
      <thead>
        <tr>
          <th type="checkbox"></th>
          <th width="7%">NewsID</th>
          <th width="16%">Title</th>
          <th width="26%">Description</th>
          <th width="11%">CreateDate</th>
          <th width="11%">UpdateDate</th>
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
          echo "<td class='col1'>" .  $news->Description . "</td>";
          echo "<td>" .  $news->CreateDate . "</td>";
          echo "<td>" .  $news->UpdateDate . "</td>";
          echo "<td> 
                <a href='/RollinAdmin/News/Detail/$news->NewsID' class='btn btn-info'><i class='fa fa-search'></i>查看</a>

                <a href='/RollinAdmin/News/Update/$news->NewsID' class='btn btn-secondary'>
                <i class='fa fa-edit'></i>修改</a>

                <button class='btn btn-danger' type='submit' name='delete' value=' ".$news->NewsID." '> <i class='fa fa-trash'>&nbsp</i>刪除</button>
                </td>";

          echo "</tr>";
        }
        ?>

      </tbody>
    </table>
    <tfoot>

      <nav class="my-3" aria-label="Page navigation example">
        <ul class="pagination justify-content-center">

          <li class="page-item  disabled">
            <a class="page-link" href="" tabindex="-1">首頁</a>
          </li>
          <li class="page-item  active ">
            <a class="page-link" href="">
              1
            </a>
          </li>
          <li class="page-item ">
            <a class="page-link" href="">
              2
            </a>
          </li>
          <li class="page-item ">
            <a class="page-link" href="">
              3
            </a>
          </li>
          <li class="page-item ">
            <a class="page-link" href="">
              4
            </a>
          </li>
          <li class="page-item  ">
            <a class="page-link" href="">頁尾</a>
          </li>

        </ul>
      </nav>

    </tfoot>
  </div>
</form>
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