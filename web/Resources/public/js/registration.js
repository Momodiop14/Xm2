               $(document).ready(function(){
                  
                  $('.resetForm').hide();
                 
                   
                    if(document.getElementById('login')!=null)
                     {
                         $('#LoginModal').modal('show');
                     }

                          
                     $('#reset').click(function () {
                         
                         $('#loginLabel').text('Réinitialisation de mot de passe');
                         $('.loginForm').slideUp(500);
                         $('.resetForm').slideDown(500);
                     });

                     $('.datepicker').datepicker({
                         startDate : '-21915d',
                         endDate   : '-6574d',
                         language : 'fr',
                         weekStart : 1 ,
                         format: 'dd-mm-yyyy',
                         
                                             });
                    


                });



