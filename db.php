<?php
/**
 * Initialisation de la connexion à la base de données
 * 
 * @return PDO $db la connexion à la base de données
 */
function db() : PDO {
    $db =  new PDO("mysql:host=". HOST . ";charset=utf8;dbname=". DB_NAME, USER, PASS);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

    return $db;
}
