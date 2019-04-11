let plane = document.getElementById("imgPlane");

let Xplane = 0;


function movePlane () {
	Xplane = Xplane + 0.05;
	plane.style.left = Xplane + "%";
	if (Xplane > 100) {
		Xplane = -70;
	} 
}

let move = setInterval(movePlane , 0.01);

plane.addEventListener("click", function() {
	clearInterval(move);
	plane.style.display = 'none';
});



