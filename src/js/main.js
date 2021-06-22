// viewport units without scrollbars or mobile browser UI
const setViewportUnits = function () {
	let vw = window.innerWidth * 0.01;
	let vh = window.innerHeight * 0.01;
	document.documentElement.style.setProperty('--vw', `${vw}px`);
	document.documentElement.style.setProperty('--vh', `${vh}px`);
}

document.addEventListener('DOMContentLoaded', e => {

	// no-touch helper class for hover styles
	const isTouchDevice = 'ontouchstart' in window || !!navigator.maxTouchPoints;
	if (isTouchDevice) {
		document.documentElement.classList.add('touch');
	} else {
		document.documentElement.classList.add('no-touch');
	}

	setViewportUnits();

	window.addEventListener('resize', e => {
		setViewportUnits();
	});

});
