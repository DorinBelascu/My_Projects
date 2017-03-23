function Agenda( parameters )
{
	this.token        = parameters.token;
	// Persoane
	this.url_adauga   = parameters.url_adauga;
	this.url_sterge   = parameters.url_sterge;
	this.url_editeaza = parameters.url_editeaza;
	// EndPersoane

	// Grupuri
	this.url_adaugaGrup   = parameters.url_adaugaGrup;
	this.url_stergeGrup   = parameters.url_stergeGrup;
	this.url_editeazaGrup = parameters.url_editeazaGrup;
	this.url_gasesteGrup  = parameters.url_gasesteGrup;
 	// End Grupuri

	var id   = '';
	var idAccordion = '5';
	var simbolGrup = '';
	var self = this;

	this.afiseazaEroare = function(field, mesaj)
	{
		$('#' + field).next().html(mesaj);
		$('#' + field).closest('div').addClass('has-error');
	}

	this.afiseazaMesajeEroare = function(mesaje)
	{ 
		for(field in mesaje)
		{
			// console.log(field, mesaje[field][0]);
			this.afiseazaEroare(field,  mesaje[field][0]);
		}
	}


	// Adaugare Persoane
	this.adaugaPersoana = function(nume, prenume, email, telefon, grup)
	{
		this.stergeMesajeEroare();
		$.ajax({
			url     : self.url_adauga,
			type    : "post",
			dataType: "json",
			data    : { _token  : self.token, 
						nume    : nume,
						prenume : prenume,
						email   : email,
						telefon : telefon,
						grup    : grup
					  },
			success : function(result)
				{
					if (result.success == false)
					{
						self.afiseazaMesajeEroare(result.messages);
					}
					else
					{
						$('#myModal').modal('hide');
						location.reload();
					}
				}
		});
	}

	this.stergeMesajeEroare = function()
	{
		$('.has-error').find('span').html('');
		$('.has-error').removeClass('has-error');
	}

	$('#lansator-modal').click(function()
	{
		self.stergeMesajeEroare();
		$('#myModal').modal('show');
		$('#actiune').html('add');
		$('.label-modal').html('Adauga Persoana');
	})

	$('#modal-adauga-editeaza-persoana').click(function()
	{
		var actiune = $('#actiune').html();
		var nume = $('#nume').val();
		var prenume = $('#prenume').val();
		var email = $('#email').val();
		var telefon = $('#telefon').val();
		var grup = $('#grup').val();
		if ( actiune == 'add')
		{
			self.adaugaPersoana(nume, prenume, email, telefon, grup);
		}
		else
		{
			self.modificaPersoana(self.id, nume, prenume, email, telefon, grup);
		}
	})
	// Final Adaugare Persoane

	// Stergere Persoane
	this.stergePersoana = function (id)
	{
		$.ajax({
			url     : self.url_sterge,
			type    : "post",
			dataType: "json",
			data    : { _token  : self.token, 
						id		: id
					  },
			success : function(result)
				{

				}
		});
	}

	$('.stergePersoana').click(function()
	{
		$(this).closest('figure').remove();
		var id = $(this).closest('figure').data('id');
		self.stergePersoana(id);
	});
	// Final Stergere Persoane

	// Editare Persoane
	$('.editeazaPersoana').click(function()
	{
		var nume = $(this).closest('figure').data('nume');
		var prenume = $(this).closest('figure').data('prenume');
		var email = $(this).closest('figure').data('email');
		var telefon = $(this).closest('figure').data('telefon');
		var grup = $(this).closest('figure').data('grup');
		self.id = $(this).closest('figure').data('id');
		$('#nume').val(nume);
		$('#prenume').val(prenume);
		$('#telefon').val(telefon);
		$('#email').val(email);
		$('#grup').val(grup);
		$('#actiune').html('edit');
		$('.label-modal').html('Editeaza Persoana ' + nume + ' ' +  prenume);
		$('#myModal').modal('show');
	})

	this.modificaPersoana = function(id, nume, prenume, email, telefon, grup)
	{
		$.ajax({
			url     : self.url_editeaza,
			type    : "post",
			dataType: "json",
			data    : { _token  : self.token,
						id      : id, 
						nume    : nume,
						prenume : prenume,
						email   : email,
						telefon : telefon,
						grup    : grup
					  },
			success : function(result)
				{
					if (result.success == false)
					{
						self.afiseazaMesajeEroare(result.messages);
					}
					else
					{
						$('#myModal').modal('hide');
						location.reload();
					}
				}
		});
	}
	// Final Editare Persoane
	// Poza Persoane
	$('.accordion-content').hide();

	$('figure>.show-photo-form').click(function()
	{
		var content = '#accordion-' + $(this).data('id');
		if (self.idAccordion) 
		{
			if ($(this).data('id') == self.idAccordion) 
			{
				$(content).slideToggle();
				self.idAccordion = $(this).data('id');
			}
			else
			{
				$('.accordion-content').slideUp();
				self.idAccordion = $(this).data('id');
				$(content).slideToggle();
			}
		}
		else
		{
			$(content).slideToggle();
			self.idAccordion = $(this).data('id');
		}
	});
	// Final Poza Persoane


	// Grupuri
	this.adaugaGrup = function(denumire)
	{
		this.stergeMesajeEroare();
		$.ajax({
			url     : self.url_adaugaGrup,
			type    : "post",
			dataType: "json",
			data    : { _token   : self.token, 
						denumire : denumire,
						simbol   : self.simbolGrup
					  },
			success : function(result)
				{
					if (result.success == false)
					{
						self.afiseazaMesajeEroare(result.messages);
					}
					else
					{
						$('#myModal').modal('hide');
						location.reload();
					}
				}
		});
	};
	$('.simbol-grup').click(function()
	{
		$('.simbol-grup').removeClass('active');
		$(this).addClass('active');
		self.simbolGrup = $(this).data('simbol');
	});

	$('#modal-adauga-editeaza-grup').click(function()
	{
		var actiune  = $('#actiune').html();
		var denumire = $('#denumire').val();
		if ( actiune == 'add')
		{
			self.adaugaGrup(denumire);
		}
		else
		{
			self.modificaGrup(self.id, denumire);
		}
	})

	$('#lansator-modal-adaugare').click(function()
	{
		self.stergeMesajeEroare();
		$('#actiune').html('add');
		$('.label-modal').html('Adaugare Grup');
		$('#modal-grup').modal('show');
	})

	$('.stergeGrup').click(function()
	{
		$(this).closest('a').remove();
		$(this).remove();
		var id = $(this).data('id');
		self.stergeGrup(id);
	});

	this.stergeGrup = function (id)
	{
		$.ajax({
			url     : self.url_stergeGrup,
			type    : "post",
			dataType: "json",
			data    : { _token  : self.token, 
						id		: id
					  },
			success : function(result)
				{
					location.reload();
				}
		});
	};

	$('.editeazaGrup').click(function()
	{
		var denumire = $(this).data('denumire');
		var simbol =$(this).data('simbol');
		self.id = $(this).data('id');
		$('#denumire').val(denumire);
		$('.label-modal').html('Editeaza Grupul ' + denumire);
		$('#actiune').html('edit');
		$('#modal-grup').modal('show');
		$('.fa-' + simbol).addClass('active');
	});


	this.modificaGrup = function(id, denumire)
	{
		$.ajax({
			url     : self.url_editeazaGrup,
			type    : "post",
			dataType: "json",
			data    : { _token   : self.token,
						id       : id, 
						denumire : denumire,
						simbol   : self.simbolGrup
					  },
			success : function(result)
				{
					if (result.success == false)
					{
						self.afiseazaMesajeEroare(result.messages);
					}
					else
					{
						$('#myModal').modal('hide');
						location.reload();
					}
				}
		});
	}
	// Final Grupuri

	// Cautare


function formatGrup (data) 
	{
	    if (data.loading) return data.denumire;

	    var markup = '<div class="clearfix">' +
	    '<div class="col-sm-1">' + '</div>' + '</div>'
	    // '<img src="' + repo.owner.avatar_url + '" style="max-width: 100%" />' +
	    // '</div>' +
	    // '<div clas="col-sm-10">' +
	    // '<div class="clearfix">' +
	    // '<div class="col-sm-6">' + data.full_name + '</div>' +
	    // '<div class="col-sm-3"><i class="fa fa-code-fork"></i> ' + data.forks_count + '</div>' +
	    // '<div class="col-sm-2"><i class="fa fa-star"></i> ' + data.stargazers_count + '</div>' +
	    // '</div>';

	    if (data.description) {
	      markup += '<div>' + data.description + '</div>';
	    }

	    markup += '</div></div>';

	    return markup;
  	}

  	function formatGrupSelection (data) 
	{
    	return data.denumire;
  	}



	$(".js-data-example-ajax").select2({
	  ajax: {
	    url: self.url_gasesteGrup,
	    type: 'post',
	    dataType: 'json',
	    delay: 250,
	    data: function (params) {
	      return {
	        q   : params.term,
	        _token: self.token
	      };
	    },


		processResults: function(data, page) {
			searched = data.searched;
			return {results: data.items};
	},

	    cache: true
	  },
	  escapeMarkup: function (markup) { return markup; }, // let our custom formatter work
	  minimumInputLength: 1,
	  templateResult: formatGrup, // omitted for brevity, see the source of this page
	  templateSelection: formatGrupSelection // omitted for brevity, see the source of this page
	});



	// End Cautare
}


	