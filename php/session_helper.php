<?php

function is_logged_in() {
  return isset($_SESSION["user_id"]);
}

function get_user_id() {
  return isset($_SESSION["user_id"]) ? $_SESSION["user_id"] : null;
}

function get_user_fio() {
  return isset($_SESSION["user_fio"]) ? $_SESSION["user_fio"] : null;
}

function login_user($user_id, $user_fio) {
  $_SESSION["user_id"] = $user_id;
  $_SESSION["user_fio"] = $user_fio;
}

function logout_user() {
  session_unset();
  session_destroy();
}

?>
