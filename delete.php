<?php
$title = "Supprimer un étudiant";
session_start();
//on demarre la session
session_start();
//connexion avec PDO

require_once("models/model.php");
delete("students");

