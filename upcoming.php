<?php
include('Adminheader.php');
 include_once("config/config.php");  
 error_reporting(0);
mysql_connect("localhost","root","")  or die(mysql_error());
mysql_select_db("Placement")  or die(mysql_error());
$query = "select * from upcoming ";
	$result = mysql_query($query) or die(mysql_error());
	while($row = mysql_fetch_assoc($result))
		{
		$cname[] = $row;
		}
	if(isset($_GET['edit']))
		{
		$id = $_GET['edit'];
		}
	else
		{
		$id = '';
		}
	

$i=1;


?>
<?php

if(isset($_POST['a1']))
	{
	$query = "UPDATE upcoming set CompanyName='".$_POST['a2']."',Address='".$_POST['a3']."',Website='".$_POST['a4']."',Contact='".$_POST['a5']."',InterviewDate='".$_POST['a6']."',Venue='".$_POST['a7']."' where PlacedId='".$_POST['a1']."'";
	echo $query;
	if(mysql_query($query))
		{
		$_SESSION['message']='<span class="succuess">Record updated successfully</span>';
		header('location:upcoming.php');
		}	
	else
		{
		$_SESSION['message']='<span class="fail">Record Not Updated</span>';
		}
	header("location:upcoming.php");
	exit;
	}
	?>
	<?php

if(isset($_GET['delete']))
	{
	
	$query = "delete from  upcoming where PlacedId='".$_GET['delete']."'";
	mysql_query($query);
		echo '<script>alert("Deleted");</script>';
	//	$_SESSION['message']='<span class="succuess">Record Delete succussfully</span>';
		
header("location:upcoming.php");
	exit;
	}
 
	
?>


<div align="center">
<script type="text/javascript">	
  $(document).ready(function(){
    $("#register_form").validate();
  });
</script>
<form action="upcoming.php" name="register_form"  id="register_form"  method="post">
	
	<table border="0" cellspacing="4" cellspadding="4"  bgcolor="White" class="displaycontent"  width="500">
	<caption></caption>
	<tr>
		<th colspan="2">  Upcoming Placement Details</th>
		<br>
	</tr>
	<tr>
		<td class="col">Placed Id:</td>
		<td><input type="text" name="p1"  value="" /></td>
	</tr>

	<tr>
		<td class="col">Company Name:</td>
		<td><input type="text" name="p2" value="" class="required" /></td>
	</tr>
	<tr>
		<td class="col">Address:</td>
		<td><input type="text" name="p3" value="" class="required"  /></td>


	</tr>
	<tr>
		<td class="col">Website:</td>
		<td><input type="text" name="p4" value="" class="required" /></td>
	</tr>
	
	<tr>
		<td class="col">Contact Number:</td>
		<td><input type="text" name="p5" value="" class="required"  /></td>
	</tr>
	<tr>
		<td class="col">Interview Date:</td>
		<td><input type="text" name="p6" value="" class="required" /></td>
	</tr>
	<tr>
		<td class="col"  >Venue:</td>
		<td><input type="text" class="required" name="p7" value="" /></td>
	</tr>
	
	<tr>
		<td>&nbsp;</td>
		<td >
			<input type="submit" name="register" value="Register" />
		     	<input type="Reset"  value="Reset" />
		</td>
	</tr>

	
		
	
	</table>
<form action="upcoming.php" name="ViewInterview" class="row" method="post">
	<div    align="center">
	<center >

