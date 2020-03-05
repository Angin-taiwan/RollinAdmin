<?php

$pageDir = "Course";
$pageTitle = "Course List";
$CourseGet = $data->getAll();
$Course = new Course();

if (isset($_POST["delete"])) {
  $Course->CourseID = $_POST["delete"];
  $data->delete([$Course->CourseID]);
  header("location= /RollinAdmin/course/List");
}

if (isset($_POST["checkedDeleteBtn"])) {
  $arr = array();
  foreach ($_POST['items'] as $check) {
    array_push($arr, $check);
  }
  $str = implode("','", $arr);
  $data->delete($arr);
  header("location: /RollinAdmin/course/List");
}

require_once 'views/template/header.php';

?>

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


<div class="form-group">
  <label>每頁顯示多少筆 : </label>
  <select>
    <option name="pageSize" class="form-control"></option>
  </select>
</div>




<form method="post" action="course/List">
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
    <table class="table table-hover">
      <thead>
        <tr>
          <th type="checkbox" width="3%"></th>
          <th width="8%">CourseID</th>
          <th width="8%">Title</th>
          <th>Description</th>
          <th width="7%">Price</th>
          <th width="10%">StartDate</th>
          <th width="10%">EndDate</th>
          <th width="10%">CreateDate</th>
          <th width="10%">UpdateDate</th>
          <th>功能</th>
        </tr>
      </thead>

      <tbody>
        <?php

        foreach ($CourseGet as $Course) {
          echo "<tr>";
          echo "<td>
                <input type='checkbox' id='check' name='items[]' value='" . $Course->CourseID . "'>
                </td>";
          echo "<td>" .  $Course->CourseID . "</td>";
          echo "<td>" .  $Course->Title . "</td>";
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

                <button class='btn btn-danger' type='submit' name='delete' value=' " . $Course->CourseID . " '> <i class='fa fa-trash'>&nbsp</i></button>
                </td>";

          echo "</tr>";
        }
        ?>

      </tbody>
    </table>
    <tfoot>
    </tfoot>
  </div>
</form>
<!-- /.container-fluid -->

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