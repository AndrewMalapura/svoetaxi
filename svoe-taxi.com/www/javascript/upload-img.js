var $ = jQuery.noConflict();

$(document).ready(function() {
    // В dataTransfer помещается выбранное изображение
	jQuery.event.props.push('dataTransfer');
     
	// Оповещение по умолчанию
	var errMessage = 0;
		 
	// Кнопка выбора файлов
	var uploadBtn = document.getElementById("uploadbtn");
		 
	// файл изображения
	var imgFile ;
			
	// При нажатии на кнопку выбора файлов
    uploadBtn.onchange=function(){
			alert(" Work !!!");
    };
});