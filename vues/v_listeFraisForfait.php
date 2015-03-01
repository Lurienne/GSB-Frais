<div id="contenu">
	<?php if ($infoFrais['idEtat'] == 'CL') echo '<h2 style="color:red">Fiche cloturée du mois '. $numMois . '-' . $numAnnee . '</h2>'; 
	else echo '<h2>Renseigner ma fiche de frais du mois '. $numMois . '-' . $numAnnee . '</h2>'; ?>
	 

	<?php if ($infoFrais['idEtat'] == 'CL') { 
		foreach ($lesFraisForfait as $unFrais){
			$idFrais = $unFrais['idfrais'];
			$libelle = $unFrais['libelle'];
			$quantite = $unFrais['quantite'];

			echo '<p>' . $libelle . ' = ' . $quantite .' €</p>';

		}
	} else { ?>
		<form method="POST"  action="index.php?uc=gererFrais&action=validerMajFraisForfait">
			<div class="corpsForm">         
				<fieldset>
					<legend>Eléments forfaitisés</legend>
					<?php
					foreach ($lesFraisForfait as $unFrais){
						$idFrais = $unFrais['idfrais'];
						$libelle = $unFrais['libelle'];
						$quantite = $unFrais['quantite'];
					?>

					<p>
						<label for="idFrais"><?php echo $libelle ?></label>
						<input type="text" id="idFrais" name="lesFrais[<?php echo $idFrais?>]" size="10" maxlength="5" value="<?php echo $quantite?>" >
					</p>
				
					<?php
						}
					?>
			
				</fieldset>
			</div>

			<div class="piedForm">
				<p>
					<input id="ok" type="submit" value="Valider" size="20" />
					<input id="annuler" type="reset" value="Effacer" size="20" />
				</p> 
			</div>
		</form>
	<?php } ?>
	  
  