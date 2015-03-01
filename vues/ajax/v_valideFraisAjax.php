<p class="titre" />

<h2>Frais au forfait </h2>	

<table border="1" class="tableForfait">
	<tr>
		<th>Repas midi</th>
		<th>Nuitée </th>
		<th>Etape</th>
		<th>Km </th>
		<th>Situation</th>
	</tr>
	<tr align="center">
		<td width="80"><input type="text" size="3" name="repas" value="<?php if(isset($getLesFraisForfait[3]['quantite'])) echo $getLesFraisForfait[3]['quantite']; else echo 0; ?>"/></td>
		<td width="80"><input type="text" size="3" name="nuitee" value="<?php if(isset($getLesFraisForfait[2]['quantite'])) echo $getLesFraisForfait[2]['quantite']; else echo 0; ?>"/></td> 
		<td width="80"> <input type="text" size="3" name="etape" value="<?php if(isset($getLesFraisForfait[0]['quantite'])) echo $getLesFraisForfait[0]['quantite']; else echo 0; ?>"/></td>
		<td width="80"> <input type="text" size="3" name="km" value="<?php if(isset($getLesFraisForfait[1]['quantite'])) echo $getLesFraisForfait[1]['quantite']; else echo 0; ?>"/></td>
		<td width="80"> 
			<select size="3" name="situ">
				<option value="E">Enregistrer</option>
				<option value="V">Validé</option>
				<option value="R">Remboursé</option>
			</select>
		</td>
	</tr>
	</table>

	<p class="titre" /><h2>Hors Forfait</h2>	
		<?php
			if (!empty($getLesFraisHorsForfait)) {
				echo '<table style="color:white;" border="1" class="tableHorsForfait">
					<tr>
						<th>Date</th>
						<th>Libellé</th>
						<th>Justificatif</th>
						<th>Montant</th>
						<th>Situation</th>
					</tr>';

				foreach ($getLesFraisHorsForfait as $frai) {
					echo '<tr align="center" id="' . $frai['id'] . '">';
					echo '<td width="100" ><input type="text" size="12" name="hfDate1" value="' . $frai['date'] . '"/> </td>';
					echo '<td width="100"><input type="text" size="30" name="hfLib1" value="' . $frai['libelle'] . '"/></td>';
					echo '<td width="100">';
						if(!empty($frai['justificatif'])) 
							echo '<a href="'.$frai['justificatif'].'"><img src="images/file.png" alt="justificatif"/></a>'; 
						else echo 'aucun'; 
					echo '</td>';
					echo '<td width="90"> <input type="text" size="10" name="hfMont1" value="' . $frai['montant'] . '"/></td>';
					echo '<td width="80"> 
							<select size="3" name="hfSitu1">
								<option value="E">Enregistrer</option>
								<option value="V">Validé</option>
								<option value="R">Remboursé</option>
							</select>
						</td>';
					echo "</tr>";
				}				
				echo "</table>";
				echo '<p class="titre"></p>
					<div class="titre">Nb Justificatifs</div><input type="text" class="zone" size="4" name="hcMontant" value="' . $justificatif . '"/>		
					<p class="titre" /><label class="titre">&nbsp;</label><input class="zone"type="reset" /><input class="zone"type="submit" />';
			} else {
				echo 'Pas de fiche de frais pour ce visiteur ce mois';
			}			
		?>