<!DOCTYPE html>

<html>

    <head>

        <link href="/css/bootstrap.min.css" rel="stylesheet"/>
        <link href="/css/bootstrap-theme.min.css" rel="stylesheet"/>
        <link href="/css/styles.css" rel="stylesheet"/>

        <?php if (isset($title)): ?>
            <title>Know your Rep: <?= htmlspecialchars($title) ?></title>
        <?php else: ?>
            <title>Know your Rep</title>
        <?php endif ?>

        <script src="/js/jquery-1.11.1.min.js"></script>
        <script src="/js/bootstrap.min.js"></script>
        <script src="/js/bootstrap.js"></script>
        
        <div id="fb-root"></div>
        <script src="/js/fblogin.js"></script>
        
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    


    </head>

    <body>

        <div class="container">

            <div id="top">
                <a href="/"><h1>Know your reps</h1><img alt="Know your reps" src="https://store-images.s-microsoft.com/image/apps.25828.13510798882934059.7fd728bf-4817-4b2d-b115-2201b8d1c7f9.c83b81a8-3698-4c57-b2d5-186cdbffd231?w=191&h=191"/></a>
            
            </div>


            
            <nav class="navbar navbar-default navbar-static-top">
            <div class="container-fluid">
                <ul class="nav nav-pills">
                    <li role="presentation" class="active"><a href="/">Home</a></li>
                    <li role="presentation"><a href="/maptest_2.php">Map</a></li>
                </ul>
            </div>
            </nav>
            
          

            <div id="middle">
