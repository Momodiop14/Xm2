	$(document).ready(function() 
		{
			// Récupère le div qui contient la collection de trajets
				var collectionHolder = $("div#form_covoiturage_trajets");

				// ajoute un lien « add a tag »
				var $addTagLink = $('<a href="" class=" btn btn-default add_tag_link"><span class="fa fa-plus" ></span> Ajouter une ville de passage </a>');
				var $newLinkLi = $('<div></div>').append($addTagLink);

				jQuery(document).ready(function() {
				    // ajoute l'ancre « ajouter un tag » et li à la balise ul
				    collectionHolder.append($newLinkLi);

				    $addTagLink.on('click', function(e) {
				        // empêche le lien de créer un « # » dans l'URL
				        e.preventDefault();

				        // ajoute un nouveau formulaire tag (voir le prochain bloc de code)
				        addTagForm(collectionHolder, $newLinkLi);
				    });

				    collectionHolder.find('div#form_covoiturage_trajets .form-control').each(function() {
				    	  alert($(this).attr('id') );
					        addTagFormDeleteLink($(this));
					    });
				});


				function addTagForm(collectionHolder, $newLinkLi) {
					    
					    // Récupère l'élément ayant l'attribut data-prototype comme expliqué plus tôt
					    var prototype = collectionHolder.attr('data-prototype');

					    // Remplace '__name__' dans le HTML du prototype par un nombre basé sur
					    // la longueur de la collection courante
					    var newForm = prototype.replace(/__name__/g, collectionHolder.children().length);

					    // Affiche le formulaire dans la page dans un li, avant le lien "ajouter un tag"
					    var $newFormLi = $('<div></div>').append(newForm);
					    $newLinkLi.before($newFormLi);
                        
                        // ajoute un lien de suppression au nouveau formulaire
    					addTagFormDeleteLink($newFormLi);
                         
					   $('div#form_covoiturage_trajets label.required').hide();
                                                       
                       tab = $("div#form_covoiturage_trajets .address") ;
                       
                       $("div#form_covoiturage_trajets .form-group").css('display','inline');

                       makeAutocomplete( tab[tab.length-1].id );
					   
					  
					}


			   function addTagFormDeleteLink($tagFormLi) 
			     {
					    var $removeFormA = $('<a href="" class="btn btn-danger"><span class="fa fa-trash" ></span> </a>');
					    $tagFormLi.append($removeFormA);

					    $removeFormA.on('click', function(e) {
					        // empêche le lien de créer un « # » dans l'URL
					        e.preventDefault();

					        // supprime l'élément li pour le formulaire de tag
					        $tagFormLi.remove();
					    });
                 }


                  $('.datepicker').datepicker({
                         startDate : 'today',
                         endDate   : '+60d',
                         language : 'fr',
                         todayHighlight :true,
                         weekStart : 1 ,
                         format: 'dd-mm-yyyy',

                                             });


		});

