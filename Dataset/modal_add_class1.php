<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                          
                                            <div class="alert alert-info"><strong><center>Add Class </center></strong></div>
                                        </div>
                                        <div class="modal-body">
                              <form  method="post" enctype="multipart/form-data">
                                
                                <hr>
								
								 <div class="control-group">
                                           <label class="control-label" for="inputEmail">Day:</label><br />
                                           MONDAY:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" value="Monday" name="Monday" id="day">

<br>
TUESDAY:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" value="Tuesday" name="Tuesday" id="day">
<br>
WEDNESDAY:<input type="checkbox" value="Wednesday" name="Wednesday" id="day">
<br>
THURSDAY:&nbsp;&nbsp;&nbsp;<input type="checkbox" value="Thursday" name="Thursday" id="day">
<br>
FRIDAY:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" value="Friday" name="Friday" id="day">
<br>
SATURDAY:&nbsp;&nbsp;&nbsp;<input type="checkbox" value="Saturday" name="Saturday" id="day">
                                 </div>
                               
                                <div class="control-group">
                                    <label class="control-label" for="inputPassword">Time Start:</label>
                                    <div class="controls">
                                       <select type="text" name="time_start" class = "form-control" placeholder="Category" >
                                         <option>--Select--</option>
		<option value="7:30am">7:30am</option>
		<option value="8:00am">8:00am</option>
		<option value="8:30am">8:30am</option>
		<option value="9:00am">9:00am</option>
		<option value="9:30am">9:30am</option>
		<option value="10:am">10:00am</option>
		<option value="10:30am">10:30am</option>
		<option value="11:00am">11:00am</option>
		<option value="11:30am">11:30am</option>
		<option value="12:00pm">12:00pm</option>
		<option value="12:30pm">12:30pm</option>
		<option value="1:00pm">1:00pm</option>
		<option value="1:30pm">1:30pm</option>
		<option value="2:00pm">2:00pm</option>
		<option value="2:30pm">2:30pm</option>
		<option value="3:00pm">3:00pm</option>
		<option value="3:30pm">3:30pm</option>
		<option value="4:00pm">4:00pm</option>
		<option value="4:30pm">4:30pm</option>
		<option value="5:00pm">5:00pm</option>
		<option value="5:30pm">5:30pm</option>
		<option value="6:00pm">6:00pm</option>
		<option value="6:30pm">6:30pm</option>
		<option value="7:00pm">7:00pm</option>
		<option value="7:30pm">7:30pm</option>
		<option value="8:00pm">8:00pm</option>
		<option value="8:30pm">8:30pm</option></select>
                                    </div>
                                </div>
                               
                                <div class="control-group">
                                    <label class="control-label" for="inputPassword">Time End:</label>
                                    <div class="controls">
									<select type="text" name="time_end" class = "form-control" placeholder="Category" >
                                        <option>--Select--</option>
		<option value="7:30am">7:30am</option>
		<option value="8:00am">8:00am</option>
		<option value="8:30am">8:30am</option>
		<option value="9:00am">9:00am</option>
		<option value="9:30am">9:30am</option>
		<option value="10:am">10:00am</option>
		<option value="10:30am">10:30am</option>
		<option value="11:00am">11:00am</option>
		<option value="11:30am">11:30am</option>
		<option value="12:00pm">12:00pm</option>
		<option value="12:30pm">12:30pm</option>
		<option value="1:00pm">1:00pm</option>
		<option value="1:30pm">1:30pm</option>
		<option value="2:00pm">2:00pm</option>
		<option value="2:30pm">2:30pm</option>
		<option value="3:00pm">3:00pm</option>
		<option value="3:30pm">3:30pm</option>
		<option value="4:00pm">4:00pm</option>
		<option value="4:30pm">4:30pm</option>
		<option value="5:00pm">5:00pm</option>
		<option value="5:30pm">5:30pm</option>
		<option value="6:00pm">6:00pm</option>
		<option value="6:30pm">6:30pm</option>
		<option value="7:00pm">7:00pm</option>
		<option value="7:30pm">7:30pm</option>
		<option value="8:00pm">8:00pm</option>
		<option value="8:30pm">8:30pm</option></select>
                                    </div>
                                </div>
								
								
								 <div class="control-group">
                                    <label class="control-label" for="inputPassword">Teacher:</label>
                                    <div class="controls">
									<select type="text" name="fname" class = "form-control" placeholder="Category" >
                                      <option>--Select--</option>
	<?php $teacher_query=mysqli_query($conn,"select * from teachers where department like '%COED%'")or die(mysqli_error());
