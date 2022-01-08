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
      "INSERT INTO tblsubcategory(`CategoryId`,`Subcategory`, `SubCatDescription`, `PostingDate`, `Is_Active`)
VALUES (:CategoryId, :Subcategory, :SubCatDescription, :PostingDate, :Is_Active)";
    //cbi đối tượng truy vấn
    $obj_insert = $this->connection
      ->prepare($sql_insert);
    //gán giá trị thật cho các placeholder
    $arr_insert = [
      ':CategoryId' => $this->CategoryId,
      ':Subcategory' => $this->Subcategory,
      ':SubCatDescription' => $this->SubCatDescription,
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
        LEFT JOIN tblcategory ON tblsubcategory.CategoryId = tblcategory.id WHERE tblsubcategory.SubCategoryId = $id");
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
    $obj_update = $this->connection->prepare("UPDATE tblsubcategory SET `CategoryId` = :CategoryId, `Subcategory` = :Subcategory, `SubCatDescription` = :SubCatDescription, `UpdationDate` = :UpdationDate, `Is_Active` = :Is_Active
         WHERE SubCategoryId = $id");
    $arr_update = [
      ':CategoryId' => $this->CategoryId,
      ':Subcategory' => $this->Subcategory,
      ':SubCatDescription' => $this->SubCatDescription,
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
      ->prepare("DELETE FROM tblsubcategory WHERE SubCategoryId = $id");
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
  public function vn_to_str($str){
    $unicode = array( 
    'a'=>'á|à|ả|ã|ạ|ă|ắ|ặ|ằ|ẳ|ẵ|â|ấ|ầ|ẩ|ẫ|ậ', 
    'd'=>'đ',
    'e'=>'é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ',
    'i'=>'í|ì|ỉ|ĩ|ị',
    'o'=>'ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ',
    'u'=>'ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự',
    'y'=>'ý|ỳ|ỷ|ỹ|ỵ',
    'A'=>'Á|À|Ả|Ã|Ạ|Ă|Ắ|Ặ|Ằ|Ẳ|Ẵ|Â|Ấ|Ầ|Ẩ|Ẫ|Ậ',
    'D'=>'Đ',
    'E'=>'É|È|Ẻ|Ẽ|Ẹ|Ê|Ế|Ề|Ể|Ễ|Ệ',
    'I'=>'Í|Ì|Ỉ|Ĩ|Ị',
    'O'=>'Ó|Ò|Ỏ|Õ|Ọ|Ô|Ố|Ồ|Ổ|Ỗ|Ộ|Ơ|Ớ|Ờ|Ở|Ỡ|Ợ',
    'U'=>'Ú|Ù|Ủ|Ũ|Ụ|Ư|Ứ|Ừ|Ử|Ữ|Ự',
    'Y'=>'Ý|Ỳ|Ỷ|Ỹ|Ỵ',
    );
    foreach($unicode as $nonUnicode=>$uni){
    $str = preg_replace("/($uni)/i", $nonUnicode, $str);
    }
    $str = str_replace(' ','',$str);
    return $str;
  }
}