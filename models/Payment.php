<?php

class Payment extends DB {

  public $PaymentID;
  public $PaymentName;
  public $Paymentfee;

  function getAll() {
    return $this->selectDB("SELECT * FROM Payment ;");
  }

  function get($id) {
    return $this->selectDB("SELECT * FROM Payment WHERE PaymentID = ? ;", [$id])[0];
  }

  function create($Payment) {
    return $this->insertDB(
      "INSERT INTO Payment (PaymentName, Description) VALUES (?, ?) ;",
      [$Payment->PaymentName, "$Payment->Description"]
    );
  );
  }

  function update($Payment) {
    return $this->updateDB(
      "UPDATE Payment SET PaymentName = ?, Description = ? WHERE PaymentID = ? ;",
      ["$Payment->PaymentName", "$Payment->Description", $Payment->PaymentID]
    );
  }

  function delete($ids = []) {
    if (empty($ids)) {return "error: ids is empty";}
    return $this->deleteDB(
      "DELETE FROM Payment WHERE PaymentID IN (" . str_repeat("?,", count($ids) - 1) . "?);",
      $ids);
  }

}
