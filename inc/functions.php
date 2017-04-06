<?php

require_once 'Michelf/MarkdownExtra.inc.php';
use \Michelf\MarkdownExtra;

function slug($post) #returns slug from filename
{
  return str_replace('.md', '', str_replace('posts', '', $post));
}

function articleName($slug) #returns hyperlinked text from slug
{
  return "<a href=\"" . slug($slug) . "\">" . ucwords(str_replace(["-", "_"], " ", str_replace("/", "", slug($slug)))) . "</a>";
}

function listRecent ($posts, $n) {
  usort( $posts, function( $b, $a ) { return filemtime($a) - filemtime($b); });
  for ($i = 1; $i <= $n; $i++) {
    $post = current($posts);
    $list = [];
    $list[] = articleName($post);
    $post = next($posts);
  }
  return $list;
}

function displayArticle ($post, $author) {
    $content = file_get_contents($post);
    $shareUrl = "http://wsle.me" . slug($post);
    //Used for social sharing features while I'm forwarding domain.
    
    echo '<article><header><h1>' . articleName($post) . '</h1><p class="auth">by: ' . $author . " | " . date ("m.d.Y | h:ia", filemtime($post)) . '</p>' . MarkdownExtra::defaultTransform($content . '***') . '<p class="share">Share: <a href="http://www.facebook.com/sharer.php?u=' . $shareUrl . '">fb</a> | <a href="http://twitter.com/share?url=' . $shareUrl . '&text=' . ucwords(str_replace(["-", "_"], " ", str_replace("/", "", slug($post)))) . ' via @_wesleysinks">twt</a> | <a href="https://plusone.google.com/_/+1/confirm?hl=en&url=' . $shareUrl . '">g+</a></p></header></article>';
}

function sortPosts ($posts) {
    usort( $posts, function( $b, $a ) { return filemtime($a) - filemtime($b); });
}
