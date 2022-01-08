<?php
require_once 'helpers/Helper.php';
?>
<!--NEWS DETAIL-->
<body class="bg-light">
  <main class="main oh" id="main">
        <div class="container">
      <ul class="breadcrumbs">
        <li class="breadcrumbs__item">
          <a href="/" class="breadcrumbs__url">Home</a>
        </li>
          <?php if(!empty($news)){
        foreach($news as $items){ ?>
        <?php if(empty($items['mamucphu'])){ ?>
        <li class="breadcrumbs__item breadcrumbs__item--current">
            <?php echo $items['tendmchinh']; ?>
        </li>
    <?php }
    else { ?>
        <li class="breadcrumbs__item">
          <a href="danhmuc<?php echo $items['mamucchinh']; ?>.html" class="breadcrumbs__url"><?php echo $items['tendmchinh']; ?></a>
        </li>
        <li class="breadcrumbs__item breadcrumbs__item--current">
        <?php echo $items['tendmphu']; ?>
        </li>
    <?php } ?>
      </ul>
    </div>

  <main class="main oh" id="main">
    <div class="main-container container" id="main-container">
        <div class="row">
        <div class="col-lg-8 blog__content mb-72">
            <div class="content-box">           
            <article class="entry mb-0">
              
              <div class="single-post__entry-header entry__header">
                <a href="danhmuc<?php echo $items['mamucchinh']; ?>.html" class="entry__meta-category entry__meta-category--label entry__meta-category--green"><?php echo $items['tendmchinh']; ?></a>
                <h1 class="single-post__entry-title">
                 <?php echo $items['title'] ?>
                </h1>

                <div class="entry__meta-holder">
                  <ul class="entry__meta">
                    <li class="entry__meta-date">
                     <?php echo $items['created_at'] ?>
                    </li>
                  </ul>

                  <ul class="entry__meta">
                    <li class="entry__meta-views">
                      <i class="ui-eye"></i>
                      <span>1356</span>
                    </li>
                    <li class="entry__meta-comments">
                      <a href="#">
                        <i class="ui-chat-empty"></i>13
                      </a>
                    </li>
                  </ul>
                </div>
              </div> <!-- end entry header -->

              <div class="entry__img-holder">
                <img src="../backend/assets/images/<?php echo $items['avatar']?>"
                    title="<?php echo $items['title'] ?>"
                    alt="<?php echo $items['title'] ?>" class="entry__img">
              </div>

              <div class="entry__article-wrap">

                <!-- Share -->
                <div class="entry__share">
                  <div class="sticky-col">
                    <div class="socials socials--rounded socials--large">
                      <a class="social social-facebook" href="#" title="facebook" target="_blank" aria-label="facebook">
                        <i class="ui-facebook"></i>
                      </a>
                      <a class="social social-twitter" href="#" title="twitter" target="_blank" aria-label="twitter">
                        <i class="ui-twitter"></i>
                      </a>
                      <a class="social social-google-plus" href="#" title="google" target="_blank" aria-label="google">
                        <i class="ui-google"></i>
                      </a>
                      <a class="social social-pinterest" href="#" title="pinterest" target="_blank" aria-label="pinterest">
                        <i class="ui-pinterest"></i>
                      </a>
                    </div>
                  </div>                  
                </div> <!-- share -->

                <div class="entry__article">
                  <?php echo $items['content'] ?>
                </div> <!-- end entry article -->
              </div> <!-- end entry article wrap -->
              

              <!-- Newsletter Wide -->
              <div class="newsletter-wide">
                <div class="widget widget_mc4wp_form_widget">
                  <div class="newsletter-wide__container">
                    <div class="newsletter-wide__text-holder">
                      <p class="newsletter-wide__text">
                        <i class="ui-email newsletter__icon"></i>
                        Đăng kí nhận tin mỗi ngày
                      </p>
                    </div>
                    <div class="newsletter-wide__form">
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
                    </div> 
                  </div>         
                </div>
              </div> <!-- end newsletter wide -->           
              <!-- Related Posts -->
              <section class="section related-posts mt-40 mb-0">
                <div class="title-wrap title-wrap--line title-wrap--pr">
                  <h3 class="section-title">Bài viết khác</h3>
                </div>

                <!-- Slider -->
                <div id="owl-posts-3-items" class="owl-carousel owl-theme owl-carousel--arrows-outside">
                  <article class="entry thumb thumb--size-1">
                    <div class="entry__img-holder thumb__img-holder" style="background-image: url('img/content/carousel/carousel_post_1.jpg');">
                      <div class="bottom-gradient"></div>
                      <div class="thumb-text-holder">   
                        <h2 class="thumb-entry-title">
                          <a href="single-post.html">9 Things to Consider Before Accepting a New Job</a>
                        </h2>
                      </div>
                      <a href="single-post.html" class="thumb-url"></a>
                    </div>
                  </article>
                  <article class="entry thumb thumb--size-1">
                    <div class="entry__img-holder thumb__img-holder" style="background-image: url('img/content/carousel/carousel_post_2.jpg');">
                      <div class="bottom-gradient"></div>
                      <div class="thumb-text-holder">   
                        <h2 class="thumb-entry-title">
                          <a href="single-post.html">Gov’t Toughens Rules to Ensure 3rd Telco Player Doesn’t Slack Off</a>
                        </h2>
                      </div>
                      <a href="single-post.html" class="thumb-url"></a>
                    </div>
                  </article>
                  <article class="entry thumb thumb--size-1">
                    <div class="entry__img-holder thumb__img-holder" style="background-image: url('img/content/carousel/carousel_post_3.jpg');">
                      <div class="bottom-gradient"></div>
                      <div class="thumb-text-holder">   
                        <h2 class="thumb-entry-title">
                          <a href="single-post.html">(Infographic) Is Work-Life Balance Even Possible?</a>
                        </h2>
                      </div>
                      <a href="single-post.html" class="thumb-url"></a>
                    </div>
                  </article>
                  <article class="entry thumb thumb--size-1">
                    <div class="entry__img-holder thumb__img-holder" style="background-image: url('img/content/carousel/carousel_post_4.jpg');">
                      <div class="bottom-gradient"></div>
                      <div class="thumb-text-holder">   
                        <h2 class="thumb-entry-title">
                          <a href="single-post.html">Is Uber Considering To Sell its Southeast Asia Business to Grab?</a>
                        </h2>
                      </div>
                      <a href="single-post.html" class="thumb-url"></a>
                    </div>
                  </article>
                  <article class="entry thumb thumb--size-1">
                    <div class="entry__img-holder thumb__img-holder" style="background-image: url('img/content/carousel/carousel_post_2.jpg');">              
                      <div class="bottom-gradient"></div>
                      <div class="thumb-text-holder">   
                        <h2 class="thumb-entry-title">
                          <a href="single-post.html">Gov’t Toughens Rules to Ensure 3rd Telco Player Doesn’t Slack Off</a>
                        </h2>
                      </div>
                      <a href="single-post.html" class="thumb-url"></a>
                    </div>
                  </article>
                </div> <!-- end slider -->

              </section> <!-- end related posts -->            

            </article> <!-- end standard post -->

            <!-- Comments -->
            <div class="entry-comments">
              <div class="title-wrap title-wrap--line">
                <h3 class="section-title">3 comments</h3>
              </div>
              <ul class="comment-list">
                <li class="comment">  
                  <div class="comment-body">
                    <div class="comment-avatar">
                      <img alt="" src="img/content/single/comment_1.jpg">
                    </div>
                    <div class="comment-text">
                      <h6 class="comment-author">Joeby Ragpa</h6>
                      <div class="comment-metadata">
                        <a href="#" class="comment-date">July 17, 2017 at 12:48 pm</a>
                      </div>                      
                      <p>This template is so awesome. I didn’t expect so many features inside. E-commerce pages are very useful, you can launch your online store in few seconds. I will rate 5 stars.</p>
                      <a href="#" class="comment-reply">Reply</a>
                    </div>
                  </div>

                  <ul class="children">
                    <li class="comment">
                      <div class="comment-body">
                        <div class="comment-avatar">
                          <img alt="" src="img/content/single/comment_2.jpg">
                        </div>
                        <div class="comment-text">
                          <h6 class="comment-author">Alexander Samokhin</h6>
                          <div class="comment-metadata">
                            <a href="#" class="comment-date">July 17, 2017 at 12:48 pm</a>  
                          </div>                      
                          <p>This template is so awesome. I didn’t expect so many features inside. E-commerce pages are very useful, you can launch your online store in few seconds. I will rate 5 stars.</p>
                          <a href="#" class="comment-reply">Reply</a>
                        </div>
                      </div>
                    </li> <!-- end reply comment -->
                  </ul>

                </li> <!-- end 1-2 comment -->

                <li>
                  <div class="comment-body">
                    <div class="comment-avatar">
                      <img alt="" src="img/content/single/comment_3.jpg">
                    </div>
                    <div class="comment-text">
                      <h6 class="comment-author">Chris Root</h6>
                      <div class="comment-metadata">
                        <a href="#" class="comment-date">July 17, 2017 at 12:48 pm</a>  
                      </div>                      
                      <p>This template is so awesome. I didn’t expect so many features inside. E-commerce pages are very useful, you can launch your online store in few seconds. I will rate 5 stars.</p>
                      <a href="#" class="comment-reply">Reply</a>
                    </div>
                  </div>
                </li> <!-- end 3 comment -->

              </ul>         
            </div> <!-- end comments -->

            <!-- Comment Form -->
            <div id="respond" class="comment-respond">
              <div class="title-wrap">
                <h5 class="comment-respond__title section-title">Leave a Reply</h5>
              </div>
              <form id="form" class="comment-form" method="post" action="#">
                <p class="comment-form-comment">
                  <label for="comment">Comment</label>
                  <textarea id="comment" name="comment" rows="5" required="required"></textarea>
                </p>

                <div class="row row-20">
                  <div class="col-lg-4">
                    <label for="name">Name: *</label>
                    <input name="name" id="name" type="text">
                  </div>
                  <div class="col-lg-4">
                    <label for="comment">Email: *</label>
                    <input name="email" id="email" type="email">
                  </div>
                  <div class="col-lg-4">
                    <label for="comment">Website:</label>
                    <input name="website" id="website" type="text">
                  </div>
                </div>

                <p class="comment-form-submit">
                  <input type="submit" class="btn btn-lg btn-color btn-button" value="Post Comment" id="submit-message">
                </p>
              </form>
            </div> <!-- end comment form -->
          </div> <!-- end content box -->
        <?php }
    } ?>
