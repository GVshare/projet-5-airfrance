let form = document.getElementById('form');
let login = document.getElementById('login');
let error = document.getElementById('errorLogin');

let acceptedCharacters = /^[a-z0-9]+$/i;

form.addEventListener('submit', function(e) {
	if (acceptedCharacters.test(login.value) === false) {
		e.preventDefault();
		console.log('C est pas bon')
		error.style.display = 'block';
	} else {
		error.style.display = 'none';
	};
	
})