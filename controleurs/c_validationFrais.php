<?php
$idVisiteur = $_SESSION['idVisiteur'];
$action = $_REQUEST['action'];

switch($action){
	case 'valideFrais':{
		$listVisiteur = $pdo->getListVisiteur();
		break;
	}
}

if (isset($_POST['month']) && isset($_POST['years']) && isset($_POST['idVisiteur'])) {
	$month = htmlentities($_POST['month']);
	$years = htmlentities($_POST['years']);
	$idDuVisiteur = htmlentities($_POST['idVisiteur']);
	$mois = $years . sprintf('%02d', $month);	
	$etatForfait = htmlentities($_POST['etatForfait']);
	if (isset($_POST['tabForfait'])) {		
		$arrayKey = array('REP','NUI','ETP','KM');
		$lesFrais = array_combine($arrayKey, $_POST['tabForfait']);
		$pdo->majFraisForfait($idDuVisiteur, $mois, $lesFrais);
		$pdo->majEtatFicheFrais($idVisiteur,$mois,$etatForfait);
	}

	if (isset($_POST['tabHorsForfait'])) {
		$lesFrais = constructArray($_POST['tabHorsForfait'], $_POST['tabIdHorsForfait']);
		$pdo->majFraisHorsForfait($lesFrais);
	}
	
	$getLesFraisForfait = $pdo->getLesFraisForfait($idDuVisiteur, $mois);
	$getEtatForfait = $pdo->getLesInfosFicheFrais($idVisiteur,$mois);
	$getLesFraisHorsForfait = $pdo->getLesFraisHorsForfait($idDuVisiteur, $mois);
	$justificatif = $pdo->getNbjustificatifs($idDuVisiteur, $mois);

	include("vues/ajax/v_valideFraisAjax.php");
	die;
} else {
	include("vues/v_sommaire.php");
	include("vues/v_valideFrais.php");
}
?>