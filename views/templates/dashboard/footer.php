<footer class="footer-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <div class="footer-copyright">
                            <p>2021 @<a href="#">AVC-Latam todos los derechos reservados.</a>
                            </p>
                        </div>
                    </div>
                    
                </div>
            </div>
        </footer>
    </main>
    

    <div class="overlay-dark-sidebar"></div>
    <div class="customizer-overlay"></div>

    
    <script >
    	const media_url = "<?= media();?>";
        const base_url = "<?= base_url();?>";
        const peso = "<?= SPESO;?>";
    </script>
    <!-- inject:js-->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" type="text/javascript"></script>
    <script src="<?= media()?>/js/dashboard/plugins.min.js"></script>
    <script src="<?= media()?>/js/dashboard/script.min.js"></script>
    <script src="<?= media(); ?>/js/plugins/fontawesome/fontawesome.js" ></script>
    <script src="<?= media(); ?>/js/plugins/tinymce/tinymce.min.js" ></script>
    <script src="<?= media(); ?>/js/plugins/datatables/dataTables.min.js" ></script>
    <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
    <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>
     <!-- Plugins -->

    <script src="<?= media(); ?>/js/plugins/sweetalert2/sweetalert2.min.js" ></script>
    <script src="<?= media()?>/js/functions/dashboard/<?= $data['page_functions_js']?>"></script>


    <!-- endinject-->
</body>

</html>