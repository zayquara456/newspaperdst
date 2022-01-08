<?php
require_once 'models/Model.php';
class News extends Model {
  public function getAll() {
    $sql_select_all = "SELECT news.*,tblcategory.`CategoryName`, tblcategory.`Description` AS category_name FROM news INNER JOIN tblcategory ON news.categoryid =tblcategory.id WHERE `news`.`status` = 1 ORDER BY `news`.`id` DESC";
    $obj_select_all = $this->connection->prepare($sql_select_all);
    $obj_select_all->execute();
    $news = $obj_select_all->fetchAll(PDO::FETCH_ASSOC);
    return $news;
  }

  public function getNewsNearest() {
    $sql = "SELECT news.*, tblcategory.`CategoryName`, tblcategory.`Description` AS category_name FROM news INNER JOIN tblcategory ON news.categoryid =tblcategory.id WHERE `news`.`status` = 1 ORDER BY `news`.`id` DESC Limit 4";
    $obj = $this->connection->prepare($sql);
    $obj->execute();
    $news = $obj->fetchAll(PDO::FETCH_ASSOC);
    return $news;
  }

  public function getNewsById($id){
    $sql = "SELECT n.*, ct.CategoryName AS mamucchinh, ct.Description AS tendmchinh, sct.Subcategory AS mamucphu,
    sct.SubCatDescription AS tendmphu FROM news n
    LEFT JOIN tblcategory ct ON n.categoryid = ct.id
    LEFT JOIN tblsubcategory sct ON n.subcategoryid = sct.SubCategoryId
     WHERE n.`status` = 1 AND n.id = $id";
    $obj = $this->connection->prepare($sql);
    $obj->execute();
    $news = $obj->fetchAll(PDO::FETCH_ASSOC);
    return $news;
  }
  public function countTotal()
    {
        $obj_select = $this->connection->prepare("SELECT COUNT(id) FROM news WHERE status = 1");
        $obj_select->execute();

        return $obj_select->fetchColumn();
    } 
  public function getNewsPagination($arr_params)
  {
      $limit = $arr_params['limit'];
      $page = $arr_params['page'];
      $start = ($page - 1) * $limit;
      $obj_select = $this->connection
          ->prepare("SELECT news.*, tblcategory.`CategoryName`, tblcategory.`Description` AS category_name FROM news INNER JOIN tblcategory ON news.categoryid =tblcategory.id
                      WHERE `news`.`status` = 1
                      ORDER BY `news`.`id` DESC
                      LIMIT $start, $limit");

      $arr_select = [];
      $obj_select->execute($arr_select);
      $phantrang = $obj_select->fetchAll(PDO::FETCH_ASSOC);

      return $phantrang;
  }
}