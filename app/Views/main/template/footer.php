<footer id="footer">
    <div class="container">
        <div class="credits">
            &copy; Copyright <strong><a href="https://www.instagram.com/explorelamongan/">Explore Lamongan</a></strong>. All Rights Reserved
        </div>
    </div>
</footer><!-- End Footer -->

<a href="#" class="back-to-top"><i class="ri-arrow-up-line"></i></a>
<div id="preloader"></div>

<!-- Vendor JS Files -->
<script src="<?= base_url() ?>/fn/assets/vendor/jquery/jquery.min.js"></script>

<script src="<?= base_url() ?>/fn/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?= base_url() ?>/fn/assets/vendor/jquery.easing/jquery.easing.min.js"></script>
<script src="<?= base_url() ?>/fn/assets/vendor/php-email-form/validate.js"></script>
<script src="<?= base_url() ?>/fn/assets/vendor/owl.carousel/owl.carousel.min.js"></script>
<script src="<?= base_url() ?>/fn/assets/vendor/venobox/venobox.min.js"></script>
<script src="<?= base_url() ?>/fn/assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
<script src="<?= base_url() ?>/fn/assets/vendor/aos/aos.js"></script>

<!-- Template Main JS File -->
<script src="<?= base_url() ?>/fn/assets/js/main.js"></script>
<?php echo $this->renderSection('foot') ?>
<script>
    window.setTimeout(function() {
        $(".alert").fadeTo(1200, 0).slideUp(600, function() {
            $(this).remove();
        });
    }, 3000)
</script>
</body>

</html>