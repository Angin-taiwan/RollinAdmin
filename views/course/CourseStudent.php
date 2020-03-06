<?php

$pageDir = "Student";
$pageTitle = "Student List";

$pageDirTW = "學生管理";
$pageTitle = "學生清單";

$getStudent = $data->StudentName($data->id);
$Student = new Course();

if (isset($_POST["delete"])) {
    $Student->UserID = $_POST["delete"];
    $data->deleteStudent([$Student->UserID]);
    header("location= /RollinAdmin/Course/Student/1");
}




require_once 'views/template/header.php';

?>

<style>
    table {
        border-collapse: collapse;
        width: 100%;
        /* table-layout: fixed; */
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
        color: #ffffff;
        background-color: #5289AE;

    }
</style>

<div class="container-fluid">
    <form method="post" action="">
        <div class="col-6 m-auto">
            <div class="card">
                <div class="card-body">
                    <table class="table" style="width:auto">
                        <tr>
                            <th width="1%"><input type="checkbox" id="checkedBtn" onclick="checkedAll()"></th>
                            <th width="10%">CourseID</th>
                            <th width="12%">CourseTitle</th>
                            <th width="10%">UserID</th>
                            <th width="15%">UserName</th>
                            <th width="25%">功能</th>
                        </tr>
                        <?php
                        // $users = $data->getCourseUserName();
                        foreach ($getStudent as $Student) {
                            echo "<tr>";
                            echo "<td><input type='checkbox' id='check' name='items' value='". $Student->UserID ." '></td>";
                            echo "<td>" . $Student->CourseID . "</td>";
                            echo "<td>" . $Student->Title . "</td>";
                            echo "<td>" . $Student->UserID . "</td>";
                            echo "<td> <a href='/RollinAdmin/User/Detail/$Student->UserID' class='btn btn-info'><i class='fa fa-search'></i> " . $Student->UserName . "</a></td>";
                            echo "<td>
                                  <button class='btn btn-danger' type='submit' name='delete' value=' " . $Student->UserID . " '> <i class='fa fa-trash'>&nbsp</i>取消報名</button>
                                  </td>";
                        }

                        ?>

                    </table>
                </div>
                <div class="card-footer">
                    <div>
                        <a href="/RollinAdmin/Course/Detail/<?= $Student->CourseID ?>" class="float-right btn btn-primary ml-2" type="submit">返回資訊</a>
                        <?php
                        $People = "0";
                        if ($People == "20") {
                            echo "<a class='btn btn-danger' style='color:#ffffff'>人數已滿截止!!</a>";
                        };
                        ?>

                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
<!-- /.container-fluid -->

<?php

require_once 'views/template/footer.php';

?>

<script>
let items = document.getElementsByName("items");
  
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

</script>