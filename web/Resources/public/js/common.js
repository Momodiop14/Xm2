 function makeAutocomplete (id) 

  {
   autocomplete = new google.maps.places.Autocomplete(document.getElementById(id), { types: ['geocode'], componentRestrictions: {country: 'sn'} }); 
   autocomplete.addListener('place_changed', function () {
      alert("i changed it");
   });
  
  }


 function notify(message,url,type_message)
   {
                     $.notify( {
                                  // options
                                  icon: 'glyphicon glyphicon-warning-sign',
                                  title: 'Notification :',
                                  message: message,
                                  target: url 
                               },
                                   {
                                      // settings
                                      element: 'body',
                                      position: null,
                                      type: type_message,
                                      allow_dismiss: true,
                                      timer: 5000,
                                      placement: {
                                                    from: "top",
                                                    align: "right"
                                                 }
                                   }

                               
                            );                                                                    
                                                                    
  }                
                     
 function init() 
   {   
                           var  directionsDisplay;
                          var directionsService = new google.maps.DirectionsService();
                          var map;
                          var waypts;
                          directionsDisplay = new google.maps.DirectionsRenderer();
                          var dk = new google.maps.LatLng(14.7324023,-17.3881194);
                          var mapOptions = {
                            zoom: 5,
                            center: dk,
                            draggable:true
                          }
                          map = new google.maps.Map(document.getElementById('map'), mapOptions);
                          directionsDisplay.setMap(map);
                          var start = document.getElementById('start').value+'senegal';
                          
                          var end = document.getElementById('end').value+'senegal';
                          waypts = $('.cities');
                          
                          var points=[];
                          if ($('.cities').length>0) 
                           {
                                 for (var i = 0; i < waypts.length; i++) 
                                {
                                    points.push({
                                    location:waypts[i].value+'senegal',
                                    stopover:true});
                               
                                 }
                           }
                            
                           var request = {
                            origin: start,
                            destination: end,
                            waypoints:points,
                            optimizeWaypoints: true,
                            travelMode: google.maps.TravelMode.DRIVING
                                         }
                
                          directionsService.route(request, function(response, status) {
                          if (status == google.maps.DirectionsStatus.OK) {
                            directionsDisplay.setDirections(response);
                            var route = response.routes[0];
                            var summaryPanel = document.getElementById('directions_panel');
                            summaryPanel.innerHTML = '';
                            
                            // For each route, display summary information.
                            for (var i = 0; i < route.legs.length; i++) {
                              var routeSegment = i + 1;
                              summaryPanel.innerHTML += '<b>trajet  :</b> ' + routeSegment + '<br>';
                              summaryPanel.innerHTML += route.legs[i].start_address + ' vers ';
                              summaryPanel.innerHTML += route.legs[i].end_address + '<br>';
                              summaryPanel.innerHTML += '<b>distance :</b>'+route.legs[i].distance.text + '<br>';
                              summaryPanel.innerHTML += '<b>temps du trajet :</b>'+route.legs[i].duration.text + '<br><br>';
                            }
                          }
                        });
  }


$(document).ready(function(){

                 $('a[href=#top]').hide();
               
                 $('a[href=#top]').css('position','relative') ;
                 
               
                $('a[href=#top]').click(function(){

                    $('html, body').animate({scrollTop:0}, 'slow');

                    return false;

                  });
                

                $(window).scroll(function () 
                {
                         var scroll=$(window).scrollTop();
                        
                        if ($(this).scrollTop() >= 150) 
                        {  
                           
                             $('a[href=#top]').css('top',180+scroll);

                             $('a[href=#top]').fadeIn(1500);
                            
                                                  
                        } else if ($(this).scrollTop() < 80) 
                          {
                           
                             $('a[href=#top]').fadeOut(1500);
                             
                           }
                 });

                 $('.address').each(function() 
                 { 
                     makeAutocomplete( $( this ).attr('id') );
                 });
               
});

