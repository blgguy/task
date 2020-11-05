<?php
session_start();
require_once('main.class.php');
$Donation = new Engine();
$error = $succmsg = $errmsg = $ttl = $cont ='';
//return to login if not logged in
if (!$Donation->im_logIn() ||(trim ($Donation->session()) == '')) {
	$Donation->rd('login.php');
}

if (isset($_POST['addDonBtn'])) {
  // input variables
  // Donation === id	title	content	amountRaised	amountToRaise	img	lastDonation	dateAdded	
  $Ddate        = esc($_POST['date']);
  $Dname        = esc($_POST['name']);
  $amountDonate = esc($_POST['amountDonate']);
  $Dcause       = esc($_POST['Dcause']);
  $img          = esc($_FILES['image']['name']);
  $imgTemp      = esc($_FILES['image']['tmp_name']);
  
  // if statement to make sure user can't submit empty data. 
  if (!empty($Ddate) && !empty($Dname) && !empty($amountDonate) && !empty($Dcause)  && !empty($img) && !empty($imgTemp)){
    
    // statement to validate the image extentions
    $ext = pathinfo($img, PATHINFO_EXTENSION );
    if( $ext!='jpg' && $ext!='png' && $ext!='jpeg' && $ext!='gif' ) {
        $error = 1;
        $errmsg = 'You cannot upload <b style="color:red;">'.$ext.'</b> file';
      //echo "<script>location.href='#recentpage'</script>";
    }else{
        $ky = rand(2345, 2345);
        $uniqKey = rand(23097, 65409).'-'.$ky;
        $final_name = 'DonateImg-'.$uniqKey.'.'.$ext;
        
        // user input data array.
        $postData = array(
        'date'            => $Ddate,
        'name'            => $Dname,
        'amountDonated'   => $amountDonate,
        'causes'          => $Dcause,
        'image'           => $final_name,
        'uniqKey'         => $uniqKey
        );
        // statement to insert user data to database
        $posted = $Donation->BInsert('donation', $postData);
        if ($posted) {
            move_uploaded_file( $imgTemp, '../images/'.$final_name );
            $error = 0;
            $succmsg = 'Donation added successfully!';
        }else{
            $error = 1;
            $errmsg = 'Error! Donation not posted!';
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

    <title>Add Donation Post</title>
  </head>
  <body>
  <div class="container-fluid">
    <h1>Donation Add</h1>
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
        <label for="exampleFormControlInput1">Date</label>
        <input type="date" name="date" class="form-control" id="exampleFormControlInput1">
    </div>
    <div class="form-group">
        <label for="exampleFormControlTextarea1">Name</label>
        <input type="text" class="form-control" name="name" placeholder="Full Name">
    </div>
    <div class="form-group">
        <label for="exampleFormControlTextarea1">Amount To Donate</label>
        <input type="number" class="form-control" name="amountDonate">
    </div>
    <div class="form-group">
        <label for="exampleFormControlTextarea1">Cause</label>
        <select name="Dcause" id="" class="form-control">
            <option value="<?php echo 'hi';?>">hi</option>
        </select>
    </div>
    <div class="input-group mb-3">
      <div class="custom-file">
        <input type="file" name="image" class="custom-file-input" id="inputGroupFile02">
        <label class="custom-file-label" for="inputGroupFile02" aria-describedby="inputGroupFileAddon02">Choose file</label>
      </div>
    </div>
    <button type="submit" name="addDonBtn" class="btn btn-primary btn-lg btn-block">Add</button>
  
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