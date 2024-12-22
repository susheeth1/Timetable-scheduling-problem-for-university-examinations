
 <?php include('connect.php') ?>
		
		<?php 
 if (isset($_POST['save']))

$fname=$_POST['fname'];
$semester=$_POST['semester'];
$sy=$_POST['sy'];

$search_query_all=mysqli_query($conn,"select * from classsched where fname like '%$fname%' and semester like '%$semester%' and sy like '%$sy%'")or die(mysqli_error());
$search_query=mysqli_query($conn,"select * from classsched where fname like '%$fname%' and day='MWF'  and semester like '%$semester%' and sy like '%$sy%'")or die(mysqli_error());
$search_query2=mysqli_query($conn,"select * from classsched where fname like '%$fname%' and day='TTh'  and semester like '%$semester%' and sy like '%$sy%'")or die(mysqli_error());
$search_query1=mysqli_query($conn,"select * from classsched where fname like '%$fname%' and semester like '%$semester%' and sy like '%$sy%'")or die(mysqli_error());
$count=mysqli_num_rows($search_query);
$count2=mysqli_num_rows($search_query2);
$row=mysqli_fetch_assoc($search_query1);
$row_all=mysqli_fetch_assoc($search_query_all);


$id=isset($row_all['classid']) ? $row_all['classid'] : '';
?>

<header><style>
#foot{
margin-left:100px;

}


</style></header>
<center>
CARLOS HILADO MEMORIAL STATE COLLEGE</br>
Talisay City, Negros Occidental</br>
COLLEGE OF INDUSTRIAL TECHNOLOGY</br>
INDIVIDUAL FACULTY WORKLOAD</br>
</h5>
<table width="70%" class="report">
	<tr>
		<td>Name of Faculty: <font color="blue"><?php echo $_POST['fname'];?></font></td>
		<td>School Year:&nbsp;<?php  echo $_POST['sy']; ?></td>
		<td>Semester:&nbsp;<?php echo $_POST['semester']; ?>
			</td>
	</tr>
	
	
		</td>
	</tr>
	
</table><br>
<table border="1" style="border-collapse:collapse;">
  <thead>
    <tr>
      <th class="time_start"><font size="1">Time</font></th>
      <th><font size="1">Monday</font></th>
      <th><font size="1">Wednesday</font></th>
      <th><font size="1">Friday</font></th>
      <th class="time_start"><font size="1">Time</font></th>
      <th><font size="1">Tuesday</font></th>
      <th><font size="1">Thursday</font></th>
      <th><font size="1">Saturday</font></th>
    </tr>
  </thead>
  <tbody>
  <?php
$search_rows=mysqli_fetch_array($search_query);
?>
    <tr>
      <td width="110" align="center">
	   <font size="1">
	  <b><font color="black">7:30am-8:30am</b>
	 </font>
	 </td>
      <td width="120" style="background-color:#f5f5f5;">
	  <font size="1">
	  <?php 
	  $result=mysqli_query($conn,"select * from classsched where fname like '%$fname%' and semester like '%$semester%' and sy like '%$sy%' and day like '%Monday%' and time_start='7:30am' and time_end='8:30am' ")or die(mysqli_error());
	  $row=mysqli_fetch_array($result);
	 if($row > 0){
			echo '<div style="background-color:#65ff94;">';
			
	echo $row['subject_code'];
	echo '<br>';	
	 echo $row['course_year_section'];
	echo '<br>';
	echo $row['room_name'];
	
	 }
	  ?>
	  </font>
	  </td>
	   <td width="120" style="background-color:#f5f5f5;">
	  	   <font size="1">
		  <?php 
	  $result1=mysqli_query($conn,"select * from classsched where fname like '%$fname%' and semester like '%$semester%' and sy like '%$sy%' and day like '%Wednesday%' and time_start='7:30am' and time_end='8:30am' ")or die(mysqli_error());
	  $row=mysqli_fetch_array($result1);
	  if($row > 0){
			echo '<div style="background-color:#65ff94;">';
			
	echo $row['subject_code'];
	echo '<br>';	
	 echo $row['course_year_section'];
	echo '<br>';
	echo $row['room_name'];
	
	 }
	  ?>
	  </font>
	 </td>

	    <td width="120" style="background-color:#f5f5f5;">
	  	   <font size="1">
		  <?php 
	  $result1=mysqli_query($conn,"select * from classsched where fname like '%$fname%' and semester like '%$semester%' and sy like '%$sy%' and day like '%Friday%' and time_start='7:30am' and time_end='8:30am' ")or die(mysqli_error());
	  $row=mysqli_fetch_array($result1);
	 if($row > 0){
			echo '<div style="background-color:#65ff94;">';
			
	echo $row['subject_code'];
	echo '<br>';	
	 echo $row['course_year_section'];
	echo '<br>';
	echo $row['room_name'];
	
	 }
	  ?>
	  </font>
	  </td>
	    <td width="110" align="center">
		 <font size="1" color="black">
		<b>7:30am-9:00am</b>
		</font>
		</td>
	    <td width="120" style="background-color:#f5f5f5;">
		  <font size="1">
		 <?php 
	  $result=mysqli_query($conn,"select * from classsched where fname like '%$fname%' and semester like '%$semester%' and sy like '%$sy%' and day like '%Tuesday%' and time_start='7:30am' and time_end='9:00am' ")or die(mysqli_error());
	  $row=mysqli_fetch_array($result);
	 if($row > 0){
			echo '<div style="background-color:#65ff94;">';
			
	echo $row['subject_code'];
	echo '<br>';	
	 echo $row['course_year_section'];
	echo '<br>';
	echo $row['room_name'];
	
	 }
	 
	  ?>
	  </font>
		</td>
	    <td width="120" style="background-color:#f5f5f5;">
 <font size="1">			
			<?php 
	  $result=mysqli_query($conn,"select * from classsched where fname like '%$fname%' and semester like '%$semester%' and sy like '%$sy%' and day like '%Thursday%' and time_start='7:30am' and time_end='9:00am' ")or die(mysqli_error());
	  $row=mysqli_fetch_array($result);
	 if($row > 0){
			echo '<div style="background-color:#65ff94;">';
			
	echo $row['subject_code'];
	echo '<br>';	
	 echo $row['course_year_section'];
	echo '<br>';
	echo $row['room_name'];
	
	 }
	  ?>
	  </font>
		</td>
	    <td width="120" style="background-color:#f5f5f5;">
		 <font size="1">	
				<?php 
	  $result=mysqli_query($conn,"select * from classsched where fname like '%$fname%' and semester like '%$semester%' and sy like '%$sy%' and day like '%Saturday%' and time_start='8:00am' and time_end='9:00am' ")or die(mysqli_error());
	  $row=mysqli_fetch_array($result);
	echo '<br>';	
