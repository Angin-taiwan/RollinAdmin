<?php

class Admin extends DB {

  function getAllCount() {
    return $this->selectDB(
      "SELECT
      (SELECT COUNT(*) FROM News)      AS NewsCount,
      (SELECT COUNT(*) FROM Course)    AS CourseCount,
      (SELECT COUNT(*) FROM User)      AS UserCount,
      (SELECT COUNT(*) FROM Product)   AS ProductCount,
      (SELECT COUNT(*) FROM `Order`)   AS OrderCount,
      (SELECT COUNT(*) FROM Coupon)    AS CouponCount,
      (SELECT COUNT(*) FROM Marketing) AS MarketingCount,
      (SELECT COUNT(*) FROM Brand)     AS BrandCount,
      (SELECT COUNT(*) FROM Category WHERE ParentID IS NULL)  AS CategoryCount,
      (SELECT COUNT(*) FROM Category WHERE ParentID IS NOT NULL)  AS SubCategoryCount;"
    );
  }
}

?>
