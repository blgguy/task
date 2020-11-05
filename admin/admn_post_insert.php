<?php
session_start();
require_once('main.class.php');
$blogPost = new Engine();
$error = $succmsg = $errmsg = $ttl = $cont ='';
//return to login if not logged in
if (!$blogPost->im_logIn() ||(trim ($blogPost->session()) == '')) {
	$blogPost->rd('login.php');
}

$ky = $_SESSION['authbjgvjhv78547545gff3426587xgxgfbn'];
$details = $blogPost->admLoginDetails($ky);
foreach ($details as $key) {
    $name = $key['name'];
}

if (isset($_POST['addPostBtn'])) {
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
    $postData = array(
      'date'      => date("D M Y"), //date("H:m a"),
      'author'    => $name,
      'title'     => $title,
      'content'   => $post,
      'image'     => $final_name,
      'uniqKey'   => $uniqKey
    );

    // statement to validate dublicate data.
    $authDublicate = $blogPost->AuthDubPost($title);
    
    foreach ($authDublicate as $fetky) {
      $ttl = $fetky['title'];
      $cont = $fetky['content'];
    }
    
    if ($cont === $post) {
        $error = 1;
        $errmsg = "Error! you can't dublicate post!";
      }else{
        // statement to insert user data to database
        $posted = $blogPost->BInsert('blogpost', $postData);
        if ($posted) {
          move_uploaded_file( $imgTemp, '../images/'.$final_name );
          $error = 0;
          $succmsg = 'Blog post added successfully!';
        }else{
          $error = 1;
          $errmsg = 'Error! Blog not posted!';
        }
      }
    }
  }else{
    $error = 1;
    $errmsg = 'not leave empty field';
  }
//**/
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

    <title>Add Blog Post</title>
  </head>
  <body>
  <div class="container-fluid">
    <h1>Blog Post Add</h1>
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
        <input type="text" name="title" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
    </div>

    <div class="input-group mb-3">
      <div class="custom-file">
        <input type="file" name="image" class="custom-file-input" id="inputGroupFile02">
        <label class="custom-file-label" for="inputGroupFile02" aria-describedby="inputGroupFileAddon02">Choose file</label>
      </div>
    </div>
    <div class="form-group">
        <label for="exampleFormControlTextarea1">Blog Post</label>
        <textarea class="form-control" name="content" id="exampleFormControlTextarea1" rows="3"></textarea>
    </div>
    <button type="submit" name="addPostBtn" class="btn btn-primary btn-lg btn-block">Add Post</button>
  
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