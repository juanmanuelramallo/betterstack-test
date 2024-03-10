<?php

require_once('vendor/autoload.php');

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

session_start();

// Init app instance
$app = require "./core/app.php";

// Get all users from DB, eager load all fields using '*'
$users = User::find($app->db,'*',[],['created_at' => 'desc']);

// Render view 'views/index.php' and pass users variable there
$app->renderView('index', array(
  'ajax' => $_GET['ajax'] ?? false,
  'errors' => $_SESSION['errors'] ?? [],
  'fields' => $_SESSION['fields'] ?? [],
  'users' => $users,
));

$_SESSION['errors'] = [];
$_SESSION['fields'] = [];
