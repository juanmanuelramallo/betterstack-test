<?php

$database = array(
  'address'   => $_ENV['DB_ADDRESS'] || 'localhost',
  'username'  => $_ENV['DB_USERNAME'] || 'root',
  'password'  => $_ENV['DB_PASSWORD'] || '',
  'database'  => $_ENV['DB_DATABASE'] || 'test_project_main'
);
