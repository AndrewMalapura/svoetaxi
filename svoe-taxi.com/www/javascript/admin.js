	var stat = getCookie('param');
	
	window.onload=function(){
	//var stat = getCookie('param');
		switch (stat) {
	   case 'user':
	       document.getElementById('usr').style.display='block';
		   document.getElementById('busr').style.background='white';
		   document.getElementById('trf').style.display='none';
		   document.getElementById('brts').style.background='silver';
		   document.getElementById('cars').style.display='none';
		   document.getElementById('bcar').style.background='silver';
		 //  setCookie('param','user','');
	       break;
	   case 'tariff':
		   document.getElementById('usr').style.display='none';
		   document.getElementById('busr').style.background='silver';
		   document.getElementById('cars').style.display='none';
		   document.getElementById('bcar').style.background='silver';
		   document.getElementById('trf').style.display='block';
		   document.getElementById('brts').style.background='white';
		  // setCookie('param','tariff','');
	       break;
	  case 'cars':
		   document.getElementById('trf').style.display='none';
		   document.getElementById('brts').style.background='silver';
		   document.getElementById('usr').style.display='none';
		   document.getElementById('busr').style.background='silver';
		   document.getElementById('cars').style.display='block';
		   document.getElementById('bcar').style.background='white';
		 //  setCookie('param','cars','');
	       break;
	  default :
		   document.getElementById('usr').style.display='none';
		   document.getElementById('busr').style.background='silver';
		   document.getElementById('cars').style.display='none';
		   document.getElementById('bcar').style.background='silver';
		   document.getElementById('trf').style.display='block';
		   document.getElementById('brts').style.background='white';
		   setCookie('param','tariff','');
	}
	}

	
	function showDiv(id){
	  // document.getElementById(id).value="КНОПКА";
	  // var val = id;
	 switch (id) {
	   case 'busr':
	       document.getElementById('usr').style.display='block';
		   document.getElementById('busr').style.background='white';
		   document.getElementById('cars').style.display='none';
		   document.getElementById('bcar').style.background='silver';
		   document.getElementById('trf').style.display='none';
		   document.getElementById('brts').style.background='silver';
		   setCookie('param','user','');
	       break;
	   case 'brts':
	       //document.getElementById(id).value="Тарифы";
		   document.getElementById('usr').style.display='none';
		   document.getElementById('busr').style.background='silver';
		   document.getElementById('cars').style.display='none';
		   document.getElementById('bcar').style.background='silver';
		   document.getElementById('trf').style.display='block';
		   document.getElementById('brts').style.background='white';
		   setCookie('param','tariff','');
	       break;
	   case 'bcar':
	       //document.getElementById(id).value="Тарифы";
		   document.getElementById('usr').style.display='none';
		   document.getElementById('busr').style.background='silver';
		   document.getElementById('trf').style.display='none';
		   document.getElementById('brts').style.background='silver';
		   document.getElementById('cars').style.display='block';
		   document.getElementById('bcar').style.background='white';
		   setCookie('param','cars','');
	       break;
	  default : alert('Я таких значений не знаю');
	}
	}
	
	function onChange(){	
	var x=document.getElementById("lstCategories").selectedIndex;
	var y=document.getElementById("lstCategories").options;
	var last = document.getElementById("lstCategories").options.length-1;
	//var position = lenght;
	//alert(last);
	if(x == last){
		var handler = prompt('Введите новую категорию','категория') ;
		if( handler != null){
			document.getElementById("lstCategories").options[last] = new Option (handler);
			document.getElementById("lstCategories").selectedIndex = last;
	    }
	}else{
		document.getElementById("lstCategories").options[x] = y[x];
	    document.getElementById("lstCategories").selectedIndex = x;
	}
	}
	
	function imgChange(){
		alert("Yes");
	}
	
	function sortCar(form){
	form.submit(); 
	//location.replace('../admin/administration.php');
	}