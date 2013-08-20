var $ = jQuery.noConflict();

$(document).ready(function() {
    // В dataTransfer помещается выбранное изображение
	jQuery.event.props.push('dataTransfer');
    // Check for the various File API support.
	if (window.File && window.FileReader && window.FileList && window.Blob) {
	// Great success! All the File APIs are supported.
	} else {
	alert('The File APIs are not fully supported in this browser.');
	} 
	// Оповещение по умолчанию
	var errMessage = 0;
		 
	// Кнопка выбора файлов
	var uploadBtn = document.getElementById("uploadbtn");
		 
	// файл изображения
	var imgFile ;
			
	// При нажатии на кнопку выбора файлов
    uploadBtn.onchange=function(event){
			
		var file = event.target.files[0];
		var reader = new FileReader();
		alert(file);
    };
});