echo '<br>';
	
	 

	  ?>
		</font>
		</td>

	  </tr>
	  
	  
	  
	  
	  
	   <tr>
      <td width="110" align="center">
	   <font size="1" color="black">
	  <b>8:30am-9:30am</b>
	 </font>
	 </td>
      <td width="120" style="background-color:#f5f5f5;">
	  <font size="1">
	  <?php 
	  $result=mysqli_query($conn,"select * from classsched where fname like '%$fname%' and semester like '%$semester%' and sy like '%$sy%' and day like '%Monday%' and time_start='8:30am' and time_end='9:30am' ")or die(mysqli_error());
	  $row=mysqli_fetch_array($result);
	 if($row > 0){
			echo '<div style="background-color:#65ff94;">';
			
	echo $row['subject_code'];
	echo '<br>';	
	 echo $row['course_year_section'];
	echo '<br>';
	echo $row['room_name'];
	echo '<br>';
	echo '<br>';
	 }
	  ?>
	  </font>
	  </td>
	   <td width="120" style="background-color:#f5f5f5;">
	  	   <font size="1">
		  <?php 
	  $result1=mysqli_query($conn,"select * from classsched where fname like '%$fname%' and semester like '%$semester%' and sy like '%$sy%' and day like '%Wednesday%' and time_start='8:30am' and time_end='9:30am' ")or die(mysqli_error());
	  $row=mysqli_fetch_array($result1);
	 if($row > 0){
			echo '<div style="background-color:#65ff94;">';
			
	echo $row['subject_code'];
	echo '<br>';	
	 echo $row['course_year_section'];
	echo '<br>';
	echo $row['room_name'];
	
	 }
	  ?>
	  </font>
	 </td>

	    <td width="120" style="background-color:#f5f5f5;">
	  	   <font size="1">
		  <?php 
	  $result1=mysqli_query($conn,"select * from classsched where fname like '%$fname%' and semester like '%$semester%' and sy like '%$sy%' and day like '%Friday%' and time_start='8:30am' and time_end='9:30am' ")or die(mysqli_error());
	  $row=mysqli_fetch_array($result1);
	 if($row > 0){
			echo '<div style="background-color:#65ff94;">';
			
	echo $row['subject_code'];
	echo '<br>';	
	 echo $row['course_year_section'];
	echo '<br>';
	echo $row['room_name'];
	
	 }
	  ?>
	  </font>
	  </td>
	    <td width="70" align="center">
		 <font size="1" color="black">
		<b>9:00am-10:30am</b>
		</font>
		</td>
	    <td width="120" style="background-color:#f5f5f5;">
		  <font size="1">
		 <?php 
	  $result=mysqli_query($conn,"select * from classsched where fname like '%$fname%' and semester like '%$semester%' and sy like '%$sy%' and day like '%Tuesday%' and time_start='9:00am' and time_end='10:30am' ")or die(mysqli_error());
	  $row=mysqli_fetch_array($result);
	 if($row > 0){
			echo '<div style="background-color:#65ff94;">';
			
	echo $row['subject_code'];
	echo '<br>';	
	 echo $row['course_year_section'];
	echo '<br>';
	echo $row['room_name'];
	
	 }
	  ?>
	  </font>
		</td>
	    <td width="120" style="background-color:#f5f5f5;">
 <font size="1">			
			<?php 
	  $result=mysqli_query($conn,"select * from classsched where fname like '%$fname%' and semester like '%$semester%' and sy like '%$sy%' and day like '%Thursday%' and time_start='9:00am' and time_end='10:30am' ")or die(mysqli_error());
	  $row=mysqli_fetch_array($result);
	 if($row > 0){
			echo '<div style="background-color:#65ff94;">';
			
	echo $row['subject_code'];
	echo '<br>';	
	 echo $row['course_year_section'];
	echo '<br>';
	echo $row['room_name'];
	
	 }
	  ?>
	  </font>
		</td>
	    <td width="120" style="background-color:#f5f5f5;">
			 <font size="1">	
				<?php 
	  $result=mysqli_query($conn,"select * from classsched where fname like '%$fname%' and semester like '%$semester%' and sy like '%$sy%' and day like '%Saturday%' and time_start='9:00am' and time_end='10:00am' ")or die(mysqli_error());
	  $row=mysqli_fetch_array($result);
echo '<br>';	
echo '<br>';
	 
	  ?>
		</font>
		</td>

	  </tr>
	  
	  
	  
	  
	     <tr>
      <td width="70" align="center">
	   <font size="1" color="black">
	  <b>9:30am-10:30am</b>
	 </font>
	 </td>
      <td width="120" style="background-color:#f5f5f5;">
	  <font size="1">
	  <?php 
	  $result=mysqli_query($conn,"select * from classsched where fname like '%$fname%' and semester like '%$semester%' and sy like '%$sy%' and day like '%Monday%' and time_start='9:30am' and time_end='10:30am' ")or die(mysqli_error());
	  $row=mysqli_fetch_array($result);
	if($row > 0){
			echo '<div style="background-color:#65ff94;">';
			
	echo $row['subject_code'];
	echo '<br>';	
	 echo $row['course_year_section'];
	echo '<br>';
	echo $row['room_name'];
	
	 }
	  ?>
	  </font>
	  </td>
	   <td width="120" style="background-color:#f5f5f5;">
	  	   <font size="1">
		  <?php 
	  $result1=mysqli_query($conn,"select * from classsched where fname like '%$fname%' and semester like '%$semester%' and sy like '%$sy%' and day like '%Wednesday%' and time_start='9:30am' and time_end='10:30am' ")or die(mysqli_error());
	  $row=mysqli_fetch_array($result1);
	 if($row > 0){
			echo '<div style="background-color:#65ff94;">';
			
	echo $row['subject_code'];
	echo '<br>';	
	 echo $row['course_year_section'];
	echo '<br>';
	echo $row['room_name'];
	
	 }
	  ?>
	  </font>
	 </td>

	    <td width="120" style="background-color:#f5f5f5;">
	  	   <font size="1">
		  <?php 
	  $result1=mysqli_query($conn,"select * from classsched where fname like '%$fname%' and semester like '%$semester%' and sy like '%$sy%' and day like '%Friday%' and time_start='9:30am' and time_end='10:30am' ")or die(mysqli_error());
	  $row=mysqli_fetch_array($result1);
	 if($row > 0){
			echo '<div style="background-color:#65ff94;">';
			
	echo $row['subject_code'];
	echo '<br>';	
	 echo $row['course_year_section'];
	echo '<br>';
	echo $row['room_name'];
	
	 }
	  ?>
	  </font>
	  </td>
	    <td width="70" align="center">
		 <font size="1" color="black">
		<b>10:30am-12:00pm</b>
		</font>
		</td>
	    <td width="120" style="background-color:#f5f5f5;">
		  <font size="1">
		 <?php 
	  $result=mysqli_query($conn,"select * from classsched where fname like '%$fname%' and semester like '%$semester%' and sy like '%$sy%' and day like '%Tuesday%' and time_start='10:30am' and time_end='12:00pm' ")or die(mysqli_error());
	  $row=mysqli_fetch_array($result);
	 if($row > 0){
			echo '<div style="background-color:#65ff94;">';
			
	echo $row['subject_code'];
	echo '<br>';	
	 echo $row['course_year_section'];
	echo '<br>';
	echo $row['room_name'];
	
	 }
	  ?>
	  </font>
		</td>
	    <td width="120" style="background-color:#f5f5f5;">
 <font size="1">			
			<?php 
	  $result=mysqli_query($conn,"select * from classsched where fname like '%$fname%' and semester like '%$semester%' and sy like '%$sy%' and day like '%Thursday%' and time_start='10:30am' and time_end='12:00pm' ")or die(mysqli_error());
	  $row=mysqli_fetch_array($result);
	if($row > 0){
			echo '<div style="background-color:#65ff94;">';
			
	echo $row['subject_code'];
	echo '<br>';	
	 echo $row['course_year_section'];
	echo '<br>';
	echo $row['room_name'];
	
	 }
	  ?>
	  </font>
		</td>
	    <td width="120" style="background-color:#f5f5f5;">
				 <font size="1">	
				<?php 
	  $result=mysqli_query($conn,"select * from classsched where fname like '%$fname%' and semester like '%$semester%' and sy like '%$sy%' and day like '%Saturday%' and time_start='10:00am' and time_end='11:00am' ")or die(mysqli_error());
	  $row=mysqli_fetch_array($result);
	echo '<br>';	
