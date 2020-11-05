<?php
//start session
session_start();
// include class file.
require_once('main.class.php');
// call the class obj
$donation = new Engine();
//redirect if logged in
if (!$donation->im_logIn() || (trim ($donation->session()) == '')) {
	$donation->rd('logout.php');
}
$error = $succmsg = $errmsg = '';

$postVw = $donation->BView('donation');
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <title>Donation</title>
  </head>
  <body>
    <div class="container-fluid">
      <h2>Donation..</h2>
      <a class="btn btn-success" href="adm_donation_insert.php" role="button">Add donation</a>
      <div class="row">
        <div class="card-group">
  <?php
    foreach ($postVw as $key) {
      $Ddate = $key['date'];
      $Dname = $key['name'];
      $Damnt = $key['amountDonated'];
      $Dimg = '../images/'.$key['image'];
      $Dcauses = $key['causes'];
      $Id = $key['uniqKey'];
  ?>
          <div class="card bg-light mb-3" style="max-width: 18rem;">
            <img src="<?php echo $Dimg;?>" alt="<?php echo $Dname;?>" class="card-img-top">
            <div class="card-body">
              <h5 class="card-title"><?php echo $Dname;?></h5>
              <p class="card-text"><small class="text-muted">$<?php echo $Damnt;?></small></p>
              <p class="card-text"><small class="text-muted">donated on <?php echo $Ddate;?></small></p>
              <p class="card-text"><small class="text-muted">By <?php echo $Dname;?></small></p>
              <a class="btn btn-primary" href="adm_donation_edit.php?ref=<?php echo $Id;?>" role="button">Edit</a>
              <button data-toggle="modal" data-target="#exampleModal" type="button" class="btn btn-danger">Delete</button>
            </div>
          </div>
    <?php } ?>
    <!--
    <!-- Button trigger modal --
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  Launch demo modal
</button>
-->
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title btn-outline-danger" id="exampleModalLabel">Danger zone</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       Are you sure you wanna delete this data.
      </div>
      <div class="modal-footer">
        <a class="btn btn-success" href="admn_donation_del.php?ref=<?php echo $Id;?>" role="button">Yes</a>
        <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>   
      </div>
    </div>
  </div>
</div>
<!---->
        </div>
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