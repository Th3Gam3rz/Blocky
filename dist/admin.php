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
                <li><a href="/"><i class="fa fa-home"></i> Home</a></li>
                <li><a href="/currently-ingame.php"><i class="fa fa-wifi"></i> Online Now</a></li>
                <li><a href="/forum.php"><i class="fa fa-list-alt"></i> Forum</a></li>
                <li><a href="/store.php"><i class="fa fa-credit-card"></i> Store</a></li>
                <li class="active"><a href="/admin.php"><i class="fa fa-cogs"></i> Admin</a></li>
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
          <form action="php/settings-update.php" method="post">
            <div class="container">
                <div class="row">
                    <div class="col s12">
                        <div class="card">
                            <div class="card-content">
                                <span class="card-title">
                                    Admin Control Panel
                                </span>
                                <div class="row">
                                    <div class="col s12">
                                        <div class="row">
                                            <div class="col s12">
                                                <ul class="tabs">
                                                    <li class="tab col s3"><a href="#server-settings">Server</a></li>
                                                    <li class="tab col s3"><a href="#policy-settings">Policies</a></li>
                                                    <li class="tab col s3"><a href="#theme-settings">Theme</a></li>
                                                </ul>
                                            </div>
                                            <div id="server-settings" class="col s12">
                                              <br>
                                              <div class="row">
                                                  <div class="input-field col s12 m6">
                                                      <input value="<?php echo $serverName; ?>" id="server_name" type="text" name="server_name" class="validate">
                                                      <label class="active" for="server_name">Server Name</label>
                                                  </div>
                                              </div>
                                              <div class="row">
                                                  <div class="input-field col s12 m6">
                                                      <input value="<?php echo $serverIp; ?>" id="server_ip" type="text" name="server_ip" class="validate">
                                                      <label class="active" for="server_ip">Server IP Address</label>
                                                  </div>
                                                  <div class="input-field col s12 m6">
                                                      <input value="<?php echo intval($serverPort); ?>" id="server_port" type="number" name="server_port" class="validate">
                                                      <label class="active" for="server_port">Server Port (Default: 25565)</label>
                                                  </div>
                                              </div>
                                              <div class="row">
                                                  <div class="col s12">
                                                      <button class="btn waves-effect waves-light <?php echo getThemeColour()['interaction'] . " " . getThemeColour()['interaction:text']; ?>" type="submit" name="action">Save Changes</button>
                                                  </div>
                                              </div>
                                            </div>
                                            <div id="policy-settings" class="col s12">
                                              <br>
                                              <div class="row">
                                                  <div class="col s12">
                                                      <h5>Terms and Conditions</h5>
                                                  </div>
                                                  <div class="input-field col s12">
                                                      <textarea id="website_terms" name="website_terms"><?php echo getTermsAndConditions(); ?></textarea>
                                                  </div>
                                              </div>
                                              <div class="row">
                                                  <div class="col s12">
                                                      <h5>Privacy Policy</h5>
                                                  </div>
                                                  <div class="input-field col s12">
                                                      <textarea id="website_privacy" name="website_privacy"><?php echo getPrivacyPolicy(); ?></textarea>
                                                  </div>
                                              </div>
                                              <div class="row">
                                                  <div class="col s12">
                                                      <button class="btn waves-effect waves-light <?php echo getThemeColour()['interaction'] . " " . getThemeColour()['interaction:text']; ?>" type="submit" name="action">Save Changes</button>
                                                  </div>
                                              </div>
                                            </div>
                                            <div id="theme-settings" class="col s12">
                                              <br>
                                              <div class="row">
                                                  <div class="input-field col s12 m6">
                                                      <select name="website_theme" id="website_theme">
                                                        <?php getThemeDropdown(); ?>
                                                      </select>
                                                      <label>Website Theme</label>
                                                  </div>
                                              </div>
                                              <div class="row">
                                                  <div class="col s12">
                                                      <button class="btn waves-effect waves-light <?php echo getThemeColour()['interaction'] . " " . getThemeColour()['interaction:text']; ?>" type="submit" name="action">Save Changes</button>
                                                  </div>
                                              </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
          </form>
        </main>
        
        <?php require('/php/footer.php'); ?>
        
        <!--Import jQuery before materialize.js-->
        <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.6/js/materialize.min.js"></script>
        <script>$('.button-collapse').sideNav();</script>
        <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
        <script>
            $(document).ready(function() {
                $('select').material_select();
                $('ul.tabs').tabs();
            });
            tinymce.init({
                selector: 'textarea',
                height: 300,
                theme: 'modern',
                plugins: [
                  'advlist autolink lists link image charmap print preview hr anchor pagebreak',
                  'searchreplace wordcount visualblocks visualchars code fullscreen',
                  'insertdatetime media nonbreaking save table contextmenu directionality',
                  'emoticons paste textcolor colorpicker textpattern imagetools'
                ],
                toolbar1: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
                toolbar2: 'print preview media | forecolor backcolor emoticons',
                image_advtab: true
            });

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