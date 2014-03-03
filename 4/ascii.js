var displayarea = document.getElementById('displayarea'); // gets displayarea
displayarea.style.fontSize = "medium"; // initialize font size at 'medium'
var speed = 250; // initialize animation speed
document.getElementById('stop').disabled = true; // initializes stop button as disabled

var timer; // initialize timer
var display; // initialize variable to hold current image in display

var custom; // for my own ascii animation string

window.onload = function() {

	// start and stop buttons
	var start = document.getElementById('start');
	start.addEventListener('click', clickStart);

	var stop = document.getElementById('stop');
	stop.addEventListener('click', clickStop);

	// animation buttons
	var animation = document.getElementById('animation');
	animation.addEventListener('click', clickAnimation);

	/* code to change font sizes based on user input */
	// changes font size to small if 'small' radio button is clicked
	document.getElementById('small').onclick = function() {
		displayarea.style.fontSize = "small";
	}

	// changes font size to medium if 'medium' radio button is clicked
	document.getElementById('medium').onclick = function() {
		displayarea.style.fontSize = "medium";
	}

	// changes font size to large if 'large' radio button is clicked
	document.getElementById('large').onclick = function() {
		displayarea.style.fontSize = "large";
	}

	/* code to change speed based on user input (EXTRA CREDIT) */
	var turbo = document.getElementById('turbo'); // gets turbo checkbox

	turbo.onclick = function() {
		if (turbo.checked) {
			speed = 50;
		} else {
			speed = 250;
		}
	}
};

/* change the animation based on user selection */
function clickAnimation() {

	// puts all animation options into an array
	var selection = document.getElementById('animation').getElementsByTagName('option');

	if (selection[0].selected) {

		displayarea.value = blank;

	} else if (selection[1].selected) {

		displayarea.value = exercise;

	} else if (selection[2].selected) {

		displayarea.value = juggler;

	} else if (selection[3].selected) {

		displayarea.value = bike;

	} else if (selection[4].selected) {

		displayarea.value = dive;

	} else if (selection[5].selected) {

		displayarea.value = custom;
	}
}

/* when start button is clicked */
function clickStart() {
	display = displayarea.value;
	startAnimation(display, 0);

	// EXTRA CREDIT: to enable/disable buttons accordingly
	document.getElementById('start').disabled = true;
	document.getElementById('animation').disabled = true;
	document.getElementById('stop').disabled = false;
}

/* starts animation based on current frame */
function startAnimation(display_image, frame) {

	var sequence = display_image.split("=====\n"); // splits animation in frames, puts into array

	if (frame < sequence.length) {
		displayarea.value = sequence[frame]; // set the animation to the proper frame in the sequence
		timer = setTimeout(startAnimation, speed, display_image, frame + 1); // recursive call to start the animation,
																			 // increases frame count
	} else if (sequence.length > 0) {
		startAnimation(display_image, 0); // resets animation to first frame
	}

}

/* when stop button is clicked */
function clickStop() {
	clearTimeout(timer);
	displayarea.value = display;

	// EXTRA CREDIT: to enable/disable buttons accordingly
	document.getElementById('start').disabled = false;
	document.getElementById('animation').disabled = false;
	document.getElementById('stop').disabled = true;
}

/* EXTRA CREDIT: custom animation */
custom ="    _  \n" + 
"  _|_|_ ___\n" + 
"  (o o) \\|/\n" + 
"-(  .  )-|\n" + 
"(___.___)|\n" + 
"=====\n" + 
" .  _  .  .\n" + 
". _|_|_.___\n" + 
"  (o o) \\|/\n" + 
"-(  .  )-|\n" + 
"(___.___)|\n" + 
"=====\n" + 
" .  _  .\n" + 
". _|_|_ ___.\n" + 
" .(o o).\\|/\n" + 
"-(  .  )-|\n" + 
"(___.___)|\n" + 
"=====\n" + 
"  . _  .\n" + 
". _|_|_ ___.\n" + 
". (o o).\\|/\n" + 
"-(  .  )-|.\n" + 
"(___.___)|  .\n" + 
"=====\n" + 
" .  _    .\n" + 
"  _|_|_ ___\n" + 
". (o o).\\|/\n" + 
"-(  .  )-| .\n" + 
"(___.___)|\n" + 
"=====\n" + 
" .  _    .   ______________\n" + 
"  _|_|_ ___ / It\'s snowing!|\n" + 
". (o o).\\|/ \\______________|\n" + 
"-(  .  )-| .\n" + 
"(___.___)|\n" + 
"=====\n" + 
" .  _    .   ______________\n" + 
"  _|_|_ ___ / It\'s snowing!|\n" + 
". (o o).\\|/ \\______________|\n" + 
"-(  .  )-| .\n" + 
"(___.___)|\n";
