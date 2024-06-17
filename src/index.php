<?php 
require_once __DIR__ . '/parts/header.php';

$connectDatabase = new PDO("mysql:host=db;dbname=wordpress","root", "admin");
$request = $connectDatabase->prepare("SELECT * FROM post");
$request->execute();

$posts = $request->fetchAll();
?>

<h1>Liste des évènements</h1>
<div class="container-sm mt-4">
    <?php if(isset($posts[0])) : ?>
    <?php foreach($posts as $post) :?>
    <div class="card mt-2">
        <div class="card-header">
            <h5>
                <?= $post['equipe1'] ?> - <?= $post["equipe2"] ?> (<?= $post['category'] ?>)
            </h5>
        </div>
        <div class="card-body">
            <h5 class="card-title"></h5>
            <p class="card-text">
                <b>Lieu :</b> <?= $post['lieu'] ?>
            </p>
            <p class="card-text">
                <b>Date :</b> <?= $post['date_heure'] ?>
            </p>
            <p class="card-text">
                <b>Prix :</b> <?= $post['prix'] ?>€
            </p>

            <a href="#" class="btn btn-primary">Voir détails</a>
        </div>
    </div>
    <?php endforeach ?>
    <?php endif ?>
</div>


<?php if(isset($_GET['success'])) :?>
<div class="alert alert-success mt-2">
    <?php echo $_GET['success']; ?>
</div>
<?php endif; ?>

<?php 
require_once __DIR__ . '/parts/footer.php'
?>