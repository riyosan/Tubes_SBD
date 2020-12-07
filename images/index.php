<?php
// Include and initialize DB class
require_once 'DB.class.php';
$db = new DB();

// Fetch the images data
$condition = array('where' => array('status' => 1));
$images = $db->getRows('images', $condition);
?>
<!DOCTYPE html>
<html lang="en-US">
<head>
<title>Image Gallery Management by Codexworld</title>
<meta charset = "utf-8">
<!-- Fancybox css library -->
<link rel = "stylesheet" type="text/css" href="fancybox/jquery.fancybox.css">

<!-- Stylesheet file --> 
<link rel="stylesheet" type="text/css" href="css/style.css">

<!-- jouery library -->
<script src="js/jquery.min.js"></script> 

<!-- Fancybox JS library -->
<script src="fancybox/jquery.fancybox.js"></script>

<!-- Initialize fancybox -->
<script>
$("[data-fancybox]").fancybox();
</script>

</head>
<body>
<div class="container">
    <h1>Dynamic Images Gallery</h1>
    <hr>
    <div class="head">
        <a href="manage.php" class="glink">Manage</a>
        </div>
<div class="gallery">
    <?php
    if(!empty($images)){
        foreach($images as $row){
            $uploadDir = 'uploads/images/';
            $imageURL = $uploadDir.$row["file_name"];
    ?>
    <div class="col-lg-3">
        <a href="<?php echo $imageURL; ?>" data-fancybox="gallery" data-caption="<?php echo $row["title"]; ?>" >
            <img src="<?php echo $imageURL; ?>" alt="" />
            <p><?php echo $row["title"]; ?></p>
        </a>
    </div>
    <?php }
    } ?>
</div>
</div>
</body>
</html>