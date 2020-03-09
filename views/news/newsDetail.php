<?php

$pageDir = "News";
$pageTitle = "News Detail";

$pageDir = "消息管理";
$pageTitle = "消息詳細資料";

$Getnews = $data->getNewsByID($data->id);

require_once 'views/template/header.php';
$news = new News();
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

  }

  th {
    color: #ffffff;
    background-color: #5289AE;
  }
</style>

<div class="container-fluid">
  <div class="m-auto col-md-8">
    <div class="card">
      <div class="card-body">
        <table class="table">
          <thead>
            <tr>
              <th width="150px">欄位</th>
              <th>資料</th>
            </tr>
          </thead>
          <tbody>

            <tr>
              <td>ID編號</td>
              <td><?= $Getnews->NewsID ?></td>
            </tr>

            <tr>
              <td>消息標題</td>
              <td><?= $Getnews->Title ?></td>
            </tr>

            <tr>
              <td>創建時間</td>
              <td><?= $Getnews->CreateDate ?></td>
            </tr>

            <tr>
              <td>更新時間</td>
              <td><?= $Getnews->UpdateDate ?></td>
            </tr>

            <tr>
              <td>消息內容</td>
              <td><?= $Getnews->Description ?></td>
            </tr>

          </tbody>
        </table>
        <div class="mt-3 float-right">
          <a href="/RollinAdmin/News/Update/<?= $Getnews->NewsID ?>"><button type="button" class="btn btn-info">修改資料</button></a>
          <a href="/RollinAdmin/News/List"><button type="button" class="btn btn-primary">返回清單</button></a>
        </div>
      </div>

      <?php

      require_once 'views/template/footer.php';

      ?>