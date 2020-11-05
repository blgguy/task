<?php
session_start();
require_once('main.class.php');
$blogPost = new Engine();
$error = $succmsg = $errmsg = '';
//return to login if not logged in
if (!$blogPost->im_logIn() ||(trim ($blogPost->session()) == '')) {
	$blogPost->rd('login.php');
}
$ky = $_SESSION['authbjgvjhv78547545gff3426587xgxgfbn'];
$details = $blogPost->admLoginDetails($ky);
foreach ($details as $key) {
    $name = $key['name'];
}
$getId = $_GET["ref"];
$View  = $blogPost->ViewByKey('blogpost',$getId);

foreach ($View as $key) {
    $Ptitle = $key['title'];
    $Ppost = $key['content'];
    $Pimg = '../kundi/'.$key['image'];
    $Pauthor = $key['author'];
    $Pdate = $key['date'];
    $Id = $key['uniqKey'];
}

if (isset($_POST['EditPostBtn'])) {
  // input variables
  $title  = esc($_POST['title']);
  $post   = esc($_POST['content']);
  $img    = esc($_FILES['image']['name']);
  $imgTemp = esc($_FILES['image']['tmp_name']);
  
  // if statement to make sure user can't submit empty data. 
  if (!empty($title) && !empty($post) && !empty($img) && !empty($imgTemp)){
   
     // statement to validate the image extentions
     $ext = pathinfo($img, PATHINFO_EXTENSION );
     if( $ext!='jpg' && $ext!='png' && $ext!='jpeg' && $ext!='gif' ) {
         $error = 1;
         $errmsg = 'You cannot upload <b style="color:red;">'.$ext.'</b> file';
       //echo "<script>location.href='#recentpage'</script>";
     }else{
      $ky = sha1('ghdhryhg134689piyesb ');
      $uniqKey = rand(23097, 65409).'-'.$ky;
      $final_name = 'BlogPostImg-'.$uniqKey.'.'.$ext;
      
      // user input data array.
      $date = date("D M Y");
      $author = $name;
      $uniqKey = rand(23097, 65409).'-'.$title;
      $update = array($date, $author, $title, $post, $final_name, $uniqKey);

      // statement to validate dublicate data.
      $authDublicate = $blogPost->AuthDub('blogpost',$title);
      
      if ($authDublicate === $title) {
        $error = 1;
        $errmsg = "Error! you haven't make any changes";
      }else{
        // statement to insert user data to database
        $posted = $blogPost->BEdit($update[0], $update[1], $update[2], $update[3], $update[4], $update[5], $getId);
        if ($posted) {
          move_uploaded_file( $imgTemp, '../images/'.$final_name );
          $error = 0;
          $succmsg = 'Blog post Updated successfully!';
        }else{
          $error = 1;
          $errmsg = 'Error! Blog not Updated!';
        }
      }
    }
    }else{
        $error = 1;
        $errmsg = 'not leave empty field';
    }
}
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <title>Edit Blog Post</title>
  </head>
  <body>
  <div class="container-fluid">
    <h1>Edit Blog Post</h1>
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
    <form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="exampleFormControlInput1">Post Title</label>
        <input type="text" value="<?php echo $Ptitle; ?>" name="title" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
    </div>

    <div class="input-group mb-3">
      <div class="custom-file">
        <input type="file" name="image" class="custom-file-input" id="inputGroupFile02">
        <label class="custom-file-label" for="inputGroupFile02" aria-describedby="inputGroupFileAddon02">Choose file</label>
      </div>
    </div>

    <div class="form-group">
        <label for="exampleFormControlTextarea1">Blog Post</label>
        <textarea class="form-control" name="content" id="exampleFormControlTextarea1" rows="3"><?php echo $Ppost; ?></textarea>
    </div>
    <button type="submit" name="EditPostBtn" class="btn btn-primary btn-lg btn-block">Update</button>
</form>
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
<?php

if (isset($_POST['EditPicPostBtn'])) {
  // input variables
  $img    = esc($_FILES['image']['name']);
  $imgTemp = esc($_FILES['image']['tmp_name']);
  // if statement to make sure user can't submit empty data. 
  if (empty($img) && !empty($imgTemp)){
     // statement to validate the image extentions
    $ext = pathinfo($img, PATHINFO_EXTENSION );
    if( $ext!='jpg' && $ext!='png' && $ext!='jpeg' && $ext!='gif' ) {
         $error = 1;
         $errmsg = 'You cannot upload <b style="color:red;">'.$ext.'</b> file';
       //echo "<script>location.href='#recentpage'</script>";
    }else{
      $ky = sha1('ghdhryhg134689piyesb ');
      $uniqKey = rand(23097, 65409).'-'.$ky;
      $final_name = 'BlogPostImg-'.$uniqKey.'.'.$ext;

      // statement to insert user data to database
      $update = array($final_name, $uniqKey);
      $posted = $blogPost->IPic($update[0], $update[1], $getId);
      if ($posted) {
        move_uploaded_file( $imgTemp, '../images/'.$final_name );
        $error = 0;
        $succmsg = 'Image Updated successfully!';
      }else{
        $error = 1;
        $errmsg = 'Error! Image not Updated!';
      }
    }
  }else{
    $error = 1;
    $errmsg = 'not leave empty field';
  }
}
?>