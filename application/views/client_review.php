<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
.container {
  border: 2px solid #ccc;
  background-color: #eee;
  border-radius: 5px;
  padding: 16px;
  margin: 16px 0
}

.container::after {
  content: "";
  clear: both;
  display: table;
}

.container img {
  float: left;
  margin-right: 20px;
  border-radius: 50%;
}

.container span {
  font-size: 20px;
  margin-right: 15px;
}

.success_message{
			color:green;
			background-color: #e0ffe0;
			text-align:center;
    		padding: 10px;
    		margin-bottom: 10px;
		}

@media (max-width: 500px) {
  .container {
      text-align: center;
  }
  .container img {
      margin: auto;
      float: none;
      display: block;
  }
}
</style>
</head>
<body>

<h2>Responsive Testimonials</h2>
<p>Resize the browser window to see the effect.</p>

<?php
if($this->session->flashdata('success_message')){
  echo '<div class="success_message">' . $this->session->flashdata('success_message') . '</div>';
}
?>

  <?php
  foreach($content as $row){
    ?>
  <div class="container">
    <img src="<?php echo $row['image']; ?>" alt="Avatar" style="width:90px">
    <p><span><?php echo $row['name']; ?></span></p>
     <p><?php echo $row['client-review']; ?></p>
  </div>
    <?php
  }
   ?>


<!-- <div class="container">
  <img src="/w3images/avatar_g2.jpg" alt="Avatar" style="width:90px">
  <p><span>Rebecca Flex.</span> CEO at Company.</p>
  <p>No one is better than John Doe.</p>
</div> -->

</body>
</html>
