/**
 *
 * Crop Image While Uploading With jQuery
 * 
 * Copyright 2013, Resalat Haque
 * http://www.w3bees.com/
 *
 */

// set info for cropping image using hidden fields
function setInfo(i, e) {
	$('#x').val(e.x1);
	$('#y').val(e.y1);
	$('#w').val(e.width);
	$('#h').val(e.height);
}

function setInfoDua(i, e) {

	$('#x2').val(e.x1);
	$('#y2').val(e.y1);
	$('#w2').val(e.width);
	$('#h2').val(e.height);
}

$(document).ready(function() {
	var p = $("#uploadPreview");
	var q = $("#uploadPreview2");

	// prepare instant preview
	$("#uploadImage").change(function(){
		// fadeOut or hide preview
		p.fadeOut();

		// prepare HTML5 FileReader
		var oFReader = new FileReader();
		oFReader.readAsDataURL(document.getElementById("uploadImage").files[0]);

		oFReader.onload = function (oFREvent) {
	   		p.attr('src', oFREvent.target.result).fadeIn();
		};
	});

	// prepare instant preview
	$("#uploadImage2").change(function(){
		// fadeOut or hide preview
		q.fadeOut();

		// prepare HTML5 FileReader
		var oFReader = new FileReader();
		oFReader.readAsDataURL(document.getElementById("uploadImage2").files[0]);

		oFReader.onload = function (oFREvent) {
	   		q.attr('src', oFREvent.target.result).fadeIn();
		};
	});

	// implement imgAreaSelect plug in (http://odyniec.net/projects/imgareaselect/)
	$('img#uploadPreview').imgAreaSelect({
		// set crop ratio (optional)
		//aspectRatio: '1:1',
		onSelectEnd: setInfo
	});

	// implement imgAreaSelect plug in (http://odyniec.net/projects/imgareaselect/)
	$('img#uploadPreview2').imgAreaSelect({
		// set crop ratio (optional)
		//aspectRatio: '1:1',
		onSelectEnd: setInfoDua
	});
});