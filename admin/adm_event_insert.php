<?php
session_start();
require_once('main.class.php');
$EventPost = new Engine();
$error = $succmsg = $errmsg = $ttl = $cont ='';
//return to login if not logged in
if (!$EventPost->im_logIn() ||(trim ($EventPost->session()) == '')) {
	$EventPost->rd('logout.php');
}
$ky = $EventPost->session();
$details = $EventPost->admLoginDetails($ky);
foreach ($details as $key) {
    $name = $key['name'];
}

if (isset($_POST['addPostBtn'])) {
  // input variables
  $date       = esc($_POST['Edate']);
  $starTtime  = esc($_POST['stime']);
  $endTime    = esc($_POST['etime']);
  $title      = esc($_POST['Etitle']);
  $post       = esc($_POST['content']);
  $img        = esc($_FILES['image']['name']);
  $imgTemp    = esc($_FILES['image']['tmp_name']);
  $author     = $name;
  $venue      = esc($_POST['venue']);
//  $k = substr('aminu&copy;', 0, 5);

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
		$final_name = 'EventPostImg-'.$uniqKey.'.'.$ext;
    
    // user input data array.
    $postData = array(
      'date'        => $date,
      'sttime'      => $starTtime,
      'endtime'     => $endTime,
      'title'       => $title,
      'description' => $post,
      'image'       => $final_name,
      'author'      => $author,
      'venue'       => $venue,
      'uniqKey'     => $uniqKey
    );

    // statement to validate dublicate data.
    $authDublicate = $EventPost->AuthDub('event',$title);
    
    foreach ($authDublicate as $fetky) {
      $ttl = $fetky['title'];
      $cont = $fetky['description'];
    }
    
    if ($cont === $post) {
        $error = 1;
        $errmsg = "Error! you can't dublicate post!";
      }else{
        // statement to insert user data to database
        $posted = $EventPost->BInsert('event', $postData);
        if ($posted) {
          move_uploaded_file( $imgTemp, '../images/'.$final_name );
          $error = 0;
          $succmsg = 'Event post added successfully!';
        }else{
          $error = 1;
          $errmsg = 'Error! Event not posted!';
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
    <!--link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous"-->
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css"">

    <title>Add Event Post</title>
  </head>
  <body>
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-8">
      <h1>Event Post Add</h1>
      <a class="btn btn-success" href="dashboard.php" role="button">Go to Dashboard</a>
      <a class="btn btn-success" href="adm_event_view.php" role="button">View All Event</a>
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
      <div class="row">
        <div class="col-md-4">
          <div class="form-group">
              <label for="exampleFormControlInput1">Date</label>
              <input type="date" name="Edate" class="form-control" id="exampleFormControlInput1" placeholder="Date">
          </div>
        </div>

        <div class="col-md-4">
          <div class="form-group">
              <label for="exampleFormControlInput1">Starting Time</label>
              <input type="time" name="stime" class="form-control" id="exampleFormControlInput1" placeholder="Starting Time">
          </div>
        </div>

        <div class="col-md-4">
          <div class="form-group">
              <label for="exampleFormControlInput1">Ending  Time</label>
              <input type="time" name="etime" class="form-control" id="exampleFormControlInput1" placeholder="Ending Time">
          </div>
        </div>
      </div>
      <div class="form-group">
          <label for="exampleFormControlInput1">Event Venue</label>
          <input type="text" name="venue" class="form-control" id="exampleFormControlInput1" placeholder="Venue ">
      </div>

      <div class="input-group mb-3">
        <div class="custom-file">
          <input type="file" name="image" class="custom-file-input" id="inputGroupFile02">
          <label class="custom-file-label" for="inputGroupFile02" aria-describedby="inputGroupFileAddon02">Choose file</label>
        </div>
      </div>
      <div class="form-group">
          <label for="exampleFormControlInput1">Event Title</label>
          <input type="text" name="Etitle" class="form-control" id="exampleFormControlInput1" placeholder="Title of the Event">
      </div>
      <div class="form-group">
          <label for="exampleFormControlTextarea1">Event Post</label>
          <textarea class="form-control" name="content" id="exampleFormControlTextarea1" rows="3"></textarea>
      </div>
      <button type="submit" name="addPostBtn" class="btn btn-primary btn-lg btn-block">Add Event</button>
    </form>
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