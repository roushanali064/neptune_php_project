<?php

session_start();

echo $_SESSION['user_id'] . '<br>';
echo $_SESSION['user_name'] . '<br>';
echo $_SESSION['user_email'] . '<br>';

?>