<h2> Upcoming Details </h2>
	<table border="2" cellspacing="6" class="displaycontent" width="800" style="border:10px solid Darkblue;" align="center">
	<tr>
			<th bgcolor=Orange><font color=white size=2>Placed Id</font></th>
			<th bgcolor=Orange><font color=white size=2>Company Name</font></th>
			<th bgcolor=Orange><font color=white size=2>Address</font></th>
			<th bgcolor=Orange><font color=white size=2>Website </font></th>
			<th bgcolor=Orange><font color=white size=2>Contact Number</font></th>
			<th bgcolor=Orange><font color=white size=2>Interview Date </font></th>
			<th bgcolor=Orange><font color=white size=2>Venue </font></th>
			<th bgcolor=Orange><font color=white size=2>Edit </font></th>
			<th bgcolor=Orange><font color=white size=2>Delete </font></th>
		
			
			
		            
	</tr>
	  <?php
  	  if(count($cname)>0){
	  foreach($cname as $cat){
		if($id == $cat['PlacedId']){
	  ?>
	<tr>
		
		
		<td ><font color=#000000 size=2><input type="text" value="<?php echo $cat['PlacedId'];?>" name="a1" class="required" /></font></td>
		<td ><font color=#000000 size=2><input type="text" value="<?php echo $cat['CompanyName'];?>" name="a2" class="required" /></font></td>
		<td ><font color=#000000 size=2><input type="text" value="<?php echo $cat['Address'];?>" name="a3" class="required" /></font></td>
		<td ><font color=#000000 size=2><input type="text" value="<?php echo $cat['Website'];?>" name="a4" class="required" /></font></td>
        <td ><font color=#000000 size=2><input type="text" value="<?php echo $cat['Contact'];?>" name="a5" class="required" /></font></td>
		<td ><font color=#000000 size=2><input type="text" value="<?php echo $cat['InterviewDate'];?>" name="a6" class="required" /></font></td>
		<td ><font color=#000000 size=2><input type="text" value="<?php echo $cat['Venue'];?>" name="a7" class="required" /></font></td>
		        <td><font color=#000000 size=2><input type="hidden" value="<?php echo $id; ?>"  name="sno"/>
			<input type="submit" value="update" /></font></td>
		<td><font color=#000000 size=2><input type="button" value="cancel" onClick="window.location.href='upcoming.php';"/></font></td>
		<td><input type="submit" value="delete" name="delete"/></td>
	</tr>
	<?php }else{	?>
	<tr>
		
		<td bgcolor=white><font color=#000000 size=2><?php echo $cat['PlacedId']; ?></font></td>
		<td bgcolor=white><font color=#000000 size=2><?php echo $cat['CompanyName']; ?></font></td>
		<td bgcolor=white><font color=#000000 size=2><?php echo $cat['Address']; ?></font></td>
        <td bgcolor=white><font color=#000000 size=2><?php echo $cat['Website']; ?></font></td>
		<td bgcolor=white><font color=#000000 size=2><?php echo $cat['Contact']; ?></font></td>       
		
		<td bgcolor=white><font color=#000000 size=2><?php echo $cat['InterviewDate']; ?></font></td>
		<td bgcolor=white><font color=#000000 size=2><?php echo $cat['Venue']; ?></font></td>
		

		<td bgcolor=white><font color=#000000 size=2><a href="?edit=<?php echo $cat['PlacedId'];?>">Edit</a></font></td>
		<td bgcolor=white><font color=#000000 size=2><a href="?delete=<?php echo $cat['PlacedId'];?>">Delete</a></font></td>
       
	</tr>
	<?php } }} ?>
			
	</table>
</div>
</form>
<center>
<img src="images/url.jpg">

<br>
&nbsp;&nbsp;&nbsp<a href="login.php">BACK</a>
</center>
	</form>
</div>


<?php
 include_once("config/config.php");  
 if(isset($_POST['register'])){
	 if($_POST['p1']=="" || $_POST['p2']=="" || $_POST['p3']=="" || $_POST['p4']=="" || $_POST['p5']=="" )
	 {
		 echo '<script> alert("PLEASE FILL THE DETAILS");</script>';
	 }
	 else
	 {
	$query = "INSERT INTO `upcoming` VALUES ('".$_POST['p1']."', '".$_POST['p2']."', '".$_POST['p3']."', '".$_POST['p4']."', '".$_POST['p5']."', '".$_POST['p6']."', '".$_POST['p7']."')";
        echo '<script> alert("PREGISTERD SUCCESSFULLY");</script>';
//	echo $query;exit;
   
	if(mysql_query($query)){
		echo 'REGISTERD SUCCESSFULLY';

	}
	else{
		echo 'NOT REGISTERD';
	}
	//header("location:register.php");
	exit;
 }
 }

?>

<?php
include('footer.php');
?>
 

