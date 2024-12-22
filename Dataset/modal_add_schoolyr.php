<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                          
                                            <div class="alert alert-info"><strong><center>Add School Year </center></strong></div>
                                        </div>
                                        <div class="modal-body">
                              <form  method="post" enctype="multipart/form-data">
                                
                                <hr>
								
								 <div class="control-group">
                                           <label class="control-label" for="inputEmail">School Year:</label>
                                           <input type="text" name="sy" class = "form-control" >
                                          
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

                                $sy = $_POST['sy'];
                                



                                mysqli_query($conn,"insert into sy (sy)
                            	values ('$sy')
                                ") or die(mysqli_error());

                                header('location:schoolyr.php');
                            }
                            ?>
									  
									  
									  
									  
                                </div>
                            </div>