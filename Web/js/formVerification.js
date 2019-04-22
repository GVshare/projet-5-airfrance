let form = document.getElementById('form');

let itemPool = document.getElementById('itemPoolInput');
let extention = document.getElementById('extentionInput');
let designation = document.getElementById('designationInput');
let partNumber = document.getElementById('partNumberInput');
let serialNumber = document.getElementById('serialNumberInput');
let provider = document.getElementById('providerInput');
let user = document.getElementById('userInput');

let error = document.getElementById('errorInput');

let acceptedCharacters = /^([a-zA-Z0-9 _-]+)$/;

// ===============================================================================================

function check(e,input) {

	if (acceptedCharacters.test(input.value) === false) {
		e.preventDefault();
		errorInput.style.display = 'block';
		input.style.backgroundColor = 'red';
		console.log('working so far');
	};
};

form.addEventListener('submit', function(e) {

	check(e,itemPool);
	check(e,extention);
	check(e,designation);
	check(e,partNumber);
	check(e,serialNumber);
	check(e,provider);
	check(e,user);
});

function focusInput(input) {
	input.addEventListener('focus' , function() {
		input.style.backgroundColor = 'white';
	});
};

focusInput(itemPool);
focusInput(extention);
focusInput(designation);
focusInput(partNumber);
focusInput(serialNumber);
focusInput(provider);
focusInput(user);




