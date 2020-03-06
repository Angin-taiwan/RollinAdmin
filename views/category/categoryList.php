<?php

$pageDir = "Category";
$pageTitle = "Category List";

$categories = json_encode($data->getAll());

$test = '[{"id":1,"text":"Asia","population":null,"flagUrl":null,"checked":false,"hasChildren":false,"children":[{"id":2,"text":"China","population":1373541278,"flagUrl":"https://code.gijgo.com/flags/24/China.png","checked":false,"hasChildren":false,"children":[]},{"id":3,"text":"Japan","population":126730000,"flagUrl":"https://code.gijgo.com/flags/24/Japan.png","checked":false,"hasChildren":false,"children":[]},{"id":4,"text":"Mongolia","population":3081677,"flagUrl":"https://code.gijgo.com/flags/24/Mongolia.png","checked":false,"hasChildren":false,"children":[]}]},{"id":5,"text":"North America","population":null,"flagUrl":null,"checked":false,"hasChildren":false,"children":[{"id":6,"text":"USA","population":325145963,"flagUrl":"https://code.gijgo.com/flags/24/United%20States%20of%20America(USA).png","checked":false,"hasChildren":false,"children":[{"id":7,"text":"California","population":39144818,"flagUrl":null,"checked":false,"hasChildren":false,"children":[]},{"id":8,"text":"Florida","population":20271272,"flagUrl":null,"checked":false,"hasChildren":false,"children":[]}]},{"id":9,"text":"Canada","population":35151728,"flagUrl":"https://code.gijgo.com/flags/24/canada.png","checked":false,"hasChildren":false,"children":[]},{"id":10,"text":"Mexico","population":119530753,"flagUrl":"https://code.gijgo.com/flags/24/mexico.png","checked":false,"hasChildren":false,"children":[]}]},{"id":11,"text":"South America","population":null,"flagUrl":null,"checked":false,"hasChildren":false,"children":[{"id":12,"text":"Brazil","population":207350000,"flagUrl":"https://code.gijgo.com/flags/24/brazil.png","checked":false,"hasChildren":false,"children":[]},{"id":13,"text":"Argentina","population":43417000,"flagUrl":"https://code.gijgo.com/flags/24/argentina.png","checked":false,"hasChildren":false,"children":[]},{"id":14,"text":"Colombia","population":49819638,"flagUrl":"https://code.gijgo.com/flags/24/colombia.png","checked":false,"hasChildren":false,"children":[]}]},{"id":15,"text":"Europe","population":null,"flagUrl":null,"checked":false,"hasChildren":false,"children":[{"id":16,"text":"England","population":54786300,"flagUrl":"https://code.gijgo.com/flags/24/england.png","checked":false,"hasChildren":false,"children":[]},{"id":17,"text":"Germany","population":82175700,"flagUrl":"https://code.gijgo.com/flags/24/germany.png","checked":false,"hasChildren":false,"children":[]},{"id":18,"text":"Bulgaria","population":7101859,"flagUrl":"https://code.gijgo.com/flags/24/bulgaria.png","checked":false,"hasChildren":false,"children":[]},{"id":19,"text":"Poland","population":38454576,"flagUrl":"https://code.gijgo.com/flags/24/poland.png","checked":false,"hasChildren":false,"children":[]}]}]';

// $test = json_encode($test);


require_once 'views/template/header.php';

?>

<style>
.just-padding {
  padding: 15px;
}

.just-padding a {
  color: black;
}

.list-group.list-group-root {
  padding: 0;
  overflow: hidden;
}

.list-group.list-group-root .list-group {
  margin-bottom: 0;
}

.list-group.list-group-root .list-group-item {
  border-radius: 0;
  border-width: 1px 0 0 0;
}

.list-group.list-group-root > .list-group-item:first-child {
  border-top-width: 0;
}

.list-group.list-group-root > .list-group > .list-group-item {
  padding-left: 30px;
}

.list-group.list-group-root > .list-group > .list-group > .list-group-item {
  padding-left: 45px;
}

.list-group-item .glyphicon {
  margin-right: 5px;
}
</style>

