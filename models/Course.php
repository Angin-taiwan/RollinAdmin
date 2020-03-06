<?php

class Course extends DB
{

  function getAll()
  {
    return $this->selectDB("SELECT * FROM Course");
  }

  function getCourseByID($id)
  {
    return $this->selectDB("SELECT * FROM Course WHERE CourseID = ? ;", [$id])[0];
  }

  function create($Course)
  {
    return $this->insertDB(
      "INSERT INTO Course (Title, Description , StartDate , EndDate , CreateDate , UpdateDate , Price) VALUES (?, ?, ?, ?, NOW(), NOW(), ? ) ;",
      ["$Course->Title", "$Course->Description", "$Course->StartDate", "$Course->EndDate", "$Course->Price"]
    );
  }

  function update($Course)
  {
    return $this->updateDB(
      "UPDATE Course SET Title = ? , StartDate  = ? , EndDate = ? , UpdateDate = NOW() , Description = ? , Price = ? WHERE CourseID = ? ;",
      ["$Course->Title", "$Course->StartDate", "$Course->EndDate", "$Course->Description", "$Course->Price", $Course->CourseID]
    );
  }

  function delete($ids = [])
  {
    if (empty($ids)) {
      return "error: ids is empty";
    }
    echo "wwwwwwwwwwwww";
    return $this->deleteDB(
      "DELETE FROM Course WHERE CourseID IN (" . str_repeat("?,", count($ids) - 1) . "?);",
      $ids
    );
  }

  function search($searchTerm)
  {
    return $this->selectDB("SELECT * FROM News WHERE Title LIKE '%$searchTerm%' ");
    // ["$news->searchTerm"];
  }

  function getAllCount()
  {
    return $this->selectDB(
      "SELECT COUNT(*) as Total FROM Course;"  // 總共有幾筆資料
    )[0];
  }

  function getAllPage($startIndex = 0, $pageSize = 3)
  {  //從 0 筆開始 每頁3筆資料
    return $this->selectDB(
      "SELECT * FROM Course ORDER BY CourseID ASC LIMIT ?, ? ;",
      [$startIndex, $pageSize]
    );
  }

  function getAllLikeCount($Title)
  {  //  COUNT(*) 回傳 資料筆數   ,  LIKE 後 變成  收尋 Title 回傳的資料筆數
    return $this->selectDB(
      "SELECT COUNT(*) Count FROM Course WHERE Title LIKE CONCAT('%',?,'%') ;",
      [$Title]
    )[0];
  }

  function getAllLike($Title, $startIndex = 0, $pageSize = 3)
  {  // concat函數用來合併多個欄位的值
    return $this->selectDB(
      "SELECT * FROM Course WHERE Title LIKE CONCAT('%',?,'%') ORDER BY CourseID ASC LIMIT ?, ? ;",
      [$Title, $startIndex, $pageSize]
    );
  }

  function getCourseUserID($CourseID)
  {
    return $this->selectDB(
      "SELECT UserID FROM rollin.Student WHERE CourseID = $CourseID;"
    );
  }

  function getCourseUserName($CourseID)
  {
    return $this->selectDB(
      "SELECT UserName FROM rollin.Student WHERE CourseID = $CourseID;"
    );
  }

  function AllStudent($id)
  {
    return $this->selectDB("SELECT * FROM Student WHERE CourseID = ? ;", [$id]);
  }

  function StudentName($id)
  {
    return $this->selectDB(
      "SELECT Student.CourseID , Course.Title , User.UserID, User.UserName FROM Student JOIN User ON Student.UserID = User.UserID JOIN Course ON Student.CourseID = Course.CourseID WHERE Student.CourseID = ? ;",[$id]
    );
  }

  function deleteStudent($ids = [])
  {
    if (empty($ids)) {
      return "error: ids is empty";
    }
    return $this->deleteDB(
      "DELETE FROM Student WHERE UserID IN (" . str_repeat("?,", count($ids) - 1) . "?);",
      $ids
    );
  }

  function getAllCountStudent() {
    return $this->selectDB(
      "SELECT COUNT(*) as Total FROM Student;"  // 總共有幾筆資料
    )[0];
  }

}
//SELECT u.UserID, u.UserName   合併TABLE欄位 JOIN
// FROM Student s
// JOIN User u
// ON s.UserID = u.UserID
// WHERE s.CourseID = 1;

//SELECT s.CourseID,c.Title , u.UserID, u.UserName FROM Student s JOIN User u ON s.UserID = u.UserID JOIN Course c ON s.CourseID = c.CourseID WHERE s.CourseID = 1
