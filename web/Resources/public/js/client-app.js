   <script type="text/javascript" src="http://localhost/repertoires/XarrMatt/web/app_dev.php:8000/client.js"></script>
   <script>
    $(document).ready( function() {
      
      // Subscribe to receive norifications!
      var client = new Faye.Client('http://localhost/repertoires/XarrMatt/web/app_dev.php:8000/');
   
    // Our own private channel
    var private_subscription = client.subscribe('/messages/private/<%= session[:username] %>', function(data) {
      $('<p></p>').addClass('private').html(data.username + ": " + data.msg).appendTo('#chat_room');
    });
 
    // Handle form submission to publish messages.
    $('#new_message_form').submit(function(){
    
      // Is it a private message?
      if (matches = $('#message').val().match(/@(.+) (.+)/)) {
        client.publish('/messages/private/' + matches[1], {
          username: '<%= session[:username] %>',
          msg: matches[2]
        });
      }
       
      // Clear the message box
      $('#message').val('');
 
      return false;
    });

    var isTyping = false;

      $('#m').keypress(function () {
        clearTimeout(typingTimer);
        if (!isTyping) {
          socket.emit('start-typing');
          isTyping = true;
        }
      });

      $('#m').keyup(function () {
        clearTimeout(typingTimer);
        typingTimer = setTimeout(function () {
          if (isTyping) {
            socket.emit('stop-typing');
            isTyping = false;
          }
        }, 500);
      });
   
      
    });

   </script>

