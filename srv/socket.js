var server = require('http').Server();
var io = require('socket.io')(server);
var Redis = require('ioredis');
var redis = new Redis(6379, 'redis');

redis.subscribe('test-channel');

var entered = 0;

redis.on('message', function(channel, message){
    message = JSON.parse(message);
    console.log(channel + ':' + message.event);
    io.emit(channel + ':' + message.event, message.data); // test-channel:PlateRegistered
    entered++;
});


function update_liveChart()
{
   console.trace();
   io.emit('test-channel:liveChartUpdate', entered);
   entered = 0;
   setTimeout(update_liveChart, 2000);
}

update_liveChart();

server.listen(3000)
