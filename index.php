<?php

include 'plugin/Parsedown.php';
include 'plugin/ParsedownExtra.php';
require_once 'Michelf/MarkdownExtra.inc.php';
require_once 'siteinfo.php';
require_once 'inc/functions.php';
require_once 'inc/header.php';


// Get Markdown class
use \Michelf\MarkdownExtra;

$current = $_SERVER[REQUEST_URI];
$posts = glob('posts/*.md');
$isSingle = false;

?>
  <nav>
    <p>Recent posts:</p>
    <ul>
      <?php 
      usort( $posts, function( $b, $a ) { return filemtime($a) - filemtime($b); });
      for ($i = 1; $i <= $recentPosts; $i++) {
        $post = current($posts);
        echo '<li>' . articleName($post) . '</li>';
        $post = next($posts);
      }
      ?>
    </ul>
  </nav>
  <div class="clear"></div>
</div>
<main>
  <div id="wrap-centered">
    <div class="content">
      <section>
        <?php

        ###RENDER SINGLE POST PAGE###
        if(array_search($current, slug($posts)) !== false){
          $isSingle = true;
          $post = 'posts' . $current . '.md';
          
          ?><article><header><?php
            echo "<h1>" . articleName($post) . "</h1>";
            echo "<p class=\"auth\">by: " . $author;
            echo " | " . date ("m.d.Y | h:ia", filemtime($post)) . "</p>";
            $content = file_get_contents($post);
            echo MarkdownExtra::defaultTransform($content . '***');
          ?></header></article><?php
        }
        
        ###RENDER FRONT PAGE IF SET###
        elseif($mainPage && $current == '/')
        {
          $post = 'posts/' . $mainPage . '.md';
          ?><article><header><?php
            echo "<h1>" . articleName($post) . "</h1>";
            echo "<p class=\"auth\">by: " . $author;
            echo " | " . date ("m.d.Y | h:ia", filemtime($post)) . "</p>";
            $content = file_get_contents($post);
            echo MarkdownExtra::defaultTransform($content . '***');
          ?></header></article><?php
        }
        
        ###RENDER ALL POST PAGE###
        elseif($current == '/all')
        {
          usort( $posts, function( $b, $a ) { return filemtime($a) - filemtime($b); });
          foreach ($posts as $post) {
            ?><article><header><?php
            echo "<h1>" . articleName($post) . "</h1>";
            echo "<p class=\"auth\">by: " . $author;
            echo " | " . date ("m.d.Y | h:ia", filemtime($post)) . "</p>";
            $content = file_get_contents($post);
            echo MarkdownExtra::defaultTransform($content . '***');
            ?></header></article><?php
          }
        }
        
        ###RENDER MULTI POST PAGE###
        else
        {
          usort( $posts, function( $b, $a ) { return filemtime($a) - filemtime($b); });
          for ($i = 1; $i <= $postsOnHome; $i++) {
            $post = current($posts);
            ?><article><header><?php
            echo "<h1>" . articleName($post) . "</h1>";
            echo "<p class=\"auth\">by: " . $author;
            echo " | " . date ("m.d.Y | h:ia", filemtime($post)) . "</p>";
            $content = file_get_contents($post);
            echo MarkdownExtra::defaultTransform($content . '***');
            ?></header></article><?php
            $post = next($posts);
          }
        }

        ?>
        <p id="viewAll"><a href="/all">-   View All Posts   -</a></p>
      </section>
      <?php
      require_once 'inc/aside.php';
      ?>
    </div>
  </div>
</main>
<div class="clear"></div>
<?php
require_once 'inc/footer.php';
?>
