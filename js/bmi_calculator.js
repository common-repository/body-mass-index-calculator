// JavaScript Document

function bmi_calcule(){ 

	
	
    var op1 = document.getElementById('height_bmi');
    var op2 = document.getElementById('weight_bmi');
	var res = document.getElementById('result_bmi');
	var cons = document.getElementById('cons_bmi');
	
	var operando1=op1.value;
	
	var operando2=op2.value;
	
	
	
	
    var result = eval(operando2/ ((operando1/100) * (operando1/100))) 
	
	var pesi1= eval(21 * ((operando1/100) * (operando1/100))) 
	
	var pesi2= eval(26 * ((operando1/100) * (operando1/100))) 
	
	
    res.value = r2d(result );
	
	
	
	
	if(res.value>21 && res.value<26) {
		cons.innerHTML='<br/><strong>These within your ideal weight, '+r2d(pesi1)+' - '+r2d(pesi2)+'</strong><br/>';
	}
	
	if(res.value>26) cons.innerHTML='<br/><strong>You are overweight, your ideal weight would be '+r2d(pesi1)+' - '+r2d(pesi2)+'</strong><br/>';
	
	if(res.value<21) cons.innerHTML='<br/><strong>Your weight is too low, your ideal weight would be '+r2d(pesi1)+' - '+r2d(pesi2)+'</strong><br/>';
} 

function r2d(numero)
{
	var original=parseFloat(numero);
	var result=Math.round(original*100)/100 ;
	return result;
}