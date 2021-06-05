<script>
    $(document).ready(function(){
        getDataDetail()
        $("#daftarmenu").on("change", function () {
			var idMenu = $(this).val();
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
            var idDetail = $('#idDetailOrder').val();
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

                if (idDetail != 0) { // update ke DB
                    $.ajax({
                        url: "http://localhost/order-app/api/order/updateDetail",
                        method: "PUT",
                        data: { idDetail: idDetail, idMenu : idMenu, qty : qty, totperitem : totalHarga  },
						ContentType:'application/json',
                        success: function (data) {
                            
                        }
                    });
                }

				$('#'+ flag +' .idMenu').val(idMenu)
				$('#'+ flag +' .namamenu').val(namaMenu)
				$('#'+ flag +' .qtymenu').val(qty)
				$('#'+ flag +' .hargamenu').val(harga)
				$('#'+ flag +' .tothargamenu').val(totalHarga)

			} else { //Untuk Add
				var html = `<tr id="`+ idTr +`">                                                    
							<td>
								<input type="hidden" value="`+ idMenu +`" name="idMenu[]" class="idMenuNew idMenu" readonly style="border: 0; rgba: 0; outline: none;">
								<input type="text" value="`+ namaMenu +`" name="namamenu[]" class="namamenuNew namamenu" readonly style="border: 0; rgba: 0; outline: none;">
							</td>
							<td>
								<input type="text" value="`+ qty +`" name="qty[]" class="qtymenuNew qtymenu" readonly style="border: 0; rgba: 0; outline: none;">
							</td>
							<td>
								<input type="text" value="`+ harga +`" name="harga[]" class="hargamenuNew hargamenu text-right" readonly style="border: 0; rgba: 0; outline: none;">
							</td>
							<td>
								<input type="text" value="`+ totalHarga +`" name="totharga[]" class="tothargamenuNew tothargamenu text-right" readonly style="border: 0; rgba: 0; outline: none;">
							</td>
							<td>
								<button type="button" class="btn btn-icon btn-primary" onClick="editMenu(this, '`+idTr+`', '0')"><i class="si si-pencil"></i></button>&emsp;
								<button type="button" class="btn btn-icon btn-danger" onClick="hapusMenu('`+idTr+`', '0')"><i class="si si-trash"></i></button>
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
			var countTr = $('#tblTamp tbody tr').length;
			// var data = $('#formData').serialize()
			var arrTr = $('#tblTamp tbody tr');
			var arrDetailOrder = [];

			var no_meja = $('#nomeja').val();
			var no_order = $('#noorder').val();
			var stat_order = $('#statusPesanan').val();
			var totalitemall = $('#totitemall').val();	
			var totalhargaall = $('#tothargaall').val();
			
			arrTr.each(function(){
				var idMenu = $(this).find('.idMenuNew').val()
				var qty = $(this).find('.qtymenuNew').val()
				var totalperitem = $(this).find('.tothargamenuNew').val()

				var obj = {
					"id_menu":idMenu,
					"qty":qty,
					"totalperitem":totalperitem,
					"created_by":<?= $this->session->userdata('id');?>
				}
				if(idMenu){
					arrDetailOrder.push(obj)
				}
			});
			
			var data = {
				"no_order":no_order,
				"no_meja":no_meja,
				"status_order":stat_order,
				"total_item":totalitemall,
				"total_harga":totalhargaall,
				"updated": <?= date('Y-m-d');?>,
				"updated_by":<?= $this->session->userdata('id');?>,
				"detailOrder": arrDetailOrder
			};

			if (countTr > 0 && no_meja != '') {				
				$.ajax({
					url: "http://localhost/order-app/api/order/actUpdate",
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

    function getDataDetail()
    {
        // var noorder = $('#noorder').val();
		var url = window.location.pathname;
		var noorder = url.substring(url.lastIndexOf('/') + 1);
        $.ajax({
            url: "http://localhost/order-app/api/order/detailOrder/?noorder="+noorder,
            method: "GET",
            dataType: "json",
            success: function (data) {
				// console.log(data)
                var html = ''
                var i;
                for (i = 0; i < data.length; i++) {
                    html += `
                        <tr id="tr`+i+`">                                                    
							<td>
								<input type="hidden" value="`+ data[i].menu_id +`" class="idMenu" readonly style="border: 0; rgba: 0; outline: none;">
								<input type="text" value="`+ data[i].nama +`" class="namamenu" readonly style="border: 0; rgba: 0; outline: none;">
							</td>
							<td>
								<input type="text" value="`+ data[i].qty +`" class="qtymenu" readonly style="border: 0; rgba: 0; outline: none;">
							</td>
							<td>
								<input type="text" value="`+ data[i].harga +`" class="hargamenu text-right" readonly style="border: 0; rgba: 0; outline: none;">
							</td>
							<td>
								<input type="text" value="`+ data[i].totalperitem +`" class="tothargamenu text-right" readonly style="border: 0; rgba: 0; outline: none;">
							</td>
							<td>
								<button type="button" class="btn btn-icon btn-primary" onClick="editMenu(this, 'tr`+i+`', '`+ data[i].id +`')"><i class="si si-pencil"></i></button>&emsp;
								<button type="button" class="btn btn-icon btn-danger" onClick="hapusMenu('tr`+i+`', '`+ data[i].id +`')"><i class="si si-trash"></i></button>
							</td>
						</tr>
                    `                
                }
                $('#tblTamp tbody').append(html);
            }
        });
    }

    function editMenu(el = null, idTr, idDetail = '0')
	{
		console.log(idDetail)
		if(el)
		{
			var tr= $(el).parent().parent();
			var namaMenu = tr.find('.namamenu').val()
			var idMenu = tr.find('.idMenu').val()
			var qtyMenu = tr.find('.qtymenu').val()
			var hargaMenu = tr.find('.hargamenu').val()
			var tothargaMenu = tr.find('.tothargamenu').val()
			console.log(idMenu+ ' | '+namaMenu)
            
			$('#inputMenu #daftarmenu').val(idMenu+ ' | '+namaMenu)
			$('#inputMenu #select2-daftarmenu-container').text(namaMenu)
			$('#inputMenu #qty').val(qtyMenu)
			$('#inputMenu #harga').val(hargaMenu)
			$('#inputMenu #totalharga').val(tothargaMenu)
			$('#inputMenu #flag').val(idTr)
            $('#inputMenu #idDetailOrder').val(idDetail)
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
    
    function hapusMenu(idTr, idDetail = '0'){
        if (idDetail != 0) {
            $.ajax({
                url: "http://localhost/order-app/api/order/deleteDetail",
                method: "POST",
                data: { idDetail: idDetail },
                dataType: "json",
                success: function (data) {
                    $('#'+idTr).remove()
		            hitungTotal()
                }
            });
        }else{
            $('#'+idTr).remove()
            hitungTotal()
        }
        
	}
</script>