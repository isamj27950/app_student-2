<?php

//recuperelaon a la BDD
require_once('database.php');
include_once('helpers/functions.php');

//je stocks la connexion dans $pdo
$pdo = pdo();
/**
 * //fonction qui va recupere tout les elements
 * Get all items in DB
 */

function getALL($table, $order="")
{
    //global permet de retrouver la pdo
    global $pdo;
    // 1 selectionne tous dans ma db
    $sql ="SELECT * FROM $table ";

    if($order) {
        $sql .= " ORDER BY " . $order;
    }
    //2-Prépare ma requette
    $query =$pdo->prepare($sql);

    //3-Executela requette
    $query->execute();

    //4- jz stock ts les resultats ds une variable
    $items = $query->fetchAll();

    //5-je retourne le resultat dans la query 
    return $items;
}

/**
 * 
 * get the id of item
 * @return int
 */
function getId()
{

    if(!empty($_GET['id']) && isset($_GET['id']) && is_numeric($_GET['id'])){
    //on nettoie l'id
    $id = cleanInput($_GET['id']);
    }else{
        $_SESSION["error"] = "ID invalide";
        //redirection quand l'id est invalide
        header('Location: index.php');
    }
    return $id;
}
/**
 * 
 * 
 *get a single item 
 * @return array
 */
function get($table)
{
    global $pdo;
    $id = getId();
    //faire la requette
    $sql = "SELECT * FROM $table where id= :id";
    // prépare la requette
    $query = $pdo->prepare($sql);
    //associe la valeur à un parametre
    $query->bindValue(':id', $id, PDO::PARAM_INT);
    //execute ma requette
    $query->execute();
    //on stocke student dans une variable
    $item = $query->fetch();
   // debug_array($student);

    //pas d'etudiant alors on est  rediriject vers la liste
    if(!$item) {
        $_SESSION["error"] ="Cet étudiant n'existe pas!";
        header('Location: index.php');
    }
    return $item;
}



function delete($table)
{
    global $pdo;
    $id = getId();
    //faire la requette
    $sql = "DELETE FROM $table where id= :id";
    // prépare la requette
    $query = $pdo->prepare($sql);
    //associe la valeur à un parametre
    $query->bindValue(':id', $id, PDO::PARAM_INT);
    //execute ma requette
    $query->execute();
    $_SESSION["success"] ="L'élément a bien été supprimé avec succés!!";
    //redirect
    header('location: index.php');
}
/**
 * inseer to db
 * 
 */
function create($fName, $lName, $email, $age, $formation, $date_of_birth, $status) 
{
    //require_once('helpers/validate-input/validateInput.php');

    global $pdo;
    global $error;
    global $success;
    if(count($error)== 0){
        $success = true;

        //1-la requette
        
        $sql = "INSERT INTO students(fName, lName, email, age, formation, created_at, date_of_birth, status) VALUES(:fName, :lName, :email, :age, :formation, NOW(), :date_of_birth, :status)";
        
        //2-prépare la requette
        $query = $pdo->prepare($sql);
        //3- associé chaque parametre à sa valeur
        $query->bindValue(':fName', $fName,PDO::PARAM_STR);
        $query->bindValue(':lName', $lName,PDO::PARAM_STR);
        $query->bindValue(':email', $email,PDO::PARAM_STR);
        $query->bindValue(':age', $age,PDO::PARAM_INT);
        $query->bindValue(':formation', $formation,PDO::PARAM_STR);
        $query->bindValue(':date_of_birth', $date_of_birth,PDO::PARAM_STR);
        $query->bindValue(':status', $status,PDO::PARAM_INT);   

        //4_ execute la query
        $query-> execute();

        //5- redirect
        $_SESSION["success"] = "L'élément a été ajouté";

    header('location: index.php');

    }
}
/**
 * 
 * Update item in bd
 */
function update($fName, $lName, $email, $age, $formation, $date_of_birth, $status ) 
{
    //require_once('helpers/validate-input/validateInput.php');
    $id= getId();
    global $pdo;
    global $error;
    global $success;
    if(count($error)== 0){
        $success = true;

        //1-la requette
        
        $sql = "UPDATE students SET fName=:fName, lName=:lName, email=:email, age=:age, formation=:formation, date_of_birth=:date_of_birth, status=:status, updated_at= NOW() WHERE id=:id ";
        //2-prépare la requette
        $query = $pdo->prepare($sql);
        //3- associé chaque parametre à sa valeur
        $query->bindValue(':id', $id, PDO::PARAM_INT);
        $query->bindValue(':fName', $fName, PDO::PARAM_STR);
        $query->bindValue(':lName', $lName, PDO::PARAM_STR);
        $query->bindValue(':email', $email, PDO::PARAM_STR);
        $query->bindValue(':age', $age, PDO::PARAM_INT);
        $query->bindValue(':formation', $formation, PDO::PARAM_STR);
        $query->bindValue(':date_of_birth', $date_of_birth, PDO::PARAM_STR);
        $query->bindValue(':status', $status, PDO::PARAM_INT);

        //4_ execute la query
        $query-> execute();

        //5- redirect
        $_SESSION["success"] = "Etudiant ajouté";

        header('location: index.php');

    }
}
