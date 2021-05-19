/*
	Alguns CPFs válidos para teste
	16226556480
	23830756470
	13508522369
	36755410705
	04185597169
*/


function verificarCPF(c){
	campo = document.getElementById('cpf').value;
	botao = document.getElementById('submit');
	erro = document.getElementById('erro');
	var i;
	s = c;
	var c = s.substr(0,9);
	var dv = s.substr(9,2);
	var d1 = 0;
	var v = false;
		 
	for (i = 0; i < 9; i++){
		d1 += c.charAt(i)*(10-i);
	}
	if (d1 == 0){
		//alert('CPF Inválido')
		erro.style.display='block';
		botao.disabled = true;
		v = true;
		return false;
	}
	d1 = 11 - (d1 % 11);
	if (d1 > 9) d1 = 0;
	if (dv.charAt(0) != d1){
		//alert('CPF Inválido')
		erro.style.display='block';
		botao.disabled = true;
		v = true;
		return false;
	}
		 
	d1 *= 2;
	for (i = 0; i < 9; i++){
		d1 += c.charAt(i)*(11-i);
	}
	d1 = 11 - (d1 % 11);
	if (d1 > 9) d1 = 0;
	if (dv.charAt(1) != d1){
		//alert('CPF Inválido')
		erro.style.display='block';
		botao.disabled = true;
		v = true;
		return false;
	}
	if(campo == '00000000000' || 
		campo == '11111111111' || 
		campo == '22222222222' || 
		campo == '33333333333' || 
		campo == '44444444444' || 
		campo == '55555555555' || 
		campo == '66666666666' || 
		campo == '77777777777' || 
		campo == '88888888888' || 
		campo == '99999999999'){
		//alert('CPF inválido')
		erro.style.display='block';
		botao.disabled = true;
		v = true;
		return false;
	}
	if (!v) {
		erro.style.display='none';
		botao.disabled = false;
	}
}