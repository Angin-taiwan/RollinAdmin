<?php

$pageDir = "Order";
$pageTitle = "Order Detail";

$Orders = $data->getOrderById($data->id); 

require_once 'views/template/header.php';

?>

<style>
*{
  font-family: 微軟正黑體;
}
</style>


<div class="container-fluid">
  <div class="col-md-8 mx-auto">
    <div class="card p-1">
      <div class="card-body">
        <table class="table table-bordered table-hover">
          <thead class="table-info">
            <tr>
              <th>OrderID</th>
              <th><?= $Orders->OrderID?></th>
            </tr>
          </thead>
          <tbody></tbody>
            <tr>
              <td>MemberName</td>
              <td><?= $Orders->UserName?></td>            
            </tr>
            <tr>
              <td>Email</td>
              <td><?= $Orders->Email?></td>            
            </tr>
            <tr>
              <td>Recipient</td>
              <td><?= $Orders->RecipientName?></td>            
            </tr>
            <tr>
              <td>RecipientPhone</td>
              <td><?= $Orders->RecipientPhone?></td>            
            </tr>
            <tr>
              <td>RecipientCountry</td>
              <td><?= $Orders->RecipientCountry?></td>            
            </tr>
            <tr>
              <td>RecipientPost</td>
              <td><?= $Orders->RecipientPostalCode?></td>            
            </tr>
            <tr>
              <td>Address</td>
              <td><?= $Orders->RecipientCity?><?= $Orders->RecipientDistrict?><?= $Orders->RecipientAddress?></td>            
            </tr>
            <tr>
              <td>Product</td>
              <td><?= $Orders->ProductName?></td>            
            </tr>
            <tr>
              <td>UnitPirce</td>
              <td><?= $Orders->UnitPrice?></td>            
            </tr>
            <tr>
              <td>Quantity</td>
              <td><?= $Orders->Quantity?></td>            
            </tr>
            <tr>
              <td>Shipping</td>
              <td><?= $Orders->ShippingName?></td>            
            </tr>
            <tr>
              <td>ShippingPrice</td>
              <td><?= $Orders->ShippingPrice?></td>            
            </tr>           <tr>
              <td>Coupon</td>
              <td>0</td>
               <!-- 之後再連Coupon資料 -->
              <td>FinalPrice</td>
              <td>2640</td>
            </tr>
 
            
          </tbody>
        </table>
        <span class="float-right mt-4">
          <a class="btn btn-secondary" href="/RollinAdmin/User/List/">返回表單</a>
          <a class="btn btn-secondary" href="">修改</a>
        </span>
      </div>
    </div>  
  </div>

</div>
  







<?php

require_once 'views/template/footer.php';

?>