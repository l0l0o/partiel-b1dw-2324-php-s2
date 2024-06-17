<?php 
require_once __DIR__ . '/../parts/header.php'
?>
<h1>Créer un nouvel évènement</h1>
<div class="card">
    <div class="card-body">
        <div class="container-xl d-flex flex-column ">
            <?php if(isset($_GET['error'])) :?>
            <div class="alert alert-danger mt-2">
                <?php echo $_GET['error']; ?>
            </div>
            <?php endif; ?>

            <form action="/../scripts/new_event.php" method="POST">
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
                    <label class="form-label"><b>Équipe 1 :</b></label>
                    <input name="equipe1" type="text" class="form-control"
                        aria-describedby="Équipe participant au match (ex: France).">
                </div>
                <div class="mb-3">
                    <label class="form-label"><b>Équipe 2 :</b></label>
                    <input name="equipe2" type="text" class="form-control"
                        aria-describedby="Équipe participant au match (ex: Allemagne)">
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
                    <label class="form-label"><b>Description</b></label>
                    <input name="description" type="textarea" class="form-control" aria-describedby="Informations supplémentaires concernant le billet.
">
                </div>

                <div class="mb-3">
                    <button type="submit" class="btn btn-primary">Ajouter</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php 
require_once __DIR__ . '/../parts/footer.php'
?>