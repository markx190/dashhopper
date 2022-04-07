function updateText(type) { 
 var id = type+'Text';
 document.getElementById(id).value = document.getElementById(type).value;
}

function getValues(){
	var numVal1 = Number(document.getElementById("frequency").value);
	var numVal2 = Number(document.getElementById("amount_tender").value);
	
	
	var totalValue = numVal2 - numVal1;
	document.getElementById("frequency").value = Math.round(totalValue);

	var gtotal = numVal1 - totalValue;
	
	document.getElementById("gtotal").value = Math.round(gtotal);
	
}