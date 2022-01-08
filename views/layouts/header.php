<!-- Preloader -->
  <div class="loader-mask">
    <div class="loader">
      <div></div>
    </div>
  </div>

  <!-- Bg Overlay -->
  <div class="content-overlay"></div>

  <!-- Sidenav -->    
  <header class="sidenav" id="sidenav">

    <!-- close -->
    <div class="sidenav__close">
      <button class="sidenav__close-button" id="sidenav__close-button" aria-label="close sidenav">
        <i class="ui-close sidenav__close-icon"></i>
      </button>
    </div>
    
    <!-- Nav -->
    <nav class="sidenav__menu-container">
      <ul class="sidenav__menu" role="menubar">
        <li>
          <a href="/" class="sidenav__menu-url">Trang chủ</a>
          <button class="sidenav__menu-toggle" aria-haspopup="true" aria-label="Open dropdown"><i class="ui-arrow-down"></i></button>
          <ul class="sidenav__menu-dropdown">
            <li><a href="tin-tuc-24h-p1.html" class="sidenav__menu-url">Tin tức 24h</a></li>
            <li><a href="index-politics.html" class="sidenav__menu-url">Home Politics</a></li>
            <li><a href="index-fashion.html" class="sidenav__menu-url">Home Fashion</a></li>
            <li><a href="index-games.html" class="sidenav__menu-url">Home Games</a></li>
            <li><a href="index-videos.html" class="sidenav__menu-url">Home Videos</a></li>
            <li><a href="index-music.html" class="sidenav__menu-url">Home Music</a></li>
          </ul>
        </li>
        <li>
          <a href="danhmucgiaitri.html" class="sidenav__menu-url">Giải trí</a>
        </li>
        <li>
          <a href="danhmucthethao.html" class="sidenav__menu-url">Thể thao</a>
        </li>
        <li>
          <a href="danhmucthoisu.html" class="sidenav__menu-url">Thời sự</a>
        </li>
        <li>
          <a href="danhmuckinhdoanh.html" class="sidenav__menu-url">Kinh doanh</a>
        </li>
        <li>
          <a href="danhmucdulich.html" class="sidenav__menu-url">Du lịch</a>
        </li>
      </ul>
    </nav>

    <div class="socials sidenav__socials"> 
      <a class="social social-facebook" href="#" target="_blank" aria-label="facebook">
        <i class="ui-facebook"></i>
      </a>
      <a class="social social-twitter" href="#" target="_blank" aria-label="twitter">
        <i class="ui-twitter"></i>
      </a>
      <a class="social social-google-plus" href="#" target="_blank" aria-label="google">
        <i class="ui-google"></i>
      </a>
      <a class="social social-youtube" href="#" target="_blank" aria-label="youtube">
        <i class="ui-youtube"></i>
      </a>
      <a class="social social-instagram" href="#" target="_blank" aria-label="instagram">
        <i class="ui-instagram"></i>
      </a>
    </div>
  </header> <!-- end sidenav -->

  <main class="main oh" id="main">

    <!-- Top Bar -->
    <div class="top-bar d-none d-lg-block">
      <div class="container">
        <div class="row">

          <!-- Top menu -->
          <div class="col-lg-6">
            <ul class="top-menu">
              <li><a href="#">About</a></li>
              <li><a href="#">Advertise</a></li>
              <li><a href="#">Contact</a></li>
              <li><a href="">Xin chào <?php if(isset($_SESSION['username'])) echo $_SESSION['username'];  else echo ""; ?></a></li>
                <?php if(isset($_SESSION['username'])){?>
                        <li><a href="logout.html" class="material-button submenu-toggle">Đăng xuất</a></li>
                    <?php }else{?>
                      <li><a href="login.html" class="material-button submenu-toggle">Đăng nhập</a></li>
                    <?php }?>
            </ul>
          </div>
          
          <!-- Socials -->
          <div class="col-lg-6">
            <div class="socials nav__socials socials--nobase socials--white justify-content-end"> 
              <a class="social social-facebook" href="http://zayquara1.cf" target="_blank" aria-label="facebook">
                <i class="ui-facebook"></i>
              </a>
              <a class="social social-twitter" href="http://zayquara1.cf" target="_blank" aria-label="twitter">
                <i class="ui-twitter"></i>
              </a>
              <a class="social social-google-plus" href="http://zayquara1.cf" target="_blank" aria-label="google">
                <i class="ui-google"></i>
              </a>
              <a class="social social-youtube" href="http://zayquara1.cf" target="_blank" aria-label="youtube">
                <i class="ui-youtube"></i>
              </a>
              <a class="social social-instagram" href="http://zayquara1.cf" target="_blank" aria-label="instagram">
                <i class="ui-instagram"></i>
              </a>
            </div>
          </div>

        </div>
      </div>
    </div>
 <!-- Navigation -->
    <header class="nav">

      <div class="nav__holder nav--sticky">
        <div class="container relative">
          <div class="flex-parent">
            <!-- Side Menu Button -->
            <button class="nav-icon-toggle" id="nav-icon-toggle" aria-label="Open side menu">
              <span class="nav-icon-toggle__box">
                <span class="nav-icon-toggle__inner"></span>
              </span>
            </button> 

            <!-- Logo -->
            <a href="/" class="logo">
              <img class="logo__img" src="http://zayquara1.cf/images/icon.png" srcset="http://zayquara1.cf/images/icon.png 1x, http://zayquara1.cf/images/icon.png 2x" alt="logo">
            </a>

            <!-- Nav-wrap -->
            <nav class="flex-child nav__wrap d-none d-lg-block">              
              <ul class="nav__menu">

                <li class="nav__dropdown">
                  <a href="/">Trang chủ</a>
                  <ul class="nav__dropdown-menu">
                    <li><a href="tin-tuc-24h-p1.html">Tin tức 24h</a></li>
                    <li><a href="index-politics.html">Home Politics</a></li>
                    <li><a href="index-fashion.html">Home Fashion</a></li>
                    <li><a href="index-games.html">Home Games</a></li>
                    <li><a href="index-videos.html">Home Videos</a></li>
                    <li><a href="index-music.html">Home Music</a></li>
                  </ul>
                </li>

                <li>
                  <a href="danhmucgiaitri.html">Giải trí</a>
                </li>
                 <li><a href="danhmucthethao.html">Thể thao</a></li>
        <li>
          <a href="danhmucthoisu.html">Thời sự</a>
        </li>
        <li>
          <a href="danhmuckinhdoanh.html" >Kinh doanh</a>
        </li>
        <li>
          <a href="danhmucdulich.html">Du lịch</a>
        </li>

              </ul> <!-- end menu -->
            </nav> <!-- end nav-wrap -->

            <!-- Nav Right -->
            <div class="nav__right">

              <!-- Search -->
              <div class="nav__right-item nav__search">
                <a href="#" class="nav__search-trigger" id="nav__search-trigger">
                  <i class="ui-search nav__search-trigger-icon"></i>
                </a>
                <div class="nav__search-box" id="nav__search-box">
                  <form class="nav__search-form" method="get" action="http://google.com/search">
                    <input type="text" placeholder="Nhập nội dung cần tìm" name="q" class="nav__search-input">
                    <input type="hidden" name="sitesearch" value="vnexpress.net"/>
                    <button type="submit" class="search-button btn btn-lg btn-color btn-button">
                      <i class="ui-search nav__search-icon"></i>
                    </button>
                  </form>
                </div>                
              </div>             

            </div> <!-- end nav right -->            
        
          </div> <!-- end flex-parent -->
        </div> <!-- end container -->

      </div>
    </header>