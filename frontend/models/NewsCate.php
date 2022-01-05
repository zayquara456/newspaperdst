<?php
require_once 'models/Model.php';
class NewsCate extends Model {
 
  public function getByNameCate($a)
  {
    $obj_select = $this->connection
      ->prepare("SELECT CategoryName, Description FROM tblcategory WHERE CategoryName = '$a'");

    $obj_select->execute();
    $product =  $obj_select->fetch(PDO::FETCH_ASSOC);
    return $product;
  }
	
	public function getAllPagination($arr_params,$a)
  {
      $limit = $arr_params['limit'];
      $page = $arr_params['page'];
      $start = ($page - 1) * $limit;
      $obj_select = $this->connection
          ->prepare("SELECT news.*, tblcategory.Description AS category_name FROM news 
                      INNER JOIN tblcategory ON tblcategory.id = news.categoryid
                      WHERE tblcategory.CategoryName = '$a'
                      ORDER BY news.updated_at DESC, news.created_at DESC
                      LIMIT $start, $limit");

      $arr_select = [];
      $obj_select->execute($arr_select);
      $products = $obj_select->fetchAll(PDO::FETCH_ASSOC);

      return $products;
  }

    /**
     * Tính tổng số bản ghi đang có trong bảng products
     * @return mixed
     */
    public function countTotal($a)
    {
        $obj_select = $this->connection->prepare("SELECT COUNT(id) tblcategory.CategoryName AS category_name FROM news 
                      INNER JOIN tblcategory ON tblcategory.id = news.categoryid WHERE tblcategory.CategoryName = $a");
        $obj_select->execute();

        return $obj_select->fetchColumn();
    }
}

