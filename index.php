<?php

session_start();

// Init app instance
$app = require "./core/app.php";

// Get all users from DB, eager load all fields using '*'
$users = User::find($app->db,'*');

// Render view 'views/index.php' and pass users variable there
$app->renderView('index', array(
  'errors' => $_SESSION['errors'] ?? [],
  'fields' => $_SESSION['fields'] ?? [],
  'users' => $users,
));