</div>
 <aside class="col-lg-4 sidebar sidebar--right">

          <!-- Widget Popular Posts -->
          <aside class="widget widget-popular-posts">
            <h4 class="widget-title">Các bài viết khác</h4>
            <ul class="post-list-small">
                 <?php $i = 0; if(!empty($tinmoinhat)){
                foreach($tinmoinhat as $items){ 
                    $slug = Helper::getSlug($items['title']);
                    $items_link = "tt-$slug/" . $items['id'] . ".html";
                    if ($i < 3) { $i++;?>
              <li class="post-list-small__item">
                <article class="post-list-small__entry clearfix">
                  <div class="post-list-small__img-holder">
                    <div class="thumb-container thumb-100">
                      <a href="<?php echo $items_link; ?>">
                        <img data-src="../backend/assets/images/<?php echo $items['avatar'] ?>" src="assets/img/empty.png" alt="" class="post-list-small__img--rounded lazyload">
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
          <?php } } } ?>
            </ul>           
          </aside> <!-- end widget popular posts -->

          <!-- Widget Newsletter -->
          <aside class="widget widget_mc4wp_form_widget">
            <h4 class="widget-title">Newsletter</h4>
            <p class="newsletter__text">
              <i class="ui-email newsletter__icon"></i>
              Subscribe for our daily news
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
            <h4 class="widget-title">Let's hang out on social</h4>
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
</div>