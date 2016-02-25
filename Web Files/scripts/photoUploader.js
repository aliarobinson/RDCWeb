document.onload = setupDoc();
var fileNames;

function setupDoc() {
	// Assign button functionality
	var up = document.getElementById("upload-button");
	up.onclick = uploadFile;
}

function uploadFile() {
	var formData = new FormData();
	var files = document.getElementById("photo-file-input").files;
	fileNames = new Array();
	
	for(var i = 0; i < files.length; i++) {
		formData.append("photo-file-input[]", files[i]);
		fileNames.push(files[i].name);
	}
	
	var ajax = new XMLHttpRequest();
	ajax.addEventListener("load", uploadCompleteHandler, false);
	ajax.addEventListener("error", uploadErrorHandler, false);
	ajax.open("POST", "dbaction/uploadPhotos.php"); ajax.send(formData);
	  
}

function uploadCompleteHandler(event) {
	postMessage(event.target.responseText);
	displayPhotos();
}

function uploadErrorHandler(event) {
	postMessage("Upload Failed");
}

function postMessage(txt) {
	var statusmsg = document.getElementById("upload-status");
	statusmsg.innerHTML = txt;
}

function displayPhotos() {
	console.log("!" + fileNames);
	var imgholder = document.getElementById("photo-container");
	for(var i = 0; i < fileNames.length; i++) {
		var newimg = document.createElement("img");
		newimg.setAttribute("src", "images/" + fileNames[i]);
		imgholder.appendChild(newimg);
	}
}
