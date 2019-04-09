/*var button = document.getElementById("Save_submit")[0];
button.addEventListener("click", function(){
	
	
});*/



$("#Save_submit")
	.on("click", function() {
		var name = $("input[name=friend_name]").val();
		var occupation = $("input[name=friend_occupation]").val();
		alert($("input[name=friend_occupation]").val());
		//alert(occupation);
	});
	
