<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                          
                                            <div class="alert alert-info"><strong><center>Add Subject </center></strong></div>
                                        </div>
                                        <div class="modal-body">
                              <form  method="post" enctype="multipart/form-data">
                                
                                <hr>
								
								 <div class="control-group">
                                           <label class="control-label" for="inputEmail">Subject:</label>
                                           <input type="text" name="subject_code" class = "form-control" placeholder="Name">
                                          
                                 </div>
                               
                                <div class="control-group">
                                    <label class="control-label" for="inputPassword">Title:</label>
                                    <div class="controls">
                                        <input type="text" class = "form-control"  name="subject_title"  placeholder="Description" >
                                    </div>
                                </div>
                               
                                <div class="control-group">
                                    <label class="control-label" for="inputPassword">Category:</label>
                                    <div class="controls">
                                        <input type="text" name="subject_category" class = "form-control" placeholder="">
                                    </div>
                                </div>
								  <div class="control-group">
                                    <label class="control-label" for="inputPassword">Semester:</label>
                                    <div class="controls">
                                        <input type="text" name="semester" class = "form-control" placeholder="">
                                    </div>
                                </div>
								 <div class="control-group">
                                    <label class="control-label" for="inputPassword">Department:</label>
                                    <div class="controls">
                                        <input type="text" name="department" class = "form-control" placeholder="">
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

                                $subject = $_POST['subject_code'];
                                $subject_title = $_POST['subject_title'];
                                $subject_category = $_POST['subject_category'];
								$semester = $_POST['semester'];
								$department = $_POST['department'];
                                


                                
                                mysqli_query($conn,"insert into subject (subject_code,subject_title,subject_category,semester,department)
                            	values ('$subject','$subject_title','$subject_category','$semester','$department')
                                ") or die(mysqli_error());

                                header('location:forsubject.php');
                            }
                            ?>
									  
									  
									  
									  
                                </div>
                            </div>