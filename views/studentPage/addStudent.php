<?php
include_once('helpers/functions.php');
require_once('models/model.php');

// validation du formulaire
// 1-creation de mes variables
$error = [];
$errMsgRequire = "<span class='text-red-500'>Ce champs est obligatoire</>";
$success = "false";

// 2-Je vérifie si le formualire est soumis
if (!empty($_POST['submitted'])) {
    require_once('helpers/validate-input/validateInput.php');
    //créé un nv étudiant et stock en bdd
    create($fName, $lName, $email, $age, $formation, $date_of_birth, $status);
}  
?>

<div class="card m-auto mt-6 text-center p-8 flex-shrink-0 w-full max-w-sm bg-gradient-to-t from-sky-700 to-fuchsia-700 shadow-inner-xl-rounded-lg">
    <form method="POST" >

        <!--  firstname -->
        <div class="form-control  ">
            <label class="label" for="fName">
                <span class="label-text font-black w-32">Votre Prénom</span>
            </label>
            <label class="input-group">
                <span class="w-20">Prénom</span>
                <input type="text" placeholder="Type here" class="input input-bordered w-64" name="fName" id ="prenom" value="<?php showInputValue('fName')?>" />
            </label>    
            <p><?php errorMsg('fName')?></p>
        </div>

        <!-- lastname -->
        <div class="form-control ">
            <label class="label " for="lName">
                <span class="label-text font-black "> Votre Nom</span>
            </label>
            <label class="input-group">
                <span class="w-20">Nom</span>
                <input type="text" placeholder="Type here" class="input input-bordered w-64 " name="lName" id ="nom" value="<?php showInputValue('lName')?>" />
            </label>
            <p><?php errorMsg('lName')?></p>
        </div>

        <!-- email-->
        <div class="form-control">
            <label class="label"- for="email">
                <span class="label-text font-black">Votre Email</span>
            </label>
            <label class="input-group">
                <span class="w-20">Email</span>
                <input type="text" placeholder="exemple@gmail.com" class="input input-bordered w-64 text-center" name="email" value="<?php showInputValue('email')?>" />
            </label> 
            <p><?php errorMsg('email')?></p>
        </div> 

        <!--  age -->
        <div class="form-control  ">
            <label class="label" for="age">
                <span class="label-text font-black">Votre Age</span>
            </label>
            <label class="input-group">
                <span class="w-20">Age</span>
                <input type="number" placeholder="" class="input input-bordered w-64 " name="age" id ="age" value="<?php showInputValue('age')?>"/>
            </label>
            <p><?php errorMsg('age')?></p>
        </div>

        <!-- Date de naissance -->
        <div class="form-control  ">
            <label class="label" for="age">
                <span class="label-text font-black">Date de naissance</span>
            </label>
            <label class="input-group">
                <span class="w-20">Date</span>
                <input name="date_of_birth" type="date" class="input input-bordered w-64 text-center" value="<?php showInputValue('date_of_birth')?>" />
            </label>
            <p><?php errorMsg('date_of_birth')?></p>
        </div>

        <!-- Status -->
        <div class="flex space-x-10 my-6  bg-zinc-200 rounded-xl ">
            <div class="form-control">
                <label class="label cursor-pointer " for="status">
                    <span class="label-text m-2 ">Inscrit</span> 
                    <input type="radio" name="status"value ="1" class="radio checked:bg-fuchsia-700" <?php showRadioValue("status",1)?>  />
                </label>
            </div>
            <div class="form-control">
                <label class="label cursor-pointer " for="status">
                    <span class="label-text m-2">Liste d'attente</span> 
                    <input type="radio" name="status" value= "0" class="radio checked:bg-fuchsia-700" <?php showRadioValue("status",0)?> />
                </label>
            </div>
            <p><?php errorMsg('status')?></p>   
        </div>

        <!--  formation -->
        <?php
            $formationOptions =[
                ["name" => "Dev React",],
                ["name" => "Dev Front"],
                ["name" => "Dev Back"],
                ["name" => "Dev Symfony"],
                ["name" => "Commerce international"],
            ]
        ?>
        <div class="form-control  ">
                <label class="label ">
                    <span class="label-text font-black ">Choisir ta formation</span>
                </label>
                <label class="input-group">
                    <span class="">Formation</span>
                    <select class="select select-bordered" name="formation">
                        <option disabled selected>Choisis une formation</option>
                        <?php foreach ($formationOptions as $item): ?>
                        <option value="<?= $item['name']?>" <?php showSelectValue("formation", $item['name'])?>>
                        <?= $item['name'] ?>
                        </option>
                        <?php endforeach ?>
                    </select>
                </label>
            <p><?php errorMsg('formation')?></p>
        </div>

        <!-- btn submit -->
        <input type="submit" class="btn btn-active btn-secondary mt-5 font-black text-justify w-48" name="submitted"
        value="envoyer"   >

    </form>
</div>