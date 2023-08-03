<?php
require 'bootstrap.php';

if(get_user_connect()){

}else{
    header('Location: /login.php');
    exit();
}

view(
    name: 'compte',
    pageTitle: "Mon compte",
    layout: "front",
    params: [
        
    ]
);