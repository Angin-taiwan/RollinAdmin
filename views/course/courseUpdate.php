<?php

$pageDir = "Course";
$pageTitle = "Course Update";

$Course = $data->getCourseByID($data->id);



if (isset($_POST["updateButton"])) {
    $Course->Title = $_POST["Title"];
    $Course->Price = $_POST["Price"];
    $Course->StartDate = $_POST["StartDate"];
    $Course->EndDate = $_POST["EndDate"];
    $Course->Description = $_POST["Description"];
    $data->update($Course);
    if ($Course->CourseID) {
        echo "<script> alert('修改成功');location.href = '/RollinAdmin/Course/Detail/$Course->CourseID' </script>";
        // header("location: /RollinAdmin/News/Detail/$news->NewsID");
    }
}

if (isset($_POST["BackToList"])) {
    header("location: ../List");
}

require_once 'views/template/header.php';

?>

<div class="container-fluid">
<div style="width:70%">
    <form method="post" action="Course/Update/<?= $Course->CourseID ?>">

        <div class="form-group">

            <label for="Title" class="text">
                CourseID : <?= $Course->CourseID ?>
            </label>

        </div>

        <div class="form-group">
            <label for="Title" class="text">
                Title :
            </label>
            <input type="text" class="form-control" name="Title" id="Title" required="required" value="<?= $Course->Title ?>">
        </div>

        <div class="form-group">
            <label for="Title" class="number">
                Price :
            </label>
            <input type="number" class="form-control" name="Price" id="Price" required="required" value="<?= $Course->Price ?>">
        </div>

        <div class="form-group">
            <label for="Title" class="datetime">
                StartDate :
            </label>
            <input type="datetime-local" class="form-control" name="StartDate" id="StartDate" required="required" value="<?= date('Y-m-d\TH:i',strtotime($Course->StartDate)) ?>">
        </div>

        <div class="form-group">
            <label for="Title" class="datetime">
                EndDate :
            </label>
            <input type="datetime-local" class="form-control" name="EndDate" id="EndDate" required="required"  value="<?= date('Y-m-d\TH:i',strtotime($Course->EndDate)) ?>">
        </div>
        <div class="form-group">
            <label for="Description" class="text">
                Description :
            </label>
            <textarea type="text" class="form-control" name="Description" id="Description" style="height:200px" required="required"><?= $Course->Description ?></textarea>
        </div>

        <input name="action" type="hidden" value="id">
        <button type="submit" class="btn btn-success" name="updateButton" id="updateButton">修改資料</button>
        <button type="submit" class="btn btn-danger" name="BackToList">取消</button>     
    </form>
    </div>
</div>
<!-- /.container-fluid -->

<?php

require_once 'views/template/footer.php';

?>