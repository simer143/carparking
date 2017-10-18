<?php
$connn=mysqli_connect("localhost","root","","carparkingsystem")
or die("sorry can't connect");
if(isset($_POST['press'])){
	$time=$_POST['time'];
	$date=$_POST['date'];
	$statecode=$_POST['state'];
	$postalcode=$_POST['postalcode'];
	$number=$_POST['number'];
	$carsnumber="$statecode"."$postalcode"."$number";
	//$parkingnumber=$_POST['parkingno'];
	$parkingnu="select id from parking where id='".$_GET['pk']."'";
	$qry=mysqli_query($connn , $parkingnu);
	if($qry==""){
		echo"sorry";
	}
	else{
		if($id=mysqli_fetch_array($qry)){
		
		$parkingnumber=$id['id'];
		
		//echo $parkingnumber;
		
		}
	}
	
	
	$ins="update parking set carno = ('$carsnumber') where id ='".$parkingnumber."'";
	if(mysqli_query($connn , $ins))
	{
		echo"helo";
	}else{
		echo"asd";
	}
	
	
		

echo $statecode;
echo $postalcode;
echo $number;
echo "</br>".$carsnumber;
echo "</br>".$parkingnumber;
echo "</br>".$time;
echo "</br>".$date;
}



?>
<!DOCTYPE html>
<html>
<head>
<title>

</title>
<link type="text/css" rel="stylesheet" href="style.css">

	</head>

<body>

<div id="car" > Form required for parking 
<hr>
</br>

<form name="myform" action="" method="POST">

car's-no:<select style="font-size:25px;" name='state'>
<option value='pb'>pb</option>
<option value='ch'>ch</option>
</select>
<select style="font-size:25px;" name='postalcode' >
<option value='10'>10</option>
<option value='11'>11</option>
</select>
<input type="number" name="number" placeholder="enter car's number" id="demo1" onfocus=myfunction(); style="font-size:20px;">
</br>
parking-number:<input style="font-size:15px;" type=number name="parkingno" value="<?php


	
	//$parkingnu=$_POST['parkingnumber'];
	//echo $_GET['pk'];
	$parkingnu="select id from parking where id='".$_GET['pk']."'";
	$qry=mysqli_query($connn , $parkingnu);
	if($qry==""){
		echo"sorry";
	}
	else{
		if($id=mysqli_fetch_array($qry)){
		
		
		echo $id['id'];
		
		}
	}
	
	

?>" >
</br>
parking-date:<input type=text id="date" style="font-size:15px;" name='date'></br>
parking-time:<input type=text id="time" style="font-size:15px;" name='time'>
</br></br>
<input type="submit" name="press" style="font-size:30px;">
<p id="demo"></p>
<p id="timee"></p>
</form>
</div>

<script>
function myfunction(){

	var da = new Date();
	var tareek = da.getDate();
	var year = da.getFullYear();
	var month = da.getMonth();
	var minuts = da.getMinutes();
	var hours = da.getHours();
	var seconds = da.getSeconds();
	var tme = ""+hours+":"+minuts+":"+seconds;
	var date = ""+tareek+"/"+month+"/"+year;
	document.getElementById('date').value = date;
	document.getElementById('time').value = tme;
	
}

</script>



</body>
</html>