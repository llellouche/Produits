<?php
$dirClass = '../cgi-bin/class/';
include_once 'entete.php';

$userDAO = new UserDAO();

$users = $userDAO->get_all_users();

print_r($users);

?>
</body>
</html>
