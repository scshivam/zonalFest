<?php
	@session_start();
	if(!isset($_SESSION['Login3'])){
		
	?>
	<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
		<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="index.php"><img src="images/Tech_Fest_Logo.png" style="height:400%"></a>
			</div>
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav navbar-right">
					
					<li>
						<a href="index.php#Events"  >Events</a>
					</li>
					<li>
						<a href="rules.php"  >Rules</a>
					</li>
					<li>
						<a href="committee.php"  >Committee</a>
					</li>
					<li>
						<a href="contact.php"  >Contact</a>
					</li>
					<li>
						<a href="#"  data-toggle="modal" data-target="#loginPanel">Login</a>
					</li>
					<li>
						<a href="#" data-toggle="modal" data-target="#registerPanel">College Registration</a>
					</li>
				</ul>
			</div>
		</div>
	</nav>
	<div id="loginPanel" class="modal fade" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Enter Login Details</h4>
				</div>
				<div class="modal-body">
					
                    <div class="row">
                        <div class="form-group">
                            <label class="control-label col-md-4 col-sm-4" align="right">Email Id</label>
							<div class="col-md-8 col-sm-8">
								<input type="text" id="loginId" class="form-control">
							</div>
						</div>
					</div>
                    <div class="row">
                        <div class="form-group">
                            <label class="control-label col-md-4 col-sm-4" align="right">Password</label>
                            <div class="col-md-8 col-sm-8">
                                <input type="password" id="loginPass" class="form-control">
							</div>
						</div>
					</div>
					<div class="row">
						<p class="text text-danger col-md-8 col-sm-8" align="right" id="loginResult"></p>
					</div>
				</div>
				<div class="modal-footer">
					
					<button type="button" id="loginSubmit" class="btn btn-success">Login</button>
				</div>
			</div>
			
		</div>
	</div>
	<div id="registerPanel" class="modal fade" role="dialog">
		<div class="modal-dialog">
			
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">College Registration <font color="red">(Not For Students)</font></h4>
				</div>
				<div class="modal-body">
                    <div class="row">
                        <div class="form-group">
                            <label class="control-label col-md-4 col-sm-4" align="right">College Name</label>
                            <div class="col-md-8 col-sm-8">
                                <select class="form-control" name="collegeName" id="collegeName" Required>
                                <option value=''>Choose One</option>
                                    <?php
										$collegeQuery="SELECT CollegeId,CollegeName FROM uptu_college ORDER BY CollegeName ASC";
										$collegeResult=mysqli_query($connect,$collegeQuery);
										while($collegeRow=mysqli_fetch_assoc($collegeResult)){
											echo '<option value="'.$collegeRow['CollegeId'].'">'.$collegeRow['CollegeName'].'</option>';
										} ?>
								</select>
							</div>
						</div>
					</div>
                    <div class="row">
                        <div class="form-group">
                            <label class="control-label col-md-4 col-sm-4" align="right">College Official Email
                                <a href="#" class="glyphicon glyphicon-question-sign" data-toggle="tooltip" title="This Email Id will be used for login and sending results and other information."></a>
							</label>
                            <div class="col-md-8 col-sm-8">
                                <input type="text" id="emailId" name="emailId" class="form-control">
							</div>
						</div>
					</div>
                    <div class="row">
                        <div class="form-group">
                            <label class="control-label col-md-4 col-sm-4" align="right">Mobile No</label>
                            <div class="col-md-8 col-sm-8">
                                <input type="text" name="mobileNo" id="mobileNo" class="form-control">
							</div>
						</div>
					</div>
                    <div class="row">
                        <div class="form-group">
                            <label class="control-label col-md-4 col-sm-4" align="right">College Website</label>
                            <div class="col-md-8 col-sm-8">
                                <input type="text" name="website" id="website" class="form-control" required>
							</div>
						</div>
					</div>
                    <div class="row">
                        <div class="form-group">
                            <label class="control-label col-md-4 col-sm-4" align="right">College Address</label>
                            <div class="col-md-8 col-sm-8">
                                <textarea name="collegeAddress" id="collegeAddress" class="form-control" required></textarea>
							</div>
						</div>
					</div>
                    <div class="row">
                        <div class="form-group">
                            <label class="control-label col-md-4 col-sm-4" align="right">College City</label>
                            <div class="col-md-8 col-sm-8">
                                <input type="text" name="collegeCity" id="collegeCity" class="form-control" required>
							</div>
						</div>
					</div>
                    <div class="col-md-12">
						<div class="alert alert-info">
							<p>An SMS will be sent to the above Mobile Number with login details. </p>
						</div>
					</div>
					<div class="row">
						<p class="text text-danger col-md-12 col-sm-12" align="center" id="registrationResult"></p>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
					<button type="button" class="btn btn-success" id="registrationSubmit">Register</button>
				</div>
			</div>
			
		</div>
	</div>
	<?php
		}elseif($_SESSION['Login3']=='USER'){
	?>
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
				</button>
                <a class="navbar-brand" href="index.php"><img src="images/Tech_Fest_Logo.png" style="height:400%"></a>
			</div>
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
					
                    <li>
                        <a href="index.php#Events"  >Events</a>
					</li>
                    <li>
                        <a href="rules.php"  >Rules</a>
					</li>
                    <li>
                        <a href="committee.php"  >Committee</a>
					</li>
                    <li>
                        <a href="contact.php"  >Contact</a>
					</li>
                    <li>
                        <a href="eventReg.php"  >Event Registration</a>
					</li>
                    <li>
                        <a href="logOut.php" >Logout</a>
					</li>
					
				</ul>
			</div>
            <!-- /.navbar-collapse -->
		</div>
        <!-- /.container -->
	</nav>
	<?php
	}
?>