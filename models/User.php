<?php

include("../core/DB.php");


class User extends DB {
  public $id;

  function getAll(){  //read所有user資料
    return $this->select("SELECT * FROM User");
  }

  function getUserById($userId){
    return $this->select("SELECT * FROM User WHERE id = ?",$userId);
  }

  function insertUser($UserAddArray){  //add新增會員
    $UserAddArray = array($UserName,$NickName,$Gender,$Birthdate,$Phone,
    $Email,$Password,$Country,$City,$District,$Address,$PostalCode,$CreateDate);
    //抓user輸入內容為array的value，定義$UserName這些變數是在view裡寫嗎? 
    return $this->select("INSERT INTO User (`UserName`,`NickName`,`Gender`,`Birthdate`,`Phone`,
    `Email`,`Password`,`Country`,`City`,`District`,`Address`,`PostalCode`,`CreateDate`) 
    VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?) ", $UserAddArray);

  }

  function updateUser($UserUpdateArray){  //修改會員
    $UserUpdateArray = array($UserName,$NickName,$Gender,$Birthdate,$Phone,
    $Email,$Password,$Country,$City,$District,$Address,$PostalCode,$CreateDate,$UserID);
    return $this->select("UPDATE User SET `UserName=?`, `NickName=?`,`Gender=?`,`Birthdate=?`,`Phone=?`,
    `Email=?`,`Password=?`,`Country=?`,`City=?`,`District=?`,`Address=?`,`PostalCode=?`,`CreateDate=?` WHERE `UserID=?`",$UserInfoArray);

  }

  function deleteUser($userId){  //刪除會員
    return $this->select("DELETE FROM User WHERE `UserID=?`", $userId);

  }



  
}



$ob = new User; 
//echo $ob -> getAll();
echo $ob -> getUserById($id);

?>