echo '<br>';
	
	
	  ?>
		</font>
		
		</td>
	
	  </tr>
	  
	  
	  
	  
	  
	  
	  
	  
	     <tr>
      <td width="70" align="center">
	   <font size="1" color="black">
	  <b>10:30am-11:30am</b>
	 </font>
	 </td>
      <td width="120" style="background-color:#f5f5f5;">
	  <font size="1">
	  <?php 
	  $result=mysqli_query($conn,"select * from classsched where fname like '%$fname%' and semester like '%$semester%' and sy like '%$sy%' and day like '%Monday%' and time_start='10:30am' and time_end='11:30am' ")or die(mysqli_error());
	  $row=mysqli_fetch_array($result);
	 if($row > 0){
			echo '<div style="background-color:#65ff94;">';
			
	echo $row['subject_code'];
	echo '<br>';	
	 echo $row['course_year_section'];
	echo '<br>';
	echo $row['room_name'];
	
	 }
	  ?>
	  </font>
	  </td>
	   <td width="120" style="background-color:#f5f5f5;">
	  	   <font size="1">
		  <?php 
	  $result1=mysqli_query($conn,"select * from classsched where fname like '%$fname%' and semester like '%$semester%' and sy like '%$sy%' and day like '%Wednesday%' and time_start='10:30am' and time_end='11:30am' ")or die(mysqli_error());
	  $row=mysqli_fetch_array($result1);
	 if($row > 0){
			echo '<div style="background-color:#65ff94;">';
			
	echo $row['subject_code'];
	echo '<br>';	
	 echo $row['course_year_section'];
	echo '<br>';
	echo $row['room_name'];
	
	 }
	  ?>
	  </font>
	 </td>

	    <td width="120" style="background-color:#f5f5f5;">
	  	   <font size="1">
		  <?php 
	  $result1=mysqli_query($conn,"select * from classsched where fname like '%$fname%' and semester like '%$semester%' and sy like '%$sy%' and day like '%Friday%' and time_start='10:30am' and time_end='11:30am' ")or die(mysqli_error());
	  $row=mysqli_fetch_array($result1);
	 if($row > 0){
			echo '<div style="background-color:#65ff94;">';
			
	echo $row['subject_code'];
	echo '<br>';	
	 echo $row['course_year_section'];
	echo '<br>';
	echo $row['room_name'];
	
	 }
	  ?>
	  </font>
	  </td>
	    <td width="70" align="center">
		 <font size="1" color="black">
		<b>12:00pm-1:30pm</b>
		</font>
		</td>
	    <td width="120" style="background-color:#f5f5f5;">
		  <font size="1">
		 <?php 
	  $result=mysqli_query($conn,"select * from classsched where fname like '%$fname%' and semester like '%$semester%' and sy like '%$sy%' and day like '%Tuesday%' and time_start='12:00pm' and time_end='1:30pm' ")or die(mysqli_error());
	  $row=mysqli_fetch_array($result);
	 if($row > 0){
			echo '<div style="background-color:#65ff94;">';
			
	echo $row['subject_code'];
	echo '<br>';	
	 echo $row['course_year_section'];
	echo '<br>';
	echo $row['room_name'];
	
	 }
	  ?>
	  </font>
		</td>
	    <td width="120" style="background-color:#f5f5f5;">
 <font size="1">			
			<?php 
	  $result=mysqli_query($conn,"select * from classsched where fname like '%$fname%' and semester like '%$semester%' and sy like '%$sy%' and day like '%Thursday%' and time_start='12:00pm' and time_end='1:30pm' ")or die(mysqli_error());
	  $row=mysqli_fetch_array($result);
	if($row > 0){
			echo '<div style="background-color:#65ff94;">';
			
	echo $row['subject_code'];
	echo '<br>';	
	 echo $row['course_year_section'];
	echo '<br>';
	echo $row['room_name'];
	
	 }
	  ?>
	  </font>
		</td>
	    <td width="120" style="background-color:#f5f5f5;">
			 <font size="1">	
				<?php 
	  $result=mysqli_query($conn,"select * from classsched where fname like '%$fname%' and semester like '%$semester%' and sy like '%$sy%' and day like '%Saturday%' and time_start='10:30am' and time_end='1:30am' ")or die(mysqli_error());
	  $row=mysqli_fetch_array($result);
	echo '<br>';	
