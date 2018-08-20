$(document).ready(function(){
   new get_fb_avg(); 
 });

function get_fb_avg(){
var feedback = $.ajax({
	type: "GET",
	url: "../php/averagestats.php",
	async: false
}).done(function(){
		$('#avg-value').text('');
		setTimeout(function(){get_fb_avg();}, 10000);
	}).responseText;
     
	$('#avg-value').text(feedback);
}