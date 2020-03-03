<?php

class Course extends DB{

  function getAll()
  {
    return $this->selectDB("SELECT * FROM Course");
  }

  function getNewsByID($id)
  {
    return $this->selectDB("SELECT * FROM Course WHERE CourseID = ? ;", [$id])[0];
  }

  function create($Course)
  {
    return $this->insertDB(
      "INSERT INTO Course (Title, Description , StartDate , EndDate , CreateDate , UpdateDate , Price) VALUES (?, ?, ?, ?, ?, ?, ?) ;",
      ["$Course->Title", "$Course->Description","$Course->StartDate","$Course->EndDateDate", "$Course->CreateDate", "$Course->UpdateDate",
      "$Course->Price"]
    );
  }

  function update($Course)
  {
    return $this->updateDB(
      "UPDATE Course SET Title = ? , StartDate  = ? , EndDate = ? , CreateDate = ? , UpdateDate = ? , Description = ? , Price = ? WHERE CourseID = ? ;",
      ["$Course->Title" , "$Course->StartDate" , "$Course->EndDate" , "$Course->CreateDate" , "$Course->UpdateDate" , "$Course->Description" ,
       "$Course->Price" , $Course->CourseID]
    );
  }

  function delete($ids = []) {
    if (empty($ids)) {return "error: ids is empty";}
    return $this->deleteDB(
      "DELETE FROM Course WHERE CourseID IN (" . str_repeat("?,", count($ids) -1) . "?);",
      $ids);
  }

}

?>
