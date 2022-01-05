<?php
//views/homes/index.php
require_once 'helpers/Helper.php';
?>

  <!-- Trending Now -->
    <div class="container">
      <div class="trending-now">
        <span class="trending-now__label">
          <i class="ui-flash"></i>
        Tin vắn</span>
        <div class="newsticker">
          <ul class="newsticker__list">
            <?php if(!empty($news)){
                foreach($news as $items){ 
                    $slug = Helper::getSlug($items['title']);
                    $items_link = "tt-$slug/" . $items['id'] . ".html";?>
            <li class="newsticker__item"><a href="<?php echo $items_link; ?>" class="newsticker__item-url"><?php echo $items['title'] ?></a></li>
             <?php }
            } ?>   
          </ul>
        </div>
        <div class="newsticker-buttons">
          <button class="newsticker-button newsticker-button--prev" id="newsticker-button--prev" aria-label="next article"><i class="ui-arrow-left"></i></button>
          <button class="newsticker-button newsticker-button--next" id="newsticker-button--next" aria-label="previous article"><i class="ui-arrow-right"></i></button>
        </div>
      </div>
    </div>
   <section class="featured-posts-grid">
      <div class="container">
        <div class="row row-8">
          <div class="col-lg-6">
             <!-- Small post -->
                <?php $i1 = 0; if(!empty($news)){
                foreach($news as $items){ 
                    $slug = Helper::getSlug($items['title']);
                    $items_link = "tt-$slug/" . $items['id'] . ".html";
                    if ($i1 < 3){ $i1++;?>
            <div class="featured-posts-grid__item featured-posts-grid__item--sm">
              <article class="entry card post-list featured-posts-grid__entry">
                <div class="entry__img-holder post-list__img-holder card__img-holder" style="background-image: url(../backend/assets/images/<?php echo $items['avatar'] ?>)">
                  <a href="<?php echo $items_link; ?>" class="thumb-url"></a>
                  <img src="../backend/assets/images/<?php echo $items['avatar'] ?>"
                                    title="<?php echo $items['title'] ?>"
                                    alt="<?php echo $items['title'] ?>" class="entry__img d-none">
                  <a href="danhmuc<?php echo $items['CategoryName']; ?>.html" class="entry__meta-category entry__meta-category--label entry__meta-category--align-in-corner entry__meta-category--violet"><?php echo $items['category_name'] ?></a>
                </div>

                <div class="entry__body post-list__body card__body">  
                  <h2 class="entry__title">
                    <a href="<?php echo $items_link; ?>"><?php echo $items['title'] ?></a>
                  </h2>
                  <ul class="entry__meta">
                    <li class="entry__meta-date">
                     <?php echo $items['created_at'] ?>
                    </li>              
                  </ul>
                </div>
              </article>
            </div> <!-- end post -->
             <?php }
             else if ($i1 == 3) {$i1++;  ?>
                  </div>
                <div class="col-lg-6">
              <!-- Large post -->
            <div class="featured-posts-grid__item featured-posts-grid__item--lg">
              <article class="entry card featured-posts-grid__entry">
                <div class="entry__img-holder card__img-holder">
                  <a href="<?php echo $items_link; ?>">
                    <img src="../backend/assets/images/<?php echo $items['avatar'] ?>"
                                    title="<?php echo $items['title'] ?>"
                                    alt="<?php echo $items['title'] ?>" class="entry__img">
                  </a>
                  <a href="danhmuc<?php echo $items['CategoryName']; ?>.html" class="entry__meta-category entry__meta-category--label entry__meta-category--align-in-corner entry__meta-category--green"><?php echo $items['category_name'] ?></a>
                </div>

                <div class="entry__body card__body">   
                  <h2 class="entry__title">
                    <a href="<?php echo $items_link; ?>"><?php echo $items['title'] ?></a>
                  </h2>
                  <ul class="entry__meta">
                    <li class="entry__meta-date">
                      <?php echo $items['created_at'] ?>
                    </li>              
                  </ul>
                </div>
              </article>
            </div> <!-- end large post -->   
        </div>
              <?php };
            }
            } ?>
            </div>   
      </div>
    </section>
    <div class="main-container container pt-24" id="main-container">         
      <div class="row">
        <div class="col-lg-8 blog__content">
            <section class="section tab-post mb-16">
                <div class="title-wrap title-wrap--line">
              <h3 class="section-title">Tin mới nhất</h3>

              <div class="tabs tab-post__tabs"> 
                <ul class="tabs__list">
                  <li class="tabs__item tabs__item--active">
                    <a href="#tab-all" class="tabs__trigger">All</a>
                  </li>
                  <?php $i2 = 0; if(!empty($categories)){
                    foreach($categories as $items){
                    if ($i2 < 4) {$i2++;?>
                  <li class="tabs__item">
                    <a href="#<?php echo $items['CategoryName'] ?>" class="tabs__trigger"><?php echo $items['Description'] ?></a>
                  </li>
                    <?php }}
                } ?>
                </ul> <!-- end tabs -->
              </div>
            </div>
            <div class="tabs__content tabs__content-trigger tab-post__tabs-content">
                <div class="tabs__content-pane tabs__content-pane--active" id="tab-all">
                <div class="row card-row">
                     <?php $i = 0; if(!empty($tinmoinhat)){
                foreach($tinmoinhat as $items){ 
                    $slug = Helper::getSlug($items['title']);
                    $items_link = "tt-$slug/" . $items['id'] . ".html";
                    if ($i < 4) { $i++;?>
                  <div class="col-md-6">
                    <article class="entry card">
                      <div class="entry__img-holder card__img-holder">
                        <a href="<?php echo $items_link; ?>">
                          <div class="thumb-container thumb-70">
                            <img data-src="../backend/assets/images/<?php echo $items['avatar'] ?>" src="assets/img/empty.png" class="entry__img lazyload" alt="" />
                          </div>
                        </a>
                        <a href="danhmuc<?php echo $items['CategoryName']; ?>.html" class="entry__meta-category entry__meta-category--label entry__meta-category--align-in-corner entry__meta-category--violet"><?php echo $items['category_name'] ?></a>
                      </div>

                      <div class="entry__body card__body">
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
                  </div>
                  <?php } }
            } ?>
                </div>
              </div> <!-- end pane 1 -->
              <?php $i2 = 0; if(!empty($categories)){
                    foreach($categories as $danhmuc){
                    if ($i2 < 4) {$i2++;?>
              <div class="tabs__content-pane" id="<?php echo $danhmuc['CategoryName'] ?>">
                <div class="row card-row">
                     <?php $i = 0; if(!empty($tinmoinhat)){
                foreach($tinmoinhat as $items){ 
                    $slug = Helper::getSlug($items['title']);
                    $items_link = "tt-$slug/" . $items['id'] . ".html";
                    if ($items['categoryid'] == $danhmuc['id'] && $i < 4) { $i++;?>
                  <div class="col-md-6">
                    <article class="entry card">
                      <div class="entry__img-holder card__img-holder">
                        <a href="<?php echo $items_link; ?>">
                          <div class="thumb-container thumb-70">
                            <img data-src="../backend/assets/images/<?php echo $items['avatar'] ?>" src="assets/img/empty.png" class="entry__img lazyload" alt="" />
                          </div>
                        </a>
                        <a href="danhmuc<?php echo $items['CategoryName']; ?>.html" class="entry__meta-category entry__meta-category--label entry__meta-category--align-in-corner entry__meta-category--orange"><?php echo $items['category_name'] ?></a>
                      </div>

                      <div class="entry__body card__body">
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
                  </div>
                  <?php } }
            } ?>                 
                </div>
              </div> <!-- end pane  -->
          <?php }}} ?>
                  </div> <!-- end tab content -->            
          </section> <!-- end latest news -->
        </div> <!-- end posts -->
