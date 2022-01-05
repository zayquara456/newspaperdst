<?php
require_once 'models/Model.php';
class Category extends Model {

  public function getAll() {
    $sql_select_all = "SELECT * FROM tblcategory WHERE `Is_Active` = 1";
    $obj_select_all = $this->connection->prepare($sql_select_all);
    $obj_select_all->execute();
    $categories = $obj_select_all->fetchAll(PDO::FETCH_ASSOC);
    return $categories;
  }
  public function getCateByName($name)
  {
    $sql_select_all = "SELECT * FROM tblcategory WHERE `Is_Active` = 1 AND `CategoryName` = $name ";
    $obj_select_all = $this->connection->prepare($sql_select_all);
    $obj_select_all->execute();
    $categories = $obj_select_all->fetchAll(PDO::FETCH_ASSOC);
    return $categories;
  }
  public function getSubCateByName($name)
  {
    $sql_select_all = "SELECT * FROM tblcategory WHERE `Is_Active` = 1 AND `CategoryName` = $name ";
    $obj_select_all = $this->connection->prepare($sql_select_all);
    $obj_select_all->execute();
    $categories = $obj_select_all->fetchAll(PDO::FETCH_ASSOC);
    return $categories;
  }
  public function get4Cate($name)
  {
    $sql_select_all = "SELECT * FROM `tblsubcategory` WHERE `Is_Active` = 1 AND `SubCategoryId` IN ($name) LIMIT 4 ";
    $obj_select_all = $this->connection->prepare($sql_select_all);
    $obj_select_all->execute();
    $categories = $obj_select_all->fetchAll(PDO::FETCH_ASSOC);
    return $categories;
  }
}