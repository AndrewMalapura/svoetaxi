	var stat = getCookie('param');
	var bcg_color = '#E8E8E8';
	var bcg_hover = '#F08080';
	var bcg_active = '#F08080';
	
	window.onload=function(){
	
		switch (stat) {
	   case 'user':
	       document.getElementById('usr').style.display='block';
		   document.getElementById('busr').style.background=bcg_active;
		   document.getElementById('trf').style.display='none';
		   document.getElementById('brts').style.background=bcg_color;
		   document.getElementById('cars').style.display='none';
		   document.getElementById('bcar').style.background=bcg_color;
		 //  setCookie('param','user','');
	       break;
	   case 'tariff':
		   document.getElementById('usr').style.display='none';
		   document.getElementById('busr').style.background=bcg_color;
		   document.getElementById('cars').style.display='none';
		   document.getElementById('bcar').style.background=bcg_color;
		   document.getElementById('trf').style.display='block';
		   document.getElementById('brts').style.background=bcg_active;
		  // setCookie('param','tariff','');
	       break;
	  case 'cars':
		   document.getElementById('trf').style.display='none';
		   document.getElementById('brts').style.background=bcg_color;
		   document.getElementById('usr').style.display='none';
		   document.getElementById('busr').style.background=bcg_color;
		   document.getElementById('cars').style.display='block';
		   document.getElementById('bcar').style.background=bcg_active;
		 //  setCookie('param','cars','');
	       break;
	  default :
		   document.getElementById('usr').style.display='none';
		   document.getElementById('busr').style.background=bcg_color;
		   document.getElementById('cars').style.display='none';
		   document.getElementById('bcar').style.background=bcg_color;
		   document.getElementById('trf').style.display='block';
		   document.getElementById('brts').style.background=bcg_active;
		   setCookie('param','tariff','');
	}
	}

	
	function showDiv(id){
	  // document.getElementById(id).value="КНОПКА";
	  // var val = id;
	 switch (id) {
	   case 'busr':
	       document.getElementById('usr').style.display='block';
		   document.getElementById('busr').style.background=bcg_active;
		   document.getElementById('cars').style.display='none';
		   document.getElementById('bcar').style.background=bcg_color;
		   document.getElementById('trf').style.display='none';
		   document.getElementById('brts').style.background=bcg_color;
		   setCookie('param','user','');
	       break;
	   case 'brts':
	       //document.getElementById(id).value="Тарифы";
		   document.getElementById('usr').style.display='none';
		   document.getElementById('busr').style.background=bcg_color;
		   document.getElementById('cars').style.display='none';
		   document.getElementById('bcar').style.background=bcg_color;
		   document.getElementById('trf').style.display='block';
		   document.getElementById('brts').style.background=bcg_active;
		   setCookie('param','tariff','');
	       break;
	   case 'bcar':
	       //document.getElementById(id).value="Тарифы";
		   document.getElementById('usr').style.display='none';
		   document.getElementById('busr').style.background=bcg_color;
		   document.getElementById('trf').style.display='none';
		   document.getElementById('brts').style.background=bcg_color;
		   document.getElementById('cars').style.display='block';
		   document.getElementById('bcar').style.background=bcg_active;
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
	
	var $ = jQuery.noConflict();

$(document).ready(function() {
    // В dataTransfer помещается выбранное изображение
	jQuery.event.props.push('dataTransfer');
    // Check for the various File API support.
	var uploadBtn = document.getElementById("file");
	
	uploadBtn.onchange = function(event){
	var file = event.target.files[0];
		if (!file.type.match(/image.*/)){
	   uploadBtn.value = '';
	   alert("Это не изображение"); 
		return;
	    }
		if(file.size > 40000){
	   alert("Размер больше допустимого");
	   uploadBtn.value = '';
		return;
		}
		var reader = new FileReader();
		
	reader.onload = (function(theFile) {
        return function(e) {
	var imgPlace = document.getElementById('img-holder');
	imgPlace.innerHTML = "";
    var img = new Image();
	img.src = e.target.result;
	imgPlace.appendChild(img);
        };
      })(file);
	  
	  reader.readAsDataURL(file);
	}
	});