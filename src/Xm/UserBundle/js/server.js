var http = require('http'),
    faye = require('faye');

var server = http.createServer(),
    bayeux = new faye.NodeAdapter( {mount: '/repertoires/XarrMatt/web/app_dev.php/', timeout: 45});

bayeux.attach(server);
server.listen(3000);


bayeux.on('subscribe', function(clientId,channel) {
  console.log(clientId +" s'est insrit à la chaine "+ channel);
})