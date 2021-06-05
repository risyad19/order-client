<!-- Page Header -->
<div class="page-header d-flex bd-highlight" style="margin-top: 35px;">
	<div class="flex-grow-1 bd-highlight">
		<ol class="breadcrumb">
			<li class="breadcrumb-item active" aria-current="page">
				<h4 class="page-title"><i class="si si-home mr-1"></i>Home</h4>
			</li>
		</ol>
	</div>
</div>

<div class="row">
	<div class="card">
		<div class="card-body">
			<div class="d-sm-flex m-0">
				<div class="text-center">
					<h4>Selamat Datang <b><?php echo $this->session->userdata('name')?></b></h4>
				</div>
			</div>
		</div>
	</div>
</div>
		
	


<?php $this->load->view('temp/footer'); ?>
<script src="<?php echo base_url()?>assets/public/js/app/app-home.js"></script>