<?php
 class utilisateur {
	private $id;
	private $nom;
        private $adresse;
        private $idIntitule;
        private $identifiantConnexion;
        private $motDePasseConnexion;
	
function getId () {
	return $this->id;
}

function getNom() {
        return $this->nom;
}
function getAdresse(){
        return $this->adresse;
}
function getIdIntitule(){
    return $this->idIntitule;
}
function getIdentifiantConnexion(){
    return $this->identifiantConnexion;
}
function getMotDePasseConnexion(){
    return $this->motDePasseConnexion;
}


function lire_infos_profil($id,$nom,$adresse,$idIntitule,$identifiantConnexion,$motDePasseConnexion) {

	$pdo = PDO2::getInstance();

	$requete = $pdo->prepare("SELECT id,nom,adresse,idIntitule,identifiantConnexion,motDePasseConnexion
                                  FROM utilisateur
                                  WHERE id = :id");

	$requete->bindValue(':id', $id);
        $requete->bindValue(':nom',$nom);
        $requete->bindValue(':adresse',$adresse);
        $requete->bindValue(':idIntitule',$idIntitule);
        $requete->bindValue(':identifiantConnexion',$identifiantConnexion);
        $requete->bindValue(':motDePasseConnexion',$motDePasseConnexion);
	
	
	try{
                $requete->execute();
                $ligne= $requete->fetch();
                return $ligne['intitule'];
        }
        catch (Exception $e){
                    echo 'erreur. Impossible de récupérer l\'intitulé'.$e;
                    return false;
        }   
}
	
	
	



function ajouter_profil_dans_bdd($id,$nom,$adresse,$idIntitule,$identifiantConnexion,$motDePasseConnexion) {

	$pdo = PDO2::getInstance();

	$requete = $pdo->prepare("INSERT INTO utilisateur Values(
                                                            null,
                                                            :nom,:adresse,:idIntitule,:identifiantConnexion,:motDePasseConnexion
                                    )");
	$requete->bindValue(':id', $id);
        $requete->bindValue(':nom',$nom);
        $requete->bindValue(':adresse',$adresse);
        $requete->bindValue(':idIntitule',$idIntitule);
        $requete->bindValue(':identifiantConnexion',$identifiantConnexion);
        $requete->bindValue(':motDePasseConnexion',$motDePasseConnexion);
	
	
        try{
                $requete->execute() ;
                $dernierId = $pdo->lastInsertId();
                return $dernierId;
        }
        catch (Exception $e){
                    echo 'erreur. Impossible d\'ajouter l\'intitulé'.$e;
                    return false;
        }
        return($requete);
}



function modifier_profil_dans_bdd($id,$nom,$adresse,$idIntitule,$identifiantConnexion,$motDePasseConnexion) {

	$pdo = PDO2::getInstance();

	$requete = $pdo->prepare("UPDATE utilisateur SET
                                    		id=:id
                                                nom=:nom
                                                adresse=:adresse
                                                identifiantConnexion=:identifiantConnexion
                                                motDePasseConnexion=:motDePasseConnexion
                                                idIntitule=:idIntitule
                                                
                                                
                                		where id=:id");

	
	
        
        $requete->bindValue(':id', $id);
        $requete->bindValue(':nom',$nom);
        $requete->bindValue(':adresse',$adresse);
        $requete->bindValue(':idIntitule',$idIntitule);
        $requete->bindValue(':identifiantConnexion',$identifiantConnexion);
        $requete->bindValue(':motDePasseConnexion',$motDePasseConnexion);

	try{
                $requete->execute();
               
        }
        catch (Exception $e){
                    echo 'erreur. Impossible de modifier l\'intitulé'.$e;
                   
        }   
}

function supprimer_profil_dans_bdd($id,$nom,$adresse,$idIntitule,$identifiantConnexion,$motDePasseConnexion) {

	$pdo = PDO2::getInstance();

	$requete = $pdo->prepare("DELETE * FROM utilisateur 
                                  where id=:id");

	
        $requete->bindValue(':id', $id);

	try{
                $requete->execute();
                
        }
        catch (Exception $e){
                    echo 'erreur. Impossible de supprimer l\'intitulé'.$e;
                    
        }   
}



function chargerprofil() {

	$pdo = PDO2::getInstance();

	$requete = $pdo->prepare("SELECT * FROM utilisateur");
	
	$requete->execute();
        
        
        try{
                $requete->execute();
                $tab = $requete->fetchAll();
		$requete->closeCursor();
                return $tab;
        }
        catch (Exception $e){
                    echo 'erreur. Impossible de récupérer les profils'.$e;
                    return false;
        }   
	
}
 }
?>
