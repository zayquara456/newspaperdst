<?php
//models/Category
require_once 'models/Model.php';
class Subcate extends Model {
  //khai báo các thuộc tính cho model trùng với các trường
//    của bảng categories
  public $SubCategoryId;
  public $CategoryId;
  public $Subcategory;
  public $SubCatDescription;
  public $PostingDate;
  public $UpdationDate;
  public $Is_Active;

  //insert dữ liệu vào bảng categories
  public function insert() {
    $sql_insert =
      "INSERT INTO tblsubcategory(`CategoryName`, `Description`, `PostingDate`, `Is_Active`)
VALUES (:CategoryName, :Description, :PostingDate, :Is_Active)";
    //cbi đối tượng truy vấn
    $obj_insert = $this->connection
      ->prepare($sql_insert);
    //gán giá trị thật cho các placeholder
    $arr_insert = [
      ':CategoryName' => $this->CategoryName,
      ':Description' => $this->Description,
      ':PostingDate' => $this->PostingDate,
      ':Is_Active' => $this->Is_Active
    ];
    return $obj_insert->execute($arr_insert);
  }

  public function getById($id) {
    $sql_select_one = "SELECT * FROM tblsubcategory WHERE SubCategoryId = $id";
    $obj_select_one = $this->connection
      ->prepare($sql_select_one);
    $obj_select_one->execute();
    $category = $obj_select_one->fetch(PDO::FETCH_ASSOC);
    return $category;
  }

  /**
   * Lấy category theo id truyền vào
   * @param $id
   * @return array
   */
  public function getCategoryById($id)
  {
    $obj_select = $this->connection
      ->prepare("SELECT tblsubcategory.*, tblcategory.Description AS danhmuccha FROM tblsubcategory
        LEFT JOIN tblcategory ON tblsubcategory.CategoryId = tblcategory.id WHERE SubCategoryId = $id");
    $obj_select->execute();
    $category = $obj_select->fetch(PDO::FETCH_ASSOC);

    return $category;
  }

  /**
   * Update bản ghi theo id truyền vào
   * @param $id
   * @return bool
   */
  public function update($id)
  {
    $obj_update = $this->connection->prepare("UPDATE tblsubcategory SET `CategoryName` = :CategoryName, `Description` = :Description, `UpdationDate` = :UpdationDate, `Is_Active` = :Is_Active
         WHERE SubCategoryId = $id");
    $arr_update = [
      ':CategoryName' => $this->CategoryName,
      ':Description' => $this->Description,
      ':UpdationDate' => $this->UpdationDate,
      ':Is_Active' => $this->Is_Active,
    ];

    return $obj_update->execute($arr_update);
  }

  /**
   * Xóa bản ghi theo id truyền vào
   * @param $id
   * @return bool
   */
  public function delete($id)
  {
    $obj_delete = $this->connection
      ->prepare("DELETE FROM tblsubcategory WHERE CategoryId = $id");
    $is_delete = $obj_delete->execute();
    //để đảm bảo toàn vẹn dữ liệu, sau khi xóa category thì cần xóa cả các product nào đang thuộc về category này
    $obj_delete_product = $this->connection
      ->prepare("DELETE FROM news WHERE subcategoryid = $id");
    $obj_delete_product->execute();

    return $is_delete;
  }

  /**
   * Lấy tổng số bản ghi trong bảng categories
   * @return mixed
   */
  public function countTotal()
  {
    $obj_select = $this->connection->prepare("SELECT COUNT(id) FROM tblsubcategory");
    $obj_select->execute();

    return $obj_select->fetchColumn();
  }

  public function getAllPagination($params = [])
  {
    $str_search = 'WHERE TRUE';
    $limit = $params['limit'];
    $page = $params['page'];
    if (isset($params['name']) && !empty($params['name'])) {
      $name = $params['name'];
      //nhớ phải có dấu cách ở đầu chuỗi
      $str_search .= " AND `SubCatDescription` LIKE '%{$name}%'";
    }
    if (isset($params['status'])) {
      $status = $params['status'];
      $str_search .= " AND `Is_Active` = $status";
    }
    $start = ($page - 1) * $limit;
    $obj_select = $this->connection
      ->prepare("SELECT tblsubcategory.*, tblcategory.Description AS danhmuccha FROM tblsubcategory
        LEFT JOIN tblcategory ON tblsubcategory.CategoryId = tblcategory.id
       $str_search LIMIT $start, $limit");

//    do PDO coi tất cả các param luôn là 1 string, nên cần sử dụng bindValue / bindParam cho các tham số start và limit
//        $obj_select->bindParam(':limit', $limit, PDO::PARAM_INT);
//        $obj_select->bindParam(':start', $start, PDO::PARAM_INT);
    $obj_select->execute();
    $categories = $obj_select->fetchAll(PDO::FETCH_ASSOC);

    return $categories;
  }
}