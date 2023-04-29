<?php
// Chemin du dossier contenant les images
$dossier = 'chemin/vers/votre/dossier/images';

// Liste des fichiers dans le dossier
$fichiers = scandir($dossier);

// Afficher une liste des images avec un lien pour sélectionner l'image
echo '<ul>';
foreach($fichiers as $fichier) {
  if($fichier != '.' && $fichier != '..') {
    echo '<li><a href="changer_avatar.php?image='.$fichier.'">'.$fichier.'</a></li>';
  }
}
echo '</ul>';
?>

<!-- Formulaire pour changer l'avatar -->
<form method="post" action="changer_avatar.php">
  <input type="hidden" name="image" value="<?php echo $_GET['image']; ?>">
  <input type="submit" name="changer_avatar" value="Changer l'avatar">
</form>

<?php
// Code pour changer l'avatar
if(isset($_POST['changer_avatar'])) {
  $image = $_POST['image'];
  // Code pour changer l'avatar avec l'image sélectionnée
}
?>
Dans cet exemple, nous avons d'abord utilisé la fonction "scandir()" pour lister tous les fichiers dans le dossier spécifié. Ensuite, nous avons affiché une liste d'images avec un lien pour sélectionner l'image. Lorsque l'utilisateur clique sur le lien, il est redirigé vers la page "changer_avatar.php" avec l'URL contenant le nom de l'image sélectionnée.

Sur la page "changer_avatar.php", nous avons ajouté un formulaire avec un champ caché pour stocker le nom de l'image sélectionnée. Lorsque l'utilisateur soumet le formulaire, nous pouvons récupérer le nom de l'image et utiliser le code nécessaire pour changer l'avatar avec l'image sélectionnée.

Bien sûr, vous devrez adapter ce code à votre site en fonction de votre structure de fichiers et de la façon dont vous stockez et gérez les avatars des utilisateurs.