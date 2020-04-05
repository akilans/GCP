<html>
<head><title>Welcome to my excellent blog</title></head>
<body>
<img src="https://storage.cloud.google.com/qwiklabs-gcp-00-6fc7d078b120/my-excellent-blog.png" />
<h1>Welcome to my excellent blog</h1>
<?php
 $dbserver = "35.202.99.140";
 $dbuser = "blogdbuser";
 $dbpassword = "blogdbuser";

  $conn = new mysqli($dbserver, $dbuser, $dbpassword);
 
  if (mysqli_connect_error()) {
         echo ("Database connection failed: " . mysqli_connect_error());
          } else {
                  echo ("Database connection succeeded.");
                  }
                  ?>
</body>
</html>