echo '<br>';
	  ?>
		</font>
		
		</td>
	   
	  </tr>
	  
	   <tr>
      <td width="70" align="center">
	   <font size="1" color="black">
	  <b>11:30am-12:30pm</b>
	 </font>
	 </td>
      <td width="120" style="background-color:#f5f5f5;">
	  <font size="1">
	  <?php 
	  $result=mysqli_query($conn,"select * from classsched where fname like '%$fname%' and semester like '%$semester%' and sy like '%$sy%' and day like '%Monday%' and time_start='11:30am' and time_end='12:30pm' ")or die(mysqli_error());
	  $row=mysqli_fetch_array($result);
	 if($row > 0){
			echo '<div style="background-color:#65ff94;">';
			
	echo $row['subject_code'];
	echo '<br>';	
	 echo $row['course_year_section'];
	echo '<br>';
	echo $row['room_name'];
	
	 }
	  ?>
	  </font>
	  </td>
	   <td width="120" style="background-color:#f5f5f5;">
	  	   <font size="1">
		  <?php 
	  $result1=mysqli_query($conn,"select * from classsched where fname like '%$fname%' and semester like '%$semester%' and sy like '%$sy%' and day like '%Wednesday%' and time_start='11:30am' and time_end='12:30pm' ")or die(mysqli_error());
	  $row=mysqli_fetch_array($result1);
	 if($row > 0){
			echo '<div style="background-color:#65ff94;">';
			
	echo $row['subject_code'];
	echo '<br>';	
	 echo $row['course_year_section'];
	echo '<br>';
	echo $row['room_name'];
	
	 }
	  ?>
	  </font>
	 </td>

	    <td width="120" style="background-color:#f5f5f5;">
	  	   <font size="1">
		  <?php 
	  $result1=mysqli_query($conn,"select * from classsched where fname like '%$fname%' and semester like '%$semester%' and sy like '%$sy%' and day like '%Friday%' and time_start='11:30am' and time_end='12:30pm' ")or die(mysqli_error());
	  $row=mysqli_fetch_array($result1);
	 if($row > 0){
			echo '<div style="background-color:#65ff94;">';
			
	echo $row['subject_code'];
	echo '<br>';	
	 echo $row['course_year_section'];
	echo '<br>';
	echo $row['room_name'];
	
	 }
	  ?>
	  </font>
	  </td>
	    <td width="70" align="center">
		 <font size="1" color="black">
		<b>1:30pm-3:00pm</b>
		</font>
		</td>
	    <td width="120" style="background-color:#f5f5f5;">
		  <font size="1">
		 <?php 
	  $result=mysqli_query($conn,"select * from classsched where fname like '%$fname%' and semester like '%$semester%' and sy like '%$sy%' and day like '%Tuesday%' and time_start='1:30pm' and time_end='3:00pm' ")or die(mysqli_error());
	  $row=mysqli_fetch_array($result);
	 if($row > 0){
			echo '<div style="background-color:#65ff94;">';
			
	echo $row['subject_code'];
	echo '<br>';	
	 echo $row['course_year_section'];
	echo '<br>';
	echo $row['room_name'];
	
	 }
	  ?>
	  </font>
		</td>
	    <td width="120" style="background-color:#f5f5f5;">
 <font size="1">			
			<?php 
	  $result=mysqli_query($conn,"select * from classsched where fname like '%$fname%' and semester like '%$semester%' and sy like '%$sy%' and day like '%Thursday%' and time_start='1:30pm' and time_end='3:00pm' ")or die(mysqli_error());
	  $row=mysqli_fetch_array($result);
	 if($row > 0){
			echo '<div style="background-color:#65ff94;">';
			
	echo $row['subject_code'];
	echo '<br>';	
	 echo $row['course_year_section'];
	echo '<br>';
	echo $row['room_name'];
	
	 }
	  ?>
	  </font>
		</td>
	    <td width="120" style="background-color:#f5f5f5;">
						 <font size="1">	
				<?php 
	  $result=mysqli_query($conn,"select * from classsched where fname like '%$fname%' and semester like '%$semester%' and sy like '%$sy%' and day like '%Saturday%' and time_start='1:30pm' and time_end='4:30pm' ")or die(mysqli_error());
	  $row=mysqli_fetch_array($result);
echo '<br>';	
echo '<br>';	
	echo $row['subject_code'];
	
	  ?>
		</font>
		</td>
	  </tr>
	  
	  
	  
	  <tr>
	  
      <td width="70" align="center">
	  <font size="1" color="black">
	  <b>12:30pm-1:30pm</b>
	 </font>
	</td>
     <td width="120" style="background-color:#f5f5f5;">
	  <font size="1">
	  <?php 
	  $result=mysqli_query($conn,"select * from classsched where fname like '%$fname%' and semester like '%$semester%' and sy like '%$sy%' and day like '%Monday%' and time_start='12:30pm' and time_end='1:30pm' ")or die(mysqli_error());
	  $row=mysqli_fetch_array($result);
	if($row > 0){
			echo '<div style="background-color:#65ff94;">';
			
	echo $row['subject_code'];
	echo '<br>';	
	 echo $row['course_year_section'];
	echo '<br>';
	echo $row['room_name'];
	
	 }
	  ?>
	  </font>
	  </td>
	   <td width="120" style="background-color:#f5f5f5;">
	  	   <font size="1">
		  <?php 
	  $result1=mysqli_query($conn,"select * from classsched where fname like '%$fname%' and semester like '%$semester%' and sy like '%$sy%' and day like '%Wednesday%' and time_start='12:30pm' and time_end='1:30pm' ")or die(mysqli_error());
	  $row=mysqli_fetch_array($result1);
	 if($row > 0){
			echo '<div style="background-color:#65ff94;">';
			
	echo $row['subject_code'];
	echo '<br>';	
	 echo $row['course_year_section'];
	echo '<br>';
	echo $row['room_name'];
	
	 }
	  ?>
	  </font>
	 </td>

	    <td width="120" style="background-color:#f5f5f5;">
	  	   <font size="1">
		  <?php 
	  $result1=mysqli_query($conn,"select * from classsched where fname like '%$fname%' and semester like '%$semester%' and sy like '%$sy%' and day like '%Friday%' and time_start='12:30pm' and time_end='1:30pm' ")or die(mysqli_error());
	  $row=mysqli_fetch_array($result1);
	if($row > 0){
			echo '<div style="background-color:#65ff94;">';
			
	echo $row['subject_code'];
	echo '<br>';	
	 echo $row['course_year_section'];
	echo '<br>';
	echo $row['room_name'];
	
	 }
	  ?>
	  </font>
	  </td>
      <td width="70" align="center">
	  <font size="1" color="black">
	  <b>3:00pm-4:30pm</b>
		</font>
	  </td>
      <td width="120" style="background-color:#f5f5f5;">
 <font size="1">	 
   	 <?php 
	  $result=mysqli_query($conn,"select * from classsched where fname like '%$fname%' and semester like '%$semester%' and sy like '%$sy%' and day like '%Tuesday%' and time_start='3:00pm' and time_end='4:30pm' ")or die(mysqli_error());
	  $row=mysqli_fetch_array($result);
	if($row > 0){
			echo '<div style="background-color:#65ff94;">';
			
	echo $row['subject_code'];
	echo '<br>';	
	 echo $row['course_year_section'];
	echo '<br>';
	echo $row['room_name'];
	
	 }
	  ?>
	  </font>
	  </td>
      <td width="120" style="background-color:#f5f5f5;">
 <font size="1">	    	
			<?php 
	  $result=mysqli_query($conn,"select * from classsched where fname like '%$fname%' and semester like '%$semester%' and sy like '%$sy%' and day like '%Thursday%' and time_start='3:00pm' and time_end='4:30pm' ")or die(mysqli_error());
	  $row=mysqli_fetch_array($result);
	 if($row > 0){
			echo '<div style="background-color:#65ff94;">';
			
	echo $row['subject_code'];
	echo '<br>';	
	 echo $row['course_year_section'];
	echo '<br>';
	echo $row['room_name'];
	
	 }
	  ?>
	  </font>
	  </td>
      <td width="120" style="background-color:#f5f5f5;">
	  		 <font size="1">	
				<?php 
	  $result=mysqli_query($conn,"select * from classsched where fname like '%$fname%' and semester like '%$semester%' and sy like '%$sy%' and day like '%Saturday%' and time_start='1:30pm' and time_end='4:30pm' ")or die(mysqli_error());
	  $row=mysqli_fetch_array($result);
	echo '<br>';	
