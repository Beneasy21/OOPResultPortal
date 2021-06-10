<?php

  require_once('db_credentials.php');

  function db_connect() {
    $connection = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
    confirm_db_connect();
    return $connection;
  }

  function db_disconnect($connection) {
    if(isset($connection)) {
      mysqli_close($connection);
    }
  }

  function db_escape($connection, $string) {
    return mysqli_real_escape_string($connection, $string);
  }

  function confirm_db_connect() {
    if(mysqli_connect_errno()) {
      $msg = "Database connection failed: ";
      $msg .= mysqli_connect_error();
      $msg .= " (" . mysqli_connect_errno() . ")";
      exit($msg);
    }
  }

  function confirm_result_set($result_set) {
    if (!$result_set) {
        exit("Database query failed.");
    }
  }

  function pdoDbConnect(){
    try {
      $con = new PDO("mysql:host=".DB_SERVER. "; dbname=".DB_NAME. "; charset=utf8", DB_USER,DB_PASS);
      $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $con->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
      $con->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_ASSOC);
      $con->setAttribute(PDO::MYSQL_ATTR_USE_BUFFERED_QUERY,true);
      return $con;
    } catch (Exception $e) {
      die("Could not Connect to the database ".DB_NAME.":" .$e->getMessage());
    }
  }



?>