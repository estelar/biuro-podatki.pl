// JavaScript Document
function startUpload(){
      document.getElementById('f1_upload_process').style.visibility = 'visible';
      document.getElementById('f1_upload_form').style.visibility = 'hidden';
      return true;
}

function download(frameName,url){
	oIFrm = document.getElementById(frameName);
	oIFrm.src = url + "&cup=" + new Date().getTime().toString().substr(5) + Math.floor(Math.random() * 100).toString();
}