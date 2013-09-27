function phpGET(path){
	// nomal request
	var request = new XMLHttpRequest();
	request.open("GET",path,true);
	request.send();
}

function loadXMLDoc()
{
	var xmlhttp = new XMLHttpRequest();

	xmlhttp.onreadystatechange=function(){
  		if (xmlhttp.readyState==4 && xmlhttp.status==200)
    	{
    		document.getElementById("myDiv").innerHTML=xmlhttp.responseText;
    	}
 	}

	xmlhttp.open("GET","./readArray.php",true);
	xmlhttp.send();

}

function getOnlineNumber(){
	//---------- number ---------------
	var getNumber = new XMLHttpRequest();
  	getNumber.onreadystatechange=function(){
    if(getNumber.readyState==4 && getNumber.status==200)
		document.getElementById('number').innerHTML = String("在线人数：") + getNumber.responseText;
	}
	getNumber.open("GET","./number.php",true);
	getNumber.send();
}

// ---------- change color recursively ---------//
var red=1;
function changeColor(){
	var obj = document.getElementById("lastbg");
	if(red <= 0){
		setTimeout("document.getElementById('lastbg').setAttribute('style','display:none')",2000);
		return;
	}
	red = red - 0.01;
	obj.setAttribute("style","background:rgba(255,140,0,"+red+")");
	setTimeout("changeColor()",9);
}

function deleteOnClick(obj){
	obj.setAttribute("value","Done");
}

function showLast(){
	var getlast = new XMLHttpRequest();
	var lastOBJ = document.getElementById('lastman');

	getlast.onreadystatechange=function(){
		if(getlast.readyState==4 && getlast.status==200){ 
			lastOBJ.innerHTML = getlast.responseText;
			changeColor();
		}else{
			lastOBJ.innerHTML = ".....";
		}
	}
	getlast.open("GET","./getLast.php",true);
	getlast.send();

}

// On Mouse Down here...
function displayAndStroe(e){

	var cav = document.getElementById('myCanvas');

	var mx=e.clientX;
	var my=e.clientY;
	mx = Math.floor((mx-cav.offsetLeft)/20);
	my = Math.floor((my-cav.offsetTop)/20);
	document.getElementById('xx').innerHTML = mx +' '+ my;

	//----------- setArray ------------
	var sendMSG;
  	sendMSG = new XMLHttpRequest();
	sendMSG.onreadystatechange=function(){}
	sendMSG.open("GET","./setArray.php?x="+ mx +"&y="+my,true);
	sendMSG.send();
	//------------------------
}

function drawLittleRect(row, col){
	var c=document.getElementById("myCanvas");
	var cxt=c.getContext("2d");
	cxt.fillStyle='#000000';
	var vu = row*20;
	var vl = col*20;
	cxt.fillRect(vl+1,vu+1,18,18);
}
function clearLittleRect(row, col){
	var c=document.getElementById("myCanvas");
	var cxt=c.getContext("2d");
	cxt.fillStyle='#FFFFFF';
	var vu = row*20;
	var vl = col*20;
	cxt.fillRect(vl+1,vu+1,18,18);
}
function draw(){
	var hh = document.getElementById('myDiv').innerHTML;

	for(var i=0;i<20;i++){
		for(var r=0;r<30;r++){
			if(hh[i*30+r] == 'x'){
				drawLittleRect(i,r);
			}else{
				clearLittleRect(i,r);
			}
		}
	}
}

function end(){
	var c=document.getElementById("myCanvas");
	var painter =c.getContext("2d");
	painter.strokeStyle='#CCC';
	for(var i=1;i<30;i++){
		painter.moveTo(i*20,0);
		painter.lineTo(i*20,400);
	}
	for(var i=1;i<30;i++){
		painter.moveTo(0,i*20);
		painter.lineTo(600,i*20);
	}
	painter.stroke();
}


