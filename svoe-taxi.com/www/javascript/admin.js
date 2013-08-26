	var stat = getCookie('param'); // считываем название вкладки
	
	
	window.onload=function(){
	   
	      var buttonId = "brts";
	   
	switch (stat) {
	   case 'user':
		   buttonId = "busr";
	       break;
	   case 'tariff':
			buttonId = "brts";
	       break;
	  case 'cars':
			buttonId = "bcar";
	       break;
	  case 'reclame':
			buttonId = "brec";
	       break;
	  default :
		    buttonId = "brts";
		   setCookie('param','tariff','');
	}
	
			showDiv(buttonId);
	}

	function showDiv(btnId){
	
	var btnArr = {'usr':"busr",'trf':"brts",'cars':"bcar",'reclame':"brec"};
	var active = 'tariff';
	for(var div in btnArr){
	
		if( btnId === btnArr[div] ){ 
		  document.getElementById(div).style.display='block';
		  document.getElementById(btnArr[div]).className="command-button-active";  
			  switch(div){
			   case 'usr': active = 'user'; break;
			   case 'trf': active = 'tariff'; break;
			   case 'cars': active = 'cars'; break;
			   case 'reclame': active = 'reclame'; break;
			  }
	    }else{
	      document.getElementById(div).style.display='none';
		  document.getElementById(btnArr[div]).className ="command-button"; 
		    }		  
	    }
		  setCookie('param',active,'');
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