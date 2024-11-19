<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                          
                                            <div class="alert alert-info"><strong><center>Add Course </center></strong></div>
                                        </div>
                                        <div class="modal-body">
                              <form  method="post" enctype="multipart/form-data">
                                
                                <hr>
								
								 <div class="control-group">
                                           <label class="control-label" for="inputEmail">Course:</label>
                                           <input type="text" name="course" class = "form-control" >
                                          
                                 </div>
                               
                                <div class="control-group">
                                    <label class="control-label" for="inputPassword">Year/Section:</label>
                                    <div class="controls">
                                        <input type="text" class = "form-control"  name="year_section" >
                                    </div>
                                </div>
                               
                                <div class="control-group">
                                    <label class="control-label" for="inputPassword">Department:</label>
                                    <div class="controls">
                                        <input type="text" name="department" class = "form-control">
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

                                $course = $_POST['course'];
                                $year_section = $_POST['year_section'];
                                $department = $_POST['department'];
                                



                                mysqli_query($conn,"insert into course (course,year_section,department)
                            	values ('$course','$year_section','$department')
                                ") or die(mysqli_error());

                                header('location:forCYS.php');
                            }
                            ?>
									  
									  
									  
									  
                                </div>
                            </div>