

<!DOCTYPE html>
<link href="img/chmsc1.png" rel="icon" type="image"> 
<head><style>
body{
background:-webkit-linear-gradient(right, skyblue,white);
}
a{
text-decoration:none;
font-size:20px;
}
a:hover{
background-color:black;
color:white;
}
#frm{
width:1350px;
background-color:white;
height:25px;

}

#frmm{

}
#myBtn{
margin-top:50px;
height:60px;
width:150px;

background-image:url("img/newb.png");

}
/* The Modal (background) */
.modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    padding-top: 100px; /* Location of the box */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content */
.modal-content {
    position: relative;
    background-color: #fefefe;
    margin: auto;
    padding: 0;
    border: 1px solid #888;
    width: 30%;
    box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19);
    -webkit-animation-name: animatetop;
    -webkit-animation-duration: 0.4s;
    animation-name: animatetop;
    animation-duration: 0.4s
}

/* Add Animation */
@-webkit-keyframes animatetop {
    from {top:-300px; opacity:0} 
    to {top:0; opacity:1}
}

@keyframes animatetop {
    from {top:-300px; opacity:0}
    to {top:0; opacity:1}
}

/* The Close Button */
.close {
    color: white;
    float: right;
    font-size: 28px;
    font-weight: bold;
}

.close:hover,
.close:focus {
    color: #000;
    text-decoration: none;
    cursor: pointer;
}

.modal-header {
    padding: 2px 16px;
    background:-webkit-linear-gradient(right, skyblue,white);
    color: black;
}

.modal-body {padding: 2px 16px;}

.modal-footer {
    padding: 2px 16px;
    background:-webkit-linear-gradient(right, skyblue,white);
    color: black;
}

#mission p {
margin-left:20px;
text-align:justify;
}
#vision p {
margin-left:20px;
text-align:justify;
}
#mission{
float:left;
margin-top:20px;
position:inherit;
display:inline-block;
width:48%;
height:200px;
background-color:skyblue;
border:1px solid;
}
#vision{
float:right;
margin-top:20px;
width:48%;
height:200px;
position:inherit;
display: inline-block;
background-color:skyblue;
border:1px solid;
}
footer {
margin-top:300px;
}
</style></head>

<body>


<img src="img/a2.jpg" alt="Slideshow Image Script" title="Slideshow Image Script" name="slide" border=0 width=1350 height=200>


<center>
<center><button id="myBtn"></button></center>

<!-- The Modal -->
<div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <div class="modal-header">
      <span class="close">&times;</span>
      <h2>LOG-IN</h2>
	  <a href="index3.php">ADMIN/</a>
	  <a href="index.php">CIT/</a>
	  <a href="index1.php">COED/</a>
	  <a href="index2.php">CAS</a>
    </div>
    <div class="modal-body">
	<form action="#" method="POST" style="background-color:white;">
     <center>

		
		<Select name="username" style="margin-bottom:10px;">
		<option>Select User</option>
		<option value="CIT">CIT</option>
	
	</select>
<br/>
<input type="password" name="password" placeholder="Password" /><br />

<input type="submit" name="go" value="Log In">

</center>
<?php
							include('connect.php');
							
							if(isset($_POST['go']))
							{
							
							$username=$_POST['username'];
							$password=$_POST['password'];
							
								
								$result = mysqli_query($conn,"SELECT * FROM users WHERE department like '%CIT%' and  password = '$password'") or die(mysqli_error());
								$row = mysqli_fetch_array($result);
								$numberOfRows = mysqli_num_rows($result);	
						
																	
																
																if ($numberOfRows == 0) 
																	{
																		echo " <br><center><font color= 'red' size='3'>Please fill up the fields correctly</center></font>";
																	} 
																else if ($numberOfRows > 0)
																	{
																	session_start();
																	$_SESSION['id'] = $row['userid'];
																header("location:home.php");
																
															}
							}
							?>
</form>


    </div>
    <div class="modal-footer">
      <h3>CHMSC Time Tabling System</h3>
    </div>
  </div>

</div>

<script>
// Get the modal
var modal = document.getElementById('myModal');

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
btn.onclick = function() {
    modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
    modal.style.display = "none";
}


</script>


</center>

<div id="con">
<div id="mission">
<center><h1>Mission</h1></center>
A leading green institution in higher and continuing education committed to engage in quality instruction, development-oriented research, sustainable lucrative economic enterprise, and responsive extension and training services through relevant academic programs to empower a human resource that responds effectively to challenges in life and act as catalyst in the holistic development of a humane society.
</div>

<div id="vision">
<center><h1>Vision</h1></center>
<br><b>CHMSC EXCELS:</b></br>
Excellence, Competence, and Educational Leadership in Science and Technology. 

</div>

</div>
</body>

<footer style="background:-webkit-linear-gradient(skyblue,blue);color:black;height:40px;"> <p><center>Copyright &copy; Carlos Hilado Memorial State College All rights reserved.</footer>
</html>