echo '<br>';
	  ?>
		</font>
	  </td>

	  </tr>	
	  
	  
	  <tr>
      <td width="70" align="center">
	   <font size="1" color="black">
	  <b>1:30pm-2:30pm</b>
	 </font>
	</td>
 <td width="120" style="background-color:#f5f5f5;">
 <font size="1">
	  <?php 
	  $result=mysqli_query($conn,"select * from classsched where fname like '%$fname%' and semester like '%$semester%' and sy like '%$sy%' and day like '%Monday%' and time_start='1:30pm' and time_end='2:30pm' ")or die(mysqli_error());
	  $row=mysqli_fetch_array($result);
	 if($row > 0){
			echo '<div style="background-color:#65ff94;">';
			
	echo $row['subject_code'];
	echo '<br>';	
	 echo $row['course_year_section'];
	echo '<br>';
	echo $row['room_name'];
	
	 }
	  ?>
	  </font>
	  </td>
	   <td width="120" style="background-color:#f5f5f5;">
	  	  <font size="1">
		  <?php 
	  $result1=mysqli_query($conn,"select * from classsched where fname like '%$fname%' and semester like '%$semester%' and sy like '%$sy%' and day like '%Wednesday%' and time_start='1:30pm' and time_end='2:30pm' ")or die(mysqli_error());
	  $row=mysqli_fetch_array($result1);
	 if($row > 0){
			echo '<div style="background-color:#65ff94;">';
			
	echo $row['subject_code'];
	echo '<br>';	
	 echo $row['course_year_section'];
	echo '<br>';
	echo $row['room_name'];
	
	 }
	  ?>
	  </font>
	 </td>

	    <td width="120" style="background-color:#f5f5f5;">
	  	  <font size="1">
		  <?php 
	  $result1=mysqli_query($conn,"select * from classsched where fname like '%$fname%' and semester like '%$semester%' and sy like '%$sy%' and day like '%Friday%' and time_start='1:30pm' and time_end='2:30pm' ")or die(mysqli_error());
	  $row=mysqli_fetch_array($result1);
	 if($row > 0){
			echo '<div style="background-color:#65ff94;">';
			
	echo $row['subject_code'];
	echo '<br>';	
	 echo $row['course_year_section'];
	echo '<br>';
	echo $row['room_name'];
	
	 }
	  ?>
	  <font size="1">
	  </td>
      <td width="70" align="center">
	  <font size="1" color="black">
	   <b>4:30pm-6:00pm</b>
		</font>
	  </td>
      <td width="120" style="background-color:#f5f5f5;">
	    	 <font size="1">
			 <?php 
	  $result=mysqli_query($conn,"select * from classsched where fname like '%$fname%' and semester like '%$semester%' and sy like '%$sy%' and day like '%Tuesday%' and time_start='4:30pm' and time_end='6:00pm' ")or die(mysqli_error());
	  $row=mysqli_fetch_array($result);
	 if($row > 0){
			echo '<div style="background-color:#65ff94;">';
			
	echo $row['subject_code'];
	echo '<br>';	
	 echo $row['course_year_section'];
	echo '<br>';
	echo $row['room_name'];
	
	 }
	  ?>
	  </font>
	  </td>
      <td width="120" style="background-color:#f5f5f5;">
	 <font size="1">    
		 <?php 
	  $result=mysqli_query($conn,"select * from classsched where fname like '%$fname%' and semester like '%$semester%' and sy like '%$sy%' and day like '%Thursday%' and time_start='4:30pm' and time_end='6:00pm' ")or die(mysqli_error());
	  $row=mysqli_fetch_array($result);
	 if($row > 0){
			echo '<div style="background-color:#65ff94;">';
			
	echo $row['subject_code'];
	echo '<br>';	
	 echo $row['course_year_section'];
	echo '<br>';
	echo $row['room_name'];
	
	 }
	  ?>
	  </font>
	  </td>
     
	  <td width="120" style="background-color:#f5f5f5;">
	  <?php 
	  $result=mysqli_query($conn,"select * from classsched where fname like '%$fname%' and semester like '%$semester%' and sy like '%$sy%' and day like '%Saturday%' and time_start='1:30pm' and time_end='4:30pm' ")or die(mysqli_error());
	  $row=mysqli_fetch_array($result);
	echo '<br>';	

	  ?>
	  </td>

	  </tr>	
	  
	  
	  	  
	  
	  	          <tr>
      <td width="70" align="center">
	  <font size="1" color="black">
	  <b>2:30pm-3:30pm</b>
	 </font>
	</td>
 <td width="120" style="background-color:#f5f5f5;">
	  <font size="1">
	  <?php 
	  $result=mysqli_query($conn,"select * from classsched where fname like '%$fname%' and semester like '%$semester%' and sy like '%$sy%' and day like '%Monday%' and time_start='2:30pm' and time_end='3:30pm' ")or die(mysqli_error());
	  $row=mysqli_fetch_array($result);
	 if($row > 0){
			echo '<div style="background-color:#65ff94;">';
			
	echo $row['subject_code'];
	echo '<br>';	
	 echo $row['course_year_section'];
	echo '<br>';
	echo $row['room_name'];
	
	 }
	  ?>
	  </font>
	  </td>
	   <td width="120" style="background-color:#f5f5f5;">
		<font size="1">	  	
		<?php 
	  $result1=mysqli_query($conn,"select * from classsched where fname like '%$fname%' and semester like '%$semester%' and sy like '%$sy%' and day like '%Wednesday%' and time_start='2:30pm' and time_end='3:30pm' ")or die(mysqli_error());
	  $row=mysqli_fetch_array($result1);
	 if($row > 0){
			echo '<div style="background-color:#65ff94;">';
			
	echo $row['subject_code'];
	echo '<br>';	
	 echo $row['course_year_section'];
	echo '<br>';
	echo $row['room_name'];
	
	 }
	  ?>
	  </font>
	 </td>

	    <td width="120" style="background-color:#f5f5f5;">
	  	  <font size="1">
		  <?php 
	  $result1=mysqli_query($conn,"select * from classsched where fname like '%$fname%' and semester like '%$semester%' and sy like '%$sy%' and day like '%Friday%' and time_start='2:30pm' and time_end='3:30pm' ")or die(mysqli_error());
	  $row=mysqli_fetch_array($result1);
	 if($row > 0){
			echo '<div style="background-color:#65ff94;">';
			
	echo $row['subject_code'];
	echo '<br>';	
	 echo $row['course_year_section'];
	echo '<br>';
	echo $row['room_name'];
	
	 }
	  ?>
	  </font>
	  </td>
      <td width="70" align="center">
	  <font size="1" color="black">
	   <b>6:00pm-7:30pm</b>
		</font>
	  </td>
      <td width="120" style="background-color:#f5f5f5;">
	    	 <font size="1">
			 <?php 
	  $result=mysqli_query($conn,"select * from classsched where fname like '%$fname%' and semester like '%$semester%' and sy like '%$sy%' and day like '%Tuesday%' and time_start='6:00pm' and time_end='7:30pm' ")or die(mysqli_error());
	  $row=mysqli_fetch_array($result);
	if($row > 0){
			echo '<div style="background-color:#65ff94;">';
			
	echo $row['subject_code'];
	echo '<br>';	
	 echo $row['course_year_section'];
	echo '<br>';
	echo $row['room_name'];
	
	 }
	  ?>
	  </font>
	  </td>
      <td width="120" style="background-color:#f5f5f5;">
