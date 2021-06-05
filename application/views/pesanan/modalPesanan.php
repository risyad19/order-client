<!-- START DELETE -->
<?php
	if( !empty($pesanan) ) {
		foreach($pesanan as $row)
		{
?>
<div class="modal fade" id="deletePesanan<?= $row['no_order']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<form method="post" action="<?= base_url()?>pesanan/hapusPesanan">
				<div class="modal-body text-center">
					<span class="fe fe-alert-octagon" style="font-size: 90px; color: #FF9D0A;"></span><br>
					<p>Apakah anda yakin, menghapus data ini?</p>
				</div>
				<div class="modal-footer" style="padding-left: 30%;">
					<input type="hidden" name="no_order" value="<?= $row['no_order']?>">
					<button type="submit" class="btn btn-danger">Delete</button>
					<button type="button" class="btn btn-outline-signup" data-dismiss="modal">Cancel</button>
				</div>
			</form>
		</div>
	</div>
</div>
<?php
		}
	}
?>
<!-- END DELETE