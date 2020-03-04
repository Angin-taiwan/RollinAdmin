<?php

$pageDir = "Course";
$pageTitle = "Course List";
$CourseGet = $data->getAll();

$Course = new Course();

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
          <th type="checkbox" width="3%"></th>
          <th width="8%">CourseID</th>
          <th width="8%">Title</th>
          <th >Description</th>
          <th width="5%">Price</th>
          <th width="10%">StartDate</th>
          <th width="10%">EndDate</th>
          <th width="10%">CreateDate</th>
          <th width="10%">UpdateDate</th>
          <th >功能</th>
        </tr>
      </thead>

      <tbody>
        <?php

        foreach ($CourseGet as $course) {
          echo "<tr>";
          echo "<td>
                <input type='checkbox' id='check' name='items[]' value='" . $course->CourseID . "'>
                </td>";
          echo "<td>" .  $course->CourseID . "</td>";
          echo "<td>" .  $course->Title . "</td>";
          echo "<td class='col1'>" .  $course->Description . "</td>";
          echo "<td>" .  '$ ' . $course->Price . "</td>";
          echo "<td>" .  $course->StartDate . "</td>";
          echo "<td>" .  $course->EndDate . "</td>";
          echo "<td>" .  $course->CreateDate . "</td>";
          echo "<td>" .  $course->UpdateDate . "</td>";
          echo "<td> 
                <a href='/RollinAdmin/News/Detail/$course->CourseID' class='btn btn-info'><i class='fa fa-search'></i></a>

                <a href='/RollinAdmin/News/Update/$course->CourseID' class='btn btn-secondary'>
                <i class='fa fa-edit'></i></a>

                <button class='btn btn-danger' type='submit' name='delete' value=' ".$course->CourseID." '> <i class='fa fa-trash'>&nbsp</i></button>
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
            <a class="page-link" href="">上一頁</a>
          </li>
          <li class="page-item  ">
            <a class="page-link" href="">下一頁</a>
          </li>

        </ul>
      </nav>

    </tfoot>
  </div>
</form>
<!-- /.container-fluid -->

<?php

require_once 'views/template/footer.php';

?>