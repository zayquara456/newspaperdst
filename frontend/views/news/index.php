<?php
//views/homes/index.php
require_once 'helpers/Helper.php';
?>
<!--NEWS-->
<div class="news-wrap">
    <div class="news container">
        <h1 class="post-list-title">
            <a href="/news.html" class="link-category-item">Tin tức</a>
        </h1>
        <div class="row">
            <?php if(!empty($news)){
                foreach($news as $items){ 
                    $slug = Helper::getSlug($items['title']);
                    $items_link = "chi-tiet-news/$slug/" . $items['id'] . ".html";?>
                    <div class="col-md-4 col-sm-4 col-xs-12 category-two-item">
                        <a href="<?php echo $items_link; ?>" class="two-item-link-heading">
                            <span class="new-image-content">
                                <img src="../backend/assets/images/<?php echo $items['avatar'] ?>"
                                    title="<?php echo $items['title'] ?>"
                                    alt="<?php echo $items['title'] ?>"
                                    class="post-image-avatar img-responsive">
                            </span>
                        </a>
                        <div class="news-content-wrap">
                            <h3 class="category-heading timeline-post-title">
                                <a href="<?php echo $items_link; ?>"><?php echo $items['title'] ?></a>
                            </h3>
                            <div class="news-description"><?php echo $items['summary'] ?></div>
                        </div>
                    </div>
                <?php }
            } ?>
        </div>
    </div>
</div>
<!--END NEWS-->