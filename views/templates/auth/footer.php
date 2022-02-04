 <!-- Global Script -->
	<script >
		const base_url = "<?= base_url();?>";
		const peso = "<?= SPESO;?>";
	</script>
	<!-- External JS libraries -->
	
	<!-- Custom JS Script -->
	<script src="<?= media(); ?>/js/jquery-3.6.0.slim.js" ></script>
	<script src="<?= media(); ?>/js/bootstrap.min.js" ></script>
	<script src="<?= media(); ?>/js/plugins/fontawesome/fontawesome.js" ></script>
	<script src="<?= media(); ?>/js/plugins/sweetalert2/sweetalert2.min.js" ></script>
	<script src="<?= media(); ?>/js/functions/<?= $data['page_functions_js'];?>"></script>