<?php

  session_start();
  require '../user_db.php';
  # Create a user database
  $user_database = new UserDB;
  $user_database->_create_users();
  # Users in user_database (by default)
  # user1
  # user2
  # larry

  # Add to session
  $_SESSION['usr_db'] = serialize($user_database);
  echo $_SESSION['usr_db'];
 ?>
