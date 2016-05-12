<?php require_once('/php/config.php'); ?>
<!DOCTYPE html>
  <html>
    <head>
      <!-- Meta Tags Needed -->
   <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.2/css/font-awesome.min.css">
        <!--Import materialize.css-->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.6/css/materialize.min.css" rel="stylesheet">
        <link href="css/nav-fix.css" rel="stylesheet">
        
        <!-- Meta Tags For Google -->
        <meta name="author" content="Blocky">
        <meta name="description" content="Blocky is a open-sourced Minecraft forum software.">
        
        <!-- For Social Media --->
        <meta property=”og:title” content=”Blocky - Minecraft Forum Software”/>
        <meta property=”og:type” content=”article”/>
        <meta property=”og:url” content=”http://blockysoftware.com”/>
        <meta property=”og:description” content=”Blocky is a open-sourced Minecraft forum software”/>
        
        <!-- Robots.txt --->
        <META NAME="ROBOTS" CONTENT="INDEX, FOLLOW">
    </head>
    <body>
        <nav>
            <div class="nav-wrapper <?php echo getThemeColour()['nav']; ?>">
              <a href="/" class="brand-logo center <?php echo getThemeColour()['nav:text']; ?>"><?php echo $serverName; ?></a>
              <a href="#" data-activates="mobile-nav" class="button-collapse show-on-large"><i class="fa fa-bars <?php echo getThemeColour()['nav:text']; ?>"></i></a>
              <ul class="side-nav" id="mobile-nav">
                <li class="active"><a href="/"><i class="fa fa-home"></i> Home</a></li>
                <li><a href="/currently-ingame.php"><i class="fa fa-wifi"></i> Online Now</a></li>
                <li><a href="/forum.php"><i class="fa fa-list-alt"></i> Forum</a></li>
                <li><a href="/store.php"><i class="fa fa-credit-card"></i> Store</a></li>
                <li><a href="/admin.php"><i class="fa fa-cogs"></i> Admin</a></li>
                <li><a href="/logout.php"><i class="fa fa-sign-out"></i> Log Out</a></li>
                <li>
                    <div class="chip">
                        <img src="https://mcapi.ca/avatar/2d/FeaturedEpic" alt="FeaturedEpic">
                        FeaturedEpic
                    </div>
                </li>
              </ul>
            </div>
        </nav>
        
        <main>
            <div class="container">
                <div class="row">
                    <div class="col s12 m8">
                        <div class="card">
                            <div class="card-image">
                                <img src="/img/header.jpg">
                                <span class="card-title">
                                    
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="col s12 m4">
                        <?php require('/php/twitter.php'); ?>
                    </div>
                </div>
            </div>
        </main>
        
        <?php require('/php/footer.php'); ?>
        
        <!--Import jQuery before materialize.js-->
        <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.6/js/materialize.min.js"></script>
        <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
        <script>$('.button-collapse').sideNav();</script>
        <script>
            function updateStats() {
                $('.card-image .card-title').html($.ajax({
                    type: "POST",
                    url: "/php/front-page-stats.php",
                    async: false
                }).responseText);
                $('#motd').html($.ajax({
                    type: "POST",
                    url: "/php/motd.php",
                    async: false
                }).responseText);
            }
            updateStats();
            setInterval(updateStats, 5000);
        </script>
    </body>
  </html>
