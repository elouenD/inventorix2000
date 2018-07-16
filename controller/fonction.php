<?php

require '../model/materiel.php'; // J'inclus la classe.
require '../model/pret.php'; // J'inclus la classe.
require '../model/utilisateur.php'; // J'inclus la classe.
function dbConnect(){
    $bdd=NULL;
    try
    {
        $bdd = new PDO('mysql:host=localhost;dbname=base_php;charset=utf8', 'root', '');
        
    }
    catch (Exception $e)
    {
            die('Erreur : ' . $e->getMessage());
    }
    return $bdd;
}
//Partie User : Mettre sous forme de Classe 

//Recupère l'ensemble des informations des utilisateurs en base 
function userInfo()
{
    $bdd=NULL;
    //appel de dbConnect pour instancier une connexion à la base de donnée
    $bdd=dbConnect();

    $statement = $bdd->prepare("SELECT * FROM utilisateur where deleted=0 and responsable=1");
    $statement->execute();
    $dataUser = $statement->fetchAll(PDO::FETCH_ASSOC);
    $bdd=NULL;
    return $dataUser;
}

function etudiantInfo()
{
    $bdd=NULL;
    //appel de dbConnect pour instancier une connexion à la base de donnée
    $bdd=dbConnect();

    $statement = $bdd->prepare("SELECT * FROM utilisateur where deleted=0 and responsable=0");
    $statement->execute();
    $dataUser = $statement->fetchAll(PDO::FETCH_ASSOC);
    $bdd=NULL;
    return $dataUser;
}

//Recupère l'ensemble des informations d'un utilisateurs en base 
function userInfospec($id)
{
    $bdd=NULL;
    //appel de dbConnect pour instancier une connexion à la base de donnée
    $bdd=dbConnect();

    $statement = $bdd->prepare("SELECT * FROM utilisateur where Id=$id");
    $statement->execute();
    $dataUserSpec = $statement->fetchAll(PDO::FETCH_ASSOC);
    $bdd=NULL;
    return $dataUserSpec;
}


//
function createUser(Utilisateur $user){
    $bdd=NULL;
    
    $nom= $user->getNom();
    $prenom=$user->getPrenom();
    $mail=$user->getMail();
    $login=$user->getLogin();
    $password=$user->getPassword();

    //appel de dbConnect pour instancier une connexion à la base de donnée
    $bdd=dbConnect();
    $newUser = $bdd->prepare("INSERT INTO `utilisateur` ( `Nom`, `Prenom`, `Mail`, `Login`, `Password`, `Responsable`) VALUES ( ?, ?, ?, ?, ?, 1);");
    $newUser->execute(array($nom,$prenom,$mail,$login,$password));
}

//
function createEtudiant(Utilisateur $user){
    $bdd=NULL;

    $nom= $user->getNom();
    $prenom=$user->getPrenom();
    $mail=$user->getMail();
    $login=$user->getLogin();
    $password=$user->getPassword();

    //appel de dbConnect pour instancier une connexion à la base de donnée
    $bdd=dbConnect();
    $newUser = $bdd->prepare("INSERT INTO `utilisateur` ( `Nom`, `Prenom`, `Mail`, `Login`, `Password`) VALUES ( :nom, :prenom, :mail, :login, :password);");
    $newUser->execute(array(":nom"=>$nom,":prenom"=>$prenom,":mail"=>$mail,":login"=>$login,":password"=>$password));
}

function updateUserAccess($id,$responsable){
    $bdd=NULL;
    //appel de dbConnect pour instancier une connexion à la base de donnée
    $bdd=dbConnect();
    $updateUser = $bdd->prepare("UPDATE `utilisateur` SET `Responsable` = ? WHERE `utilisateur`.`Id` = ?");
    $updateUser->execute(array($responsable,$id));    
}

function deleteUser($id){
    $bdd=NULL;
    //appel de dbConnect pour instancier une connexion à la base de donnée
    $bdd=dbConnect();
    $deleteUser = $bdd->prepare("UPDATE `utilisateur` SET `Deleted` = '1' WHERE `utilisateur`.`Id` = ?");
    $deleteUser->execute(array($id));    
}

function connect($login,$password){
    $connect=false;
    $allUser=userInfo();
    $length=count($allUser);
    for ($i = 0; $i < $length; $i++) {
        if($allUser[$i]['Login']==$login)
        {
            if($allUser[$i]['Password']==$password){
                $connect=true;
            }
        }
    }
    return $connect;
}

function getID($login,$password){
    $connect=false;
    $id;
    $allUser=userInfo();
    $length=count($allUser);
    for ($i = 0; $i < $length; $i++) {
        if($allUser[$i]['Login']==$login)
        {
            if($allUser[$i]['Password']==$password){
                $connect=true;
                $id=$allUser[$i]['Id'];
            }
        }

    }
    return $id;
}

