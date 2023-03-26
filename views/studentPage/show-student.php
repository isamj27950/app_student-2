<div class="card m-auto mt-6 text-center p-8 flex-shrink-0 w-full max-w-sm bg-gradient-to-b from-sky-700 to-fuchsia-700 shadow-inner-xl">
<figure><img src="<?=$student['url_img'] ?>"alt= "movie" class="shadow-xl" /></figure>
<div class="card-body">
    <p class="text-5xl font-bold text-zinc-800 "><?= $student['fName'],$student['lName']?></p>
    <p class="mt-6 text-base text-black">Email:  <?= $student['email']?></p>
    <p class="text-base text-black">Age: <?= $student['age']?> ans</p> 
    <p class="text-base text-black">Formation: <?= $student['formation']?><p>
    <p class="text-base text-black">Date de naissance: <?= $date = date("d/m/Y",strtotime($student['date_of_birth']))?><p>   
    <div class="mt-10 text-center flex space-x-4">
    <a href="update.php?id=<?=$student['id']?>"class="btn btn-wide  btn-info w-32">Modifier</a>
    <a  href="delete.php?id=<?=$student['id']?>"class="btn btn-wide btn-active btn-error w-32">Supprimer</a>
    </div>
</div>
</div>

