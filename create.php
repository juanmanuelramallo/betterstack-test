<?php

session_start();

$app = require "./core/app.php";

// Create new instance of user
$user = new User($app->db);
$fields = [
  'name' => $_POST['name'],
  'email' => $_POST['email'],
  'city' => $_POST['city'],
  'phone' => $_POST['phone']
];
$errors = [];

if ($fields['name'] == null || trim($fields['name']) == '') {
  $errors['name'] = "can't be blank";
}

if ($fields['email'] == null || trim($fields['email']) == '') {
  $errors['email'] = "can't be blank";
} elseif (!filter_var($fields['email'], FILTER_VALIDATE_EMAIL)) {
  $errors['email'] = "is not a valid email";
}

if ($fields['city'] == null || trim($fields['city']) == '') {
  $errors['city'] = "can't be blank";
}

// If there are errors, store them in the session
// Otherwise, insert the new user
if (count($errors) > 0) {
  $_SESSION['errors'] = $errors;
  $_SESSION['fields'] = $fields;
} else {
  $_SESSION['errors'] = [];
  $_SESSION['fields'] = [];
  $user->insert(array(
    'name' => $fields['name'],
    'email' => $fields['email'],
    'city' => $fields['city'],
    'phone' => $fields['phone']
  ));
}

header('Location: index.php');
