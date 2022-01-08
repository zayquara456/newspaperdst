<?php
//views/homes/index.php
require_once 'helpers/Helper.php';
?>
<div class="main-container container pt-24" id="main-container">         
      <!-- Content Secondary -->
      <div class="row">

        <!-- Posts -->
        <div class="col-lg-8 blog__content mb-72">

          <!-- Worldwide News -->
          <section class="section">
            <div class="title-wrap title-wrap--line">
              <h3 class="section-title">Tin tức cập nhật</h3>
            </div>
             <?php if(!empty($news)){
                foreach($news as $items){ 
                    $slug = Helper::getSlug($items['title']);
                    $items_link = "tt-$slug/" . $items['id'] . ".html";?>
            <article class="entry card post-list">
              <div class="entry__img-holder post-list__img-holder card__img-holder" style="background-image: url(../backend/assets/images/<?php echo $items['avatar'] ?>)">
                <a href="<?php echo $items_link; ?>" class="thumb-url"></a>
                <img src="../backend/assets/images/<?php echo $items['avatar'] ?>"
                                    title="<?php echo $items['title'] ?>"
                                    alt="<?php echo $items['title'] ?>" class="entry__img d-none">
                <a href="danhmuc<?php echo $items['CategoryName'] ?>.html" class="entry__meta-category entry__meta-category--label entry__meta-category--align-in-corner entry__meta-category--blue"><?php echo $items['category_name'] ?></a>
              </div>

              <div class="entry__body post-list__body card__body">
                <div class="entry__header">
                  <h2 class="entry__title">
                    <a href="<?php echo $items_link; ?>"><?php echo $items['title'] ?></a>
                  </h2>
                  <ul class="entry__meta">
                    <li class="entry__meta-date">
                     <?php echo $items['created_at'] ?>
                    </li>
                  </ul>
                </div>        
                <div class="entry__excerpt">
                  <p><?php echo $items['summary'] ?></p>
                </div>
              </div>
            </article>
             <?php } } ?>
          </section> <!-- end worldwide news -->
          <?php echo $pages; ?>
        </div> <!-- end posts -->

        <!-- Sidebar 1 -->
        <aside class="col-lg-4 sidebar sidebar--1 sidebar--right">

          <!-- Widget Ad 300 -->
          <aside class="widget widget_media_image">
            <a href="#">
              <img src="assets/img/content/placeholder_336.jpg" alt="">
            </a>
          </aside> <!-- end widget ad 300 -->
          
          <!-- Widget Categories -->
          <aside class="widget widget_categories">
            <h4 class="widget-title">Danh mục</h4>
            <ul>
            <?php if(!empty($categories)){
                    foreach($categories as $danhmuc){?>
              <li><a href="danhmuc<?php echo $danhmuc['CategoryName'] ?>.html"><?php echo $danhmuc['Description'] ?></a></li>
          <?php } } ?>
            </ul>
          </aside> <!-- end widget categories -->

          <!-- Widget Recommended (Rating) -->
          <aside class="widget widget-rating-posts">
            <h4 class="widget-title">Xem nhiều</h4>
            <?php $i = 0; if(!empty($news)){
                foreach($news as $items){ 
                    $slug = Helper::getSlug($items['title']);
                    $items_link = "tt-$slug/" . $items['id'] . ".html";
                   if ($i < 4 ) { $i++; ?>
            <article class="entry">
              <div class="entry__img-holder">
                <a href="<?php echo $items_link; ?>">
                  <div class="thumb-container thumb-60">
                    <img data-src="../backend/assets/images/<?php echo $items['avatar'] ?>" src="assets/img/empty.png" class="entry__img lazyload" alt="">
                  </div>
                </a>
              </div>

              <div class="entry__body">
                <div class="entry__header">
                  
                  <h2 class="entry__title">
                    <a href="<?php echo $items_link; ?>"><?php echo $items['title'] ?></a>
                  </h2>
                  <ul class="entry__meta">
                    <li class="entry__meta-date">
                      <?php echo $items['created_at'] ?>
                    </li>
                  </ul>
                </div>
              </div>
            </article>
        <?php } } } ?>
          </aside> <!-- end widget recommended (rating) -->
        </aside> <!-- end sidebar 1 -->
      </div> <!-- content secondary -->      
      

    </div> <!-- end main container -->