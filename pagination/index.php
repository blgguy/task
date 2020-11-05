<?php
namespace Phppot;

require_once __DIR__ . '/Model/Pagination.php';

$paginationModel = new Pagination();
$pageResult = $paginationModel->getPage('blogpost');
$queryString = "?";
if (isset($_GET["page"])) {
    $pn = $_GET["page"];
} else {
    $pn = 1;
}
$limit = $limit = $paginationModel->LIMIT_PER_PAGE;

$totalRecords = $paginationModel->getAllRecords('blogpost');
$totalPages = ceil($totalRecords / $limit);

?>
<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport"
    content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="author" content="Vincy">
<title>PHP Pagination MySQL Database Example Script with Previous Next like Google</title>
<link rel="stylesheet" type="text/css" href="assets/css/pagination.css">
<link rel="stylesheet" type="text/css"
    href="assets/css/phppot-style.css">
<script src="vendor/jquery/jquery-3.3.1.js"></script>
<script>
function pageValidation()
{
    var valid=true;
    var pageNo = $('#page-no').val();
    var totalPage = $('#total-page').val();
    if(pageNo == ""|| pageNo < 1 || !pageNo.match(/\d+/) || pageNo > parseInt(totalPage)){
        $("#page-no").css("border-color","#ee0000").show();
        valid=false;
    }
    return valid;
}
</script>
</head>
<body>
    <div class="phppot-container">
        <div class="phppot-form">
            <h1>Animal Names</h1>
            <table>
                <tr>
                    <th>Id</th>
                    <th>Common Name</th>
                    <th>Scientific Name</th>
                </tr>
  <?php
if (! empty($pageResult)) {
    foreach ($pageResult as $page) {
        ?>
          <tr>
                    <td><?php echo $page['id'];?></td>
                    <td><?php echo $page['title'];?></td>
                    <td><?php echo $page['content'];?></td>
                </tr>  
 <?php }} ?> 
  </table>

            <div class="pagination"> 			
 <?php
if (($page > 1) && ($pn > 1)) {
    ?>
    <a class="previous-page" id="prev-page"
                    href="<?php echo $queryString;?>page=<?php echo (($pn-1));?>"
                    title="Previous Page"><span>&#10094; Previous</span></a>
            <?php }?>
<?php
if (($pn - 1) > 1) {
    ?>
    <a href='index.php?page=1'><div class='page-a-link'>1</div></a>
                <div class='page-before-after'>...</div>
<?php
}

for ($i = ($pn - 1); $i <= ($pn + 1); $i ++) {
    if ($i < 1)
        continue;
    if ($i > $totalPages)
        break;
    if ($i == $pn) {
        $class = "active";
    } else {
        $class = "page-a-link";
    }
    ?>
    <a href='index.php?page=<?php echo $i; ?>'>
                    <div class='<?php echo $class; ?>'><?php echo $i; ?></div>
                </a>
    <?php
}

if (($totalPages - ($pn + 1)) >= 1) {
    ?>
    <div class='page-before-after'>...</div>
<?php
}
if (($totalPages - ($pn + 1)) > 0) {
    if ($pn == $totalPages) {
        $class = "active";
    } else {
        $class = "page-a-link";
    }
    ?>
    <a href='index.php?page=<?php echo $totalPages; ?>'><div
                        class='<?php echo $class; ?>'><?php echo $totalPages; ?></div></a> 
    <?php
}
?>
    <?php
    if (($page > 1) && ($pn < $totalPages)) {
        ?>
				<a class="next" id="next-page"
                    href="<?php echo $queryString;?>page=<?php echo (($pn+1));?>"
                    title="Next Page"><span>Next &#10095;</span></a> 
        <?php
    }
    ?>
    </div>
            <div class="goto-page">
                <form action="" method="GET"
                    onsubmit="return pageValidation()">
                    <input type="submit" class="goto-button"
                        value="Go to"> <input type="text"
                        class="enter-page-no" name="page" min="1"
                        id="page-no"> <input type="hidden"
                        id="total-page"
                        value="<?php echo $totalPages;?>">
                </form>
            </div>
        </div>
    </div>
</body>
</html>