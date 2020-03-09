<?php

$pageDir = "Course";
$pageTitle = "Course Update";

$pageDirTW = "課程管理";
$pageTitleTW = "課程修改";

$Course = $data->getCourseByID($data->id);

$PriceError = "";
$DateError = "";


if (isset($_POST["updateButton"])) {
    if (is_numeric($_POST["Price"])) {
        if (intval(($_POST["Price"])) < 0 && ($_POST["StartDate"] >= $_POST["EndDate"])) {
            $Course->Title = $_POST["Title"];
            $Course->Description = $_POST["Description"];
            $DateError = "❌開課日期 必須早於 結訓日期";
            $PriceError = "❌金額必須 >= 0";
        } else {
            if ($_POST["StartDate"] >= $_POST["EndDate"]) {
                $DateError = "❌開課日期 必須早於 結訓日期";
                $Course->Title = $_POST["Title"];
                $Course->Price = ((int) $_POST["Price"]);
                $Course->Description = $_POST["Description"];
            } else {
                if (intval(($_POST["Price"])) < 0) {
                    $PriceError = "❌金額必須 >= 0";
                    $Course->Title = $_POST["Title"];
                    $Course->Description = $_POST["Description"];
                    $Course->StartDate = $_POST["StartDate"];
                    $Course->EndDate = $_POST["EndDate"];
                } else {
                    $Course->Title = $_POST["Title"];
                    $Course->Description = $_POST["Description"];
                    $Course->StartDate = $_POST["StartDate"];
                    $Course->EndDate = $_POST["EndDate"];
                    $Course->Price = (int) ($_POST["Price"]);
                    $data->update($Course);
                    echo "<script> alert('修改成功');location.href = '/RollinAdmin/course/Detail/$Course->CourseID' </script>";
                }
            }
        }
    }
}
// header("location: /RollinAdmin/News/Detail/$news->NewsID");



if (isset($_POST["BackToList"])) {
    header("location: ../List");
}

require_once 'views/template/header.php';

?>

<style>
    .error {
        color: red;
    }
</style>

<div class="container-fluid">
    <div style="width:70%">
        <form method="post" action="Course/Update/<?= $Course->CourseID ?>">

            <div class="form-group">

                <label for="Title" class="text">
                    課程ID : <?= $Course->CourseID ?>
                </label>

            </div>

            <div class="form-group">
                <label for="Title" class="text">
                    課程名稱 :
                </label>
                <input type="text" class="form-control" name="Title" id="Title" placeholder="輸入課程標題" required="required" value="<?= $Course->Title ?>">
            </div>

            <div class="form-group">
                <label for="Title" class="number">
                    課程金額 :
                </label>
                <input type="number" class="form-control" name="Price" id="Price" placeholder="輸入課程費用" required="required" value="<?= $Course->Price ?>">
                <span class="error"><?php echo $PriceError ?></span>
            </div>

            <div class="form-group">
                <label for="Title" class="datetime">
                    開課時間 :
                </label>
                <input type="datetime-local" class="form-control" name="StartDate" id="StartDate" placeholder="輸入開始時間" required="required" value="<?= date('Y-m-d\TH:i', strtotime($Course->StartDate)) ?>">
                <span class="error"><?php echo $DateError ?></span>
            </div>

            <div class="form-group">
                <label for="Title" class="datetime">
                    結訓時間 :
                </label>
                <input type="datetime-local" class="form-control" name="EndDate" id="EndDate" placeholder="輸入結束時間" required="required" value="<?= date('Y-m-d\TH:i', strtotime($Course->EndDate)) ?>">
            </div>
            <div class="form-group">
                <label for="Description" class="text">
                    課程內容 :
                </label>
                <textarea type="text" class="form-control" name="Description" id="Description" placeholder="輸入課程內容" style="height:200px" required="required"><?= $Course->Description ?></textarea>
            </div>

            <input name="action" type="hidden" value="id">
            <button type="submit" class="btn btn-info" name="updateButton" id="updateButton">修改送出</button>
            <button type="submit" class="btn btn-secondary" name="BackToList">取消</button>
        </form>
    </div>
</div>
&nbsp;
<!-- /.container-fluid -->

<?php

require_once 'views/template/footer.php';

?>