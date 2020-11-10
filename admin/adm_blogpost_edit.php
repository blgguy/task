<?php
session_start();
require_once('main.class.php');
$Blog = new Engine();
$error = $succmsg = $errmsg = $ttl = $error2 = $succmsg2 = $errmsg2 = '';
//return to login if not logged in
if (!$Blog->im_logIn() ||(trim ($Blog->session()) == '')) {
  $Blog->rd('login.php');
}
$ky = $Blog->session();
$details = $Blog->admLoginDetails($ky);
foreach ($details as $key) {
    $name = $key['name'];
}
$getId = $_GET["ref"];
/**
if (isset($getId)) {
  $getId = $_GET["ref"];
}else{
  echo 'zero';
}
**/
$View  = $Blog->ViewByKey('blogpost',$getId);

foreach ($View as $key) {
  $Ptitle = $key['title'];
  $Ppost = $key['content'];
  $Pimg = '../images/'.$key['image'];
  $Pauthor = $key['author'];
  $Pdate = $key['date'];
  $Id = $key['uniqKey'];
}

if (isset($_POST['EditPostBtn'])) {
  // input variables                            = -=  +_  
  $title    = esc($_POST['title']);
  $post     = esc($_POST['content']);
  $author   = $name;
  $Edate    = date("D M Y");

  // if statement to make sure user can't submit empty data. 
  if (!empty($title) && !empty($post)){
    // statement to validate the image extentions
     $ky = rand(54357, 87654);
     $uniqKey = rand(23097, 65409).'-'.$ky;     
     // user input data array.
     $update = array($Edate, $author, $title, $post, $uniqKey);

     // statement to validate dublicate data.
     $authDublicate = $Blog->AuthDub('blogpost',$title);
      
     foreach ($authDublicate as $fetky) {
      $ttl = $fetky['title'];
     }

     if ($ttl === $title) {
       $error = 1;
       $errmsg = "Error! you haven't make any changes";
     }else{
       // statement to insert user data to database
       $posted = $Blog->BEdit($update[0], $update[1], $update[2], $update[3], $update[4], $getId);
       if ($posted) {
         $error = 0;
         $succmsg = 'Blog post Updated successfully!';
         echo "<script>
         setTimeout(function(){
            window.location.href = 'adm_blogpost_view.php';
         }, 3000);
          </script>";
       }else{
         $error = 1;
         $errmsg = 'Error! Blog not Updated!';
       }
     }
  }else{
       $error = 1;
       $errmsg = 'not leave empty field';
  }
}

// image update

if (isset($_POST['EditPicBtn'])) {
  // input variables
  $img2    = esc($_FILES['image']['name']);
  $imgTemp2 = esc($_FILES['image']['tmp_name']);
  
  // if statement to make sure user can't submit empty data. 
    if (!empty($img2) && !empty($imgTemp2)){
        // statement to validate the image extentions
        $ext2 = pathinfo($img2, PATHINFO_EXTENSION );
        if( $ext2!='jpg' && $ext2!='png' && $ext2!='jpeg' && $ext2!='gif' ) {
            $error2 = 1;
            $errmsg = 'You cannot upload <b style="color:red;">'.$ext2.'</b> file';
        //echo "<script>location.href='#recentpage'</script>";
        }else{
            $ky2 = rand(65748, 78965);
            $uniqKey2 = rand(23097, 65409).'-'.$ky2;
            $imgsnm = 'BlogPostImg-'.$uniqKey2.'.'.$ext2;
            // statement to insert user data to database
            $posted2 = $Blog->EditPic('blogpost', $imgsnm, $getId, $getId);
            if ($posted2) {
                move_uploaded_file( $imgTemp2, '../images/'.$imgsnm );
                $error2 = 0;
                $succmsg = 'Image Updated successfully!';
            }else{
                $error2 = 1;
                $errmsg = 'Error! Image not Updated!';
            }
        }
    }else{
        $error2 = 1;
        $errmsg = "you haven't make any changes for Image";
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
    <!--link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous"-->
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css"">
    
    <title>Edit Blog Post</title>
  </head>
  <body>
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-8">
        <h1>Edit Blog</h1>
        <a class="btn btn-success" href="dashboard.php" role="button">Go to Dashboard</a>
        <a class="btn btn-success" href="adm_blogpost_view.php" role="button">View Blog</a>
        <?php if($error === 0 || $error2 === 0){?>
        <div class="alert alert-success" role="alert">
          <?php echo $succmsg; ?>
        </div>
        <?php }?>
        <?php if($error === 1 || $error2 === 1){?>
        <div class="alert alert-danger" role="alert">
          <?php echo $errmsg; ?>
        </div>
        <?php }?>
        <div class="card text-center">
          <div class="card-header">
              <ul class="nav nav-tabs card-header-tabs">
                  <li class="nav-item">
                  <a class="nav-link active" href="#">Details</a>
                  </li>
                  <li class="nav-item">
                  <a class="nav-link" data-toggle="modal" data-target="#staticBackdrop" href="#">Image Update</a>
                  </li>
              </ul>
          </div>
          <div class="card-body">
            <form action="" method="post" enctype="multipart/form-data">

              <div class="form-group">
                  <label for="exampleFormControlInput1">Post Title</label>
                  <input type="text" value="<?php echo $Ptitle; ?>" name="title" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
              </div>

              <div class="form-group">
                  <label for="exampleFormControlTextarea1">Blog Post</label>
                  <textarea class="form-control" name="content" id="exampleFormControlTextarea1" rows="3"><?php echo $Ppost; ?></textarea>
              </div>

              <button type="submit" name="EditPostBtn" class="btn btn-primary btn-lg btn-block">Update BlogPost</button>
            </form>
          </div>
          <!-- Modal -->
          <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
              <div class="modal-dialog">
              <div class="modal-content">
                  <div class="modal-header">
                      <h5 class="modal-title" id="staticBackdropLabel">Image Update</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                      </button>
                  </div>
                  <div class="modal-body">
                      <form action="" method="post" enctype="multipart/form-data">
                        <div class="input-group mb-3">
                          <div class="custom-file">
                            <input type="file" name="image" class="custom-file-input" id="inputGroupFile02">
                            <label class="custom-file-label" for="inputGroupFile02" aria-describedby="inputGroupFileAddon02">Choose file</label>
                          </div>
                        </div>
                        <button type="submit" name="EditPicBtn" class="btn btn-primary btn-lg btn-block">Update</button>
                      </form>
                  </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- End Model -->
    </div>
  </div>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script type="text/javascript" src="../js/jquery-3.2.1.min.js"></script>
    <!--script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script-->
    <!--script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script-->
    <script type="text/javascript" src="../js/bootstrap.bundle.min.js"></script>
    <!-- Option 2: jQuery, Popper.js, and Bootstrap JS
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    -->
  </body>
</html>