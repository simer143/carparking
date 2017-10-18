(function(){
	var video = document.getElementById('video'),
	canvas=document.getElementById('canvas'),
	context= canvas.getContext('2d'),
	vendorUrl = window.URL || window.webkitURL;
	
	navigator.getMedia =  navigator.getUserMedia ||
	                      navigator.webkitGetUserMedia ||
						  navigator.mozGetUserMedia ||
						  navigator.msGetUserMedia;
				navigator.getMedia({
					
					video:true,
					audio:false
				},function(stream){
					//workingcode
					video.src = vendorUrl.createObjectURL(stream);
					video.play();
				},function(error){
					//error code
				})
				
				document.getElementById('capture').addEventListener('click',function(){
					
				context.drawImage(video,0,0,400,300);	
					
				})
				
})();



function getnumber(){
var image = document.getElementById('canvas');

var string = OCRAD(image);
alert(string);
var strings=9;
console.log(string);
}