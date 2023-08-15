<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Contact Form</title>
  <link href="https://fonts.googleapis.com/css2?family=Inter&display=swap" rel="stylesheet">
  <style>
    body {
      font-family: "Inter";
    }

    label, input[type="submit"] {
      font-size: 16px;
      cursor: pointer;
    }

    input, textarea {
      border: 3px solid #eee;
      padding: .4em 1em;
      border-radius: 6px;
    }

    form {
      display: grid;
      grid-row-gap: 10px;
      justify-content: center;
    }

    input[type="submit"] {
      margin-top: 10px;
      background: #133EF5;
      color: #fff;
      padding: 10px 0;
      border: 0;
      border-radius: 6px;
    }

    .error_message{
			color:red;
			background-color: #ffe0e0;
			text-align:center;
    		padding: 10px;
    		margin-bottom: 10px;
	}

    .error {
      color: red;
      font-size: 14px;
      /* margin-top: 5px; */
    }

  </style>
</head>
<body>

<?php 
	if($this->session->flashdata('error_message')) {
		echo '<div class="error_message">' . $this->session->flashdata('error_message') . '</div>';
	}
?>

  <form action="" method="POST" enctype="multipart/form-data">
    <!-- <label for="email">Email Address</label>
    <input type="email" id="email" name="email"> -->
    <label for="fullName">Full Name</label> 
    <input type="text" id="fullName" name="fullName">
    <?php echo form_error('fullName', '<span class="error">', '</span>');?>

    <label for="message">Message</label>
    <textarea name="message" id="message"></textarea>
    <?php echo form_error('message', '<span class="error">', '</span>');?>

    <label for="photo">Photo</label>
    <input type="file" id="photo" name="photo">
    <?php echo form_error('photo', '<span class="error">', '</span>');?>

    <input type="submit" name="save" value="submit">
  </form>
</body>
</html>