function echoMat(Materiel $materiel){
    $coucou = $materiel->getID();
    echo $coucou;
}

function coucou(){
    echo 'coucou!';
}

//Emprunt 

function empruntInfo(){
    $bdd=NULL;
    //appel de dbConnect pour instancier une connexion à la base de donnée
    $bdd=dbConnect();

    $statement = $bdd->prepare("SELECT * FROM pret");
    $statement->execute();
    $dataPret = $statement->fetchAll(PDO::FETCH_ASSOC);
    $bdd=NULL;
    return $dataPret;
}

function checkEmprunt($dateSouhaite,$idMateriel){
    //permet de vérifier si un Materiel est dispo

    $bdd=NULL;
    //appel de dbConnect pour instancier une connexion à la base de donnée
    $bdd=dbConnect();

    $statement = $bdd->prepare("SELECT * FROM pret where DateRendu <=? and Materiel_id= ?");
    $statement->execute(array($dateSouhaite, $idMateriel));
    $count = $statement->fetchAll(PDO::FETCH_ASSOC);
    $count= count($count);
    if(count==0){
        return true;
    }
    else{
        return false;
    }
    
}

function updateEmprunt($idPret,$dateRendu){
    $bdd=NULL;
    //appel de dbConnect pour instancier une connexion à la base de donnée
    $bdd=dbConnect();
    $updatePret = $bdd->prepare("UPDATE `pret` SET `DateRendu` = ? WHERE `pret`.`Id` = ?");
    $updatePret->execute(array($dateRendu,$idPret));
}
//Améliorer avec des objets directement
function createEmprunt(Pret $pret){
    $bdd=NULL;

    $dateDebut= $pret->getDateDebut(); 
    $dateFinPrevu=$pret->getDateFinPrevu(); 
    $dateRendu=NULL;
    $idMateriel=$pret->getMaterielId();
    $idUser=$pret->getUtilisateurId();
    if(checkEmprunt($dateDebut,$idMateriel)==true){
        //appel de dbConnect pour instancier une connexion à la base de donnée
        $bdd=dbConnect();
        $newPret = $bdd->prepare("INSERT INTO `pret` (`DateDebut`, `DateFinPrevu`, `DateRendu`, `Utilisateur_Id`, `Materiel_id`) VALUES ( ?, ?, ?, ?, ?);");
        $newPret->execute(array($dateDebut,$dateFinPrevu,$dateRendu,$idUser,$idMateriel));
        return true; 
    }else{
        return false; 
    }

}



 

//Materiel 


function materielInfo()
{
    $bdd=NULL;
    //appel de dbConnect pour instancier une connexion à la base de donnée
    $bdd=dbConnect();

    $statement = $bdd->prepare("SELECT * FROM `materiel`WHERE deleted!=1");
    $statement->execute();
    $dataMateriel = $statement->fetchAll(PDO::FETCH_ASSOC);
    $bdd=NULL;
    return $dataMateriel;
}

function materielInfoSpec($id)
{
    $bdd=NULL;
    //appel de dbConnect pour instancier une connexion à la base de donnée
    $bdd=dbConnect();

    $statement = $bdd->prepare("SELECT * FROM `materiel` where Id=? AND deleted!=1");
    $statement->execute(array($id));
    $dataMateriel = $statement->fetchAll(PDO::FETCH_ASSOC);
    $bdd=NULL;
    return $dataMateriel;
}

function updateMateriel($desc,$id){
    $bdd=NULL;
    //appel de dbConnect pour instancier une connexion à la base de donnée
    $bdd=dbConnect();
    $updateMateriel = $bdd->prepare("UPDATE `materiel` SET `Description` =:descr WHERE `materiel`.`Id` = :id");
    $updateMateriel->execute(array(":descr"=>$desc, ":id"=>$id));    
}
//Améliorer avec des objets directement

function createMateriel(Materiel $mat){
    $bdd=NULL;
    $codeBarre=$mat->getCodeBarre();
    $nom=$mat->getNom();
    $description=$mat->getDescription();
    $dateAchat=$mat->getDateAchat();
    $prixAchat=$mat->getPrixAchat();
    $fournisseurId=$mat->getFournisseurId();
    //appel de dbConnect pour instancier une connexion à la base de donnée
    $bdd=dbConnect();
    $newMateriel = $bdd->prepare("INSERT INTO `materiel` (`CodeBarre`, `Nom`, `Description`, `DateAchat`, `PrixAchat`,`Fournisseur_Id`) VALUES ( ?, ?, ?, ?, ?, ?);");
    $newMateriel->execute(array($codeBarre,$nom,$description,$dateAchat,$prixAchat,$fournisseurId));
}

