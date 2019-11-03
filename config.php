<?php
try{
    global $pdo;
    $pdo = new PDO("mysql:dbname=projeto_multilinguagem;host=localhost","root","");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $ex) {
    die("Erro:".$ex->getMessage());
}