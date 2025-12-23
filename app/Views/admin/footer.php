            	<footer class="footer">
					<div class="container-fluid">
						<nav class="pull-left">
							<ul class="nav">
								<li class="nav-item">
									<a class="nav-link" href="">
										
									</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" href="#">
										Help
									</a>
								</li>
								
							</ul>
						</nav>
						<div class="copyright ml-auto">
							<?php echo date('Y'); ?>, made with <i class="la la-heart heart text-danger"></i> by <a href="Weblite Techonology">Weblite</a>
						</div>				
					</div>
				</footer>

            </div>
		</div>
	</div>
	<!-- Modal -->
	<!-- <div class="modal fade" id="modalUpdate" tabindex="-1" role="dialog" aria-labelledby="modalUpdatePro" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header bg-primary">
					<h6 class="modal-title"><i class="la la-frown-o"></i> Under Development</h6>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body text-center">									
					<p>Currently the pro version of the <b>Ready Dashboard</b> Bootstrap is in progress development</p>
					<p>
						<b>We'll let you know when it's done</b></p>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div> -->
</body>
<script src="<?php echo base_url(); ?>/assets/admin/assets/js/core/jquery.3.2.1.min.js"></script>

<!-- Bootstrap 4 JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>

<script src="<?php echo base_url(); ?>/assets/admin/assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
<script src="<?php echo base_url(); ?>/assets/admin/assets/js/core/popper.min.js"></script>
<script src="<?php echo base_url(); ?>/assets/admin/assets/js/core/bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>/assets/admin/assets/js/plugin/chartist/chartist.min.js"></script>
<script src="<?php echo base_url(); ?>/assets/admin/assets/js/plugin/chartist/plugin/chartist-plugin-tooltip.min.js"></script>
<script src="<?php echo base_url(); ?>/assets/admin/assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js"></script>
<script src="<?php echo base_url(); ?>/assets/admin/assets/js/plugin/bootstrap-toggle/bootstrap-toggle.min.js"></script>
<script src="<?php echo base_url(); ?>/assets/admin/assets/js/plugin/jquery-mapael/jquery.mapael.min.js"></script>
<script src="<?php echo base_url(); ?>/assets/admin/assets/js/plugin/jquery-mapael/maps/world_countries.min.js"></script>
<script src="<?php echo base_url(); ?>/assets/admin/assets/js/plugin/chart-circle/circles.min.js"></script>
<script src="<?php echo base_url(); ?>/assets/admin/assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>
<script src="<?php echo base_url(); ?>/assets/admin/assets/js/ready.min.js"></script>
<!-- <script src="<?php echo base_url(); ?>/assets/admin/assets/js/demo.js"></script> -->

<!-- DataTables core -->
<script src="https://cdn.datatables.net/1.13.8/js/jquery.dataTables.min.js"></script>

<!-- DataTables Bootstrap 4 -->
<script src="https://cdn.datatables.net/1.13.8/js/dataTables.bootstrap4.min.js"></script>


<script>
$(document).ready(function () {
    $('#example').DataTable();
});
</script>


</html>