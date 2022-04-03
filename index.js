let server=require('http');
const {spawn} = require('child_process');
function externScript(){
		return spawn('php', ['route.php', 'helloWorld', '56']);
}
function appelle(){
	var dataToSend;
	const php= externScript();
	php.stdout.on('data', function (data) {
  	dataToSend = data.toJSON();
  	console.log(dataToSend);
 	});
}
appelle();
/*
	var dataToSend;
	const python= externScript();
	python.stdout.on('data', function (data) {
  	dataToSend = data.toString();
  	console.log(dataToSend);
 	});
	*/