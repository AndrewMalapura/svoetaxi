var $ = jQuery.noConflict();

$(document).ready(function() {
    // В dataTransfer помещается выбранное изображение
	jQuery.event.props.push('dataTransfer');
    // Check for the various File API support.
	if (window.File && window.FileReader && window.FileList && window.Blob) {
	// Great success! All the File APIs are supported.
	 
	// Оповещение по умолчанию
	var errMessage = 0;
		 
	// Кнопка выбора файлов
	var uploadBtn = document.getElementById("uploadbtn");
			
	// При нажатии на кнопку выбора файлов
    uploadBtn.onchange=function(event){
			
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
          var foto = document.getElementById("imgcar");
          foto.src = e.target.result;
        };
      })(file);

      // Read in the image file as a data URL.
      reader.readAsDataURL(file);
	  }
	} else {
	alert('Предосмотр изображения невозможен, обновите браузер');
	}
});