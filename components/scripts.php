
    <!-- get jQuery from the google apis -->
    <script type="text/javascript" src="js/jquery.min.js"></script>


    <!-- SLIDER REVOLUTION 4.x SCRIPTS  -->
    <script type="text/javascript" src="rs-plugin/js/jquery.themepunch.plugins.min.js"></script>
    <script type="text/javascript" src="rs-plugin/js/jquery.themepunch.revolution.min.js"></script>

    <script src="js/bootstrap.min.js"></script>


    <!-- LOOK THE DOCUMENTATION FOR MORE INFORMATIONS -->
    <script type="text/javascript">

        var revapi;

        jQuery(document).ready(function() {
            "use strict";
            revapi = jQuery('.tp-banner').revolution(
            {
                delay: 15000,
                startwidth: 1200,
                startheight: 278,
                hideThumbs: 10,
                fullWidth: "on"
            });

        });	//ready

    </script>