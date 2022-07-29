<?php

if (!$_SESSION['username']) {
    header('location:../login.php');
}

?>
<!DOCTYPE html>
<html>
<head>
<meta content="text/html; charset=utf-8">
<script type="text/javascript" src="js/contact.js"></script>
</head>
<body>
<div class="container">
	<br>
	<div id="contact"><button type="button" class="btn btn-info btn" data-toggle="modal" data-target="#contact-modal">Get Quotation</button></div>
	<div id="contact-modal" class="modal fade" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<a class="close" data-dismiss="modal"><i class="fas fa-times"></i></a>
				</div>
				<form id="contactForm" name="contact" role="form" action="saveContact.php" method="POST">
					<div class="modal-body">				
						<div class="form-group">
							<label style="margin-right: 350px">Mobile Number</label>
							<input type="text" name="number" class="form-control">
						</div>
						<div class="form-group">
							<label style="margin-right: 420px">Email</label>
							<input type="email" name="email" class="form-control">
						</div>			
					</div>
					<div class="modal-footer">					
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						<input type="submit" name="submit" value="submit" class="btn btn-success" id="submit">
					</div>
				</form>
			</div>
		</div>
	</div>			
</div>	
</body>
</html>