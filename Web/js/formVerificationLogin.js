let form = document.getElementById('form');
let login = document.getElementById('login');
let pwd = document.getElementById('password');

let error = document.getElementById('errorLogin');
let errorPwd = document.getElementById('errorLogDetails');

let acceptedCharacters = /^[a-z0-9]+$/i;

// ==================================================================================================================

function check(e,input) {
	if (acceptedCharacters.test(input.value) === false) {
		e.preventDefault();

		if (input.value === "") {
			error.textContent = "Please enter your Login !"
		} else {
			error.textContent = "Your login must contain only letters and/or numbers !"
		};

		error.style.display = 'block';

	} else if (pwd.value === "") {
		e.preventDefault();

		error.textContent = "Please enter your Password !"
		error.style.display = 'block';
	};
};

function clearError() {
	login.addEventListener('focus' , function() {
		error.style.display = 'none';
		errorPwd.style.display = 'none';
	});

	pwd.addEventListener('focus' , function() {
		error.style.display = 'none';
		errorPwd.style.display = 'none';
	});
};

// =================================================================================================================

form.addEventListener('submit', function(e) {
	check(e,login)
});

clearError()