while($teacher_row=mysqli_fetch_array($teacher_query)){
	?>
	<option><?php echo $teacher_row['fname']; ?>&nbsp;<?php echo $teacher_row['lname']; ?></option>
	<?php } ?>
	</select>
                                    </div>
                                </div>
								
								
								  <div class="control-group">
                                    <label class="control-label" for="inputPassword">Subject:</label>
                                    <div class="controls">
									<select type="text" name="subject_code" class = "form-control" placeholder="Category" >
                                       <option>--Select--</option>
<?php $subject_query=mysqli_query($conn,"select * from subject where department like '%COED%'")or die(mysqli_error());
while($subject_row=mysqli_fetch_array($subject_query)){
 ?>
 <option><?php echo $subject_row['subject_code']; ?></option>
 <?php } ?>
	</select>
                                    </div>
                                </div>
								
								  <div class="control-group">
                                    <label class="control-label" for="inputPassword">Room:</label>
                                    <div class="controls">
									<select type="text" name="room_name" class = "form-control" placeholder="Category" >
                                        <option>--Select--</option>
	<?php $room_query=mysqli_query($conn,"select * from room where department like '%COED%'")or die(mysqli_error());
while($room_row=mysqli_fetch_array($room_query)){
	?>
	<option><?php echo $room_row['room_name']; ?></option>
	<?php } ?>
	</select>
                                    </div>
                                </div>
								
								  <div class="control-group">
                                    <label class="control-label" for="inputPassword">Course:</label>
                                    <div class="controls">
									<select type="text" name="course_year_section" class = "form-control" placeholder="Category" >
                                       <option>--Select--</option>
	<?php $CYS_query=mysqli_query($conn,"select * from course where department like '%COED%'")or die(mysqli_error());
while($CYS_row=mysqli_fetch_array($CYS_query)){
	?>
	<option><?php echo $CYS_row['course']; ?>&nbsp;<?php echo $CYS_row['year_section']; ?></option>
	<?php } ?>
	</select>
                                    </div>
                                </div>
								
								  <div class="control-group">
                                    <label class="control-label" for="inputPassword">semester:</label>
                                    <div class="controls">
									<select type="text" name="semester" class = "form-control" placeholder="Category" >
                                      <option>1ST</option>
									  <option>2ND</option>
	</select>
                                    </div>
                                </div>
								
								  <div class="control-group">
                                    <label class="control-label" for="inputPassword">School Year:</label>
                                    <div class="controls">
									<select type="text" name="sy" class = "form-control" >
                                       <option>--Select--</option>
	<?php $sy_query=mysqli_query($conn,"select * from sy")or die(mysqli_error());
while($sy_row=mysqli_fetch_array($sy_query)){
	?>
	<option><?php echo $sy_row['sy']; ?></option>
	<?php } ?>
	
	</select>
                                    </div>
                                </div>
								<div class="control-group">
                                    <label class="control-label" for="inputPassword">Department:</label>
                                    <div class="controls">
									<select type="text" name="department" class = "form-control" placeholder="Category" >
                                      <option value="COED">COED</option>
	
	</select>
                                    </div>
                                </div>

                              
								<div class = "modal-footer">
											 <button name = "go" class="btn btn-primary">Save</button>
											<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                           

								</div>
							
									   </div>
                                     
                                          
                                      
                                    </div>
									
									  </form>  
									  
									   <?php include ('connect.php');
                            if (isset($_POST['go'])) {
	$Monday=$_POST['Monday'];
$Tuesday=$_POST['Tuesday'];
$Wednesday=$_POST['Wednesday'];
$Thursday=$_POST['Thursday'];
$Friday=$_POST['Friday'];
$Saturday=$_POST['Saturday'];
                               $day=$Monday." ".$Tuesday." ".$Wednesday." ".$Thursday." ".$Friday." ".$Saturday;
					$time_start= $_POST['time_start'] ;					
					$time_end=$_POST['time_end'] ;
					$fname=$_POST['fname'] ;
					$subject_code=$_POST['subject_code'] ;
					$room_name=$_POST['room_name'] ;
					$course_year_section=$_POST['course_year_section'] ;
					$semester=$_POST['semester'] ;
					$sy=$_POST['sy'] ;
					$department=$_POST['department'] ;
                                



                                mysqli_query($conn,"insert into classsched (day,time_start,time_end,fname,subject_code,room_name,course_year_section,semester,sy,department)
                            	values ('$day','$time_start','$time_end','$fname','$subject_code','$room_name','$course_year_section','$semester','$sy','$department')
                                ") or die(mysqli_error());

                                header('location:coedclass.php');
                            }
                            ?>
									  
									  
									  
									  
                                </div>
                            </div>