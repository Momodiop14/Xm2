 
 var directionsService = new google.maps.DirectionsService,
     directionsDisplay = new google.maps.DirectionsRenderer ,map;             
 

  function makeAutocomplete (id) 

  {
      autocomplete = new google.maps.places.Autocomplete(document.getElementById(id), { types: ['geocode'], componentRestrictions: {country: 'sn'} }); 
      
      autocomplete.addListener('place_changed', function () 
          {
          
            calculateAndDisplayRoute();
          } );

       
          
  
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
                  timer: 3000,
                  placement: {
                               from: "top",
                               align: "right"
                              }
                  }

                               
              );                                                                    
                                                                    
  }   

  function initMap() 
  {
       
       map = new google.maps.Map(document.getElementById('map'), {
        zoom: 6,
        center: {lat: 14.6011509, lng: -15.403862}
      });
      directionsDisplay.setMap(map);
    
}

function calculateAndDisplayRoute() 
{     
       
       start=$('.address:first').val();
    
       end=$('.address:eq(1)').val();  

       localities = $('.step');  
                   
       var points=[];

       if (localities.length>=1) 
          {
            for (var i = 0; i < localities.length; i++) 
                 {
                     points.push({
                                    location:localities[i].value,
                                    stopover:true
                                 });
                               
                  }
          }
         
        console.log("ggog");
        console.log(points);   
        
      directionsService.route(
            {
              origin: start,
              destination: end,
              waypoints:points,
              optimizeWaypoints: true,
              travelMode: google.maps.TravelMode.DRIVING
            }, function(response, status) {
        if (status === google.maps.DirectionsStatus.OK) 
           {
                directionsDisplay.setDirections(response);

      //           var route = response.routes[0];
      //                     var summaryPanel = document.getElementById('directions_panel');
      //                     summaryPanel.innerHTML = '';
                                      
      //                     // For each route, display summary information.
      //                      for (var i = 0; i < route.legs.length; i++) 
      //                      {
      //                        var routeSegment = i + 1;
      //                        summaryPanel.innerHTML += '<b>trajet  :</b> ' + routeSegment + '<br>';
      //                        summaryPanel.innerHTML += route.legs[i].start_address + ' vers ';
      //                        summaryPanel.innerHTML += route.legs[i].end_address + '<br>';
      //                        summaryPanel.innerHTML += '<b>distance :</b>'+route.legs[i].distance.text + '<br>';
      //                        summaryPanel.innerHTML += '<b>temps du trajet :</b>'+route.legs[i].duration.text + '<br><br>';
      //                      }
           } 
        else 
           {
               window.alert('Directions request failed due to ' + status);
           }
      });
}
  $(document).ready(function(){

                 $('a[href="#top"]').hide();
               
                 $('a[href="#top"]').css('position','relative') ;
                 
               
                $('a[href="#top"]').click(function(){

                    $('html, body').animate({scrollTop:0}, 'slow');

                    return false;

                  });
                

                $(window).scroll(function () 
                {
                         var scroll=$(window).scrollTop();
                        
                        if ($(this).scrollTop() >= 150) 
                        {  
                           
                             $('a[href="#top"]').css('top',180+scroll);

                             $('a[href="#top"]').fadeIn(1500);
                            
                                                  
                        } else if ($(this).scrollTop() < 80) 
                          {
                           
                             $('a[href="#top"]').fadeOut(1500);
                             
                           }
                 });

                 $('.address, .address-search').each(function() 
                 { 
                     makeAutocomplete( $( this ).attr('id') );
                 });


                var nowDate = new Date();
                           var today = new Date(nowDate.getFullYear(), nowDate.getMonth(), nowDate.getDate(), 0, 0, 0, 0);
                          $('.form_date input[type="text"]').datepicker({
                                language:  'fr',
                                weekStart: 1,
                                todayBtn:  1,
                                fomat :'dd-mm-yyyy',
                                startDate: today,
                                endDate : '+60d',
                                todayHighlight :true,
                                
                           });                 
                 
                 $(".step").on("updateMap",function() {

                  alert("aSome");

                 });        
                
               
});


