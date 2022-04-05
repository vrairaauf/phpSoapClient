let server=require('http');
const {exec} = require('child_process');
exec('php route.php -m LatLonListZipCode --args zipcodelist/city/country', (error, stdout, stderr)=>{
	if(error){
		console.log('error:'+error.message);
		return;
	}
	if(stderr){
		console.log('error: '+stderr);
		return;
	}
	console.log('stdout :\n'+stdout);

});