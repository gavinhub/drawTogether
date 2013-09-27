<html>
<head></head>
<body>	

    <script type="text/javascript">
    //---------- number ---------------
	function lala(){
	var getNumber = new XMLHttpRequest();
	getNumber.onreadystatechange=function(){
		document.getElementById('number').innerHTML = '在线人数 ' + getNumber.responseText;
	}
	getNumber.open("GET","./number.php",true);
	getNumber.send();
	}
	setInterval('lala()',1000);
	</script>
    
    <p id='number'></p>
   
</body>
</html>