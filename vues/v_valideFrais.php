<div id="contenu">
 <h2> Validation des frais par visiteur </h2>

	<label class="titre">Choisir le visiteur :</label>
	<select name="lstVisiteur" class="zone lstVisiteur">
		<?php foreach ($listVisiteur as $visiteur) 
		{
			echo '<option value="' . $visiteur['id'] . '">' . $visiteur['nom'] . '</option>';
		}
		?>
	</select>	

	<label class="titre">Mois :</label> 
	<select name="monthValid" class="zone monthValid">
		<?php foreach (month() as $key => $month) 
		{
			if (intval(date('m')) == $key) 
				echo '<option value="'.$key.'" selected>' . $month . '</option>';
			else 
				echo '<option value="'.$key.'">' . $month . '</option>';
		}
		?>
	</select>

	<label class="titre">Année :</label> 
	<select name="anneeValid" class="zone anneeValid">
		<?php 
		$annee = date("Y")+1; // le nombre indique à partir de quelle année avant celle en cours le script commence à compter
		while($annee >= date("Y")- 5) { // le nombre indique à combien d'années avant doit s'arréter le choix
			$annee = $annee -1 ;
			echo "<option value=\"$annee\">$annee</option>";
		} 
		?>
	</select>
	
	<div id="ficheFrai"></div>

</div>