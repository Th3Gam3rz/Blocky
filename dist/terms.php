<?php require_once('/php/config.php'); ?>
<!DOCTYPE html>
  <html>
    <head>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.2/css/font-awesome.min.css">
        <!--Import materialize.css-->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.6/css/materialize.min.css" rel="stylesheet">
        <!--Let browser know website is optimized for mobile-->
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="css/nav-fix.css" rel="stylesheet">
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
                        <div class="card <?php echo getThemeColour()['main'] . " " . getThemeColour()['main:text']; ?>">
                            <div class="card-content">
                                <span class="card-title">
                                    Terms and Conditions
                                </span>
                                <p id="terms">
                                    <?php echo getTermsAndConditions(); ?>
                                </p>
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
                $('#motd').html($.ajax({
                    type: "POST",
                    url: "/php/motd.php",
                    async: false
                }).responseText);
            }
            updateStats();
        </script>
    </body>
  </html>