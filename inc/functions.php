<?php

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
