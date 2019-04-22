let form = document.getElementById('form');
let login = document.getElementById('login');

let error = document.getElementById('errorLogin');

let acceptedCharacters = /^[a-z0-9]+$/i;

function check(e,input) {
	if (acceptedCharacters.test(input.value) === false) {
		e.preventDefault();

		if (input.value === "") {
			error.textContent = "Please enter your Login !"
		} else {
			error.textContent = "Your login must contain only letters and/or numbers !"
		};

		error.style.display = 'block';
	};
};

form.addEventListener('submit', function(e) {
	check(e,login)
});



