<?php

// 對應 header template nav active
$pageDir = "Category";
$pageTitle = "Category List";

// breadcrumb 中文化
$pageDirTW = "類別管理";
$pageTitleTW = "類別清單";

# ----------------------------------------------------------

if(isset($_POST['submit'])) {

  if(isset($_POST['categoryName']) && trim($_POST['categoryName']) != "") {

    $category = new Category();

    $category->CategoryName = trim($_POST['categoryName']);
    $category->ParentID = isset($_POST['isChild']) ? $_POST['parentCategoryID'] : NULL;

    $data->create($category);
  }
}

if(isset($_POST['editSubmit'])) {

  $category = new Category();

  $category->CategoryID = $_POST['editID'];
  $category->CategoryName = trim($_POST['editCategoryName']);
  $category->ParentID = isset($_POST['editIsChild']) ? $_POST['editParentCategoryID'] : NULL;

  $data->update($category);
}

if(isset($_POST['deleteSubmit'])) {
  $data->delete([$_POST['deleteID']]);
}


$parents = $data->getParents();

# ----------------------------------------------------------

require_once 'views/template/header.php';

?>

<style>
.category-row {
  font-size: 1em;
}
.list-group-item {
  color: #000;
  border: none;
  background-color: inherit;
}
.category-btn-group {
  display: none;
  position: absolute;
  top:10px;
  left: 250px;
}
.item-wrap:hover>.category-btn-group {
  display: block;
}
</style>


