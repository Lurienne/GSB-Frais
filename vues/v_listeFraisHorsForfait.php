<?php if ($infoFrais['idEtat'] == 'CL') { 

} else {

} ?>
<table class="listeLegere">
	<caption>Descriptif des éléments hors forfait
	</caption>
	<tr>
		<th class="date">Date</th>
		<th class="libelle">Libellé</th>  
		<th class="libelle">Justificatif</th>  
		<th class="montant">Montant</th> 
		<?php if ($infoFrais['idEtat'] != 'CL') echo '<th class="action">&nbsp;</th>'; ?>          
	</tr>

	<?php    
	foreach( $lesFraisHorsForfait as $unFraisHorsForfait) 
	{
		$libelle = $unFraisHorsForfait['libelle'];
		$date = $unFraisHorsForfait['date'];
		$montant=$unFraisHorsForfait['montant'];
		$id = $unFraisHorsForfait['id'];
		$justificatif = $unFraisHorsForfait['justificatif'];
		?>		
		<tr>
			<td> <?php echo $date ?></td>
			<td><?php echo $libelle ?></td>
			<td><?php if(!empty($justificatif)) echo '<a href="' . $justificatif . '"><img src="images/file.png" alt="justificatif" /></a>'; else echo "aucun"; ?></td>
			<td><?php echo $montant ?></td>
			<?php if ($infoFrais['idEtat'] != 'CL') { ?>
			<td><a href="index.php?uc=gererFrais&action=supprimerFrais&idFrais=<?php echo $id ?>" 
				onclick="return confirm('Voulez-vous vraiment supprimer ce frais?');">Supprimer ce frais</a></td>
				<?php } ?>
			</tr>
			<?php		 

		}
		?>	  

	</table>
	<?php if ($infoFrais['idEtat'] != 'CL') { ?>
	<form action="index.php?uc=gererFrais&action=validerCreationFrais" method="post" enctype="multipart/form-data">
		<div class="corpsForm">

			<fieldset>
				<legend>Nouvel élément hors forfait
				</legend>
				<p>
					<label for="txtDateHF">Date (jj/mm/aaaa): </label>
					<input type="text" id="txtDateHF" name="dateFrais" size="25" maxlength="10" value=""  />
				</p>
				<p>
					<label for="txtLibelleHF">Libellé</label>
					<input type="text" id="txtLibelleHF" name="libelle" size="25" maxlength="256" value="" />
				</p>
				<p>
					<label for="txtMontantHF">Montant : </label>
					<input type="text" id="txtMontantHF" name="montant" size="25" maxlength="10" value="" />
				</p>
				<p>
					<label for="txtJustificatif">Justificatif : </label>
					<input type="file" id="txtJustificatif" name="justificatif">
				</p>
			</fieldset>
		</div>
		<div class="piedForm">
			<p>
				<input id="ajouter" type="submit" value="Ajouter" size="20" />
				<input id="effacer" type="reset" value="Réinitialier" size="20" />
			</p> 
		</div>

	</form>
	<?php } ?>
</div>


