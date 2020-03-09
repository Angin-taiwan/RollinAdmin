<?php

$pageDir = "Course";
$pageTitle = "Course List";
//中文化
$pageDirTW = "課程管理";
$pageTitleTW = "課程清單";

$CourseGet = $data->getAll();
$Course = new Course();


//刪除按鈕
if (isset($_POST["delete"])) {
  $Course->CourseID = $_POST["delete"];
  $data->delete([$Course->CourseID]);
  header("location= /RollinAdmin/course/List");
}

//checkbox勾選刪除
if (isset($_POST["checkedDeleteBtn"])) {
  $arr = array();
  foreach ($_POST['items'] as $check) {
    array_push($arr, $check);
  }
  $str = implode("','", $arr);
  $data->delete($arr);
  header("location: /RollinAdmin/course/List");
}

//搜尋
if (isset($_GET["searchButton"])) {
  $keyword = $_GET["keyword"];
  $Categorysearch = $_GET["Categorysearch"];
  $startIndex = "0";
  $pageSize = $_GET["pageSize"];
  $CourseGet = $data->getAllLike($Categorysearch, $keyword, $startIndex, $pageSize);
}

// get set querystring
parse_str($_SERVER['QUERY_STRING'], $query);
$pageSize = isset($query["pageSize"]) ? ($query["pageSize"]) : 3;
$keyword = isset($query["keyword"]) ? $query["keyword"] : "";
$pageNo = isset($query["pageNo"]) ? $query["pageNo"] : 1;
$Categorysearch = isset($query["Categorysearch"]) ? $query["Categorysearch"] : "";

// // for pagination

$startIndex = ($pageNo - 1) * $pageSize;
$CourseTotal = get_object_vars($data->getAllCount())["Total"]; // 所有資料筆數
$CourseGet = $keyword == "" ? $data->getAllpage($startIndex, $pageSize) : $data->getAllLike($Categorysearch, $keyword, $startIndex, $pageSize);
$CourseCount = $keyword == "" ? $CourseTotal : get_object_vars($data->getAllLikeCount($Categorysearch, $keyword))["Count"];
$pagesCount = ceil((int) $CourseCount / (int) $pageSize);
require_once 'views/template/header.php';

?>

<style>
  #container {
    margin: 0 auto;
    width: 520px;

  }

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

  }

  th {
    color: #ffffff;
    background-color: #5289AE;
  }

  .col1 {
    height: 80px;
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
  }
</style>

