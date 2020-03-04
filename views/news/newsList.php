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
$server = 
// get set querystring
parse_str($_SERVER['QUERY_STRING'], $query);
$pageSize = isset($query["pageSize"]) ? $query["pageSize"] :7;
$keyword = isset($query["keyword"]) ? $query["keyword"] : "";
$pageNo = isset($query["pageNo"]) ? $query["pageNo"] : 1;

// // for pagination
$pageStartIndex = ($pageNo - 1) * $pageSize;
$NewsTotal = get_object_vars($data->getAllCount())["Total"]; // 所有資料筆數
$News = $keyword == "" ? $data->getAllpage($pageStartIndex, $pageSize) : $data->getAllLike($keyword, $pageStartIndex, $pageSize);
//當沒有收尋的時候 顯示所有資料 , 有收尋就合併所收尋關鍵字的資料^^^
$NewsCount = $keyword == "" ? $NewsTotal : get_object_vars($data->getAllLikeCount($Title))["Count"];
$pagesCount = ceil((int) $NewsCount / (int) $pageSize);


// $NewsTotal = get_object_vars($data->getAllCount())["Total"]; // 資料庫共有幾筆資料
var_dump($NewsTotal);


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
<div class="row">
  <div class="form-group">
    <label class="float-left" for="pageSize">每頁顯示多少筆 : </label>
    <select name="pageSize" class="form-control">
      <option value="3" <?= ($pageSize == "3") ? "selected=selected" : ""; ?>>3</option>
      <option value="5" <?= ($pageSize == "5") ? "selected=selected" : ""; ?>>5</option>
      <option value="10" <?= ($pageSize == "10") ? "selected=selected" : ""; ?>>10</option>
    </select>
  </div>
</div>
<div class="form-group">
  <label>共有 : <?= $NewsTotal ?> 筆資料</label>
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

                <button class='btn btn-danger' type='submit' name='delete' value=' " . $news->NewsID . " '> <i class='fa fa-trash'>&nbsp</i>刪除</button>
                </td>";

          echo "</tr>";
        }
        ?>

      </tbody>
    </table>
    <tfoot>

      <nav aria-label="Page navigation">
        <ul class="pagination">
          <?php
          if ($pagesCount > 1) {
            echo "wwwwwwwwwwwwwwwwwwwwwwwwwwwwwww";
            $queryString = "?";
            if ($pageSize != "") {
              $queryString .= "pageSize=" . $pageSize;
            };
            if ($keyword != "") {
              $queryString .= "&keyword=$keyword";
            };
            $prevous = $pageNo - 1;
            $next = $pageNo + 1;
            $prevousDisabled = $prevous <= 0 ? "disabled" : "";
            $nextDisabled = $next > $pagesCount ? "disabled" : "";
            echo "<li class='page-item $prevousDisabled'><a class='page-link' href='./News/List/$queryString&pageNo=$prevous'>上一頁</a></li>";
            for ($i = 1; $i <= $pagesCount; $i++) {
              echo "<li class='page-item'><a class='page-link' href='./News/List/$queryString&pageNo=$i'>$i</a></li>";
            }
            echo "<li class='page-item $nextDisabled'><a class='page-link' href='./News/List/$queryString&pageNo=$next'>下一頁</a></li>";
          }
          ?>
        </ul>
      </nav>

      <!-- <nav class="my-3" aria-label="Page navigation example">
        <ul class="pagination justify-content-center">

          <li class="page-item  disabled">
            <a class="page-link" href="">上一頁</a>
          </li>

          <li class="page-item  ">
            <a class="page-link" href="">下一頁</a>
          </li>

        </ul>
      </nav> -->

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