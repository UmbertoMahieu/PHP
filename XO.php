<?php

$tab = ["pomme", "poire", "peche"];
var_dump($tab)
var_dump($tab[0]);

array_push($tab, "fraise", "cerise");

$tab1 = 
["nom" => "Mahieu",
 "prenom" => "Umberto"];

 var_dump($tab1["nom"]);

 $tabPers = ["nom" => "Mahieu",
            []];

// Créer un fontion qui permet 'ajouter un element à un tableau, return le tableau complété '

function tab_push($tab, $value){
    array_push($tab, $value);
    return $tab;
};

// Créer une fontion qui retourne le nombre d'éléments dans le tableau. le tableau doit être donné en paramètre

function tab_count($tab){
    $count = 0;
    foreach ($tab as $key => $value){
        $count++;
    };
    return $count;
};

// Créer une fonction qui va merge 2 tableau de 1 dimension. Return du tableau merge

function tab_merge($tab1, $tab2){
    foreach ($tab2 as $value){
        array_push($tab1, $value);
    };
    return $tab1;
};

// Créer une fonction qui vérifie si un tableau à des éléments vides, si oui, elle retournera le tableau des clés vides. 

function tab_check ($tab){
    $tab1 = array();
    foreach ($tab as $key => $value){
        if (empty($value)){
            array_push($tab1,$key);
        }
    }
    return $tab1;
};

// Création d'un tableau par rapport au fichier reçu (tableauAFaire)

// Afficher le tableau (exos5) comme dans l'image (ablExos6)

$montableau = 
    [
    "Intitule_du_cours" => "5WID4",
    "Local" => 106, 
    "Heure" => "18h", 
    "Nbre_eleve" => 25, 
    "Infos" => [
        "Etudiant1" => [
            "Nom" => "Verheyen", 
            "Prenom" => "Raphael", 
            "Age" => 31],
        "Etudiant2" => [
            "Nom" => "Delbar", 
            "Prenom" => "Benjamin", 
            "Age" => 31],
        "Etudiant3" => [
            "Nom" => "Lacroix", 
            "Prenom" => "Alexandre", 
            "Age" => 31]
            ]
        ];

?>

  <p> 
	Intitulé du cours : <?php echo $montableau["Intitule_du_cours"]; ?> <br>
  	Local : <?php echo $montableau["Local"]; ?> <br>
	Nombre d'élèves : <?php echo $montableau["Nbre_eleve"]; ?> <br>
  </p>

  <table border = 1>
  <tr>
    <td>Nom</td>
    <td>Prenom</td>
    <td>Age</td>
  </tr>

  <?php 
  foreach ($montableau["Infos"] as $values)
  { ?>
  <tr>
  <?php foreach ($values as $key => $values){ ?>
  <td><?php echo $values ?></td>
  <?php } ?>
  </tr>
  <?php } ?>
  </table>

<?php

echo'<pre>';
var_dump($montableau);
echo'<\pre>';


var_dump(tab_check($montableau));

?>

<!-- 1 - Faire un formulaire qui demande d'entrer un age et prévenir s'il est majeure ou non (tant que rien n'est entrer, ne pas afficher de message) -->

<form action="#" method="post">
<label for="name">Nom: </label><br>
<input type="text" name="nom"><br>
<label for="firstname">Prenom: </label><br>
<input type="text" name="prenom"><br>
<label for="age">Age: </label><br>
<input type="text" name="age"><br>
<br>
<input type="submit" value="envoyer">
</form>

<?php 
if (isset($_POST["age"])){
if ($_POST["age"] > 18){
	echo "Vous êtes majeure";
	}
}

// 2 - Faire un formulaire qui demande d'entrer un nom et prenom et afficher "Bonjour 'nom Prenom !'" (tant que rien n'est entrer, ne pas afficher de message)

if (isset($_POST["nom"]) && !empty($_POST["nom"])){
	if (isset($_POST["prenom"]) && !empty($_POST["prenom"])){
	echo("Bonjour ".$_POST["prenom"]." ".$_POST["nom"]);}
}

// 3 - Faire un formulaire qui demande d'entrer un nom et prenom et verifier qu'il n'y ai pas de chiffres ni accents dans ceux-ci (tant que rien n'est entrer, ne pas afficher de message)


function hasaccent($str){
	return preg_match("/[^a-zA-Z]/", $str);
}

function exo(){
	if (!isset($_POST["nom"]) || empty($_POST["nom"])){
		return;
	}
	if (!isset($_POST["prenom"]) || empty($_POST["prenom"])){
		return;
	}
	if (!hasaccent($_POST["prenom"]) && !hasaccent($_POST["prenom"])){
		echo("Bonjour ".$_POST["prenom"]." ".$_POST["nom"]);
	}
}


$var = tab_check($_POST);
foreach($var as $key => $values){
	echo $key . " " . $values ;
	echo "<br>";
}
exo();


?>

