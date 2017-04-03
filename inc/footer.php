      <footer>
        <p><span class="copy-left">&copy;</span><?php 
        echo date('Y') . " " . $title . " - " . $description;
        if($isSingle){
          echo " - Pulling post content from " . $post;
        } 
        ?></p>
      </footer>
    </div>
  </body>
</html>
