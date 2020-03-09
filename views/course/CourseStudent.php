<?php

$pageDir = "Student";
$pageTitle = "Student List";

$pageDirTW = "學生管理";
$pageTitle = "學生清單";
$Student = new Course();
$getStudent = $data->StudentName($data->id);

//不同CourseID 的總人數
$People = get_object_vars($data->getAllStudentCount($data->id))["Total"];
$Course = $data->getCourseByID($data->id);

//刪除報名人員
if (isset($_POST["delete"])) {
    $arr = array(($Student->CourseID = $data->id), ($Student->UserID = $_POST["delete"]));
    $data->deleteStudent($arr);
    header("location: /RollinAdmin/Course/Student/$data->id");
}

//搜尋UserName
$searchUserNameCount = "";
if (isset($_POST['searchButton'])) {
    $searchTerm = $_POST['keyword'];
    $getStudent = $data->searchUserName($data->id, $searchTerm);   // 搜尋條件為UserName 合併
    $searchUserNameCount = get_object_vars($data->searchUserNameCount($data->id, $searchTerm))["Count"]; //搜尋到幾筆
}

//報名全覽
if (isset($_POST["AllStudent"])) {
    $getStudent = $data->StudentName($data->id);
}


// if (isset($_POST["checkedDeleteBtn"])) {
//     $arr = array();
//     foreach ($_POST['items'] as $check) {
//         array_push($arr, $check);
//     }
//     $str = implode("','", $arr);
//     $data->deleteStudent($arr);
// header("location: /RollinAdmin/course/Student/$data->id");
//   }

require_once 'views/template/header.php';

?>

<style>
    table {
        border-collapse: collapse;
        width: 100%;
        table-layout: automatic;
    }

    th,
    td {
        /* text-align: center; */
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
        <div class="col-9 mx-auto">
            <div class="card">

                <div class="card-header">
                    <div>
                        <label class="float-right">搜尋到 <?php echo $searchUserNameCount ?> 筆資料 </label>
                    </div>
                    <div class="row">
                        <div class="form-group">
                            <div class="d-flex align-items-end float-left">
                                <label>報名人數 <?php echo $People ?> / 20 </label>
                            </div>
                        </div>
                    </div>
                    <div class="float-right form-group d-flex">
                        <input class="form-control mr-2" type="text" placeholder="輸入姓名關鍵字" name="keyword">
                        <input type="submit" class="btn btn-dark" value="搜尋" name="searchButton" onchange="this.form.submit()">
                    </div>
                    <div class="row">
                        <button type="submit" name="checkedDeleteBtn" class="btn btn-outline-danger">勾選刪除</button>
                    </div>
                    <br>
                    <button class="float-right btn btn-outline-primary" name="AllStudent">報名一覽</button>
                </div>

                <div class="card-body">
                    <table class="table table-hover" style="width:auto">
                        <tr>
                            <th width="1%" style="vertical-align:middle;text-align:center" valign='middle'><input type="checkbox" id="checkedBtn" onclick="checkedAll()"></th>
                            <th width="10%">課程ID</th>
                            <th width="12%">課程名稱</th>
                            <th width="10%">會員ID</th>
                            <th width="15%">會員姓名</th>
                            <th width="25%">功能</th>
                        </tr>
                        <?php
                        foreach ($getStudent as $Student) {
                            echo "<tr>";
                            echo "<td style='vertical-align:middle;text-align:center;'><input type='checkbox' id='check' name='items[]' value='" . $Student->CourseID . "," . $Student->UserID . "'></td>";
                            echo "<td>" . $Student->CourseID . "</td>";
                            echo "<td>" . $Student->Title . "</td>";
                            echo "<td>" . $Student->UserID . "</td>";
                            echo "<td> <a href='/RollinAdmin/User/Detail/$Student->UserID' class='btn btn-info'><i class='fa fa-search'></i> " . $Student->UserName . "</a></td>";
                            echo "<td>
                                  <button class='btn btn-danger' onclick='return deleteStudent()' type='submit' name='delete' value='" . $Student->UserID . "'> <i class='fa fa-trash'>&nbsp</i>取消報名</button>
                                  </td>";
                        }

                        ?>

                    </table>
                </div>
                <div class="card-footer">
                    <div>
                        <a href="/RollinAdmin/Course/Detail/<?= $data->id ?>" class="float-right btn btn-primary ml-2">返回資訊</a>
                        <a href="/RollinAdmin/Course/List" class="float-right btn btn-primary ml-2">返回清單</a>
                        <?php
                        if ($People == "20") {
                            echo "<button class='btn btn-danger' type='button' value=' " . $Course->CourseID . " '>報名人數已滿!!</button>";
                        };
                        ?>
                    </div>
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

    function deleteStudent() {
        return confirm("確認是否取消報名 ??");
    }
</script>