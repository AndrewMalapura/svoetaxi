var $ = jQuery.noConflict();

$(document).ready(function() {
    // � dataTransfer ���������� ��������� �����������
	jQuery.event.props.push('dataTransfer');
     
	// ���������� �� ���������
	var errMessage = 0;
		 
	// ������ ������ ������
	var uploadBtn = document.getElementById("uploadbtn");
		 
	// ���� �����������
	var imgFile ;
			
	// ��� ������� �� ������ ������ ������
    uploadBtn.onchange=function(){
			alert(" Work !!!");
    };
});