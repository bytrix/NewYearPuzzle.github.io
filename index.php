<html>
	<head>
		<style>
			.center{width:400px;margin:0 auto}
			h1{font-family:verdana;}
			table#main{float:left}
			table#main,table#main td{border:1px solid rgba(0,0,0,0.5);border-collapse:collapse}
			table#main td{width:40px;height:40px;text-align:center}
			table#main td:hover{background-color:rgba(0,0,0,0.1);cursor:pointer}
			table#main td:active{background-color:rgba(0,0,0,0.2)}
			table#show,table#show td{border:0px;border-collapse:collapse}
			table#show td{color:red;width:80px;height:40px;text-align:center;font-size:30px;font-family:verdana;}
			.one{background-color:rgba(0,0,0,0.3);}
			#code{color:#000;height:70px;border:1px solid #000;margin-bottom:20px;display:none}
			#cracked{display:none}
		</style>
		<script src="jquery-1.11.2.min.js"></script>
		<link href="bootstrap/css/bootstrap.min.css" type="text/css" rel="stylesheet" />
		<title>New Year's Puzzle</title>
	</head>
	<body>
	<div id="code">press the box below to start...</div>
	<div id="cracked"></div>
	<div class="center">
		<h1>New Year's Puzzle</h1>
		<p class="text-info">关键提示词：新年快乐,二进制</p>
		<table id="main"></table>
		<table id="show">
			<tr><td></td></tr>
			<tr><td></td></tr>
			<tr><td></td></tr>
			<tr><td></td></tr>
			<tr><td></td></tr>
			<tr><td></td></tr>
			<tr><td></td></tr>
			<tr><td></td></tr>
			<tr><td></td></tr>
			<tr><td></td></tr>
			<tr><td></td></tr>
			<tr><td></td></tr>
		</table>
		<script>
			var body=document.getElementsByTagName("body")[0];
			var table=document.getElementsByTagName("table")[0];
			var tableShow=document.getElementsByTagName("table")[1];
			var cracked=0;
			var HappyNewYear=[
				'01001000',	//H
				'01100001',	//a
				'01110000',	//p
				'01110000',	//p
				'01111001',	//y
				'01001110',	//N
				'01100101',	//e
				'01110111',	//w
				'01011001',	//Y
				'01100101',	//e
				'01100001',	//a
				'01110010'	//r
			]
			var letters=['H','a','p','p','y','N','e','w','Y','e','a','r'];
			function print_r(arr){
				var buffer='';
				var len=arr.length;
				for(var i=0;i<len;i++){
					buffer+=arr[i];
				}
				return buffer
			}
			for(var i=0;i<12;i++){
				var tr=document.createElement("tr");
				table.appendChild(tr);
					var binArr=[
							['0','0','0','0','0','0','0','0'],
							['0','0','0','0','0','0','0','0'],
							['0','0','0','0','0','0','0','0'],
							['0','0','0','0','0','0','0','0'],
							['0','0','0','0','0','0','0','0'],
							['0','0','0','0','0','0','0','0'],
							['0','0','0','0','0','0','0','0'],
							['0','0','0','0','0','0','0','0'],
							['0','0','0','0','0','0','0','0'],
							['0','0','0','0','0','0','0','0'],
							['0','0','0','0','0','0','0','0'],
							['0','0','0','0','0','0','0','0'],
							['0','0','0','0','0','0','0','0']
					]
				for(var j=0;j<8;j++){
					var td=document.createElement("td");
					tr.appendChild(td);
					td.x=i;
					td.y=j;
					td.onclick=function(){
						var line=this.x;
						var col=this.y;
						if(!$(this).hasClass("one")){
							$(this).addClass("one");
							binArr[line][col]='1';
					//		alert(print_r(binArr[line])+" --- "+HappyNewYear[line]);
							$("#code").html("line:"+line+"<br>"+this.x+","+this.y);
						}else{
							$(this).removeClass("one");
							binArr[line][col]='0';
					//		alert(print_r(binArr[line])+" --- "+HappyNewYear[line]);
						}
						if(print_r(binArr[line])==HappyNewYear[line]){
								var letter=document.getElementById("show").getElementsByTagName("tr")[line].getElementsByTagName("td")[0];
								letter.innerHTML=letters[line];
								cracked++;
						}
						$("#cracked").html(cracked);
						if(cracked>=12){
							alert("YOU WIN");
							window.location.href="./win";
						}
					}
				}
			}
		</script>
	</div>
	</body>
</html>
