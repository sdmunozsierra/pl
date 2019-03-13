<h1>Testing PHP read credentials</h1>

<p>
<?php
require_once 'main/read_credentials.php';


// $cred_file = "storage/credentials.json";
// $users = get_users_from_json($cred_file);
// add_json_users_to_session($users);
$users =  unserialize($_SESSION['users']);

get_user_from_session('not_found');
$user = get_user_from_session('user1');
get_validated_user_from_session('not', 'valid');
$valid_user = get_validated_user_from_session('user1', 'pass');
?>
</p>
