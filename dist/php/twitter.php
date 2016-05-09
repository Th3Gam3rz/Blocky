<div class="card <?php echo getThemeColour()['twitter']; ?>">
    <div class="card-content">
        <span class="card-title <?php echo getThemeColour()['twitter:text']; ?>">
            Twitter
        </span>
        <a class="twitter-timeline <?php echo getThemeColour()['twitter:text']; ?>" href="https://twitter.com/@<?php require_once('/php/config.php'); echo $twitterUsername; ?>" data-widget-id="<?php echo $twitterWidgetId; ?>" data-chrome="noheader nofooter">Tweets by @<?php echo $twitterUsername; ?></a>
    </div>
</div>