<?php ?>

<aside>
  <?php if($authorImage){
      echo '<img id="authorImage" src="'. $authorImage . '" alt="' . $author . '">';
    }
    echo '<p>' . $author . '</p>';
  ?>
  <h3><a href="/all">All posts:</a></h3>
  <ul>
    <?php 
    foreach($posts as $p) {
      echo '<li time="' . date ("m.d.y", filemtime($p)) . '">' .  articleName($p) . "</li>";
    }
    ?>
  </ul>
</aside>
