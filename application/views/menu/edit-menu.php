		<!--Page Header-->
		<div class="page-header d-flex bd-highlight" style="margin-top: 35px;">
			<div class="flex-grow-1 bd-highlight">
				<ol class="breadcrumb">
					<li class="breadcrumb-item active" aria-current="page">
						<h4 class="page-title"><i class="si si-notebook mr-1"></i>Update Menu</h4>
					</li>
				</ol>
				<!-- <div class="form-group d-flex align-items-end flex-column bd-highlight">
						<button type="button" href="<?= base_url();?>menu/addMenu" class="btn btn-warning"><i class="si si-plus"></i> Add Menu</button>
				</div>	 -->
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
                        <form action="" method="post">
                            <input type="hidden" name="id" value="<?= $menus['id']?>" />
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="namaBarang" class="form-control-label">Nama Barang</label>
                                        <input type="text" class="form-control" value="<?= $menus['nama']?>" name="namaBarang" id="namaBarang" placeholder="Nama Barang">
                                    </div>
                                    <div class="form-group">
                                        <label for="harga" class="form-control-label">Harga</label>
                                        <input type="number" class="form-control" name="harga" value="<?= $menus['harga']?>" id="harga" placeholder="Harga Barang">
                                    </div>
                                    <div class="form-group">
                                        <label for="harga" class="form-control-label">Deskripsi</label>
                                        <textarea name="deskripsi" id="deskripsi" class="form-control" ><?= $menus['deskripsi']?></textarea>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="recipient-name" class="form-control-label">Kategori</label>
                                        <select class="form-control" name="kategori" data-placeholder="- Pilih Kategori -">
                                            <option label="- Select Product -"></option>
                                            <option value="1" <?php echo ($menus['kategori'] == '1'? 'selected' : ''); ?>>Makanan</option>
                                            <option value="2" <?php echo ($menus['kategori'] == '2'? 'selected' : ''); ?>>Minuman</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="recipient-name" class="form-control-label">Status Barang</label>
                                        <select class="form-control" name="statusBarang" data-placeholder="- Pilih Status -">
                                            <option label="- Select Product -"></option>
                                            <option value="1" <?php echo ($menus['status'] == '1'? 'selected' : ''); ?>>Ready</option>
                                            <option value="0" <?php echo ($menus['status'] == '0'? 'selected' : ''); ?>>Not Ready</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <input class="btn btn-warning" type="submit" name="btn" value="Save" />
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