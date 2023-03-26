<?php
//$id = trim(htmlspecialchars($_POST['id']));
$fName = trim(htmlspecialchars($_POST['fName']));
$lName = trim(htmlspecialchars($_POST['lName']));
$email = trim(htmlspecialchars($_POST['email']));
$age = trim(htmlspecialchars($_POST['age']));
$date_of_birth = trim(htmlspecialchars($_POST['date_of_birth']));
$status = isset($_POST['status']) ?trim(htmlspecialchars($_POST['status'])):"";
$formation = isset($_POST['formation']) ? trim(htmlspecialchars($_POST['formation'])) : "";

//validate des champs
debug_array($_POST);
// Prenom
if(empty($fName)){
  $error['fName'] = $errMsgRequire;
}elseif (strlen($fName) < 4 || strlen($fName) > 40) {
  $error['fName'] = "<span class='text-red-500'>Le Prénom doit contenir 4 à 40 caractéres</span>";
}

// nom
if(empty($lName)){
  $error['lName'] = $errMsgRequire;
}elseif (strlen($lName) < 4 || strlen($lName) > 40) {
  $error['lName'] = "<span class='text-red-500'>Le Prénom doit contenir 4 à 40 caractéres</span>";
}

//Email 
if(empty($email)){
  //verifi le bon format email
  if(!filter_var($email,FILTER_VALIDATE_EMAIL)) {
  $error['email'] = "<span class='text-red-500'>Votre email est invalide </span>";
  }
}


// age
// verifie que user a bien rempli le champs
if (!empty($age)) {
// verifie que l'age est un nombre entier
  if (!is_numeric($age)) {
    $error['age'] = "<span class='text-red-500'>Merci de rentrer un age correct</span>";
  // verifie qu'il est majeur
  } elseif ($age < 18) {
    $error['age'] = "<span class='text-red-500'>Tu es mineur</span>";
    } 
}else {
      $error['age'] = $errMsgRequire;
  }

// <formation></formation>
if (empty($formation)) {
$error['formation'] = $errMsgRequire;
}


// status
if (!empty($status)) {
//verifie que status est un nombre entier et compris entre 0 et 1
  if(!is_numeric($status) || $status < 0 || $status > 1){
  $error['status'] = "<span class='text-red-500'>3 caractères minimum</span>";
  }
} elseif(!isset($_POST['status'])){
$error['status'] = $errMsgRequire;
}

//date-of-birth
//verifi le format de la date de naissance
if(!strtotime($date_of_birth)){
$error['date_of_birth'] = "<span class='text-red-500'>Votre date de naissance n'est pas valide </span>";
}






