var Ajax = function(years, month, idVisiteur) {
	this.month = month;
	this.years = years;
	this.idVisiteur = idVisiteur;
	this.tabForfait;
	this.tabHorsForfait;
	this.tabIdHorsForfait;
	this.situation = [];
	this.etatForfait = '';
	var self = this;

	this.setMonth = function(month) {
		this.month = month;
	}

	this.setYears = function(years) {
		this.years = years;
	}

	this.setIdVisiteur = function(idVisiteur) {
		this.idVisiteur = idVisiteur;
	}

	this.majForfaitData = function() {
		var tabForfait = new Array();
		
		$('.tableForfait input').each(function(index){
			tabForfait[index] = $(this).val();
			
		})

		this.tabForfait = tabForfait;
		self.requete();
		this.tabForfait = undefined;
		
	}

	this.majHorsForfaitData = function() {
		var tabHorsForfait = new Array();
		var tabIdHorsForfait = new Array();
		var i = 0;
		$('.tableHorsForfait td').each(function(index){
			var elem = $(this).children();
			if ($(elem).attr('value') != undefined) {
				tabHorsForfait[i] = $(elem).val();
				tabIdHorsForfait[i] = $(elem).parent().parent().attr('id');
				i++;
			}			
		})

		this.tabHorsForfait = tabHorsForfait;
		console.log(tabHorsForfait);
		this.tabIdHorsForfait = tabIdHorsForfait;
		self.requete();
		this.tabHorsForfait = undefined;
		this.tabIdHorsForfait = undefined;
	}

	this.requete = function() {
		$.ajax({
		type: "POST",
			url: "index.php?uc=validationFrais&action=valideFrais",
			data: { 
				month: this.month, 
				idVisiteur: this.idVisiteur,
				years: this.years,
				tabForfait: this.tabForfait,
				tabHorsForfait: this.tabHorsForfait,
				tabIdHorsForfait: this.tabIdHorsForfait,
				etatForfait: this.etatForfait
			}
		}).success(function( msg ) {
			$( '#ficheFrai' ).html( msg );

			$('body').on('click', '.situSave',function(){
				
			})

			$('.tableForfait tr td').change(function() {
				
				if ($(this).hasClass('etat')) {
					$('body').on('click', '.situSave',function(){
						self.etatForfait =  $(this).attr('value');
						self.majForfaitData();
					})
				} else				
				self.majForfaitData();			
			});

			$('.tableHorsForfait tr td').change(function() {			
				self.majHorsForfaitData();				
			});
		});
	}
}

$(function(){
	var idVisiteur = $('.lstVisiteur').val();
	var month = $('.monthValid').val();
	var years = $('.anneeValid').val();	

	var classAjax = new Ajax(years, month, idVisiteur);
	classAjax.requete();

	$( ".lstVisiteur" ).change(function() {
		idVisiteur = $(this).val();
		classAjax.setIdVisiteur(idVisiteur);
		classAjax.requete();
	});

	$( ".monthValid" ).change(function() {
		month = $(this).val();
		classAjax.setMonth(month);
		classAjax.requete();
	});

	$( ".anneeValid" ).change(function() {
		years = $(this).val();
		classAjax.setYears(years);
		classAjax.requete();
	});	
})
