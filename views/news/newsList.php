<?php

$pageDir = "News";
$pageTitle = "News List";

//中文化
$pageDirTW = "消息管理";
$pageTitleTW = "消息清單";

$news = new News();

//刪除
if (isset($_POST["delete"])) {
  $news->NewsID = $_POST["delete"];
  $data->delete([$news->NewsID]);
  header("location= /RollinAdmin/News/List");
}

//搜尋
if (isset($_GET["searchButton"])) {
  $keyword = $_GET["keyword"];
  $Categorysearch = $_GET["Categorysearch"];
  $startIndex = 0;
  $pageSize = $_GET["pageSize"];
  $newsGet = $data->getAllLike($Categorysearch, $keyword, $startIndex, $pageSize);
}

//勾選刪除
if (isset($_POST["checkedDeleteBtn"])) {
  $arr = array();
  foreach ($_POST['items'] as $check) {
    array_push($arr, $check);
  }
  $str = implode("','", $arr);
  $data->delete($arr);
  // header("location: /RollinAdmin/News/List");
}

//get set querystring
parse_str($_SERVER['QUERY_STRING'], $query);
$pageSize = isset($query["pageSize"]) ? ($query["pageSize"]) : 3;
$keyword = isset($query["keyword"]) ? $query["keyword"] : "";
$pageNo = isset($query["pageNo"]) ? $query["pageNo"] : 1;
$Categorysearch = isset($query["Categorysearch"]) ? ($query["Categorysearch"]) : "";

//for pagination
$startIndex = ($pageNo - 1) * $pageSize;
$NewsTotal = get_object_vars($data->getAllCount())["Total"]; // 資料庫共有幾筆資料
$newsGet = $keyword == "" ? $data->getAllpage($startIndex, $pageSize) : $data->getAllLike($Categorysearch, $keyword, $startIndex, $pageSize);
//當沒有收尋的時候 顯示所有資料 , 有收尋就合併所收尋關鍵字的資料^^^ -- 輸出收尋到的資料
$NewsCount = $keyword == "" ? $NewsTotal : get_object_vars($data->getAllLikeCount($Categorysearch, $keyword))["Count"]; //收尋到有幾筆
$pagesCount = ceil((int) $NewsCount / (int) $pageSize);

require_once 'views/template/header.php';

?>



<!-----------------------------------------------------CSS----------------------------------------------------------------------------------->
<style>
  #container {
    margin: 0 auto;
    width: 550px;

  }

  .navbar-center {
    display: inline-block;
    float: none;
    vertical-align: top;
  }

  .navbar-collapse-center {
    text-align: center;
  }

  table {
    border-collapse: collapse;
    width: 100%;
    table-layout: fixed;
  }

  .content {
    margin: auto;
  }


  th,
  td {
    text-align: left;
    padding: 10px;
    border: 1px solid #ddd;
    font-size: 15px;

  }

  th {
    color: #ffffff;
    background-color: #5289AE;
  }

  .col1 {
    height: 70px;
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
  }
</style>
<!------------------------------------------------------------------------------------------------------------------------------------------->


