 <!-- Global Script -->
	<script >
		const base_url = "<?= base_url();?>";
	</script>
	<!-- External JS libraries -->
	
	
    <!-- Vendor Scripts Start -->
    <script src="<?= media();?>/js/vendor/jquery-3.5.1.min.js"></script>
    <script src="<?= media();?>/js/vendor/bootstrap.bundle.min.js"></script>
    <script src="<?= media();?>/js/vendor/OverlayScrollbars.min.js"></script>
    <script src="<?= media();?>/js/vendor/autoComplete.min.js"></script>
    <script src="<?= media();?>/js/vendor/clamp.min.js"></script>

    <script src="<?= media();?>/icon/acorn-icons.js"></script>
    <script src="<?= media();?>/icon/acorn-icons-interface.js"></script>

    <script src="<?= media();?>/js/vendor/jquery.validate/jquery.validate.min.js"></script>

    <script src="<?= media();?>/js/vendor/jquery.validate/additional-methods.min.js"></script>

    <!-- Vendor Scripts End -->

    <!-- Template Base Scripts Start -->
    <script src="<?= media();?>/js/base/helpers.js"></script>
    <script src="<?= media();?>/js/base/globals.js"></script>
    <script src="<?= media();?>/js/base/nav.js"></script>
    <script src="<?= media();?>/js/base/search.js"></script>
    <script src="<?= media();?>/js/base/settings.js"></script>
    <!-- Template Base Scripts End -->
    <!-- Page Specific Scripts Start -->

    <script src="<?= media();?>/js/pages/auth.login.js"></script>

    <script src="<?= media();?>/js/common.js"></script>
    <script src="<?= media();?>/js/scripts.js"></script>
    <!-- Page Specific Scripts End -->
    <script src="<?= media();?>/libs/sweetalert2/sweetalert2.min.js"></script>
    <script src="<?= media()?>/js/functions/<?= $data['page_functions_js']?>"></script>
  </body>
</html>