<!-- Sidebar -->
        <aside class="col-lg-4 sidebar sidebar--right">

          <!-- Widget Popular Posts -->
          <aside class="widget widget-popular-posts">
            <h4 class="widget-title">Bài viết phổ biến</h4>
            <ul class="post-list-small">
                 <?php $i = 0; if(!empty($tinmoinhat)){
                foreach($tinmoinhat as $items){ 
                    $slug = Helper::getSlug($items['title']);
                    $items_link = "tt-$slug/" . $items['id'] . ".html";
                    if ($i < 4) { $i++;?>
              <li class="post-list-small__item">
                <article class="post-list-small__entry clearfix">
                  <div class="post-list-small__img-holder">
                    <div class="thumb-container thumb-100">
                      <a href="<?php echo $items_link; ?>">
                        <img data-src="../backend/assets/images/<?php echo $items['avatar'] ?>" src="img/empty.png" alt="" class="post-list-small__img--rounded lazyload">
                      </a>
                    </div>
                  </div>
                  <div class="post-list-small__body">
                    <h3 class="post-list-small__entry-title">
                      <a href="<?php echo $items_link; ?>"><?php echo $items['title'] ?></a>
                    </h3>
                    <ul class="entry__meta">
                      <li class="entry__meta-date">
                        <?php echo $items['created_at'] ?>
                      </li>
                    </ul>
                  </div>                  
                </article>
              </li>
               <?php } }
            } ?>
            
           
            </ul>           
          </aside> <!-- end widget popular posts -->

          <!-- Widget Newsletter -->
          <aside class="widget widget_mc4wp_form_widget">
            <h4 class="widget-title">Bản tin</h4>
            <p class="newsletter__text">
              <i class="ui-email newsletter__icon"></i>
              Đăng kí để nhận tin mỗi ngày
            </p>
            <form class="mc4wp-form" method="post">
              <div class="mc4wp-form-fields">
                <div class="form-group">
                  <input type="email" name="EMAIL" placeholder="Your email" required="">
                </div>
                <div class="form-group">
                  <input type="submit" class="btn btn-lg btn-color" value="Sign Up">
                </div>
              </div>
            </form>
          </aside> <!-- end widget newsletter -->

          <!-- Widget Socials -->
          <aside class="widget widget-socials">
            <h4 class="widget-title">Theo dõi mạng xã hội của chúng tôi</h4>
            <div class="socials socials--wide socials--large">
              <div class="row row-16">
                <div class="col">
                  <a class="social social-facebook" href="#" title="facebook" target="_blank" aria-label="facebook">
                    <i class="ui-facebook"></i>
                    <span class="social__text">Facebook</span>
                  </a><!--
                  --><a class="social social-twitter" href="#" title="twitter" target="_blank" aria-label="twitter">
                    <i class="ui-twitter"></i>
                    <span class="social__text">Twitter</span>
                  </a><!--
                  --><a class="social social-youtube" href="#" title="youtube" target="_blank" aria-label="youtube">
                    <i class="ui-youtube"></i>
                    <span class="social__text">Youtube</span>
                  </a>
                </div>
                <div class="col">
                  <a class="social social-google-plus" href="#" title="google" target="_blank" aria-label="google">
                    <i class="ui-google"></i>
                    <span class="social__text">Google+</span>
                  </a><!--
                  --><a class="social social-instagram" href="#" title="instagram" target="_blank" aria-label="instagram">
                    <i class="ui-instagram"></i>
                    <span class="social__text">Instagram</span>
                  </a><!--
                  --><a class="social social-rss" href="#" title="rss" target="_blank" aria-label="rss">
                    <i class="ui-rss"></i>
                    <span class="social__text">Rss</span>
                  </a>
                </div>                
              </div>            
            </div>
          </aside> <!-- end widget socials -->
        </aside> <!-- end sidebar -->
    </div>
     <div class="text-center pb-48">
        <a href="#">
          <img src="/img/content/placeholder_728.jpg" alt="">
        </a>
      </div>
    <!-- Carousel posts -->
      <section class="section mb-0">
        <div class="title-wrap title-wrap--line title-wrap--pr">
          <h3 class="section-title">Có thể bạn quan tâm</h3>
        </div>
        <div id="owl-posts" class="owl-carousel owl-theme owl-carousel--arrows-outside">
        <!-- Slider -->
        <?php if(!empty($tinmoinhat)){
            foreach($tinmoinhat as $items){ 
                $slug = Helper::getSlug($items['title']);
                $items_link = "tt-$slug/" . $items['id'] . ".html";?>
          <article class="entry thumb thumb--size-1">
            <div class="entry__img-holder thumb__img-holder" style="background-image: url('../backend/assets/images/<?php echo $items['avatar'] ?>');">
              <div class="bottom-gradient"></div>
              <div class="thumb-text-holder">   
                <h2 class="thumb-entry-title">
                  <a href="<?php echo $items_link; ?>"><?php echo $items['title'] ?></a>
                </h2>
              </div>
              <a href="<?php echo $items_link; ?>" class="thumb-url"></a>
            </div>
          </article>
         <?php } }?>
         </div> <!-- end slider -->
      </section> <!-- end carousel posts -->
      <!-- Posts from categories -->
      <section class="section mb-0">
        <div class="row">
              <?php if(!empty($foursubcate)){
                    foreach($foursubcate as $dmcon){?>
            <div class="col-md-6">
                <div class="title-wrap title-wrap--line">
              <h3 class="section-title"><?php echo $dmcon['SubCatDescription'] ?></h3>
            </div>
            <div class="row">
                <?php $i3 = 0; if(!empty($tinmoinhat)){
                foreach($tinmoinhat as $items){ 
                    $slug = Helper::getSlug($items['title']);
                    $items_link = "tt-$slug/" . $items['id'] . ".html";
                    if ($i3 == 0 && $items['subcategoryid'] == $dmcon['SubCategoryId']) { $i3++;?>
                        <div class="col-lg-6">
                        <article class="entry thumb thumb--size-2">
                  <div class="entry__img-holder thumb__img-holder" style="background-image: url('../backend/assets/images/<?php echo $items['avatar'] ?>');">
                    <div class="bottom-gradient"></div>
                    <div class="thumb-text-holder thumb-text-holder--1">   
                      <h2 class="thumb-entry-title">
                        <a href="<?php echo $items_link; ?>"><?php echo $items['title'] ?></a>
                      </h2>
                      <ul class="entry__meta">
                        <li class="entry__meta-date">
                          <?php echo $items['created_at'] ?>
                        </li>
                      </ul>
                    </div>
                    <a href="<?php echo $items_link; ?>" class="thumb-url"></a>
                  </div>
                </article>
            </div> <div class="col-lg-6"><ul class="post-list-small post-list-small--dividers post-list-small--arrows mb-24">
                 <?php } else if ( $i3 < 5 && $items['subcategoryid'] == $dmcon['SubCategoryId']) { $i3++; ?>
                    <li class="post-list-small__item">
                    <article class="post-list-small__entry">
                      <div class="post-list-small__body">
                        <h3 class="post-list-small__entry-title">
                          <a href="<?php echo $items_link; ?>"><?php echo $items['title'] ?></a>
                        </h3>
                      </div>                  
                    </article>
                  </li>
        <?php }  } echo '</ul></div>'; } ?>
            </div>
        </div>
    <?php }} ?>
    </section>
  </div>