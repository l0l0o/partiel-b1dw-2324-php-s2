<?php 
require_once __DIR__ . '/parts/header.php';
$connectDatabase = new PDO("mysql:host=db;dbname=wordpress","root", "admin");
$request = $connectDatabase->prepare("SELECT * FROM post");



if($_POST) {
    $category = $_POST['category'];
    $groupe = $_POST['groupe'];
    $equipe = $_POST['equipe'];
    $date_heure = strval($_POST['date_heure']);
    $lieu = $_POST['lieu'];
    $prix = strval($_POST['prix']);

    $research = strval($category, $groupe, $equipe, $date_heure, $lieu, $prix);
    var_dump($research);die();
    
    $request = $connectDatabase->prepare("SELECT * FROM post WHERE CONTAINS ()");
    
}
$request->execute();

$posts = $request->fetchAll();
?>

<div class="container-sm mt-4">
    <div class="row g-4">
        <div class="col-6 col-md-4">
            <h3>Filtres</h3>
            <form action="index.php" method="POST">
                <div class="mb-3">
                    <label class="form-label"><b>Catégorie</b></label>
                    <select name="category" class="form-select" aria-describedby="Sélection entre Hommes et Femmes.">
                        <option>Hommes</option>
                        <option>Femmes</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label"><b>Groupe</b></label>
                    <select name="groupe" type="form-select" class="form-control"
                        aria-describedby="Groupe auquel le match appartient (ex: Groupe A, B, C, D, E, F).">
                        <option>Groupe A</option>
                        <option>Groupe B</option>
                        <option>Groupe C</option>
                        <option>Groupe D</option>
                        <option>Groupe E</option>
                        <option>Groupe F</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label"><b>Équipe :</b></label>
                    <input name="equipe" type="text" class="form-control"
                        aria-describedby="Équipe participant au match (ex: France).">
                </div>

                <div class="mb-3">
                    <label class="form-label"><b>Date et Heure</b></label>
                    <input name="date_heure" type="datetime-local" class="form-control" aria-describedby="Date et Heure du match.
">
                </div>
                <div class="mb-3">
                    <label class="form-label"><b>Lieu</b></label>
                    <input name="lieu" type="text" class="form-control" aria-describedby="Lieu du match.
">
                </div>
                <label class="form-label"><b>Prix</b></label>
                <input name="prix" type="number" class="form-control" aria-describedby="Prix du billet.
">
                <div class="mb-3">
                </div>

                <div class="mb-3">
                    <button type="submit" class="btn btn-primary">Ajouter</button>
                </div>
            </form>
        </div>
        <div class="col-sm-6 col-md-8">
            <h3>Évènements</h3>
            <div class="container mt-5">
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

                        <a href="/pages/page_ticket_details.php?id=<?= $post['id'] ?>" class="btn btn-primary">Voir
                            détails</a>
                    </div>
                </div>

                <?php endforeach ?>
                <?php endif ?>

            </div>
        </div>
    </div>
</div>


<?php if(isset($_GET['success'])) :?>
<div class=" alert alert-success mt-2">
    <?php echo $_GET['success']; ?>
</div>
<?php endif; ?>

<?php 
require_once __DIR__ . '/parts/footer.php'
?>