<?php
 $conn = mysqli_connect("localhost","root","","carparkingsystem");

if(isset($_POST["upload"])){
	
	
	$qry1="SELECT max(id) FROM parking";
	
	 
	// $srno;
	
	
	$dd=mysqli_query($conn,$qry1);
	
	if($dd==""){
		echo"sorrrrry";
		
	}
	else{
		
		if($no=mysqli_fetch_array($dd)){
			
			
			echo $maxx= max($no)."</br>";
			
		if($maxx<=250){
			
			
			$target = "uploads/".basename($_FILES['f1']['name']);
	
    $image = $_FILES['f1']['name'];
	
	
	
	$qry="insert into parking (image) values ('$image') ";
	
	if( mysqli_query($conn , $qry)){
		
		//$parkingno=$conn->insert_id;
	//echo $parkingno;
	
	
	//$maxx=$maxx+1;
	//echo $maxx;
	
	

	 
	 if (move_uploaded_file($_FILES['f1']['tmp_name'],$target))
	 
	 {
	echo "uploaded successfully";

	 }
	 else{
		 echo"sorry cant upload the file";
	}
	
				
		}
		
		}	
	}
	
	}
	 
}
if(isset($_POST['press2'])){
$sarch=$_POST['search'];
if($sarch!==""){
$srh="select * from parking where carno ='".$sarch."'";
$sr=mysqli_query($conn,$srh);

if($sri=mysqli_fetch_array($sr)){
	

echo "<div id='search'>";
echo "<div id='searche'>";
//echo "<div id='searchx'>";
echo "<img src='uploads/".$sri['image']."'>";
//echo $sri['image'];
echo "</br><h3>Car'sno: ".$sri['carno']."</h3>";
echo "<h3>Parking no: ".$sri['id']."</h3>";
echo "<input type='button' name='cancel' style='font-size:25px;' onclick='canceldropdown();' value='Back To Parking Area'>";

echo "</div>";
echo "</div>";
//echo "</div>";
}

}

else{
	echo"<div id='search'>";
	
	echo "<h1>Sorry please enter the number again!!!! </h1>";
	echo "<input type='button' style='font-size:25px;' name='cancel' onclick='canceldropdown();' value='Back To Parking Area'>";
    echo"</div>";
}
	 }
?>





<html><head>
</head>

<link type="text/css" href="style.css" rel="stylesheet">
<body>



<div class=container>
<form name="myform2" action="" method="POST">

a<video id="video" width='400px' height="400px" > </video>
<a href=# id='capture' class="booth-capture-button" name="press22">take pic</a>

<canvas    width='400px'  height="400px"  id="canvas" name="canvas" style="-webkit-filter:grayscale(100%) brightness(40%) contrast(100%);"></canvas>
<input type=button onclick=getnumber(); value="getnumber">
</form>
</div>




	
	<div id="content">
<div id="main">
<form name="myform" method="POST" action="" enctype="multipart/form-data">
<input type="hidden" name="size" value="1000000">

<input type='file'  name='f1' style="display:none;">
<input type="submit" name="upload" style="display:none;" value="upload"></br>
<input type=search name='search' placeholder="parking number please" >
<input type=submit name='press2' value="search">
<div id="menu" >
<button>parked car's</button>

</div>

</div>

</form>
<?php
 $conn = mysqli_connect("localhost","root","","carparkingsystem");
$sql = "SELECT * FROM parking";
$result=mysqli_query($conn , $sql);
if($result==""){
echo"sorry";
}
while($row=mysqli_fetch_array($result)){
	
	echo"<div id='img_div'>";
	
	echo "<img src='uploads/parking.png'>";
	
	$parkno=$row['id'];
	$a=$parkno[0];
	$b=$parkno[1];
	$c=$parkno[2];
	$d=$a.$b.$c;
	//echo $d;
	if($row['carno']==""){
	//$_SESSION["parkingno"]=$parkno; 
	echo "<div id='id_img'><a href='http://localhost/car%20parking/form.php?pk=$d'> <input type='button' id='parkno' name='parkno' onclick='' value='".$parkno."'></a></div>";
//	echo "<div id='num_img'> <input type='text' placeholder='cars number'</div>";
	
	echo"</div>";}
	else{
	
	echo "<div id='id_img'><a href='http://localhost/car%20parking/form.php?pk=$d'> <input type='button' id='nopark' name='parkno' onclick='' value='".$parkno."'></a></div>";

	
	echo"</div>";
		
		
	}
}

?>

<script src='js.js'></script>	
	<script src="ocrad.js"></script>
	

	
	
  </body>
</html>









