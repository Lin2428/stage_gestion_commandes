<?php
session_start();

require 'constant.php';

include ROOT . 'db.php';
include ROOT . 'functions.php';

// Repositories
include REPO_PATH . 'product_repository.php';
include REPO_PATH . 'categorie_repository.php';