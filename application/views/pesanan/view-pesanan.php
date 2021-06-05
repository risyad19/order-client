		<!--Page Header-->
		<div class="page-header d-flex bd-highlight" style="margin-top: 35px;">
			<div class="flex-grow-1 bd-highlight">
				<ol class="breadcrumb">
					<li class="breadcrumb-item active" aria-current="page">
						<h4 class="page-title"><i class="si si-basket-loaded mr-1"></i>Daftar Pesanan</h4>
					</li>
				</ol>
				<div class="form-group d-flex align-items-end flex-column bd-highlight">
						<a href="<?= base_url();?>pesanan/addPesanan" class="btn btn-warning"><i class="si si-plus"></i> Add Menu</a>
				</div>	
			</div>
		</div>
		<!--page header-->

		<div class="row">
			<div class="col-md-12 col-lg-12">
				<div class="card">
					<?php if ($this->session->flashdata('success')): ?>
						<div class="alert alert-success" role="alert">
							<?php echo $this->session->flashdata('success'); ?>
						</div>
					<?php endif; ?>
					<?php if ($this->session->flashdata('failed')): ?>
						<div class="alert alert-danger" role="alert">
							<?php echo $this->session->flashdata('failed'); ?>
						</div>
					<?php endif; ?>
					<div class="card-body">
                        <div class="table-responsive ">
							<table id="example-2" class="table card-table table-striped table-nowrap fontNunito11">
								<thead >
									<tr>
										<th width="7%">No</th>
										<th>No Order</th>							
										<th class="text-center" width="10%">No Meja</th>
										<th class="text-center" width="15%">Tanggal</th>
										<th class="text-center" width="20%">Tot Item</th>
										<th class="text-center" width="20%">Tot Harga</th>
										<th class="text-center" width="20%">Status</th>
										<th class="text-center" width="10%">Action</th>
									</tr>
								</thead>
								<tbody>
										<?php 
											$no = 1;
											if( !empty($pesanan) ) {
												foreach($pesanan as $row)
												{
                                               
										?>								
												<tr>
													<td scope="row"><?= $no++;?></td>
													<td><?= $row['no_order'];?></td>
													<td>
														<?= $row['no_meja'];?>
													</td>		
													<td><?= $row['tanggal_order'];?></td>		
													<td><?= $row['total_item'];?></td>		
													<td class="text-right"><?= $row['total_harga'];?></td>		
													<td class="text-center">
														<?php
															if ($row['status_order']) { ?>
																<span class="badge badge-default" style="background: #42EC53; border-color: #42EC53; border: 1px solid #42EC53; color: #FFF;">ACTIVE</span>
															<?php } else { ?>
																<span class="badge badge-default" style="background: #FD0D0D; border-color: #FD0D0D; border: 1px solid #FD0D0D; color: #FFF;">NOT ACTIVE</span>
															<?php }
															
														?>
													</td>
													<td class="text-center">
														<a href="<?= base_url();?>pesanan/editPesanan/<?= $row['no_order']; ?>"><i class="si si-pencil" style="color: #7D90B2; font-size: 16px;"></i></a>&nbsp;&nbsp;&nbsp;
														<a href="#" data-toggle="modal" data-target="#deletePesanan<?= $row['no_order']; ?>"><i class="si si-trash" style="color: #7D90B2; font-size: 16px;"></i></a>&nbsp;&nbsp;&nbsp;
													</td>
												</tr>
										<?php
												}
											}
										?>									
								</tbody>
							</table>
						</div>
					</div>
					<!-- table-wrapper -->
				</div>
				<!-- section-wrapper -->
			</div>
		</div>
	</div>

<?php $this->load->view('temp/footer'); ?>
<?php $this->load->view('pesanan/modalPesanan'); ?>