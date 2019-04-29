<!-- footer -->
<footer class="footer" role="contentinfo">
    <div class="container">
        <div class="col4">
                <?php wp_nav_menu(); ?>
        </div>
        <div class="col4">
            <ul>
                <li>Kegeltijden</li>
                <li>Maandag: 13:30 - 16:00</li>
                <li>Dinsdag: 13:30 - 16:00</li>
                <li>Woensdag: 12:00 - 22:00</li>
                <li>Donderdag: 13:30 - 16:00</li>
                <li>Vrijdag: 13:30 - 16:00</li>
                <li>Zaterdag: 14:00 - 22:00</li>
                <li>Zondag: Gesloten</li>
            </ul>
        </div>
        <div class="col4">
            <ul>
                <li>Contact Gegevens</li>
                <li><i class="far fa-user"></i> Hans Visser</li>
                <li><i class="far fa-address-book"></i> Burgermeeste van Oostenweg, Bergschenhoek</li>
                <li><i class="fas fa-phone"></i> +31 638 158 98</li>
                <li><i class="fas fa-at"></i> info@hetkegelhonk.nl</li>
            </ul>

        </div>

        <!-- copyright -->
        <p class="copyright">
            &copy; <?php echo date('Y'); ?> Copyright <?php bloginfo('name'); ?>
        </p>
        <!-- /copyright -->
    </div>
</footer>
<!-- /footer -->

<?php wp_footer(); ?>

<script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
</body>
</html>
