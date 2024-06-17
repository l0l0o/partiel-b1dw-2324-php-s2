<?php 
require_once __DIR__ . '/../parts/header.php';
$id = $_GET['id'];
$connectDatabase = new PDO("mysql:host=db;dbname=wordpress","root", "admin");
$request = $connectDatabase->prepare("SELECT * FROM post WHERE id = $id");
$request->execute();

$posts = $request->fetchAll();
?>

<h1>Détails de l'évènement</h1>
<div class="container">

    <?php foreach($posts as $post) :?>
    <h2><?= $post['equipe1'] ?> - <?= $post["equipe2"] ?> (<?= $post['category'] ?>)</h2>

    <h6><?= $post['date_heure'] ?> à <?= $post['lieu'] ?></h6>
    <p>Prix de la place : <?= $post['prix'] ?>€</p>
    <p><?= $post['description'] ?></p>


    <a href="/../index.php">Retour à la liste des évènements</a>
    <?php endforeach?>

</div>

<?php 
require_once __DIR__ . '/../parts/footer.php'
?>