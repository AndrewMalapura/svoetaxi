var $ = jQuery.noConflict();

$(document).ready(function() {
    // � dataTransfer ���������� ��������� �����������
	jQuery.event.props.push('dataTransfer');
    // Check for the various File API support.
	if (window.File && window.FileReader && window.FileList && window.Blob) {
	// Great success! All the File APIs are supported.
	} else {
	alert('The File APIs are not fully supported in this browser.');
	} 
	// ���������� �� ���������
	var errMessage = 0;
		 
	// ������ ������ ������
	var uploadBtn = document.getElementById("uploadbtn");
		 
	// ���� �����������
	var imgFile ;
			
	// ��� ������� �� ������ ������ ������
    uploadBtn.onchange=function(event){
			
		var file = event.target.files[0];
		var reader = new FileReader();
		alert(file);
    };
});