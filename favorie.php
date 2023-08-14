<?php
require 'bootstrap.php';

$repo = new FavorieRepository();

$favories = $repo->getAll();

view(
    name: 'favorie',
    pageTitle: "Favorie",
    layout: "front",
    params: [
        'favories' => $favories,
    ]
);