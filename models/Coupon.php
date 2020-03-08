<?php

class Coupon extends DB
{
  public $CouponName, $CouponCode, $CouponTypeID, $CouponQuantity, $CouponPrice, $CouponPriceCondition, $CouponStartDate, $CouponEndDate, $CouponExpEndDate;
  public $CouponTypeName;
  public $keyword, $sort;
  public $CouponID, $UserID;
  public $page, $pagesize;

  function getAll()
  {
    return $this->selectDB("SELECT * FROM Coupon");
  }

  function getCouponDetail($id)
  {
    return $this->selectDB("SELECT Coupon.*, CouponType.CouponTypeName FROM Coupon, CouponType WHERE Coupon.CouponTypeID=CouponType.CouponTypeID and Coupon.CouponID = ?", [$id])[0];
  }

  function getCouponType()
  {
    return $this->selectDB("SELECT * from CouponType");
  }

  function getCouponTypeDetail($id)
  {
    return $this->selectDB("SELECT * FROM CouponType WHERE CouponTypeID = ?", [$id])[0];
  }

  function getCouponList($coupon)
  {
    // echo 'cou' . $coupon->keyword . ' ' . $coupon->sort . ' ' ;
    $str = $numstr = '';
    if (isset($coupon->keyword)) {
      $str = '\'%' . $coupon->keyword . '%\'';
      $numstr = '\'' . $coupon->keyword . '\'';
    }
    if ($coupon->keyword == null && $coupon->sort == null)
      return $this->selectDB("SELECT Coupon.*, CouponType.CouponTypeName FROM Coupon, CouponType WHERE CouponType.CouponTypeID = Coupon.CouponTypeID order by CouponID");
    else if ($coupon->keyword == null)
      return $this->selectDB("SELECT Coupon.*, CouponType.CouponTypeName FROM Coupon, CouponType WHERE CouponType.CouponTypeID = Coupon.CouponTypeID" . $coupon->sort);
    else if ($coupon->sort == null)
      return $this->selectDB("SELECT Coupon.*, CouponType.CouponTypeName FROM Coupon, CouponType WHERE 
      CouponType.CouponTypeID = Coupon.CouponTypeID and (Coupon.CouponName like " . $str .
        " or Coupon.CouponCode like " . $str . " or Coupon.Quantity like " . $numstr . " or Coupon.Price like " . $numstr .
        " or Coupon.PriceCondition like " . $numstr . " or Coupon.StartDate like " . $str . " or Coupon.EndDate like " . $str . " or Coupon.ExpEndDate like " . $str . ")");
    else
      return $this->selectDB("SELECT Coupon.*, CouponType.CouponTypeName FROM Coupon, CouponType WHERE 
      CouponType.CouponTypeID = Coupon.CouponTypeID and (Coupon.CouponName like " . $str .
        " or Coupon.CouponCode like " . $str . " or Coupon.Quantity like " . $numstr . " or Coupon.Price like " . $numstr .
        " or Coupon.PriceCondition like " . $numstr . " or Coupon.StartDate like " . $str . " or Coupon.EndDate like " . $str . " or Coupon.ExpEndDate like " . $str . ")" . $coupon->sort);
  }

  function getCouponUser($id)
  {
    if ($id == 'all')
      return $this->selectDB("SELECT UserCoupon.*, User.UserName, Coupon.CouponName FROM UserCoupon, User, Coupon WHERE Coupon.CouponID = UserCoupon.CouponID and User.UserID = UserCoupon.UserID");
    else
      return $this->selectDB("SELECT UserCoupon.*, User.UserName, Coupon.CouponName FROM UserCoupon, User, Coupon WHERE Coupon.CouponID = UserCoupon.CouponID and User.UserID = UserCoupon.UserID and UserCoupon.CouponID = ?", [$id]);
  }

  function getUserName()
  {
    return $this->selectDB("SELECT * FROM User");
  }

  function getUserById($id)
  {
    return $this->selectDB("SELECT * FROM User WHERE UserID = ? ;", [$id])[0];
  }

  function create($coupon)
  {
    return $this->insertDB(
      "INSERT INTO Coupon(CouponName, CouponTypeID, CouponCode, Quantity, Price, PriceCondition, StartDate, EndDate, ExpEndDate) VALUES (?,?,?,?,?,?,?,?,?) ;",
      [$coupon->CouponName, $coupon->CouponTypeID, $coupon->CouponCode, $coupon->CouponQuantity, $coupon->CouponPrice, $coupon->CouponPriceCondition, $coupon->CouponStartDate, $coupon->CouponEndDate, $coupon->CouponExpEndDate]
    );
  }

  function createCouponType($coupon)
  {
    $str = $this->selectDB("SELECT CouponTypeID FROM CouponType WHERE CouponTypeName = ?", [$coupon->CouponTypeName]);
    if ($str == null)
      return $this->insertDB("INSERT INTO CouponType(CouponTypeName) VALUES (?) ;", [$coupon->CouponTypeName]);
    else
      return 'error';
  }

  function createCouponUser($coupon)
  {
    $str = $this->selectDB("SELECT * FROM UserCoupon WHERE UserID = ? and CouponID = ? ;", [$coupon->UserID, $coupon->CouponID]);
    if ($str == null)
      return $this->insertDB(
        "INSERT INTO UserCoupon(UserID, CouponID) VALUES (?,?) ;",
        [$coupon->UserID, $coupon->CouponID]
      );
    else
      return 'error';
  }

  function update($coupon)
  {
    return $this->updateDB(
      "UPDATE Coupon SET CouponTypeID = ?, CouponName = ?, CouponCode = ?, Quantity = ?, Price = ?, PriceCondition = ?, StartDate = ?, EndDate = ?, ExpEndDate = ? WHERE CouponID = ? ;",
      [$coupon->CouponTypeID, "$coupon->CouponName", "$coupon->CouponCode", $coupon->CouponQuantity, $coupon->CouponPrice, $coupon->CouponPriceCondition, "$coupon->CouponStartDate", "$coupon->CouponEndDate", "$coupon->CouponExpEndDate", $coupon->CouponID]
    );
  }

  function updatetype($coupon)
  {
    $str = $this->selectDB("SELECT CouponTypeID FROM CouponType WHERE CouponTypeName = ? and CouponTypeID != ?", [$coupon->CouponTypeName, $coupon->CouponTypeID]);
    if ($str == null)
      return $this->updateDB(
        "UPDATE CouponType SET CouponTypeName = ? WHERE CouponTypeID = ? ;",
        ["$coupon->CouponTypeName", $coupon->CouponTypeID]
      );
    else
      return 'error';
  }

  function delete($ids = [])
  {
    if (empty($ids)) {
      return "error: ids is empty";
    }
    foreach ($ids as $id) {
      $this->insertDB("DELETE FROM UserCoupon where CouponID = ?", [$id]);
    }
    return $this->deleteDB("DELETE FROM Coupon where CouponID IN ("  . str_repeat("?,", count($ids) - 1) . "?);", $ids);
  }

  function deleteType($ids = [])
  {
    $this->deleteDB("DELETE FROM Coupon where CouponTypeID IN ("  . str_repeat("?,", count($ids) - 1) . "?);", $ids);
    return $this->deleteDB("DELETE FROM CouponType where CouponTypeID IN ("  . str_repeat("?,", count($ids) - 1) . "?);", $ids);
  }

  function deleteUser($users = [], $coupons = [])
  {
    for ($i = 0; $i < sizeof($users); $i++) {
      echo $users[$i] . ' ' . $coupons[$i];
      //delete 借用insertDB刪除單筆資料
      $this->insertDB("DELETE FROM UserCoupon where UserID = ? and CouponID = ?", [$users[$i], $coupons[$i]]);
    }
  }
}
