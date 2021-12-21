<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div id="id01" class="modal">
    <div class="card-container" >
        <div class="upper-container">
           <div class="image-container">
              <img src="Img_Assets/user-2.png" />
           </div>
        </div>
        <div class="lower-container">
           <div>
              <h3><?php echo $_SESSION['username']?></h3>
              <h4>Front-end Developer</h4>
           </div>
           <div>
              <p>sodales accumsan ligula. Aenean sed diam tristique,
                 fermentum mi nec, ornare arch.
              </p>
           </div>
           <div>
              <a href="profile.php?id=<?php  ?>" class="btn">Main Profile</a>
              <a href="logout.php" class="btn">Logout</a>
           </div>
        </div>
     </div>
</div>

<script>
        var modal = document.getElementById('id01');
// When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
</script>
</body>
</html>