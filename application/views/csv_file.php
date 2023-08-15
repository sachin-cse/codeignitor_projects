<!DOCTYPE html>
<html>

<head>
	<title>File upload</title>

	<!--CSS code-->
	<style>
		h1 {
			color: green;
		}

		h2,
		{
			font-family: Impact;
		}

		body {
			text-align: center;
		}

		.success_message{
			color:green;
			background-color: #e0ffe0;
			text-align:center;
    		padding: 10px;
    		margin-bottom: 10px;
		}
		.error_message{
			color:red;
			background-color: #ffe0e0;
			text-align:center;
    		padding: 10px;
    		margin-bottom: 10px;
		}
	</style>
</head>

<body>
	<?php 
	if($this->session->flashdata('success_message')){
		echo '<div class="success_message">' . $this->session->flashdata('success_message') . '</div>';
	} else if($this->session->flashdata('error_message')) {
		echo '<div class="error_message">' . $this->session->flashdata('error_message') . '</div>';
	}
	?>
<form action="<?php echo base_url().'file-uploaded'; ?>" method="post" enctype="multipart/form-data">
	<h2>File data upload in database system</h2>
	
	<label> Choose the File to upload: </label>
	<input type="file" id="myFile" name="csv_file" required/> <br /><br />
	
	<input type="submit" value="submit" />
</form>


</body>

</html>
