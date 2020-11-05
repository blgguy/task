<?php

define('DS', DIRECTORY_SEPARATOR);
define('BASE_PATH', __DIR__ . DS);

require BASE_PATH.'vendor/autoload.php';
use JasonGrimes\Paginator;

$totalItems = 1000;
$itemsPerPage = 50;
$currentPage = 8;
$urlPattern = '/foo/page/(:num)';

$paginator = new Paginator($totalItems, $itemsPerPage, $currentPage, $urlPattern);

?>
<html>
  <head>
    <!-- The default, built-in template supports the Twitter Bootstrap pagination styles. -->
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
  </head>
  <body>

    <?php 
      // Example of rendering the pagination control with the built-in template.
      // See below for information about using other templates or custom rendering.

      echo $paginator; 
    ?>
    
  </body>
</html>
<?php
/**
 * To render it with one of the other example templates, just make sure the variable is named $paginator and then include the template file:

$paginator = new Paginator($totalItems, $itemsPerPage, $currentPage, $urlPattern);

include '../vendor/jasongrimes/paginator/examples/pagerSmall.phtml';


If the example templates don't suit you, you can iterate over the paginated data to render your own pagination control.

Rendering a custom pagination control
Use $paginator->getPages(), $paginator->getNextUrl(), and $paginator->getPrevUrl() to render a pagination control with your own HTML. For example:

<ul class="pagination">
    <?php if ($paginator->getPrevUrl()): ?>
        <li><a href="<?php echo $paginator->getPrevUrl(); ?>">&laquo; Previous</a></li>
    <?php endif; ?>

    <?php foreach ($paginator->getPages() as $page): ?>
        <?php if ($page['url']): ?>
            <li <?php echo $page['isCurrent'] ? 'class="active"' : ''; ?>>
                <a href="<?php echo $page['url']; ?>"><?php echo $page['num']; ?></a>
            </li>
        <?php else: ?>
            <li class="disabled"><span><?php echo $page['num']; ?></span></li>
        <?php endif; ?>
    <?php endforeach; ?>

    <?php if ($paginator->getNextUrl()): ?>
        <li><a href="<?php echo $paginator->getNextUrl(); ?>">Next &raquo;</a></li>
    <?php endif; ?>
</ul>

<p>
    <?php echo $paginator->getTotalItems(); ?> found.
    
    Showing 
    <?php echo $paginator->getCurrentPageFirstItem(); ?> 
    - 
    <?php echo $paginator->getCurrentPageLastItem(); ?>.
</p>
See the examples directory for more sample templates.

Pages data structure
$paginator->getPages();
getPages() returns a data structure like the following:

array ( 
    array ('num' => 1,     'url' => '/foo/page/1',  'isCurrent' => false),
    array ('num' => '...', 'url' => NULL,           'isCurrent' => false),
    array ('num' => 5,     'url' => '/foo/page/5',  'isCurrent' => false),
    array ('num' => 6,     'url' => '/foo/page/6',  'isCurrent' => false),
    array ('num' => 7,     'url' => '/foo/page/7',  'isCurrent' => false),
    array ('num' => 8,     'url' => '/foo/page/8',  'isCurrent' => true),
    array ('num' => 9,     'url' => '/foo/page/9',  'isCurrent' => false),
    array ('num' => 10,    'url' => '/foo/page/10', 'isCurrent' => false),
    array ('num' => 11,    'url' => '/foo/page/11', 'isCurrent' => false),
    array ('num' => 12,    'url' => '/foo/page/12', 'isCurrent' => false),
    array ('num' => '...', 'url' => NULL,           'isCurrent' => false),
    array ('num' => 20,    'url' => '/foo/page/20', 'isCurrent' => false),
)
Customizing the number of pages shown
By default, no more than 10 pages are shown, including the first and last page, with the overflow replaced by ellipses. To change the default number of pages:

$paginator->setMaxPagesToShow(5);
 */


?>