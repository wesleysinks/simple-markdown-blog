<?php

require_once 'siteinfo.php';
require_once 'inc/functions.php';
require_once 'inc/header.php';

$current = $_SERVER[REQUEST_URI];
$posts = glob('posts/*.md');
$isSingle = false;

?>
  <nav>
    <p>Recent posts:</p>
    <ul>
      <?php 
      sortPosts($posts);
      $n = $recentPosts;
      if (count($posts) < $recentPosts){
        $n = count($posts);
      }
      for ($i = 1; $i <= $n; $i++) {
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
          displayArticle($post, $author);
        }
        
        ###RENDER FRONT PAGE IF SET###
        elseif($mainPage && $current == '/')
        {
          $post = 'posts/' . $mainPage . '.md';
          displayArticle($post, $author);
        }
        
        ###RENDER ALL POST PAGE###
        elseif($current == '/all')
        {
          foreach ($posts as $post) {
            displayArticle($post, $author);
          }
        }
        ###RENDER MULTI POST PAGE###
        else
        {
          $n = $postsOnHome;
          if (count($posts) < $postsOnHome){
            $n = count($posts);
          }
          reset($posts);
          for ($i = 1; $i <= $n; $i++) {
            $post = current($posts);
            displayArticle($post, $author);
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
