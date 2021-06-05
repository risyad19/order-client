<script>
	$(document).ready(function(){
		
		$("#daftarmenu").on("change", function () {
			var menu = $(this).val();
			var idMenu = menu.split(' | ')[0];
			var harga;
			var qty = $('#qty').val();
			$.ajax({
				url: "<?= base_url('pesanan/getDetailMenu');?>",
				method: "POST",
				data: { idMenu: idMenu },
				dataType: "json",
				success: function (data) {
					harga = data.harga;
					$('#harga').val(harga);
					var totalHarga = qty * harga;
					$('#totalharga').val(totalHarga);
				}
			});
	
		});
	
		$("#qty").on("keyup", function () {
			var qty = $(this).val();
			var harga = $('#harga').val();
	
			var totalHarga = qty * harga;
			$('#totalharga').val(totalHarga);
		});
	
		$("#btnAdd").on('click', function(){
			var flag = $('#flag').val();
			var menu = $('#daftarmenu').val();
			var idMenu = menu.split(' | ')[0];
			var namaMenu = menu.split(' | ')[1];
			var harga = $('#harga').val();
			var qty = $('#qty').val();
			var totalHarga = $('#totalharga').val();
			var idTr = $('#tblTamp tbody tr').length;
				idTr = parseInt(idTr)+1
			var lastTr = $('#tblTamp tbody tr:last-child').attr('id');
				lastTr = lastTr ? parseInt(lastTr.substring(2))+1 : 0;
				idTr = idTr == 0 ? "tr"+idTr : "tr"+lastTr;			

			if (flag != 0) { //Untuk Edit
				$('#'+ flag +' .idMenu').val(idMenu)
				$('#'+ flag +' .namamenu').val(namaMenu)
				$('#'+ flag +' .qtymenu').val(qty)
				$('#'+ flag +' .hargamenu').val(harga)
				$('#'+ flag +' .tothargamenu').val(totalHarga)
			} else { //Untuk Add
				var html = `<tr id="`+ idTr +`">                                                    
							<td>
								<input type="hidden" value="`+ idMenu +`" name="idMenu[]" class="idMenu" readonly style="border: 0; rgba: 0; outline: none;">
								<input type="text" value="`+ namaMenu +`" name="namamenu[]" class="namamenu" readonly style="border: 0; rgba: 0; outline: none;">
							</td>
							<td>
								<input type="text" value="`+ qty +`" name="qty[]" class="qtymenu" readonly style="border: 0; rgba: 0; outline: none;">
							</td>
							<td>
								<input type="text" value="`+ harga +`" name="harga[]" class="hargamenu text-right" readonly style="border: 0; rgba: 0; outline: none;">
							</td>
							<td>
								<input type="text" value="`+ totalHarga +`" name="totharga[]" class="tothargamenu text-right" readonly style="border: 0; rgba: 0; outline: none;">
							</td>
							<td>
								<button type="button" class="btn btn-icon btn-primary" onClick="editMenu(this, '`+idTr+`')"><i class="si si-pencil"></i></button>&emsp;
								<button type="button" class="btn btn-icon btn-danger" onClick="hapusMenu('`+idTr+`')"><i class="si si-trash"></i></button>
							</td>
						</tr>`;
			}

			$('#tblTamp tbody').append(html);

			$('#inputMenu input').val(0);
			$('#inputMenu #select2-daftarmenu-container').text('')
			$('#inputMenu #daftarmenu').val('')
			hitungTotal()
		});

		$('#btnSimpan').on('click', function(){
			var no_meja = $('#nomeja').val();
			var countTr = $('#tblTamp tbody tr').length;
			var arrTr = $('#tblTamp tbody tr');
			var arrDetailOrder = [];

			var no_meja = $('#nomeja').val()
			var totalitemall = $('#totitemall').val()		
			var totalhargaall = $('#tothargaall').val()
			
			arrTr.each(function(){
				var idMenu = $(this).find('.idMenu').val()
				var qty = $(this).find('.qtymenu').val()
				var totalperitem = $(this).find('.tothargamenu').val()

				var obj = {
					"id_menu":idMenu,
					"qty":qty,
					"totalperitem":totalperitem,
					"created_by":<?= $this->session->userdata('id');?>
				}

				arrDetailOrder.push(obj)
			});

			var data = {

				"no_meja":no_meja,
				"tanggal_order":<?= date('Y-m-d')?>,
				"total_item":totalitemall,
				"total_harga":totalhargaall,
				"created_by":<?= $this->session->userdata('id');?>,
				"detailOrder": arrDetailOrder
			};
			
			if (countTr > 0 && no_meja != '') {				
				$.ajax({
					url: "http://localhost/order-app/api/order/actAdd",
					method: "POST",
					data: data,
					ContentType:'application/json',
					success: function (data) {
						if(data)
						{
							window.location.href = "<?= base_url()?>pesanan";
						}else{
							$('#alertFalse').show();
							$('#alertFalse').text('Gagal simpan, cek kembali data anda.');
						}
					}
				});
			} else {
				alert('Cek kembali form anda')
			}
		})
	})

	
	function editMenu(el = null, idTr)
	{
		console.log(idTr)
		if(el)
		{
			var tr= $(el).parent().parent();
			var namaMenu = tr.find('.namamenu').val()
			var idMenu = tr.find('.idMenu').val()
			var qtyMenu = tr.find('.qtymenu').val()
			var hargaMenu = tr.find('.hargamenu').val()
			var tothargaMenu = tr.find('.tothargamenu').val()
			
			$('#inputMenu #daftarmenu').val(idMenu+ ' | '+namaMenu)
			$('#inputMenu #select2-daftarmenu-container').text(namaMenu)
			$('#inputMenu #qty').val(qtyMenu)
			$('#inputMenu #harga').val(hargaMenu)
			$('#inputMenu #totalharga').val(tothargaMenu)
			$('#inputMenu #flag').val(idTr)
		}
	}

	function hitungTotal()
	{
		var totalItem = 0;
		var totalHarga = 0;
		var tableMenu = $('#tblTamp tbody tr');

		tableMenu.each(function() {
			var qtyMenu = $(this).find(".qtymenu").val();
				totalItem += parseInt(qtyMenu)
			
			var tothargaMenu = $(this).find(".tothargamenu").val();
				totalHarga += parseInt(tothargaMenu)
		});

		$('#totitemall').val(totalItem)
		$('#tothargaall').val(totalHarga)
	}

	function hapusMenu(idTr){
		$('#'+idTr).remove()
		hitungTotal()
	}

</script>
