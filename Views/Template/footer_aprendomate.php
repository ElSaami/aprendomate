    <script>
        const base_url = "<?= base_url(); ?>";
    </script>
    <script>
		$(document).ready(function() {
			// Al hacer clic en un botón de unidad, se ocultan los botones de capítulos de otras unidades
			$('button[data-toggle="collapse"]').click(function() {
				$('button[data-toggle="collapse"]').not($(this)).each(function() {
					$($(this).data('target')).collapse('hide');
				});
			});
		});
	</script>
    <!-- Essential javascripts for application to work-->
    <script src="<?= media(); ?>/js/jquery-3.3.1.min.js"></script>
    <script src="<?= media(); ?>/js/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="<?= media(); ?>/js/main.js"></script>
    <script src="<?= media();?>/js/fontawesome.js"></script>
    <script src="<?= media(); ?>/js/functions_admin.js"></script>
    <!-- The javascript plugin to display page loading on top-->
    <script src="<?= media(); ?>/js/plugins/pace.min.js"></script>
    <!-- Page specific javascripts-->
     <script type="text/javascript" src="<?= media(); ?>/js/plugins/sweetalert.min.js"></script>

    <!-- Data table plugin-->


    <script type="text/javascript" src="<?= media();?>/js/functions_admin.js"></script>
    
    </body>
</html>