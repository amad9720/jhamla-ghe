    <!-- jQuery, loaded in the recommended protocol-less way -->
    <!-- more http://www.paulirish.com/2010/the-protocol-relative-url/ -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>

    <!-- Font-Awesome -->
    <script src="https://use.fontawesome.com/f07fad4092.js"></script>

    <!-- TinyMce -->
    <script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>

    <!--Superscrollorama-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/SuperScrollorama/1.0.3/jquery.superscrollorama.js"></script>

    <!--Scroll Magic-->
    <script src="//cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.5/ScrollMagic.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.5/plugins/debug.addIndicators.min.js"></script>

    <!--HightCharts-->
    <script src="https://code.highcharts.com/highcharts.src.js"></script>
    
    <!--Our JavaScript -->
    <script src="<?php echo URL; ?>js/application.js" type="text/javascript"></script>
    <script src="<?php echo URL; ?>js/slider.js"> </script>

<footer>
        <p class="brand">EggHome 2017</p>
        <?php $_SESSION['user_role'] = ""; ?>
        <?php if ($session->is_signed_in()): ?>
            <p class="brand"><?php echo $_SESSION['username']; ?></p>
            <?php  switch ($session->role) { 
                   case CLIENT:
                        $_SESSION['user_role'] = "Client";
                        break;
                    case SERVICE_CLIENT:
                        $_SESSION['user_role'] = "Service Client";
                        break;
                    case ADMIN:
                        $_SESSION['user_role'] = "Administrateur";
                        break;
                    default:
                        
                        break;
                }
            ?>
            <p class="brand"><?php $_SESSION['user_role'] ?></p>
        <?php endif ?>
</footer>

</body>
</html>
