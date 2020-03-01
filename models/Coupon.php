<?php

class Coupon extends DB
{
  // public $id;

  function getAll()
  {
    return $this->selectDB("SELECT * FROM Coupon");
  }

  function getCouponList($keyword)
  {
    if ($keyword == null)
      return $this->selectDB("SELECT Coupon.*, CouponType.CouponTypeName FROM Coupon, CouponType WHERE CouponType.CouponTypeID = Coupon.CouponTypeID");
    else
      return $this->selectDB("SELECT Coupon.*, CouponType.CouponTypeName FROM Coupon, CouponType WHERE CouponType.CouponTypeID = Coupon.CouponTypeID and Coupon.CounponName like '%?%'", $keyword);
  }

  function create()
  {
  }

  function update($id)
  {
  }

  function delete($ids = [])
  {
    if (empty($ids)) {
      return "error: ids is empty";
    }
    return $this->deleteDB("DELETE FROM Coupon where CouponID IN ("  . str_repeat("?,", count($ids) - 1) . "?);",$ids);
  }
}
