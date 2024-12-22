<div class="modal fade" id="arch" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                          
                                            <div class="alert alert-info"><strong><center>Search </center></strong></div>
                                        </div>
                                        <div class="modal-body">
										 <?php include('connect.php') ?>
                              <form id="save_voter" class="form-horizontal" method="POST" action="archive1.php">	
                                
                                <hr>

								
								
                               <div class="control-group">
    <label class="control-label" for="input01">School Year:</label>
    <div class="controls">
   <select name="sy" class="span333">
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
    <label class="control-label" for="input01">Semester:</label>
    <div class="controls">
   <select name="semester" class="span333">
	<option>--Select--</option>
	<option selected>1ST</option>
	<option>2ND</option>
	</select>
    </div>
    </div>
	
	
	
                              
								<div class = "modal-footer">
											 <button name = "save" class="btn btn-primary">Save</button>
											<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                           

								</div>
							
									   </div>
                                     
                                          
                                      
                                    </div>
									
									  </form>  
									  
									
									  
									  
									  
                                </div>
                            </div>