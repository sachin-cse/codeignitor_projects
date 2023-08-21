<html>
<head>    
    <title> Send Email Codeigniter </title>
</head>
<body>
<?php
echo $this->session->flashdata('email_sent');
?>
<form action="<?php echo base_url('send-email'); ?>" method="post">
<input type = "email" name = "email" required />
<input type = "submit" value = "SEND MAIL" name="send_email">
</form>
</body>
</html>