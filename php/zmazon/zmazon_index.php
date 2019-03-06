<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="description" content="Poca - Podcast &amp; Audio Template">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Title -->
  <title>Zmazon Music Store</title>

  <!-- Favicon -->
  <link rel="icon" href="./img/core-img/favicon.ico">

  <!-- Core Stylesheet -->
  <link rel="stylesheet" href="style.css">

</head>

<body>
  <!-- Preloader -->
  <div id="preloader">
    <div class="preloader-thumbnail">
      <img src="./img/core-img/preloader.png" alt="">
    </div>
  </div>

  <!-- ***** Header Area Start ***** -->
  <header class="header-area">
    <!-- Main Header Start -->
    <div class="main-header-area bg-img bg-overlay" style="background-image: url(img/bg-img/1.jpg);">
      <div class="classy-nav-container breakpoint-off">
        <!-- Classy Menu -->
        <nav class="classy-navbar justify-content-between" id="pocaNav">

          <!-- Logo -->
          <a class="nav-brand" href="index.html"><img src="./img/core-img/logo.png" alt=""></a>

          <!-- Navbar Toggler -->
          <div class="classy-navbar-toggler">
            <span class="navbarToggler"><span></span><span></span><span></span></span>
          </div>

          <!-- Menu -->
          <div class="classy-menu">

            <!-- Menu Close Button -->
            <div class="classycloseIcon">
              <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
            </div>

            <!-- Nav Start -->
            <div class="classynav">
              <ul id="nav">
                <li class="current-item"><a href="./zmazon_index.html">Home</a></li>
                <li><a href="./zmazon_buy.html">BUY</a></li>
              </ul>

            </div>
            <!-- Nav End -->

          </div>
        </nav>
      </div>
    </div>
  </header>
  <!-- ***** Header Area End ***** -->

  <!-- ***** PHP ***** -->
  <?php echo date("1 F d, Y"); ?>
  <section>
    <h1>Will Create Some Songs</h1>
    <?php
    $message = '<h1>hi mom </h1>';
    echo $message;
    print $message;
    // Inclide songs from zmazon.php
    require('zmazon.php');
    ?>
    <?= $daftpunk1->print_song_info()?>
  </section>
  <!-- ***** END PHP ***** -->

  <!-- ***** Latest Episodes Area Start ***** -->
  <section class="poca-latest-epiosodes section-padding-80 ">
    <div class="container">
      <div class="row">
        <!-- Section Heading -->
        <div class="col-12">
          <div class="section-heading text-center">
            <h2>Buy Music</h2>
            <div class="line"></div>
          </div>
        </div>
      </div>
    </div>

      <!-- <div class="welcome-welcome-slide bg-img bg-overlay" style="background-image: url(img/bg-img/1.jpg);">
        <div class="container h-100"> -->
    <div class="container">
      <div class="row poca-portfolio ">

        <!-- Single gallery Item -->
        <div class="col-12 col-md-6 single_gallery_item entre wow fadeInUp" data-wow-delay="0.2s">
          <!-- Welcome Music Area -->
          <div class="poca-music-area style-2 d-flex align-items-center flex-wrap">
            <div class="poca-music-thumbnail">
              <img src="./img/bg-img/5.jpg" alt="">
            </div>
            <div class="poca-music-content text-center">
              <span class="music-published-date mb-2"><?= $daftpunk1->get_year(); ?></span>
              <h2><?=$daftpunk1->get_title(); ?></h2>
              <div class="music-meta-data">
                <p>By <a href="#" class="music-author"><?= $daftpunk1->get_artist(); ?></a><a href="#" class="music-duration">04:51</a></p>
              </div>
              <!-- Music Player -->
              <div class="poca-music-player">
                <audio preload="auto" controls>
                  <source src="audio/dummy-audio.mp3">
                </audio>
              </div>
              <!-- Buy -->
              <div class="align-items-center">
                <button type="submit" class="btn"><?= $user1->add_to_purchased_songs($daftpunk1); ?>BUY</button>
              </div>
            </div>
          </div>
        </div>

        <!-- Single gallery Item -->
        <div class="col-12 col-md-6 single_gallery_item entre tutor wow fadeInUp" data-wow-delay="0.2s">
          <!-- Welcome Music Area -->
          <div class="poca-music-area style-2 d-flex align-items-center flex-wrap">
            <div class="poca-music-thumbnail">
              <img src="./img/bg-img/6.jpg" alt="">
            </div>
            <div class="poca-music-content text-center">
              <span class="music-published-date mb-2"><?= $daftpunk2->get_year(); ?></span>
              <h2><?= $daftpunk2->get_title(); ?></h2>
              <div class="music-meta-data">
                <p>By <a href="#" class="music-author"> <?= $daftpunk2->get_artist(); ?></a> <a href="#" class="music-duration">00:02:56</a></p>
              </div>
              <!-- Music Player -->
              <div class="poca-music-player">
                <audio preload="auto" controls>
                  <source src="audio/dummy-audio.mp3">
                </audio>
              </div>
              <!-- Buy -->
              <div class="align-items-center">
                <a href="#"><i class="fa fa-heart" aria-hidden="true"></i>BUY</a>
              </div>
            </div>
          </div>
        </div>

        <!-- Single gallery Item -->
        <div class="col-12 col-md-6 single_gallery_item entre tutor wow fadeInUp" data-wow-delay="0.2s">
          <!-- Welcome Music Area -->
          <div class="poca-music-area style-2 d-flex align-items-center flex-wrap">
            <div class="poca-music-thumbnail">
              <img src="./img/bg-img/6.jpg" alt="">
            </div>
            <div class="poca-music-content text-center">
              <span class="music-published-date mb-2"><?= $modjo->get_year(); ?></span>
              <h2><?= $modjo->get_title(); ?></h2>
              <div class="music-meta-data">
                <p>By <a href="#" class="music-author"> <?= $modjo->get_artist(); ?></a> <a href="#" class="music-duration">00:02:56</a></p>
              </div>
              <!-- Music Player -->
              <div class="poca-music-player">
                <audio preload="auto" controls>
                  <source src="audio/dummy-audio.mp3">
                </audio>
              </div>
              <!-- Buy -->
              <div class="align-items-center">
                <a href="#"><i class="fa fa-heart" aria-hidden="true"></i>BUY</a>
              </div>
            </div>
          </div>
        </div>

        <!-- Single gallery Item -->
        <div class="col-12 col-md-6 single_gallery_item entre tutor wow fadeInUp" data-wow-delay="0.2s">
          <!-- Welcome Music Area -->
          <div class="poca-music-area style-2 d-flex align-items-center flex-wrap">
            <div class="poca-music-thumbnail">
              <img src="./img/bg-img/6.jpg" alt="">
            </div>
            <div class="poca-music-content text-center">
              <span class="music-published-date mb-2"><?= $cassius->get_year(); ?></span>
              <h2><?= $cassius->get_title(); ?></h2>
              <div class="music-meta-data">
                <p>By <a href="#" class="music-author"> <?= $cassius->get_artist(); ?></a> <a href="#" class="music-duration">00:02:56</a></p>
              </div>
              <!-- Music Player -->
              <div class="poca-music-player">
                <audio preload="auto" controls>
                  <source src="audio/dummy-audio.mp3">
                </audio>
              </div>
              <!-- Buy -->
              <div class="align-items-center">
                <a href="#"><i class="fa fa-heart" aria-hidden="true"></i>BUY</a>
              </div>
            </div>
          </div>
        </div>

        <!-- Single gallery Item -->
        <div class="col-12 col-md-6 single_gallery_item entre tutor wow fadeInUp" data-wow-delay="0.2s">
          <!-- Welcome Music Area -->
          <div class="poca-music-area style-2 d-flex align-items-center flex-wrap">
            <div class="poca-music-thumbnail">
              <img src="./img/bg-img/6.jpg" alt="">
            </div>
            <div class="poca-music-content text-center">
              <span class="music-published-date mb-2"><?= $club_soda->get_year(); ?></span>
              <h2><?= $club_soda->get_title(); ?></h2>
              <div class="music-meta-data">
                <p>By <a href="#" class="music-author"> <?= $club_soda->get_artist(); ?></a> <a href="#" class="music-duration">00:02:56</a></p>
              </div>
              <!-- Music Player -->
              <div class="poca-music-player">
                <audio preload="auto" controls>
                  <source src="audio/dummy-audio.mp3">
                </audio>
              </div>
              <!-- Buy -->
              <div class="align-items-center">
                <a href="#"><i class="fa fa-heart" aria-hidden="true"></i>BUY</a>
              </div>
            </div>
          </div>
        </div>

        <!-- Single gallery Item -->
        <div class="col-12 col-md-6 single_gallery_item entre tutor wow fadeInUp" data-wow-delay="0.2s">
          <!-- Welcome Music Area -->
          <div class="poca-music-area style-2 d-flex align-items-center flex-wrap">
            <div class="poca-music-thumbnail">
              <img src="./img/bg-img/6.jpg" alt="">
            </div>
            <div class="poca-music-content text-center">
              <span class="music-published-date mb-2"><?= $ryskee->get_year(); ?></span>
              <h2><?= $ryskee->get_title(); ?></h2>
              <div class="music-meta-data">
                <p>By <a href="#" class="music-author"> <?= $ryskee->get_artist(); ?></a> <a href="#" class="music-duration">00:02:56</a></p>
              </div>
              <!-- Music Player -->
              <div class="poca-music-player">
                <audio preload="auto" controls>
                  <source src="audio/dummy-audio.mp3">
                </audio>
              </div>
              <!-- Buy -->
              <div class="align-items-center">
                <a href="#"><i class="fa fa-heart" aria-hidden="true"></i>BUY</a>
              </div>
            </div>
          </div>
        </div>

        <!-- Single gallery Item -->
        <div class="col-12 col-md-6 single_gallery_item entre tutor wow fadeInUp" data-wow-delay="0.2s">
          <!-- Welcome Music Area -->
          <div class="poca-music-area style-2 d-flex align-items-center flex-wrap">
            <div class="poca-music-thumbnail">
              <img src="./img/bg-img/6.jpg" alt="">
            </div>
            <div class="poca-music-content text-center">
              <span class="music-published-date mb-2"><?= $discopolis->get_year(); ?></span>
              <h2><?= $discopolis->get_title(); ?></h2>
              <div class="music-meta-data">
                <p>By <a href="#" class="music-author"> <?= $discopolis->get_artist(); ?></a> <a href="#" class="music-duration">00:02:56</a></p>
              </div>
              <!-- Music Player -->
              <div class="poca-music-player">
                <audio preload="auto" controls>
                  <source src="audio/dummy-audio.mp3">
                </audio>
              </div>
              <!-- Buy -->
              <div class="align-items-center">
                <button type="submit" class="btn">BUY</button>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>

  </section>
  <!-- ***** End Songs ***** -->

  <!-- ******* All JS ******* -->
  <!-- jQuery js -->
  <script src="js/jquery.min.js"></script>
  <!-- Popper js -->
  <script src="js/popper.min.js"></script>
  <!-- Bootstrap js -->
  <script src="js/bootstrap.min.js"></script>
  <!-- All js -->
  <script src="js/poca.bundle.js"></script>
  <!-- Active js -->
  <script src="js/default-assets/active.js"></script>

</body>

</html>
