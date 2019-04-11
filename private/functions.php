<?php

define("ROOT", '2');
define("CREATOR", '1');
function url_for($script_path)
{
  // add the leading '/' if not present
  if ($script_path[0] != '/') {
    $script_path = "/" . $script_path;
  }
  return WWW_ROOT . $script_path;
}

function u($string = "")
{
  return urlencode($string);
}

function raw_u($string = "")
{
  return rawurlencode($string);
}

function h($string = "")
{
  return htmlspecialchars($string);
}

function error_404()
{
  header($_SERVER["SERVER_PROTOCOL"] . " 404 Not Found");
  exit();
}

function error_500()
{
  header($_SERVER["SERVER_PROTOCOL"] . " 500 Internal Server Error");
  exit();
}

function redirect_to($location)
{
  header("Location: " . $location);
  exit;
}

function is_post_request()
{
  return $_SERVER['REQUEST_METHOD'] == 'POST';
}

function is_get_request()
{
  return $_SERVER['REQUEST_METHOD'] == 'GET';
}

function isLogin()
{
  return (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true);
}

function isCreator()
{
  return (isset($_SESSION["level"]) && $_SESSION["level"] == CREATOR);
}

function isRoot()
{
  return (isset($_SESSION["level"]) && $_SESSION["level"] == ROOT);
}

function getUserId()
{
  return isset($_SESSION["id"]) ? $_SESSION["id"] : -1;
}

function errLogin($msg)
{
  echo '<div class="card-body">
    <div class="alert alert-danger" role="alert">' .
    $msg . '        
    </div>
</div>';
}
