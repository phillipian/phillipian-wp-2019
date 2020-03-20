  <footer>
    <div class='footer-inner'>
        <div class='footer-col'>
            <h2>Quick Links</h2>
            <?php
                wp_nav_menu(array('theme_location'=>'footer-links', 'depth' => 2));
            ?>
        </div>
        <div class='footer-col'>
            <h2>Inquiries</h2>
            <?php
                wp_nav_menu(array('theme_location'=>'footer-inquiries'));
            ?>
        </div>
        <div class='footer-col'>
            <h2>Policies</h2>
            <?php
                wp_nav_menu(array('theme_location'=>'footer-policies'));
            ?>
        </div>
        <div class='footer-col'>
            <h2>Follow us</h2>
            <?php
                wp_nav_menu(array('theme_location'=>'footer-follow'));
            ?>
        </div>
        <div class='footer-col'>
            <div id="multilingual-header">
                <h2>Multilingual</h2>
            </div>
            <?php
                wp_nav_menu(array('theme_location'=>'footer-multilingual'));
            ?>
        </div>
    </div>
</footer>

    <?php wp_footer(); ?>
  <style>
    html{
      margin-top: 0!important;
    }
    </style>
  </body>
</html>
