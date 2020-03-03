<?php

class Coupon extends DB
{
  public $CouponName, $CouponCode, $CouponTypeID, $CouponQuantity, $CouponPrice, $CouponPriceCondition, $CouponStartDate, $CouponEndDate, $CouponExpEndDate;
  public $CouponTypeName;
  public $keyword, $sort, $sortnum, $sortName;

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

  function getCouponList($coupon)
  {
    // echo 'cou' . $coupon->keyword . ' ' . $coupon->sort . ' ' . $coupon->sortnum . ' ' . $coupon->sortName;
    $str = $numstr = '';
    if (isset($coupon->keyword)) {
      $str = '\'%' . $coupon->keyword . '%\'';
      $numstr = '\'' . $coupon->keyword . '\'';
    }
    if ($coupon->keyword == null && $coupon->sort == null)
      return $this->selectDB("SELECT Coupon.*, CouponType.CouponTypeName FROM Coupon, CouponType WHERE CouponType.CouponTypeID = Coupon.CouponTypeID");
    else if ($coupon->keyword == null)
      return $this->selectDB("SELECT Coupon.*, CouponType.CouponTypeName FROM Coupon, CouponType WHERE CouponType.CouponTypeID = Coupon.CouponTypeID" . $coupon->sort);
    else
      return $this->selectDB("SELECT Coupon.*, CouponType.CouponTypeName FROM Coupon, CouponType WHERE 
      CouponType.CouponTypeID = Coupon.CouponTypeID and (Coupon.CouponName like " . $str .
        " or Coupon.CouponCode like " . $str . " or Coupon.Quantity like " . $numstr . " or Coupon.Price like " . $numstr .
        " or Coupon.PriceCondition like " . $numstr . " or Coupon.StartDate like " . $str . " or Coupon.EndDate like " . $str . " or Coupon.ExpEndDate like " . $str . ")");
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

  function update($coupon)
  {
    return $this->updateDB(
      "UPDATE Coupon SET CouponTypeID = ?, CouponName = ?, CouponCode = ?, Quantity = ?, Price = ?, PriceCondition = ?, StartDate = ?, EndDate = ?, ExpEndDate = ? WHERE CouponID = ? ;",
      [$coupon->CouponTypeID, "$coupon->CouponName", "$coupon->CouponCode", $coupon->CouponQuantity, $coupon->CouponPrice, $coupon->CouponPriceCondition, "$coupon->CouponStartDate", "$coupon->CouponEndDate", "$coupon->CouponExpEndDate", $coupon->CouponID]
    );
  }

  function delete($ids = [])
  {
    if (empty($ids)) {
      return "error: ids is empty";
    }
    return $this->deleteDB("DELETE FROM Coupon where CouponID IN ("  . str_repeat("?,", count($ids) - 1) . "?);", $ids);
  }
}