<div class="container-fluid">
  <div class="card">
    <div class="card-header">
      <div>
        <label class="float-right">搜尋到 : <?= $NewsCount ?>資料</label>
      </div>
      <div class="row">
        <form method="get">
          <div class="form-group">
            <div class="d-flex align-items-end float-left">
              <label for="pageSize">每頁顯示多少筆 : </label>
              <select style="width:68px" class="form-control form-control ml-2 mr-2 " name="pageSize" onchange="this.form.submit()">
                <option value="3" <?= ($pageSize == "3") ? "selected=selected" : ""; ?>>3</option>
                <option value="5" <?= ($pageSize == "5") ? "selected=selected" : ""; ?>>5</option>
                <option value="10" <?= ($pageSize == "10") ? "selected=selected" : ""; ?>>10</option>
              </select>
              <label>共有 : <?= $NewsTotal ?> 筆資料</label>
            </div>
          </div>
      </div>

      <div class="float-right form-group d-flex">
        <input class="form-control mr-2" type="text" placeholder="search" name="keyword">

        <select class="form-control mr-2" style="width:130px" name="Categorysearch">
          <option value="Title"<?= ($Categorysearch == "Title") ? "selected=selected" : ""; ?>>Title</option>
          <option value="CreateDate"<?= ($Categorysearch == "CreateDate") ? "selected=selected" : ""; ?>>CreateDate</option>
        </select>

        <input type="submit" class="btn btn-dark" value="搜尋" name="searchButton" onchange="this.form.submit()">
      </div>
      </form>
    </div>

    <form method="post" action="News/List">
      <div class="card-body">

        <div class="row">
          <div class="mb-3">
            <input type="button" class="btn btn-outline-info" id="checkedAllBtn" value="全選">
            <input type="button" class="btn btn-outline-info" id="checkedNoBtn" value="全消">
            <input type="button" class="btn btn-outline-info" id="checkedRevBtn" value="反選">
            <input type="submit" class="btn btn-outline-danger" id="checkedDeleteBtn" name="checkedDeleteBtn" value="勾選刪除" onclick="return confirm('是否確認刪除勾選資料')">
          </div>

          <div id="container">
            <nav aria-label="Page navigation" class="m-auto">
              <ul class="pagination">
                <?php
                if ($pagesCount > 1) {
                  $queryString = "?";
                  if ($pageSize != "") {
                    $queryString .= "pageSize=$pageSize";
                  };
                  if ($keyword != "") {
                    $queryString .= "&keyword=$keyword";
                  };
                  if ($Categorysearch !=""){
                    $queryString .= "&Categorysearch=$Categorysearch"; //如果加了很多搜索條件 就要再加上去
                  }
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
          </div>



          <table class="table table-hover">
            <thead>
              <tr>
                <th width="3%" style="vertical-align:middle;text-align:center"><input type="checkbox" id="checkedBtn" onclick="checkedAll()"></th>
                <th width="7%">ID編號</th>
                <!--<input type="button" name="sort" value="NewsID">-->
                <th>消息標題</th>
                <th>消息內容</th>
                <th>創建時間</th>
                <th>更新時間</th>
                <th width="28%">功能</th>
              </tr>
            </thead>

            <tbody>
              <?php

              foreach ($newsGet as $news) {
                echo "<tr>";
                echo "<td  style='vertical-align:middle;text-align:center'>
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

                <button class='btn btn-danger' type='submit' name='delete' onclick='return deleteNews()' value=' " . $news->NewsID . " '> <i class='fa fa-trash'>&nbsp</i>刪除</button>
                </td>";

                echo "</tr>";
              }
              ?>

            </tbody>
          </table>
          <!--分頁功能-->

          <nav aria-label="Page navigation" class="m-auto">
            <ul class="pagination mt-4">
              <?php
              if ($pagesCount > 1) {
                $queryString = "?";
                if ($pageSize != "") {
                  $queryString .= "pageSize" . $pageSize;
                };
                if ($keyword != "") {
                  $queryString .= "&keyword=$keyword";
                };
                if ($Categorysearch !=""){
                  $queryString .= "&Categorysearch=$Categorysearch"; //如果加了很多搜索條件 就要再加上去
                }
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
        </div>

    </form>
  </div>
</div>

<?php

require_once 'views/template/footer.php';

?>
<i class='fas fa-sort'></i>

<script>
  let items = document.getElementsByName("items[]");
  //全選 全消 反選 按鈕功能
  //全選checkbox
  function checkedAll() {
    let checkedBtn = document.getElementById("checkedBtn").checked;
    for (let i = 0; i < items.length; i++) {
      if (checkedBtn == true) {
        items[i].checked = true;
      } else {
        items[i].checked = false;
      }
    }
  }

  //全選按鈕
  let checkedAllBtn = document.getElementById("checkedAllBtn");
  checkedAllBtn.onclick = function() {
    for (let i = 0; i < items.length; i++) {
      items[i].checked = true;
    }
  }

  //全消按鈕
  let checkedNoBtn = document.getElementById("checkedNoBtn");
  checkedNoBtn.onclick = function() {
    for (let i = 0; i < items.length; i++) {
      items[i].checked = false;
    }
  }

  //反選按鈕
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

  function deleteNews() {
    return confirm("是否確認刪除 ??");
  }
</script>