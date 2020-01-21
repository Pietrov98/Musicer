<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>muziker</title>
    <link rel="stylesheet" type="text/css" href="/Public/css/logged.css" />
    <link rel="stylesheet" type="text/css" href="/Public/css/band_finder.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
</head>
<body>
<script src="/Public/scripts/bandFinderScripts.js"></script>
<div class="container">
    <?php include(dirname(__DIR__).'/MenuBar/menuBar.php'); ?>
    <div class="bands_searcher">
        <div class="bands_title">Znajdź swój zespół</div>
    </div>
    <div class="band_information" id="band_information" style="display: none; z-index: 1;">
    </div>
    <div class="bands_container">
        <?php
        if($_SESSION['role'] != 'founder' && $_SESSION['role'] != 'czlonek')
            echo '<div class="bands_list"></div>'
        ?>
    </div>
</div>
<script>
    if ( window.history.replaceState )
    {
        window.history.replaceState( null, null, window.location.href );
    }
</script>
</body>
</html>
<body>