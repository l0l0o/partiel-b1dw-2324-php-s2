<?php 
$category = $_POST['category'];
$groupe = $_POST['groupe'];
$equipe1 = $_POST['equipe1'];
$equipe2 = $_POST['equipe2'];
$date_heure = $_POST['date_heure'];
$lieu = $_POST['lieu'];
$prix = $_POST['prix'];
$description = $_POST['description'];


if(
    isset($category) && $category !== "" && 
    isset($groupe) && $groupe !== "" &&
    isset($equipe1) && $equipe1 !== "" && 
    isset($equipe2) && $equipe2 !== "" && 
    isset($date_heure) && $date_heure !== "" &&
    isset($lieu) && $lieu !== "" && 
    isset($prix) && $prix !== "" && 
    isset($description) && $description !== "") {
    $connectDatabase = new PDO("mysql:host=db;dbname=wordpress","root", "admin");
    $request = $connectDatabase->prepare("INSERT INTO post (category, groupe, equipe1, equipe2, date_heure, lieu, prix, description) VALUES (:category, :groupe, :equipe1, :equipe2, :date_heure, :lieu, :prix, :description)");
    

    $request->bindParam(':category', $category);
    $request->bindParam(':groupe', $groupe);
    $request->bindParam(':equipe1', $equipe1);
    $request->bindParam(':equipe2', $equipe2);
    $request->bindParam(':date_heure', $date_heure);
    $request->bindParam(':lieu', $lieu);
    $request->bindParam(':prix', $prix);
    $request->bindParam(':description', $description);

    $request->execute();

    header("Location: ../index.php?success=Votre évènement a bien été créé.");

} else {
    header("Location: ../pages/page_new_ticket.php?error=Veuillez remplir tous les champ");
}