<div class="container-fluid">

  <div class="row category-row">
    <div class="col-6">
      <div class="just-padding">
        <div class="list-group list-group-root">
          <?php
          foreach($parents as $parent) {
            $children = $data->getChildren($parent->CategoryID);
            $childrenCount = count($children);
            $diplay = $childrenCount > 0 ? "" : "d-none";
            echo "<div class='item-wrap position-relative'>";
            echo "<a href='#item-$parent->CategoryName' class='list-group-item' data-toggle='collapse'>";
            echo "<i class='fas fa-chevron-right mr-2'></i>$parent->CategoryName<span class='badge badge-secondary ml-2 $diplay'>$childrenCount</span></a>";
            echo "<div class='btn-group btn-group-sm category-btn-group'>";
            echo "<button type='button' class='btn btn-outline-secondary btn-edit' data-toggle='modal' data-target='#editModal' data-name='$parent->CategoryName' data-id='$parent->CategoryID'>修改</button>";
            echo "<button type='button' class='btn btn-outline-danger btn-delete' data-toggle='modal' data-target='#deleteModal' data-name='$parent->CategoryName' data-id='$parent->CategoryID'>刪除</button>";
            echo "<button type='button' class='btn btn-outline-primary btn-new' data-toggle='modal' data-target='#newModal' >新增</button>";
            echo "</div>";
            echo "</div>";
            echo "<div class='list-group collapse' id='item-$parent->CategoryName'>";
            foreach($children as $child) {
              echo "<div class='item-wrap position-relative'>";
              echo "<a href='javascript:event.preventDefault();' class='list-group-item pl-5'>$child->CategoryName</a>";
              echo "<div class='btn-group btn-group-sm category-btn-group'>";
              echo "<button type='button' class='btn btn-outline-secondary btn-edit' data-toggle='modal' data-target='#editModal' data-name='$child->CategoryName' data-id='$child->CategoryID' data-pid='$child->ParentID'>修改</button>";
              echo "<button type='button' class='btn btn-outline-danger btn-delete' data-toggle='modal' data-target='#deleteModal' data-name='$child->CategoryName' data-id='$child->CategoryID' data-pid='$child->ParentID'>刪除</button>";
              echo "<button type='button' class='btn btn-outline-primary btn-new' data-toggle='modal' data-target='#newModal' >新增</button>";
              echo "</div>";
              echo "</div>";
            }
            echo "</div>";
          }
          ?>
        </div>
      </div>
    </div>
    <!--/.col -->
    <div class="col-6">
      <!-- Button trigger modal -->
      <!-- <button type="button" class="btn btn-outline-primary mt-1 btn-sm" data-toggle="modal" data-target="#newModal">
        新增類別
      </button> -->
    </div>
    <!--/.col -->
  </div>
  <!--/.row -->
  <!-- Modal -->
  <div class="modal fade" id="newModal" tabindex="-1" role="dialog" aria-labelledby="newModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="newModalLabel">新增類別</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form class="form" method="POST" action="">
          <div class="modal-body">
            <div class="form-group">
              <label for="categoryName">要新增的類別名稱</label>
              <input type="text" class="form-control" id="categoryName" name="categoryName" placeholder="請輸入要新增的類別名稱" required>
            </div>
            <div class="form-group form-check">
              <input type="checkbox" class="form-check-input" id="isChild" name="isChild">
              <label class="form-check-label" for="isChild" >成為下方父類別的子類別</label>
            </div>
            <fieldset id="fieldset" disabled>
              <div class="form-group">
                <label for="parentCategoryID">要加入的父類別名稱</label>
                <select class="form-control" id="parentCategoryID" name="parentCategoryID">
                  <?php
                  foreach($parents as $parent) {
                    echo "<option value='$parent->CategoryID'>$parent->CategoryName</option>";
                  }
                  ?>
                </select>
              </div>
            </fieldset>
          </div>
          <div class="modal-footer">
          <button type="submit" class="btn btn-primary" name="submit">確認新增類別</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">不要新增</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <!--/.Modal -->
  <!-- Modal -->
  <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="editModalLabel">修改類別</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form class="form" method="POST" action="">
          <div class="modal-body">
            <div class="form-group">
              <label for="editCategoryName">要修改的類別名稱</label>
              <input type="text" class="form-control" id="editCategoryName" name="editCategoryName" placeholder="要修改的類別名稱" required>
            </div>
            <div id="editShow">
              <div class="form-group form-check">
                <input type="checkbox" class="form-check-input" id="editIsChild" name="editIsChild">
                <label class="form-check-label" for="editIsChild" >成為下方父類別的子類別</label>
              </div>
              <fieldset id="editFieldset" disabled>
                <div class="form-group">
                  <label for="editParentCategoryID">要加入的父類別名稱</label>
                  <select class="form-control" id="editParentCategoryID" name="editParentCategoryID">
                    <?php
                    foreach($parents as $parent) {
                      echo "<option value='$parent->CategoryID'>$parent->CategoryName</option>";
                    }
                    ?>
                  </select>
                </div>
              </fieldset>
            </div>
          </div>
          <div class="modal-footer">
          <button type="submit" class="btn btn-primary" name="editSubmit">確認修改類別</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">不要修改</button>
            <input type="hidden" id="editID" name="editID" value="">
          </div>
        </form>
      </div>
    </div>
  </div>
  <!--/.Modal -->
  <!-- Modal -->
  <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="deleteModalLabel">確定要刪除類別「 <span id="deleteCategoryName"></span> 」?</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form class="form" method="POST" action="">
          <div class="modal-body">
            警告：刪除後將無法復原，請再度確認是否要刪除。
            <p>其下若有子類別也將全部被刪除。</p>
          </div>
          <div class="modal-footer">
          <button type="submit" class="btn btn-danger" name="deleteSubmit">確認刪除類別</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">不要刪除</button>
            <input type="hidden" id="deleteID" name="deleteID" value="">
          </div>
        </form>
      </div>
    </div>
  </div>
  <!--/.Modal -->
</div>
<!-- /.container-fluid -->

<?php

require_once 'views/template/footer.php';

?>

<script>
  $(function() {

    $('#isChild').on('click', function() {
      $('#fieldset').prop('disabled', !$(this).prop('checked'));
    });

    $('#editIsChild').on('click', function() {
      $('#editFieldset').prop('disabled', !$(this).prop('checked'));
    });

    $('.list-group-item').on('click', function() {
      $('.fas', this)
        .toggleClass('fa-chevron-right')
        .toggleClass('fa-chevron-down');
    });

    $('.btn-edit').on('click', function() {
      $('#editCategoryName').val($(this).data('name'));
      $('#editID').val($(this).data('id'));

      $pid = $(this).data('pid');
      $('#editParentCategoryID').val($pid);

      if ($pid) {
        $('#editShow').css('display','block');
        $('#editFieldset').prop('disabled', false);
        $('#editIsChild').prop('checked', $pid);
      } else {
        $('#editShow').css('display','none');
      }
    });

    $('.btn-delete').on('click', function() {
      $('#deleteCategoryName').text($(this).data('name'));
      $('#deleteID').val($(this).data('id'));
    });

  });
</script>