<font size="1">	      	
			<?php 
	  $result=mysqli_query($conn,"select * from classsched where fname like '%$fname%' and semester like '%$semester%' and sy like '%$sy%' and day like '%Thursday%' and time_start='6:00pm' and time_end='7:30pm' ")or die(mysqli_error());
	  $row=mysqli_fetch_array($result);
	 if($row > 0){
			echo '<div style="background-color:#65ff94;">';
			
	echo $row['subject_code'];
	echo '<br>';	
	 echo $row['course_year_section'];
	echo '<br>';
	echo $row['room_name'];
	
	 }
	  ?>
	  </font>
	  </td>
      <td width="120" style="background-color:#f5f5f5;">
	  <?php 
	  $result=mysqli_query($conn,"select * from classsched where fname like '%$fname%' and semester like '%$semester%' and sy like '%$sy%' and day like '%Saturday%' and time_start='1:30pm' and time_end='4:30pm' ")or die(mysqli_error());
	  $row=mysqli_fetch_array($result);
	echo '<br>';	

	  ?>
	  </td>

	  </tr>	
	  
	  	  
	  	          <tr>
      <td width="70" align="center">
	  <font size="1" color="black">
	  <b>3:30pm-4:30pm</b>
	 </font>
	</td>
 <td width="120" style="background-color:#f5f5f5;">
 <font size="1">
	  <?php 
	  $result=mysqli_query($conn,"select * from classsched where fname like '%$fname%' and semester like '%$semester%' and sy like '%$sy%' and day like '%Monday%' and time_start='3:30pm' and time_end='4:30pm' ")or die(mysqli_error());
	  $row=mysqli_fetch_array($result);
	if($row > 0){
			echo '<div style="background-color:#65ff94;">';
			
	echo $row['subject_code'];
	echo '<br>';	
	 echo $row['course_year_section'];
	echo '<br>';
	echo $row['room_name'];
	
	 }
	  ?>
	  </font>
	  </td>
	   <td width="120" style="background-color:#f5f5f5;">
	  	  <font size="1">
		  <?php 
	  $result1=mysqli_query($conn,"select * from classsched where fname like '%$fname%' and semester like '%$semester%' and sy like '%$sy%' and day like '%Wednesday%' and time_start='3:30pm' and time_end='4:30pm' ")or die(mysqli_error());
	  $row=mysqli_fetch_array($result1);
	 if($row > 0){
			echo '<div style="background-color:#65ff94;">';
			
	echo $row['subject_code'];
	echo '<br>';	
	 echo $row['course_year_section'];
	echo '<br>';
	echo $row['room_name'];
	
	 }
	  ?>
	  </font>
	 </td>

	    <td width="120" style="background-color:#f5f5f5;">
	  	  <font size="1">
		  <?php 
	  $result1=mysqli_query($conn,"select * from classsched where fname like '%$fname%' and semester like '%$semester%' and sy like '%$sy%' and day like '%Friday%' and time_start='3:30pm' and time_end='4:30pm' ")or die(mysqli_error());
	  $row=mysqli_fetch_array($result1);
	 if($row > 0){
			echo '<div style="background-color:#65ff94;">';
			
	echo $row['subject_code'];
	echo '<br>';	
	 echo $row['course_year_section'];
	echo '<br>';
	echo $row['room_name'];
	
	 }
	  ?>
	  </font>
	  </td>
      <td width="70" align="center">
	  <font size="1" color="black">
	    <b>7:30pm-8:30pm</b>
		</font>
	  </td>
      <td width="120" style="background-color:#f5f5f5;">
	    	 <font size="1">
			 <?php 
	  $result=mysqli_query($conn,"select * from classsched where fname like '%$fname%' and semester like '%$semester%' and sy like '%$sy%' and day like '%Tuesday%' and time_start='7:30pm' and time_end='8:30pm' ")or die(mysqli_error());
	  $row=mysqli_fetch_array($result);
	 if($row > 0){
			echo '<div style="background-color:#65ff94;">';
			
	echo $row['subject_code'];
	echo '<br>';	
	 echo $row['course_year_section'];
	echo '<br>';
	echo $row['room_name'];
	
	 }
	  ?>
	  </font>
	  </td>
      <td width="120" style="background-color:#f5f5f5;">
	  <font size="1">
	  <?php 
	  $result=mysqli_query($conn,"select * from classsched where fname like '%$fname%' and semester like '%$semester%' and sy like '%$sy%' and day like '%Thursday%' and time_start='7:30pm' and time_end='8:30pm' ")or die(mysqli_error());
	  $row=mysqli_fetch_array($result);
	 if($row > 0){
			echo '<div style="background-color:#65ff94;">';
			
	echo $row['subject_code'];
	echo '<br>';	
	 echo $row['course_year_section'];
	echo '<br>';
	echo $row['room_name'];
	
	 }
	  ?>
	  </font>
	  </td>
      <td width="120" style="background-color:#f5f5f5;">
	  <?php 
	  $result=mysqli_query($conn,"select * from classsched where fname like '%$fname%' and semester like '%$semester%' and sy like '%$sy%' and day like '%Saturday%' and time_start='1:30pm' and time_end='4:30pm' ")or die(mysqli_error());
	  $row=mysqli_fetch_array($result);
	echo '<br>';	

	  ?>
	  </td>

	  </tr>	
	  
	  
	  
	  	  
	  	          <tr>
      <td width="70" align="center">
	  <font size="1" color="black">
	  <b>4:30pm-5:30pm</b>
	 </font>
	</td>
     <td width="120" style="background-color:#f5f5f5;">
	  <font size="1">
	  <?php 
	  $result=mysqli_query($conn,"select * from classsched where fname like '%$fname%' and semester like '%$semester%' and sy like '%$sy%' and day like '%Monday%' and time_start='4:30pm' and time_end='5:30pm' ")or die(mysqli_error());
	  $row=mysqli_fetch_array($result);
	 if($row > 0){
			echo '<div style="background-color:#65ff94;">';
			
	echo $row['subject_code'];
	echo '<br>';	
	 echo $row['course_year_section'];
	echo '<br>';
	echo $row['room_name'];
	
	 }
	  ?>
	  </font>
	  </td>
	   <td width="120" style="background-color:#f5f5f5;">
	  	  <font size="1">
		  <?php 
	  $result1=mysqli_query($conn,"select * from classsched where fname like '%$fname%' and semester like '%$semester%' and sy like '%$sy%' and day like '%Wednesday%' and time_start='4:30pm' and time_end='5:30pm' ")or die(mysqli_error());
	  $row=mysqli_fetch_array($result1);
	 if($row > 0){
			echo '<div style="background-color:#65ff94;">';
			
	echo $row['subject_code'];
	echo '<br>';	
	 echo $row['course_year_section'];
	echo '<br>';
	echo $row['room_name'];
	
	 }
	  ?>
	  </font>
	 </td>

	    <td width="120" style="background-color:#f5f5f5;">
	  	  <font size="1">
		  <?php 
	  $result1=mysqli_query($conn,"select * from classsched where fname like '%$fname%' and semester like '%$semester%' and sy like '%$sy%' and day like '%Friday%' and time_start='4:30pm' and time_end='5:30pm' ")or die(mysqli_error());
	  $row=mysqli_fetch_array($result1);
	if($row > 0){
			echo '<div style="background-color:#65ff94;">';
			
	echo $row['subject_code'];
	echo '<br>';	
	 echo $row['course_year_section'];
	echo '<br>';
	echo $row['room_name'];
	
	 }
	  ?>
	  </font>
	  </td>
      <td width="70"></td>
      <td width="120" style="background-color:#f5f5f5;"><?php 
	  $result=mysqli_query($conn,"select * from classsched where fname like '%$fname%' and semester like '%$semester%' and sy like '%$sy%' and day like '%Saturday%' and time_start='1:30pm' and time_end='4:30pm' ")or die(mysqli_error());
	  $row=mysqli_fetch_array($result);
	echo '<br>';	

	  ?></td>
      <td width="120" style="background-color:#f5f5f5;"><?php 
	  $result=mysqli_query($conn,"select * from classsched where fname like '%$fname%' and semester like '%$semester%' and sy like '%$sy%' and day like '%Saturday%' and time_start='1:30pm' and time_end='4:30pm' ")or die(mysqli_error());
	  $row=mysqli_fetch_array($result);
	echo '<br>';	

	  ?></td>
      <td width="120" style="background-color:#f5f5f5;"><?php 
	  $result=mysqli_query($conn,"select * from classsched where fname like '%$fname%' and semester like '%$semester%' and sy like '%$sy%' and day like '%Saturday%' and time_start='1:30pm' and time_end='4:30pm' ")or die(mysqli_error());
	  $row=mysqli_fetch_array($result);
	echo '<br>';	

	  ?></td>

	  </tr>	
	  	  

	  	          <tr>
      <td width="70" align="center">
	  <font size="1" color="black">
	  <b>5:30pm-6:30pm</b>
	 </font>
	</td>
   <td width="120" style="background-color:#f5f5f5;">
	  <font size="1">
	  <?php 
	  $result=mysqli_query($conn,"select * from classsched where fname like '%$fname%' and semester like '%$semester%' and sy like '%$sy%' and day like '%Monday%' and time_start='5:30pm' and time_end='6:30pm' ")or die(mysqli_error());
	  $row=mysqli_fetch_array($result);
	if($row > 0){
			echo '<div style="background-color:#65ff94;">';
			
	echo $row['subject_code'];
	echo '<br>';	
	 echo $row['course_year_section'];
	echo '<br>';
	echo $row['room_name'];
	
	 }
	  ?>
	  </font>
	  </td>
	   <td width="120" style="background-color:#f5f5f5;">
	  	  <font size="1">
		  <?php 
	  $result1=mysqli_query($conn,"select * from classsched where fname like '%$fname%' and semester like '%$semester%' and sy like '%$sy%' and day like '%Wednesday%' and time_start='5:30pm' and time_end='6:30pm' ")or die(mysqli_error());
	  $row=mysqli_fetch_array($result1);
	if($row > 0){
			echo '<div style="background-color:#65ff94;">';
			
	echo $row['subject_code'];
	echo '<br>';	
	 echo $row['course_year_section'];
	echo '<br>';
	echo $row['room_name'];
	
	 }
	  ?>
	  </font>
	 </td>

	    <td width="120" style="background-color:#f5f5f5;">
			  <font size="1">
	  	  <?php 
	  $result1=mysqli_query($conn,"select * from classsched where fname like '%$fname%' and semester like '%$semester%' and sy like '%$sy%' and day like '%Friday%' and time_start='5:30pm' and time_end='6:30pm' ")or die(mysqli_error());
	  $row=mysqli_fetch_array($result1);
	if($row > 0){
			echo '<div style="background-color:#65ff94;">';
			
	echo $row['subject_code'];
	echo '<br>';	
	 echo $row['course_year_section'];
	echo '<br>';
	echo $row['room_name'];
	
	 }
	  ?>
	  </font>
	  </td>
      <td width="70"></td>
      <td width="120" style="background-color:#f5f5f5;"><?php 
	  $result=mysqli_query($conn,"select * from classsched where fname like '%$fname%' and semester like '%$semester%' and sy like '%$sy%' and day like '%Saturday%' and time_start='1:30pm' and time_end='4:30pm' ")or die(mysqli_error());
	  $row=mysqli_fetch_array($result);
	echo '<br>';	

	  ?></td>
      <td width="120" style="background-color:#f5f5f5;"><?php 
	  $result=mysqli_query($conn,"select * from classsched where fname like '%$fname%' and semester like '%$semester%' and sy like '%$sy%' and day like '%Saturday%' and time_start='1:30pm' and time_end='4:30pm' ")or die(mysqli_error());
	  $row=mysqli_fetch_array($result);
	echo '<br>';	

	  ?></td>
      <td width="120" style="background-color:#f5f5f5;"><?php 
	  $result=mysqli_query($conn,"select * from classsched where fname like '%$fname%' and semester like '%$semester%' and sy like '%$sy%' and day like '%Saturday%' and time_start='1:30pm' and time_end='4:30pm' ")or die(mysqli_error());
	  $row=mysqli_fetch_array($result);
	echo '<br>';	

	  ?></td>
   
	  </tr>	
	  	  		  
	  
	  	  	          <tr>
      <td width="70" align="center">
	  <font size="1" color="black">
	  <b>6:30pm-7:30pm</b>
	 </font>
	</td>
    <td width="120" style="background-color:#f5f5f5;">
	  <font size="1">
	  <?php 
	  $result=mysqli_query($conn,"select * from classsched where fname like '%$fname%' and semester like '%$semester%' and sy like '%$sy%' and day like '%Monday%' and time_start='6:30pm' and time_end='7:30pm' ")or die(mysqli_error());
	  $row=mysqli_fetch_array($result);
	 if($row > 0){
			echo '<div style="background-color:#65ff94;">';
			
	echo $row['subject_code'];
	echo '<br>';	
	 echo $row['course_year_section'];
	echo '<br>';
	echo $row['room_name'];
	
	 }
	  ?>
	  </font>
	  </td>
	   <td width="120" style="background-color:#f5f5f5;">
	  	  <font size="1">
		  <?php 
	  $result1=mysqli_query($conn,"select * from classsched where fname like '%$fname%' and semester like '%$semester%' and sy like '%$sy%' and day like '%Wednesday%' and time_start='6:30pm' and time_end='7:30pm' ")or die(mysqli_error());
	  $row=mysqli_fetch_array($result1);
	 if($row > 0){
			echo '<div style="background-color:#65ff94;">';
			
	echo $row['subject_code'];
	echo '<br>';	
	 echo $row['course_year_section'];
	echo '<br>';
	echo $row['room_name'];
	
	 }
	  ?>
	  </font>
	 </td>

	    <td width="120" style="background-color:#f5f5f5;">
	  	  <font size="1">
		  <?php 
	  $result1=mysqli_query($conn,"select * from classsched where fname like '%$fname%' and semester like '%$semester%' and sy like '%$sy%' and day like '%Friday%' and time_start='6:30pm' and time_end='7:30pm' ")or die(mysqli_error());
	  $row=mysqli_fetch_array($result1);
	if($row > 0){
			echo '<div style="background-color:#65ff94;">';
			
	echo $row['subject_code'];
	echo '<br>';	
	 echo $row['course_year_section'];
	echo '<br>';
	echo $row['room_name'];
	
	 }
	  ?>
	  </font>
	  </td>
      <td width="70"></td>
      <td width="120" style="background-color:#f5f5f5;"><?php 
	  $result=mysqli_query($conn,"select * from classsched where fname like '%$fname%' and semester like '%$semester%' and sy like '%$sy%' and day like '%Saturday%' and time_start='1:30pm' and time_end='4:30pm' ")or die(mysqli_error());
	  $row=mysqli_fetch_array($result);
	echo '<br>';	

	  ?></td>
      <td width="120" style="background-color:#f5f5f5;"><?php 
	  $result=mysqli_query($conn,"select * from classsched where fname like '%$fname%' and semester like '%$semester%' and sy like '%$sy%' and day like '%Saturday%' and time_start='1:30pm' and time_end='4:30pm' ")or die(mysqli_error());
	  $row=mysqli_fetch_array($result);
	echo '<br>';	

	  ?></td>
      <td width="120" style="background-color:#f5f5f5;"><?php 
	  $result=mysqli_query($conn,"select * from classsched where fname like '%$fname%' and semester like '%$semester%' and sy like '%$sy%' and day like '%Saturday%' and time_start='1:30pm' and time_end='4:30pm' ")or die(mysqli_error());
	  $row=mysqli_fetch_array($result);
	echo '<br>';	

	  ?></td>

	  </tr>	
	  	  		

	  	  	          <tr>
      <td width="70" align="center">
	  <font size="1" color="black">
	  <b>7:30pm-8:30pm</b>
	 </font>
	</td>
  <td width="120" style="background-color:#f5f5f5;">
	  <font size="1">
	  <?php 
	  $result=mysqli_query($conn,"select * from classsched where fname like '%$fname%' and semester like '%$semester%' and sy like '%$sy%' and day like '%Monday%' and time_start='7:30pm' and time_end='8:30pm' ")or die(mysqli_error());
	  $row=mysqli_fetch_array($result);
	 if($row > 0){
			echo '<div style="background-color:#65ff94;">';
			
	echo $row['subject_code'];
	echo '<br>';	
	 echo $row['course_year_section'];
	echo '<br>';
	echo $row['room_name'];
	
	 }
	  ?>
	  </font>
	  </td>
	   <td width="120" style="background-color:#f5f5f5;">
	  	  <font size="1">
		  <?php 
	  $result1=mysqli_query($conn,"select * from classsched where fname like '%$fname%' and semester like '%$semester%' and sy like '%$sy%' and day like '%Wednesday%' and time_start='7:30pm' and time_end='8:30pm' ")or die(mysqli_error());
	  $row=mysqli_fetch_array($result1);
	 if($row > 0){
			echo '<div style="background-color:#65ff94;">';
			
	echo $row['subject_code'];
	echo '<br>';	
	 echo $row['course_year_section'];
	echo '<br>';
	echo $row['room_name'];
	
	 }
	  ?>
	  </font>
	 </td>

	    <td width="120" style="background-color:#f5f5f5;">
	  	  <font size="1">
		  <?php 
	  $result1=mysqli_query($conn,"select * from classsched where fname like '%$fname%' and semester like '%$semester%' and sy like '%$sy%' and day like '%Friday%' and time_start='7:30pm' and time_end='8:30pm' ")or die(mysqli_error());
	  $row=mysqli_fetch_array($result1);
	 if($row > 0){
			echo '<div style="background-color:#65ff94;">';
			
	echo $row['subject_code'];
	echo '<br>';	
	 echo $row['course_year_section'];
	echo '<br>';
	echo $row['room_name'];
	
	 }
	  ?>
	  </font>
	  </td>
      <td width="70"></td>
      <td width="120" style="background-color:#f5f5f5;"><?php 
	  $result=mysqli_query($conn,"select * from classsched where fname like '%$fname%' and semester like '%$semester%' and sy like '%$sy%' and day like '%Saturday%' and time_start='1:30pm' and time_end='4:30pm' ")or die(mysqli_error());
	  $row=mysqli_fetch_array($result);
	echo '<br>';	

	  ?></td>
      <td width="120" style="background-color:#f5f5f5;"><?php 
	  $result=mysqli_query($conn,"select * from classsched where fname like '%$fname%' and semester like '%$semester%' and sy like '%$sy%' and day like '%Saturday%' and time_start='1:30pm' and time_end='4:30pm' ")or die(mysqli_error());
	  $row=mysqli_fetch_array($result);
	echo '<br>';	

	  ?></td>
      <td width="120" style="background-color:#f5f5f5;"><?php 
	  $result=mysqli_query($conn,"select * from classsched where fname like '%$fname%' and semester like '%$semester%' and sy like '%$sy%' and day like '%Saturday%' and time_start='1:30pm' and time_end='4:30pm' ")or die(mysqli_error());
	  $row=mysqli_fetch_array($result);
	echo '<br>';	

	  ?></td>
 
	  </tr>					
	  
	  
	  
	  
	  

	  
	
  </tbody>
  </table>  </center>
  </b></br>
  <div id="foot">
  <font size="1">
 <p> I hereby certify the correctness of the above classsched of subjects
 
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

  Instructor's Signature</p>
 </font>
<font size="1">Prepared by:</font>
<br></br>
<font size="1">CRISTINE V. REDOBLO, MAEd, MIT
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </br>
Chairperson, BSIS </br> </br></br>

<font size="1">Recommending Approval:</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;


<br>
</br>
<font size="1">ANTONIO L. DERAJA PH. D 

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;
JANET P. ESPINOSA Ph.D.
<br>
<font size="1">Dean College of Industrial Technology</font>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;
Vice President, Academic  Affairs
<br>
<br>
<br>

<font size="1">Approved:</font>
<br>
<br>





RENATO M. SOROLLA, Ph.D.

<br>

SUC President II  
  </div>
</div>
  </html>