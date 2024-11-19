<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                          
                                            <div class="alert alert-info"><strong><center>Add Teacher </center></strong></div>
                                        </div>
                                        <div class="modal-body">
                              <form  method="post" enctype="multipart/form-data">
                                
                                <hr>
								
								 <div class="control-group">
                                           <label class="control-label" for="inputEmail">First Name:</label>
                                           <input type="text" name="fname" class = "form-control" placeholder="Name">
                                          
                                 </div>
                               
                                <div class="control-group">
                                    <label class="control-label" for="inputPassword">Last Name:</label>
                                    <div class="controls">
                                        <input type="text" class = "form-control"  name="lname"  placeholder="Description" >
                                    </div>
                                </div>
                               
                                <div class="control-group">
                                    <label class="control-label" for="inputPassword">Academic Rank:</label>
                                    <div class="controls">
                                        <input type="text" name="arank" class = "form-control" placeholder="Origin">
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label" for="inputPassword">Status:</label>
                                    <div class="controls">
                                        <input type="text" name="designation"  class = "form-control" placeholder="Price" >
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

                              $fname=$_POST['fname'] ;
					$lname= $_POST['lname'] ;					
					$arank=$_POST['arank'] ;
					$designation=$_POST['designation'] ;
						$department=$_POST['department'];

                                mysqli_query($conn,"insert into teachers (teachid,fname,lname,arank,designation,department)
                            	values ('','$fname','$lname','$arank','$designation','$department')
                                ") or die(mysqli_error());

                                header('location:teacher2.php');
                            }
                            ?>
									  
									  
									  
									  
                                </div>
                            </div>