<div class="container-fluid">
  <div class="card">
    <div class="card-header">
      <div>
        <label class="float-right">搜尋到 : <?= $CourseCount ?> 資料</label>
      </div>
      <form method="get" action="">
        <div class="form-group d-flex align-items-end">
          <label class="float-left mr-2" for="pageSize">每頁顯示多少筆 : </label>
          <select style="width:80px" name="pageSize" class="form-control mr-2" onchange="this.form.submit()">
            <option value="3" <?= ($pageSize == "3") ? "selected=selected" : ""; ?>>3</option>
            <option value="5" <?= ($pageSize == "5") ? "selected=selected" : ""; ?>>5</option>
            <option value="10" <?= ($pageSize == "10") ? "selected=selected" : ""; ?>>10</option>
          </select>
          <label>共有 : <?= $CourseTotal ?> 筆資料</label>
        </div>

        <div class="float-right form-group d-flex">
          <input class="form-control mr-2" type="text" placeholder="輸入查詢關鍵字" name="keyword">
          <select class="form-control mr-2" style="width:130px" name="Categorysearch">
            <option value="Title" <?= ($Categorysearch =="Title") ? "selected=selected":""; ?>>課程名稱</option>
            <option value="Price" <?= ($Categorysearch =="Price") ? "selected=selected":""; ?>>金額</option>
            <option value="StartDate" <?= ($Categorysearch =="StartDate") ? "selected=selected":""; ?>>開課時間</option>
          </select>
          <input type="submit" class="btn btn-dark" value="搜尋" name="searchButton" onchange="this.form.submit()">
          <br>
        </div>
      </form>


    </div>

    <form method="post" action="course/List">
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
                    $queryString .= "pageSize" . '=' . $pageSize;
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
                  echo "<li class='page-item $prevousDisabled'><a class='page-link' href='./Course/List/$queryString&pageNo=$prevous'>上一頁</a></li>";
                  for ($i = 1; $i <= $pagesCount; $i++) {
                    echo "<li class='page-item'><a class='page-link' href='./Course/List/$queryString&pageNo=$i'>$i</a></li>";
                  }
                  echo "<li class='page-item $nextDisabled'><a class='page-link' href='./Course/List/$queryString&pageNo=$next'>下一頁</a></li>";
                }
                ?>
              </ul>
            </nav>
          </div>

          <table class="table table-hover">
            <thead>
              <tr>
                <th width="3%" style="vertical-align:middle;text-align:center"><input type="checkbox" id="checkedBtn" onclick="checkedAll()"></th>
                <th width="5%">課程ID</th>
                <th width="10%">課程名稱</th>
                <th width="13%">課程內容</th>
                <th width="7%">課程金額</th>
                <th width="8%">開課時間</th>
                <th width="8%">結訓時間</th>
                <th width="8%">創建時間</th>
                <th width="8%">更新時間</th>
                <th width="18%">功能</th>
              </tr>
            </thead>
            <tbody>
              <?php
              foreach ($CourseGet as $Course) {
                $People = get_object_vars($data->getAllStudentCount($Course->CourseID))["Total"];
                $full = "";
                if ($People == 20) {
                  $full = "🈵";
                }
                $CourseStartEnd = "";
                if ($Course->StartDate <= date("Y-m-d")) {
                  $CourseStartEnd = "(已開課)";
                  if ($Course->EndDate < date("Y-m-d")) {
                    $CourseStartEnd = "(已結訓)";
                  }
                }
                echo "<tr>";
                echo "<td  style='vertical-align:middle;text-align:center'>
                 <input type='checkbox' id='check' name='items[]' value='" . $Course->CourseID . "'>
                 </td>";
                echo "<td>" .  $Course->CourseID . "</td>";
                echo "<td>" .  $Course->Title . "  " . $full . " " . $CourseStartEnd . "</td>";
                echo "<td class='col1'>" .  $Course->Description . "</td>";
                echo "<td>" .  '$ ' . $Course->Price . "</td>";
                echo "<td>" .  $Course->StartDate . "</td>";
                echo "<td>" .  $Course->EndDate . "</td>";
                echo "<td>" .  $Course->CreateDate . "</td>";
                echo "<td>" .  $Course->UpdateDate . "</td>";
                echo "<td> 
                <a href='/RollinAdmin/Course/Detail/$Course->CourseID' class='btn btn-info'><i class='fa fa-search'></i></a>

                <a href='/RollinAdmin/Course/Update/$Course->CourseID' class='btn btn-secondary'>
                <i class='fa fa-edit'></i></a>

                <button class='btn btn-danger' type='submit' name='delete' onclick='return deleteCourse();' value=' " . $Course->CourseID . " '> <i class='fa fa-trash'>&nbsp</i></button>
                </td>";

                echo "</tr>";
              }
              ?>

            </tbody>
          </table>


          <nav aria-label="Page navigation" class="m-auto">
            <ul class="pagination">
              <?php
              if ($pagesCount > 1) {
                $queryString = "?";
                if ($pageSize != "") {
                  $queryString .= "pageSize= $pageSize";
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
                echo "<li class='page-item $prevousDisabled'><a class='page-link' href='./Course/List/$queryString&pageNo=$prevous'>上一頁</a></li>";
                for ($i = 1; $i <= $pagesCount; $i++) {
                  echo "<li class='page-item'><a class='page-link' href='./Course/List/$queryString&pageNo=$i'>$i</a></li>";
                }
                echo "<li class='page-item $nextDisabled'><a class='page-link' href='./Course/List/$queryString&pageNo=$next'>下一頁</a></li>";
              }
              ?>
            </ul>
          </nav>

        </div>
      </div>
  </div>
  </form>
</div>
</div>
<!-- /.container-fluid -->
<?php

require_once 'views/template/footer.php';

?>

<script>
  let items = document.getElementsByName("items[]");

  //全選全消checked
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

  function deleteCourse() {
    return confirm("是否確認刪除 ??");
  }
</script>