<?php if(config('app.ENABLE_GOOGLE_ANALYTICS') == TRUE) { ?>
<!-- OPTIONAL - Google Analytics -->
<script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
            (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

    ga('create', '<?php echo config('app.GOOGLE_ANALYTICS') ?>', 'auto');
    ga('send', 'pageview');
    setTimeout(function() {
        ga('send', 'event', '15_seconds', 'read');
    },15000);
</script>
<script>
    var elementsToTrack = document.getElementsByClassName('ga-track');
    var i = elementsToTrack.length;
    var gaTrackOnClick = function() {
        ga('send', 'event', this.dataset.gaText || this.textContent.trim());
    <?php if(isset($analyticsCategory)) { ?>
        console.log(this.dataset.gaCategory + ' ' + this.dataset.gaAction + ' ' + this.dataset.gaLabel);
        ga('send', 'event', this.dataset.gaCategory, this.dataset.gaAction, this.dataset.gaLabel, 0);
    <?php } ?>
    };
    while(i--) {
        elementsToTrack[i].addEventListener('click', gaTrackOnClick);
    }
</script>
<?php } ?>