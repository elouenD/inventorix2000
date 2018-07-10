<?php
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

    $statement = $bdd->prepare("SELECT * FROM utilisateur");
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
    $datauser = $statement->fetchAll(PDO::FETCH_ASSOC);
    $bdd=NULL;
    return $dataUserSpec;
}

//Affiche les infos d'un utilisateurs 

function userInfoPrint($dataUser)
{
    //affichage du tableau 
    print_r($dataUser);

}


//
function createUser($nom,$prenom,$mail,$login,$password){
    $bdd=NULL;
    //appel de dbConnect pour instancier une connexion à la base de donnée
    $bdd=dbConnect();
    $newUser = $bdd->prepare("INSERT INTO `utilisateur` ( `Nom`, `Prenom`, `Mail`, `Login`, `Password`) VALUES ( ?, ?, ?, ?, ?);");
    $newUser->execute(array($nom,$prenom,$mail,$login,$password));
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

function coucou(){
    echo 'coucou!';
}

//Emprunt 

function empruntInfo()
{
    $bdd=NULL;
    //appel de dbConnect pour instancier une connexion à la base de donnée
    $bdd=dbConnect();

    $statement = $bdd->prepare("SELECT * FROM pret");
    $statement->execute();
    $dataPret = $statement->fetchAll(PDO::FETCH_ASSOC);
    $bdd=NULL;
    return $dataPret;
}

function updateEmprunt($idPret,$dateRendu){
    $bdd=NULL;
    //appel de dbConnect pour instancier une connexion à la base de donnée
    $bdd=dbConnect();
    $updatePret = $bdd->prepare("UPDATE `pret` SET `DateRendu` = ? WHERE `pret`.`Id` = ?");
    $updatePret->execute(array($dateRendu,$idPret));
}
//Améliorer avec des objets directement
function createEmprunt($dateDebut,$dateFinPrevu,$dateRendu,$idMateriel,$idUser){
    $bdd=NULL;
    //appel de dbConnect pour instancier une connexion à la base de donnée
    $bdd=dbConnect();
    $newPret = $bdd->prepare("INSERT INTO `pret` (`DateDebut`, `DateFinPrevu`, `DateRendu`, `Utilisateur_Id`, `Materiel_id`) VALUES ( ?, ?, ?, ?, ?);");
    $newPret->execute(array($dateDebut,$dateFinPrevu,$dateRendu,$idUser,$idMateriel));
}



 

//Materiel 


function materielInfo()
{
    $bdd=NULL;
    //appel de dbConnect pour instancier une connexion à la base de donnée
    $bdd=dbConnect();

    $statement = $bdd->prepare("SELECT * FROM `materiel`");
    $statement->execute();
    $dataMateriel = $statement->fetchAll(PDO::FETCH_ASSOC);
    $bdd=NULL;
    return $dataMateriel;
}
/*
function updateMateriel($){
    $bdd=NULL;
    //appel de dbConnect pour instancier une connexion à la base de donnée
    $bdd=dbConnect();
    $updateMateriel = $bdd->prepare("UPDATE `pret` SET `DateRendu` = ? WHERE `pret`.`Id` = ?");
    $updateMateriel->execute(array());    
}*/
//Améliorer avec des objets directement
function createMateriel($codeBarre,$nom,$description,$dateAchat,$prixAchat,$fournisseurId){
    $bdd=NULL;
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



// 


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
function statsMateriel(){
    $bdd=NULL;
    //appel de dbConnect pour instancier une connexion à la base de donnée
    $bdd=dbConnect();
    $statement = $bdd->prepare("SELECT count(*) FROM `materiel` WHERE DELETED=0");
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

function main(){
    

   $users=userInfo();
  
}

main();

?>
