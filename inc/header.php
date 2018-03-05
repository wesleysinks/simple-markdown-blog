<!doctype html>

<html lang="en">
<head>
  <meta charset="utf-8">

  <title><?php echo $title ?></title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="<?php echo $description ?>">
  <meta name="author" content="<?php echo $author ?>">
  
  <link rel="stylesheet" href="/css/normalize.css">
  <link rel="stylesheet" href="//cdn.jsdelivr.net/highlight.js/9.10.0/styles/default.min.css">
  <link rel="stylesheet" href="/css/styles.css">
  <script src="//cdn.jsdelivr.net/highlight.js/9.10.0/highlight.min.js"></script>
  <script>hljs.initHighlightingOnLoad();</script>

  <!--[if lt IE 9]>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.js"></script>
  <![endif]-->
</head>
<body>
<?php include_once "analyticstracking.php" ?>
  <div id="footerDown">
    <div id="headerWrap">
      <header id="mainHeader">
        <h1 id="siteTitle"><a href="/"><?php echo $title ?></a></h1>
        <p id="siteDesc"><?php echo $description ?></p>
      </header>
