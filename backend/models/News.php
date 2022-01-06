<?php
require_once 'models/Model.php';

class News extends Model
{

    public $id;
    public $title;
    public $summary;
    public $content;
    public $avatar;
    public $categoryid;
    public $subcategoryid;
    public $status;
    public $seo_title;
    public $seo_description;
    public $seo_keywords;
    public $created_at;
    public $updated_at;
    /*
     * Chuỗi search, sinh tự động dựa vào tham số GET trên Url
     */
    public $str_search = '';

    public function __construct()
    {
        parent::__construct();
        if (isset($_GET['title']) && !empty($_GET['title'])) {
            $this->str_search .= " AND news.title LIKE '%{$_GET['title']}%'";
        }
        if (isset($_GET['categoryid']) && !empty($_GET['categoryid'])) {
            $this->str_search .= " AND news.categoryid = {$_GET['categoryid']}";
        }
    }

    /**
     * Lấy thông tin của sản phẩm đang có trên hệ thống
     * @return array
     */
    public function getAll()
    {
        $obj_select = $this->connection
            ->prepare("SELECT news.*, tblcategory.Description AS category_name, tblsubcategory.SubCatDescription AS subcate_name FROM news 
                        LEFT JOIN tblcategory ON tblcategory.id = news.categoryid
                        LEFT JOIN tblsubcategory ON tblsubcategory.SubCategoryId = news.subcategoryid
                        WHERE TRUE $this->str_search
                        ORDER BY news.created_at DESC
                        ");

        $arr_select = [];
        $obj_select->execute($arr_select);
        $products = $obj_select->fetchAll(PDO::FETCH_ASSOC);

        return $products;
    }

    /**
     * Lấy thông tin của sản phẩm đang có trên hệ thống
     * @param array Mảng các tham số phân trang
     * @return array
     */
    public function getAllPagination($arr_params)
    {
        $limit = $arr_params['limit'];
        $page = $arr_params['page'];
        $start = ($page - 1) * $limit;
        $obj_select = $this->connection
            ->prepare("SELECT news.*, tblcategory.Description AS category_name, tblsubcategory.SubCatDescription AS subcate_name FROM news 
                        LEFT JOIN tblcategory ON tblcategory.id = news.categoryid
                        LEFT JOIN tblsubcategory ON tblsubcategory.SubCategoryId = news.subcategoryid
                        WHERE TRUE $this->str_search
                        ORDER BY news.updated_at DESC, news.id DESC
                        LIMIT $start, $limit
                        ");

        $arr_select = [];
        $obj_select->execute($arr_select);
        $products = $obj_select->fetchAll(PDO::FETCH_ASSOC);

        return $products;
    }

    /**
     * Tính tổng số bản ghi đang có trong bảng products
     * @return mixed
     */
    public function countTotal()
    {
        $obj_select = $this->connection->prepare("SELECT COUNT(id) FROM news WHERE TRUE $this->str_search");
        $obj_select->execute();

        return $obj_select->fetchColumn();
    }

    /**
     * Insert dữ liệu vào bảng news
     * @return bool
     */
    public function insert()
    {
        $obj_insert = $this->connection
            ->prepare("INSERT INTO news(title, summary, content, avatar, categoryid, subcategoryid, status, seo_title, seo_description, seo_keywords, created_at) 
                                VALUES (:title, :summary, :content, :avatar, :categoryid, :subcategoryid, :status, :seo_title, :seo_description, :seo_keywords, :created_at)");
        $arr_insert = [
            ':title' => $this->title,
            ':summary' => $this->summary,
            ':content' => $this->content,
            ':avatar' => $this->avatar,
            ':categoryid' => $this->categoryid,
            ':subcategoryid' => $this->subcategoryid,
            ':status' => $this->status,
            ':seo_title' => $this->seo_title,
            ':seo_description' => $this->seo_description,
            ':seo_keywords' => $this->seo_keywords,
            ':created_at' => $this->created_at,
        ];
        return $obj_insert->execute($arr_insert);
    }

    /**
     * Lấy thông tin sản phẩm theo id
     * @param $id
     * @return mixed
     */
    public function getById($id)
    {
        $obj_select = $this->connection
            ->prepare("SELECT news.*, tblcategory.Description AS category_name, tblsubcategory.SubCatDescription AS subcate_name FROM news 
                        LEFT JOIN tblcategory ON tblcategory.id = news.categoryid
                        LEFT JOIN tblsubcategory ON tblsubcategory.SubCategoryId = news.subcategoryid WHERE news.id = $id");
        $obj_select->execute();
        return $obj_select->fetch(PDO::FETCH_ASSOC);
    }


    public function update($id)
    {
        $obj_update = $this->connection
            ->prepare("UPDATE news SET title=:title, summary=:summary, content=:content, avatar=:avatar,categoryid=:categoryid,subcategoryid=:subcategoryid, status=:status, seo_title=:seo_title, seo_description=:seo_description, seo_keywords=:seo_keywords, updated_at=:updated_at WHERE id = $id
");
        $arr_update = [
            ':title' => $this->title,
            ':summary' => $this->summary,
            ':content' => $this->content,
            ':avatar' => $this->avatar,
            ':categoryid' => $this->categoryid,
            ':subcategoryid' => $this->subcategoryid,
            ':status' => $this->status,
            ':seo_title' => $this->seo_title,
            ':seo_description' => $this->seo_description,
            ':seo_keywords' => $this->seo_keywords,
            ':updated_at' => $this->updated_at,
        ];
        return $obj_update->execute($arr_update);
    }

    public function delete($id)
    {
        $obj_delete = $this->connection
            ->prepare("DELETE FROM news WHERE id = $id");
        return $obj_delete->execute();
    }
}