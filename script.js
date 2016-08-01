
var request = new XMLHttpRequest();

function view(){

	var data = this.responseText;
	document.getElementById('res').innerHTML = data;

}

function controller(e){

	var file = e.target.id + '.php'
	request.onload = view;
	request.open('GET', file, true);
	request.send();

}


var button = document.getElementsByTagName('button');
for(var i = 0; i<button.length; i++){

	button[i].addEventListener('click', controller, true);

}


function search(){

	var text = document.getElementById('text').value;
	request.onload = view;
	request.open('GET', 'search.php?text='+text, true);
	request.send();

}

document.getElementById('search').addEventListener('click', search, true);

function reload(){

	request.open('GET', 'process.php', true);
	request.send();

}

document.getElementById('reload').addEventListener('click', reload, true)