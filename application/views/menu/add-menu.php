		<!--Page Header-->
		<div class="page-header d-flex bd-highlight" style="margin-top: 35px;">
			<div class="flex-grow-1 bd-highlight">
				<ol class="breadcrumb">
					<li class="breadcrumb-item active" aria-current="page">
						<h4 class="page-title"><i class="si si-notebook mr-1"></i>Add Menu</h4>
					</li>
				</ol>
			</div>
		</div>
		<!--page header-->

		<div class="row">
			<div class="col-md-12 col-lg-12">
				<div class="card">
					<div class="card-body">
                        <?php 
                            if(validation_errors() != false)
                            {
                                ?>
                                <div class="alert alert-danger" role="alert">
                                    <?php echo validation_errors(); ?>
                                </div>
                                <?php
                            }
                        ?>
                        <form action="<?= base_url()?>menu/actSave" method="post">
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="namaBarang" class="form-control-label">Nama Barang</label>
                                        <input type="text" class="form-control" name="namaBarang" id="namaBarang" placeholder="Nama Barang">
                                    </div>
                                    <div class="form-group">
                                        <label for="harga" class="form-control-label">Harga</label>
                                        <input type="number" class="form-control" name="harga" id="harga" placeholder="Harga Barang">
                                    </div>
                                    <div class="form-group">
                                        <label for="harga" class="form-control-label">Deskripsi</label>
                                        <textarea name="deskripsi" id="deskripsi" class="form-control" id="deskripsi"></textarea>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="kategori" class="form-control-label">Kategori</label>
                                        <select class="form-control"  name="kategori" id="kategori" data-placeholder="- Pilih Kategori -">
                                            <option label="- Select Product -"></option>
                                            <option value="1">Makanan</option>
                                            <option value="2">Minuman</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="statusBarang" class="form-control-label">Status Barang</label>
                                        <select class="form-control" 
                                        name="statusBarang" id="statusBarang" data-placeholder="- Pilih Status -">
                                        <!-- true = 0, false = 1 -->
                                            <option label="- Select Product -"></option>
                                            <option value="1">Ready</option>
                                            <option value="0">Not Ready</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-warning">Add</button>
				            <a type="button" class="btn btn-outline-signup" href="<?= base_url();?>Menu">Cancel</a>
                        </form>
					</div>
					<!-- table-wrapper -->
				</div>
				<!-- section-wrapper -->
			</div>
		</div>
	</div>

<?php $this->load->view('temp/footer'); ?>