<div class="container-fluid">

  <div class="row">
    <div class="col-6">
      <div class="just-padding">

        <div class="list-group list-group-root card">
          
          <a href="#item-Skateboards" class="list-group-item" data-toggle="collapse">
            <i class="fas fa-chevron-right"></i> Skateboards
          </a>
          <div class="list-group collapse" id="item-Skateboards">         
            <a href="" class="list-group-item pl-5">
              <i class="glyphicon glyphicon-chevron-right"></i>Desks
            </a>    
            <a href="" class="list-group-item pl-5">
              <i class="glyphicon glyphicon-chevron-right"></i>Trucks
            </a>
            <a href="" class="list-group-item pl-5">
              <i class="glyphicon glyphicon-chevron-right"></i>Wheels
            </a> 
            <a href="" class="list-group-item pl-5">
              <i class="glyphicon glyphicon-chevron-right"></i>Bearings
            </a>        
            <a href="" class="list-group-item pl-5">
              <i class="glyphicon glyphicon-chevron-right"></i>Hardware
            </a>        
            <a href="" class="list-group-item pl-5">
              <i class="glyphicon glyphicon-chevron-right"></i>Griptape
            </a>
          </div>
                     
          <a href="#item-Shoes" class="list-group-item" data-toggle="collapse">
            <i class="fas fa-chevron-right"></i> Shoes
          </a>
          <div class="list-group collapse" id="item-Shoes">         
            <a href="" class="list-group-item pl-5">
              <i class="glyphicon glyphicon-chevron-right"></i>Skate Shoes
            </a>    
            <a href="" class="list-group-item pl-5">
              <i class="glyphicon glyphicon-chevron-right"></i>Sneakers
            </a>
            <a href="" class="list-group-item pl-5">
              <i class="glyphicon glyphicon-chevron-right"></i>Winter Shoes For Skaters
            </a> 
          </div>
                     
          <a href="#item-Clothing" class="list-group-item" data-toggle="collapse">
            <i class="fas fa-chevron-right"></i> Clothing
          </a>
          <div class="list-group collapse" id="item-Clothing">         
            <a href="" class="list-group-item pl-5">
              <i class="glyphicon glyphicon-chevron-right"></i>T-Shirts
            </a>    
            <a href="" class="list-group-item pl-5">
              <i class="glyphicon glyphicon-chevron-right"></i>Hoodies
            </a>
            <a href="" class="list-group-item pl-5">
              <i class="glyphicon glyphicon-chevron-right"></i>Jackets
            </a>
            <a href="" class="list-group-item pl-5">
              <i class="glyphicon glyphicon-chevron-right"></i>Long Sleeves
            </a> 
            <a href="" class="list-group-item pl-5">
              <i class="glyphicon glyphicon-chevron-right"></i>Pants
            </a>
            <a href="" class="list-group-item pl-5">
              <i class="glyphicon glyphicon-chevron-right"></i>Shorts
            </a>
          </div>

          <a href="#item-Accessories" class="list-group-item" data-toggle="collapse">
            <i class="fas fa-chevron-right"></i> Accessories
          </a>
          <div class="list-group collapse" id="item-Accessories">         
            <a href="" class="list-group-item pl-5">
              <i class="glyphicon glyphicon-chevron-right"></i>Backpacks
            </a>    
            <a href="" class="list-group-item pl-5">
              <i class="glyphicon glyphicon-chevron-right"></i>Bags
            </a>
            <a href="" class="list-group-item pl-5">
              <i class="glyphicon glyphicon-chevron-right"></i>Belts
            </a>
            <a href="" class="list-group-item pl-5">
              <i class="glyphicon glyphicon-chevron-right"></i>Caps / Hats
            </a> 
            <a href="" class="list-group-item pl-5">
              <i class="glyphicon glyphicon-chevron-right"></i>Key Chains
            </a>
            <a href="" class="list-group-item pl-5">
              <i class="glyphicon glyphicon-chevron-right"></i>Socks
            </a>
            <a href="" class="list-group-item pl-5">
              <i class="glyphicon glyphicon-chevron-right"></i>Sunglasses
            </a>
            <a href="" class="list-group-item pl-5">
              <i class="glyphicon glyphicon-chevron-right"></i>Wallets
            </a>
          </div>
                      
        </div>
      </div>
    </div>
    <!--/.col -->

    <div class="col-6 mt-3">
      <form class="form-inline" method="POST" action="">
        <div class="form-group mx-sm-3 mb-2">
          <input type="text" class="form-control" id="txtCategory" style="width:240px" placeholder="請輸入要新增的主類別名稱">
        </div>
        <button type="submit" class="btn btn-primary mb-2">新增主類別</button>
      </form>
    </div>
    <!--/.col -->

  </div>
  <!--/.row -->

</div>
<!-- /.container-fluid -->

<?php

require_once 'views/template/footer.php';

?>

<script>
  $(function() {
        
    $('.list-group-item').on('click', function() {
      $('.fas', this)
        .toggleClass('fa-chevron-right')
        .toggleClass('fa-chevron-down');
    });
  
  });
</script>