		<!--Page Header-->
		<div class="page-header d-flex bd-highlight" style="margin-top: 35px;">
			<div class="flex-grow-1 bd-highlight">
				<ol class="breadcrumb">
					<li class="breadcrumb-item active" aria-current="page">
						<h4 class="page-title"><i class="si si-notebook mr-1"></i>Daftar Menu</h4>
					</li>
				</ol>
				<div class="form-group d-flex align-items-end flex-column bd-highlight">
						<a href="<?= base_url();?>menu/addMenu" class="btn btn-warning"><i class="si si-plus"></i> Add Menu</a>
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
										<th>Nama Barang</th>							
										<th class="text-center" width="20%">Kategori</th>
										<th class="text-center" width="15%">Harga</th>
										<th class="text-center" width="20%">Status</th>
										<th class="text-center" width="10%">Action</th>
									</tr>
								</thead>
								<tbody>
										<?php 
											$no = 1;
											if( !empty($menus) ) {
												foreach($menus as $row)
												{
										?>								
												<tr>
													<th scope="row"><?= $no++;?></th>
													<td><?= $row['nama'];?></td>
													<td>
														<?php echo $row['kategori'] == '1' ? 'Makanan' : 'Minuman' ;?>
													</td>		
													<td class="text-right">Rp. <?= $row['harga'];?></td>		
													<td class="text-center">
														<?php
															if ($row['status']) { ?>
																<span class="badge badge-default" style="background: #42EC53; border-color: #42EC53; border: 1px solid #42EC53; color: #FFF;">READY</span>
															<?php } else { ?>
																<span class="badge badge-default" style="background: #FD0D0D; border-color: #FD0D0D; border: 1px solid #FD0D0D; color: #FFF;">NOT READY</span>
															<?php }
															
														?>
													</td>
													<td class="text-center">
														<a href="<?= base_url();?>Menu/editMenu/<?= $row['id']; ?>"><i class="si si-pencil" style="color: #7D90B2; font-size: 16px;"></i></a>&nbsp;&nbsp;&nbsp;
														<a href="#" data-toggle="modal" data-target="#deleteProduct<?= $row['id'];?>"><i class="si si-trash" style="color: #7D90B2; font-size: 16px;"></i></a>&nbsp;&nbsp;&nbsp;
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
<?php $this->load->view('menu/modalMenu'); ?>