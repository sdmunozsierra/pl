<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Blog - Free Bulma template</title>
    <link rel="icon" type="image/png" sizes="32x32" href="../images/favicon.png">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
    <!-- Bulma Version 0.7.2-->
    <link rel="stylesheet" href="https://unpkg.com/bulma@0.7.4/css/bulma.min.css" />
    <link rel="stylesheet" type="text/css" href="../css/blog.css">
</head>

<?php
// session_start();  //started by session_management
require_once 'main/session_management.php';

$current_user = $_SESSION['current_user'];
if (!$current_user) : ?>
  <section class="hero is-success is-fullheight">
    <div class="hero-body">
      <div class="container has-text-centered">
        <div class="column is-4 is-offset-4">
          <h3 class="title">User Not Logged In</h3>
          <p class="subtitle">Please login to proceed.</p>
          <div class="box">
            <div class="field">
              <div class="control">
                <button class="button is-block is-info is-large is-fullwidth" onclick="location.href='login.php'">Login Page</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

<?php else : ?>
<body>

    <!-- START NAV -->
    <nav class="navbar">
        <div class="container">
            <div class="navbar-brand">
                <a class="navbar-item" href="../">
                        <img src="../images/bulma.png" alt="Logo">
                    </a>
                <span class="navbar-burger burger" data-target="navbarMenu">
                        <span></span>
                <span></span>
                <span></span>
                </span>
            </div>
            <div id="navbarMenu" class="navbar-menu">
                <div class="navbar-end">
                    <a class="navbar-item is-active">
                            Home
                        </a>
                    <div class="navbar-item has-dropdown is-hoverable">
                        <a class="navbar-link">
                                Account
                            </a>
                        <div class="navbar-dropdown">
                            <a class="navbar-item">
                                    Dashboard
                                </a>
                            <a class="navbar-item">
                                    Profile
                                </a>
                            <a class="navbar-item">
                                    Settings
                                </a>
                            <hr class="navbar-divider">
                            <div class="navbar-item">
                                Logout
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>
    <!-- END NAV -->

    <section class="hero is-info is-bold">
        <div class="hero-body">
            <div class="container has-text-centered">
                <h1 class="title">
                  <?php $curr = get_current_user_from_session();
                  print "Welcome " . $curr->username;?>
              </h1>
            </div>
        </div>
    </section>


    <div class="container">
        <!-- START ARTICLE FEED -->
        <section class="articles">
            <div class="column is-8 is-offset-2">
                <!-- START ARTICLE -->
                <div class="card article">
                    <div class="card-content">
                        <div class="media">
                            <div class="media-content has-text-centered">
                                <p class="title article-title">Statistics</p>
                                <div class="tags has-addons level-item">
                                    <span class="tag is-rounded is-info">Zmazon</span>
                                    <span class="tag is-rounded">Number of Songs</span>
                                </div>
                            </div>
                        </div>
                        <div class="content article-body">
                            <p>List of songs</p>
                        </div>
                        <div class="tags has-addons level-item">
                          <span class="tag is-rounded is-info">Ztunes</span>
                          <span class="tag is-rounded">Number of Songs</span>
                        </div>
                        <div class="content article-body">
                            <p>List of songs</p>
                        </div>
                    </div>
                </div>
                <!-- END ARTICLE -->

                <div class="column"></div>

                <!-- START ARTICLE -->
                <div class="card article">
                    <div class="card-content">
                        <div class="media">
                            <div class="media-center">
                                <img src="http://www.radfaces.com/images/avatars/daria-morgendorffer.jpg" class="author-image" alt="Placeholder image">
                            </div>
                            <div class="media-content has-text-centered">
                                <p class="title article-title">Library</p>
                                <p class="subtitle is-6 article-subtitle">
                                    <a href="#">Purchased Songs</a>
                                </p>
                            </div>
                        </div>
                        <div class="content article-body">
                            <p>
                              List of songs
                              List of Songs
                            </p>
                        </div>
                    </div>
                </div>

                <!-- START ARTICLE -->
                <div class="card article">
                    <div class="card-content">
                        <div class="media">
                            <div class="media-center">
                                <img src="http://www.radfaces.com/images/avatars/daria-morgendorffer.jpg" class="author-image" alt="Placeholder image">
                            </div>
                            <div class="media-content has-text-centered">
                                <p class="title article-title">Playlists</p>
                                <p class="subtitle is-6 article-subtitle">
                                    <a href="#">Purchased Songs</a>
                                </p>
                            </div>
                        </div>
                        <div class="content article-body">
                            <p>
                              List of songs
                              List of Songs
                            </p>
                        </div>
                    </div>
                </div>
                <!-- END ARTICLE -->

        </section>
        <!-- END ARTICLE FEED -->
        </div>
        <script async type="text/javascript" src="../js/bulma.js"></script>
</body>


</html>

<!-- https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.4/css/bulma.css

https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.4/css/bulma.css.map

https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.4/css/bulma.min.css -->

<?php endif; ?>
