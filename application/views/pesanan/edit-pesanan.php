		<?php 
            $level = $this->session->userdata('level');
            $displayStat = $level == 1 ? 'display:none;' : 'display:block;';
        ?>
        <!--Page Header-->
		<div class="page-header d-flex bd-highlight" style="margin-top: 35px;">
			<div class="flex-grow-1 bd-highlight">
				<ol class="breadcrumb">
					<li class="breadcrumb-item active" aria-current="page">
						<h4 class="page-title"><i class="si si-basket-loaded mr-1"></i>Update Pesanan</h4>
					</li>
				</ol>
			</div>
		</div>
		<!--page header-->

		<div class="row">
			<div class="col-md-12 col-lg-12">
				<div class="card">
					<div class="card-body">
                        <div class="alert alert-danger" id="alertFalse" role="alert" style="display: none;" ><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button></div>
                        <form action="" method="post" id="formData">
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="nomeja" class="form-control-label">No Order</label>
                                        <input type="text" class="form-control" name="noorder" id="noorder" placeholder="No Order" value="<?= $headOrder['no_order']?>" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for="nomeja" class="form-control-label">No Meja</label>
                                        <input type="text" class="form-control" name="nomeja" id="nomeja" placeholder="No Meja" value="<?= $headOrder['no_meja']?>">
                                    </div>
                                    <div class="form-group" style="<?= $displayStat ?>">
                                        <label for="statusPesanan" class="form-control-label">Status Pesanan</label>
                                        <select class="form-control" name="statusPesanan" id="statusPesanan" data-placeholder="- Pilih Status -">
                                            <option label="- Select Product -"></option>
                                            <option value="1" <?php echo ($headOrder['status_order'] == '1'? 'selected' : ''); ?>>Active</option>
                                            <option value="0" <?php echo ($headOrder['status_order'] == '0'? 'selected' : ''); ?>>Not Active</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="totitem" class="form-control-label">Total Item</label>
                                        <input type="text" class="form-control" name="totitemall" id="totitemall" placeholder="Total Item" value="<?= $headOrder['total_item']; ?>" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for="totharga" class="form-control-label">Total Harga</label>
                                        <input type="text" class="form-control" name="tothargaall" id="tothargaall" placeholder="Total Harga" value=
                                        "<?= $headOrder['total_harga']; ?>" readonly>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div id="row-menu">
                                <div class="row">
                                    <div class="col" id="inputMenu">
                                        <div class="form-group">
                                            <label class="form-label"> Pilih Menu</label>
                                            <select class="form-control select2-show-search" name="daftarmenu"  id="daftarmenu" data-placeholder="Choose one (with searchbox)">                                                
                                                <option value=""></option>
                                                <?php 
                                                    if( !empty($daftarMenu) ) {
                                                        foreach($daftarMenu as $menu) :
                                                ?>
                                                    <option value="<?= $menu['id'].' | '. $menu['nama']?>"><?= $menu['nama'] ?></option>
                                                <?php endforeach; 
                                                    }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="qtysat" class="form-control-label">Quantity</label>
                                                    <input type="number" class="form-control" value="0" name="qtysat" id="qty" placeholder="Quantity">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="hargasat" class="form-control-label">Harga/Satuan</label>
                                                    <input type="text" class="form-control" name="hargasat" value="0" id="harga" placeholder="Harga persatuan" readonly>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="totalharga" class="form-control-label">Total Harga</label>
                                            <input type="text" class="form-control" name="totalharga" value="0" id="totalharga" placeholder="Total Harga" readonly>
                                            <input type="hidden" name="flag" value="0" id="flag">
                                            <input type="hidden" name="idDetailOrder" value="0" id="idDetailOrder">
                                        </div>
                                        <button type="button" id="btnAdd" class="btn btn-warning">Submit</button>
                                    </div>
                                    <div class="col">
                                        <div class="table-responsive">
                                            <table class="table card-table table-vcenter table-hover" id="tblTamp">
                                                <thead >
                                                    <tr>
                                                        <th>Nama</th>
                                                        <th>Quantity</th>
                                                        <th>Harga</th>
                                                        <th>Total Harga</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="float-right mt-5">                                        
                                <button type="button" id="btnSimpan" class="btn btn-success">Simpan</button>
                                <a type="button" class="btn btn-outline-signup" href="<?= base_url();?>Pesanan">Batal</a>
                            </div>
                        </form>
					</div>
					<!-- table-wrapper -->
				</div>
				<!-- section-wrapper -->
			</div>
		</div>
	</div>

<?php $this->load->view('temp/footer'); ?>
<?php $this->load->view('pesanan/js/updateOrderMenu'); ?>