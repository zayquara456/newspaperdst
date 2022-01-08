<?php
//views/homes/index.php
require_once 'helpers/Helper.php';?>


<body class="bg-light">
  <main class="main oh" id="main">
  <div class="container">
      <ul class="breadcrumbs">
        <li class="breadcrumbs__item">
          <a href="/" class="breadcrumbs__url">Trang chủ</a>
        </li>
        <li class="breadcrumbs__item breadcrumbs__item--current">
          <a href="danhmuc<?php echo $nameofcate['CategoryName']; ?>.html" class="breadcrumbs__url"><?php echo $nameofcate['Description']; ?></a>
        </li>
      </ul>
    </div>
    <div class="main-container container" id="main-container">
        <div class="row">
            <div class="col-lg-8 blog__content mb-72">
                <?php if (!empty($nameofcate)):?>
                <h1 class="page-title"><?php echo $nameofcate['Description'] ?></h1>
                     <div class="row card-row">
                         <?php if(!empty($newsofcate)){
                foreach($newsofcate as $items){ 
                    $slug = Helper::getSlug($items['title']);
                    $items_link = "tt-$slug/" . $items['id'] . ".html";?>
                        <div class="col-md-6">
              <article class="entry card">
                <div class="entry__img-holder card__img-holder">
                  <a href="<?php echo $items_link; ?>">
                    <div class="thumb-container thumb-70">
                      <img data-src="../backend/assets/images/<?php echo $items['avatar'] ?>" src="assets/img/empty.png" class="entry__img lazyload" alt="" />
                    </div>
                  </a>
                  <a href="danhmuc<?php echo $nameofcate['CategoryName']; ?>.html" class="entry__meta-category entry__meta-category--label entry__meta-category--align-in-corner entry__meta-category--violet"><?php echo $items['category_name'] ?></a>
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
            endif; ?>
        </div>
        <?php echo $pages; ?>
    </div>
    <aside class="col-lg-4 sidebar sidebar--right">

          <!-- Widget Popular Posts -->
          <aside class="widget widget-popular-posts">
            <h4 class="widget-title">Bài phổ biến</h4>
            <ul class="post-list-small">
                 <?php if(!empty($newsofcate)){
                foreach($newsofcate as $items){ 
                    $slug = Helper::getSlug($items['title']);
                    $items_link = "tt-$slug/" . $items['id'] . ".html";?>
              <li class="post-list-small__item">
                <article class="post-list-small__entry clearfix">
                  <div class="post-list-small__img-holder">
                    <div class="thumb-container thumb-100">
                      <a href="<?php echo $items_link; ?>">
                        <img data-src="../backend/assets/images/<?php echo $items['avatar'] ?>" src="assets/img/empty.png" alt="" class=" lazyload">
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
          <?php } } ?>
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
      </div> <!-- end content -->
    </div> <!-- end main container -->
  </main> <!-- end main-wrapper -->
</body>