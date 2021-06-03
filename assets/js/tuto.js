/**
 * Function to retrieve a get parameter from the current document (using location.href)
 *
 * @param parameter {String} Key of the get parameter to retrieve
 */
const _get = (parameter) => {
	var reg = new RegExp('[?&]' + parameter + '=([^&#]*)', 'i');
	var string = reg.exec(window.location.href);
	return string ? decodeURIComponent(string[1]) : undefined;
};

const addMenu = () => {
	const menu =
		'<nav class="navbar navbar-dark bg-dark">' +
		'<div class="container">' +
		'<a class="navbar-brand" href="https://doc.apizee.com/" target="blank">' +
		'<img src="https://doc.apizee.com/wp-content/uploads/2018/03/apizee_help_center_60px.png" alt="Apizee" style="min-width:250px;height:38px;"/>' +
		'</a>' +
		'<a class="btn btn-primary addSiteKeyToLink" href="../index.html">Tutorials</a>' +
		'</div>' +
		'</nav>';
	$('#menu').html(menu);
};
const addSiteKeyForm = () => {
	const siteKeyValue =
		_get('siteKey') !== undefined && _get('siteKey') !== 'undefined' ? _get('siteKey') : '';
	const siteKeyForm =
		'<form method="GET">' +
		'<div class="input-group mb-3">' +
		'<input type="text" class="form-control required" placeholder="Please enter your site Key" aria-label="Site Key" aria-describedby="basic-addon2" name="siteKey" value="' +
		siteKeyValue +
		'">' +
		'<div class="input-group-append">' +
		'<input class="btn btn-outline-secondary" type="submit" value="OK">' +
		'</div>' +
		'</div>' +
		'</form>';
	$('#siteKeyForm').html(siteKeyForm);
};

$(document).ready(function() {
	const siteKey = _get('siteKey');
	addSiteKeyForm();
	addMenu();
	if (siteKey !== undefined && siteKey !== 'undefined') {
		$('.siteKeyMandatory').show();
		$('.noSiteKeyMandatory').hide();
		$('.addSiteKeyToLink').each(function() {
			var href = $(this).attr('href');
			$(this).attr('href', href + '?siteKey=' + siteKey);
		});
	} else {
		$('.siteKeyMandatory').hide();
		$('.noSiteKeyMandatory').show();
	}
});
