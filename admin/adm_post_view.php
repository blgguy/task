<?php
//start session
session_start();
// include class file.
require_once('main.class.php');
// call the class obj
$blogPost = new Engine();
//redirect if logged in
if (!$blogPost->im_logIn() || (trim ($blogPost->session()) == '')) {
	$blogPost->rd('logout.php');
}
$error = $succmsg = $errmsg = '';

$postVw = $blogPost->BView('blogpost');
foreach ($postVw as $key) {
    $Ptitle = $key['title'];
    $Ppost = $key['content'];
    $Ppost = substr($Ppost, 0, 120).'...';
    $Pimg = '../images/'.$key['image'];
    $Pauthor = $key['author'];
    $Pdate = $key['date'];
    $Id = $key['uniqKey'];
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <title>Blog Post</title>
  </head>
  <body>
  <div class="container-fluid">
    <h1>Blog Post</h1>
    <div class="col-md-4">
    <?php if($error === 0){?>
    <div class="alert alert-success" role="alert">
      <?php echo $succmsg; ?>
    </div>
    <?php }?>
    <?php if($error === 1){?>
    <div class="alert alert-danger" role="alert">
      <?php echo $errmsg; ?>
    </div>
    <?php }?>
    <div>
    <h2><?php echo $Ptitle;?></h2>
    <h2><?php echo $Pauthor;?></h2>
    <p><?php echo $Ppost;?></p>
    <h4><?php echo $Pdate;?></h4>
    <p><img src="<?php echo $Pimg;?>" alt="<?php echo $Ptitle;?>" title="<?php echo $Ptitle;?>" sizes="" srcset=""> </p>
    <!--a href="admn_post_edit.php?ref=<?php //echo $Id;?>"><button type="button">Edit</button></a-->
    <a href="adm_ps_edit.php?ref=<?php echo $Id;?>"><button type="button">Edit</button></a>
    <a href="adm_post_del.php?ref=<?php echo $Id;?>"><button type="button">Delete</button></a>
    </div>
    <?php }?>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

    <!-- Option 2: jQuery, Popper.js, and Bootstrap JS
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    -->
  </body>
</html>