function deleteMateriel($idMateriel){
    $bdd=NULL;
    //appel de dbConnect pour instancier une connexion à la base de donnée
    $bdd=dbConnect();
    $updatePret = $bdd->prepare("UPDATE `materiel` SET `Deleted` = '1' WHERE `materiel`.`id` = ?");
    $updatePret->execute(array($idMateriel));    
}



// Fournisseur 
function materielFournisseur()
{
    $bdd=NULL;
    //appel de dbConnect pour instancier une connexion à la base de donnée
    $bdd=dbConnect();

    $statement = $bdd->prepare("SELECT * FROM `fournisseur`");
    $statement->execute();
    $dataFournisseur = $statement->fetchAll(PDO::FETCH_ASSOC);
    $bdd=NULL;
    return $dataFournisseur;
}

//Statistique


//Nombre de matériels emprunté en ce moment
function statsEmprunt(){
    $bdd=NULL;
    //appel de dbConnect pour instancier une connexion à la base de donnée
    $bdd=dbConnect();
    $statement = $bdd->prepare("SELECT COUNT(*) FROM `pret` WHERE (`DateRendu`>NOW() or `DateRendu`is NULL)");
    $statement->execute();
    $statEmprunt = $statement->fetch();
    $statEmprunt=$statEmprunt[0];
    $bdd=NULL;
    return $statEmprunt;

}
//Nombre de matériels non rendu (qui aurait du être rendu)
function statsEmpruntNonRendu(){
    $bdd=NULL;
    //appel de dbConnect pour instancier une connexion à la base de donnée
    $bdd=dbConnect();
    $statement = $bdd->prepare("SELECT COUNT(*) FROM `pret` WHERE (`DateRendu`>`DateFinPrevu` or DateRendu is NULL)");
    $statement->execute();
    $statEmpruntNonRendu = $statement->fetch();
    $statEmpruntNonRendu=$statEmpruntNonRendu[0];
    $bdd=NULL;
    return $statEmpruntNonRendu;

}

//Nombre de matériels total
function statsMaterielDispo(){
    $bdd=NULL;
    //appel de dbConnect pour instancier une connexion à la base de donnée
    $bdd=dbConnect();
    $statement = $bdd->prepare("SELECT count(*) FROM `materiel` WHERE DELETED=0 ");
    $statement->execute();
    $statMateriel = $statement->fetch();
    $statMateriel=$statMateriel[0];
    $bdd=NULL;
    return $statMateriel;

}

//Nombre de matériel à rendre dans les 30 jours à venir
function statMaterielRendre(){
    $bdd=NULL;
    //appel de dbConnect pour instancier une connexion à la base de donnée
    $bdd=dbConnect();
    $statement = $bdd->prepare("SELECT count(*) from PRET where (`DateFinPrevu`<= DATE_ADD(NOW(), INTERVAL 30 DAY))");
    $statement->execute();
    $statMaterielRendre = $statement->fetch();
    $statMaterielRendre=$statMaterielRendre[0];
    $bdd=NULL;
    return $statMaterielRendre;

}

//recherche par Description
function findMaterielbyDescription($description_find){
    $bdd=NULL;
    //appel de dbConnect pour instancier une connexion à la base de donnée
    $bdd=dbConnect();
    $findDesc = $bdd->prepare("SELECT * FROM `materiel` WHERE Description LIKE :descr ");
    $findDesc->execute(array(":descr" =>'%' .$description_find. '%')); 
    $findDesc = $findDesc->fetchAll(PDO::FETCH_ASSOC);
    $bdd=NULL;  
    
    return $findDesc;
}
//recherche par NOM 
function findMaterielbyName($name_find){
    $bdd=NULL;
    //appel de dbConnect pour instancier une connexion à la base de donnée
    $bdd=dbConnect();
    $findName = $bdd->prepare("SELECT * FROM `materiel` WHERE Nom LIKE :nom ");
    $findName->execute(array(":nom"=>'%' .$name_find. '%'));    
    $findName = $findName->fetchAll(PDO::FETCH_ASSOC);
    $bdd=NULL;
    
    return $findName;

}
//recherche par code_Barre
function findMaterielbyCB($cb_find){
    $bdd=NULL;
    //appel de dbConnect pour instancier une connexion à la base de donnée
    $bdd=dbConnect();
    $findCB = $bdd->prepare("SELECT * FROM `materiel` WHERE CodeBarre = ? ");
    $findCB->execute(array($cb_find));    
    $findCB = $findCB->fetchAll(PDO::FETCH_ASSOC);
    $bdd=NULL;
    return $findCB;
}


function main(){
    
        
  
}

main();

?>
