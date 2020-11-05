<?php
session_start();
require_once('main.class.php');
$Event = new Engine();
$error = $succmsg = $errmsg = $error2 = $succmsg2 = $errmsg2 = '';
//return to login if not logged in
if (!$Event->im_logIn() ||(trim ($Event->session()) == '')) {
	$Event->rd('login.php');
}
$ky = $_SESSION['authbjgvjhv78547545gff3426587xgxgfbn'];
$details = $Event->admLoginDetails($ky);
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
$View  = $Event->ViewByKey('event',$getId);

foreach ($View as $key) {
  $Edate = $key['date'];
  $eVenue = $key['venue'];
  $startTime = $key['sttime'];
  $endTime = $key['endtime'];
  $eTitle = $key['title'];
  $ePost = $key['description'];
  $ePost = substr($ePost, 0, 120).'...';
  $Pimg = '../images/'.$key['image'];
  $PimgF = $key['image'];
  $Pauthor = $key['author'];
  $Pdate = $key['date'];
  $Id = $key['uniqKey'];
}

if (isset($_POST['EditEventBtn'])) {
  // input variables                            = -=  +_  
  $date       = esc($_POST['Edate']);
  $starTtime  = esc($_POST['stime']);
  $endTime    = esc($_POST['etime']);
  $title      = esc($_POST['Etitle']);
  $post       = esc($_POST['content']);
  $author     = $name;
  $venue      = esc($_POST['venue']);

  // if statement to make sure user can't submit empty data. 
  if (!empty($date) && !empty($title) && !empty($post) && !empty($starTtime) && !empty($starTtime) && !empty($venue)){
    // statement to validate the image extentions
     $ky = rand(54357, 87654);
     $uniqKey = rand(23097, 65409).'-'.$ky;     
     // user input data array.
     $uniqKey = rand(23097, 65409).'-'.$title;
     $update = array($date, $starTtime, $endTime, $title, $post, $author, $venue, $uniqKey);

     // statement to validate dublicate data.
     $authDublicate = $Event->AuthDub('event',$title);
      
     foreach ($authDublicate as $fetky) {
      $ttl = $fetky['title'];
      $cont = $fetky['description'];
     }

     if ($cont === $post) {
       $error = 1;
       $errmsg = "Error! you haven't make any changes";
     }else{
       // statement to insert user data to database
       $posted = $Event->EvntEdit($update[0], $update[1], $update[2], $update[3], $update[4], $update[5], $update[6], $update[7], $getId);
       if ($posted) {
         $error = 0;
         $succmsg = 'Event post Updated successfully!';
         echo "<script>
         setTimeout(function(){
            window.location.href = 'https://www.tutorialspoint.com/javascript/';
         }, 5000);
          </script>";
       }else{
         $error = 1;
         $errmsg = 'Error! Event not Updated!';
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
  $img2    = esc($_FILES['imagee']['name']);
  $imgTemp2 = esc($_FILES['imagee']['tmp_name']);
  
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
            $imgsnm = 'EventImg-'.$uniqKey2.'.'.$ext2;
            // statement to insert user data to database
            $posted2 = $Event->EditPic('event', $imgsnm, $getId, $getId);
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <title>Edit Event Post</title>
  </head>
  <body>
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-8">
      <h1>Edit Event</h1>
      <a class="btn btn-success" href="dashboard.php" role="button">Go to Dashboard</a>
      <a class="btn btn-success" href="adm_event_view.php" role="button">View Event</a>
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
              <!--fghh-->
              <form action="" method="post" enctype="multipart/form-data">
                <div class="row">
                  <div class="col-md-4">
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Date</label>
                        <input type="date" value="<?php echo $Edate;?>" name="Edate" class="form-control" id="exampleFormControlInput1" placeholder="Date">
                    </div>
                  </div>

                  <div class="col-md-4">
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Starting Time</label>
                        <input type="time" name="stime" value="<?php echo $startTime;?>" class="form-control" id="exampleFormControlInput1" placeholder="Starting Time">
                    </div>
                  </div>

                  <div class="col-md-4">
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Ending  Time</label>
                        <input type="time" name="etime" value="<?php echo $endTime;?>" class="form-control" id="exampleFormControlInput1" placeholder="Ending Time">
                    </div>
                  </div>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1">Event Venue</label>
                    <input type="text" name="venue" value="<?php echo $eVenue;?>" class="form-control" id="exampleFormControlInput1" placeholder="Venue ">
                </div>

                <div class="form-group">
                    <label for="exampleFormControlInput1">Event Title</label>
                    <input type="text" name="Etitle" value="<?php echo $eTitle;?>" class="form-control" id="exampleFormControlInput1" placeholder="Title of the Event">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Event Post</label>
                    <textarea class="form-control" name="content" id="exampleFormControlTextarea1" rows="3"><?php echo $ePost;?></textarea>
                </div>
                <button type="submit" name="EditEventBtn" class="btn btn-primary btn-lg btn-block">Add Event</button>
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
                                <input type="file" name="imagee" class="custom-file-input" id="inputGroupFile02">
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

    <!---->
  </div>
</div>
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