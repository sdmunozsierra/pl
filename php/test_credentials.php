<h1>Testing PHP read credentials</h1>

<p>
<?php
require_once 'main/session_management.php';

// $users =  unserialize($_SESSION['users']);
//
// get_user_from_session('not_found');
// $user = get_user_from_session('user1');
// get_validated_user_from_session('not', 'valid');
$valid = get_validated_user_from_session('user1', 'pass');
var_dump($valid);
var_dump(unserialize($_SESSION['current_user']));

?>
</p>
