$(document).ready(function(){
   new get_fb_ratio(); 
 });

function get_fb_ratio(){
var feedback = $.ajax({
	type: "GET",
	url: "../php/ratiostats.php",
	async: false
}).done(function(){
		$('#ratio-value').text('');
		setTimeout(function(){get_fb_ratio();}, 10000);
	}).responseText;
     
	$('#ratio-value').text(feedback);
}