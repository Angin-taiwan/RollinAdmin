<?php



$pageDir = "News";
$pageTitle = "News List";

require_once 'views/template/header.php';

?>
<!------------------------------------------------------------------------------------------------------------------->


<!------------------------------------------------------------------------------------------------------------------->
<!-- /.container-fluid -->

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css" />
  <link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" />
  <link rel="stylesheet" href="dist/css/adminlte.min.css" />
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet" />
</head>
<!-----------------------------------------------------CSS----------------------------------------------------------------------------------->
<style>
  table {
    border-collapse: collapse;
    width: 100%;
  }

  th,
  td {
    text-align: left;
    padding: 8px;
    border: 1px solid #ddd;
    font-size: 15px;
  }

  tr:nth-child(even) {
    background-color: #f2f2f2
  }

  th {
    background-color: #4CAF50;
    color: white;

  }
</style>
<!------------------------------------------------------------------------------------------------------------------------------------------->

<!----------------------------------------------------- Modal ------------------------------------------------------------------------------->
<body>
<div class="container-fluid">
  <button type="button" class="btn btn-primary" data-target="#myModal" data-toggle="modal" >新增</button>
  <hr>
</div>

          <!-- Modal -->
          <div class="modal fade" id="myModal"  role="dialog">
            <div class="modal-dialog modal-lg" >
              <div class="modal-content">
                
                <!-- Modal Header -->
                <div class="modal-header">
                  <h4 class="modal-title">新增News</h4>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                
                <!-- Modal body -->
                <form method="post" action="/setupDB/News.php">
                <div class="modal-body">

                  <div class="form-group">
                     <label for="Title" class="text">
                     Title : 
                     </label>
                     <input type="text" class="form-control form-control-md" name="Title" id="Title">
                   </div>

                  <div class="form-group">
                     <label for="Description" class="text">
                     Description : 
                     </label>
                     <input type="text" class="form-control" name="Description" id="Description" style="height:200px">
                   </div>
                   
                   <div class="form-group">
                     <label for="CreateDate" class="date">
                     CreateDate : 
                     </label>
                     <input type="date" class="form-control" name="CreateDatessword" id="CreateDatessword">
                   </div>

                   <div class="form-group">
                     <label for="UpdateDate" class="date">
                     UpdateDate : 
                     </label>
                     <input type="date" class="form-control" name="UpdateDate" id="UpdateDate">
                   </div>

                   <div class="form-group">
                     <label for="photo">
                     photo : 
                     </label>
                     <input type="text" class="form-control" name="photo" id="photo">
                   </div>
                  </div>
                </form>  
                  
                  <div class="modal-footer bg-light">
                    <div class="float-right">
                      <button type="button" class="btn btn-success" name="insertNews" id="insertNews" >送出</button>
                       <button type="button" class="btn btn-danger" data-dismiss="modal">取消</button>
                    </div>
                 </div>
               </div>
             </div>
            </div>
<!----------------------------------------------------- Modal ------------------------------------------------------------------------------->
    <table>

      <tr>
        <th><input type="checkbox"></th>
        <th>NewsID</th>
        <th>Title</th>
        <th>Description</th>
        <th>CreateDate</th>
        <th>UpdateDate</th>
        <th>photo</th>
        <th>CRUD</th>
      </tr>

    </table>
  
</body>

</html>



<?php

require_once 'views/template/footer.php';

?>



 

<script>

  $("#insertNews").click (function(){
    var insertDataServer = {
      $Title : $("#Title").val(),
      $Description : $("#Description").val(),
      $CreateDatessword : $("#CreateDatessword").val(),
      $UpdateDate : $("#UpdateDate").val(),
      $photo : $("#photo").val(),
    }
    $.ajax({
      type:"post",
      url:"newsList.php",
      success:function(e){
      alert(e);
      }
    })
  });


</script>