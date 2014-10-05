$(document).ready(function(){
	var pos=[0,0,30.5,54,75,85,119.5,148.5,165,185,209,232.5,257.5,286,296,317,339,364,393,414,443,467];
	var i=1;
	setInterval(function(){
	alert(3);
	$("#l"+i).animate({
		left:pos[i]
	},150, function(){
		if(i==21){
		setTimeout(function(){
			$("#bymarie").fadeIn("slow");},500);
		}i++;
		});
	},300);
	
});
