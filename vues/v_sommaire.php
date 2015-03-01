<!-- Division pour le sommaire -->
<div id="menuGauche">
   <div id="infosUtil">

   </div>  
   <ul id="menuList">
     <li >
       <?php echo $_SESSION['groupe']; ?> connecté:<br>
       <?php echo $_SESSION['prenom']."  ".$_SESSION['nom']  ?>
    </li>

    <?php if ($_SESSION['groupe'] == 'Visiteur') { ?>
    <li class="smenu">
       <a href="index.php?uc=gererFrais&action=saisirFrais" title="Saisie fiche de frais ">Saisie fiche de frais</a>
    </li>
    <li class="smenu">
       <a href="index.php?uc=etatFrais&action=selectionnerMois" title="Consultation de mes fiches de frais">Mes fiches de frais</a>
    </li>
    <?php } ?>

    <?php if ($_SESSION['groupe'] == 'Comptable') { ?>
    <li class="smenu">
       <a href="index.php?uc=validationFrais&action=valideFrais" title="Validation des Frais">Validation des Frais</a>
    </li>
    <?php } ?>
    <li class="smenu">
       <a href="index.php?uc=connexion&action=deconnexion" title="Se déconnecter">Déconnexion</a>
    </li>
 </ul>     
</div>
