$(function(){
// menampilkan form tambah data anggota
	$('.tombolTambahData').on('click', function(){
		const url = $(this).data('url');
		$('.modal-footer button[type=submit]').attr('hidden', 'hidden');
		$('#formModalLabel').html('Tambah Data Anggota');
		$('#nama').val('');
		$('#id').val('');
		$('#ktp').val('');
		$('#alamat').val('');
		$('#email').val('');
		$('.modal-footer button[type=submit]').html('Simpan Data');
		$('#formModalAction').attr('action', url + '/anggota/tambah');
		$('#ktp').removeAttr('readonly', '');
	});


	// menampilkan tombol save
	$('#formModalAction input').on('keyup', function(){
		$('.modal-footer button[type=submit]').removeAttr('hidden', '');
	});
	$('#formModalAction select').on('click', function(){
		$('.modal-footer button[type=submit]').removeAttr('hidden', '');
	});



// Menaampilkan form untuk mengubah data anggota
	$('.tampilModalUbah').on('click', function(){
		const id = $(this).data('id');
		const url = $(this).data('url');
		$('.modal-footer button[type=submit]').attr('hidden', 'hidden');
		$('#ktp').attr('readonly', '');
		$('#formModalLabel').html('Ubah Data Anggota');
		$('#formModalAction').attr('action', url + '/anggota/ubah');
		$('.modal-footer button[type=submit]').html('Ubah Data');
		
		$.ajax({
			url: url + '/anggota/detail',
			data: {id: id},
			method: 'post',
			dataType: 'json',
			success: function(data){
				$('#id').val(data.id);
				$('#nama').val(data.nama);
				$('#ktp').val(data.ktp);
				$('#alamat').val(data.alamat);
				$('#email').val(data.email);
			}
		});
	});



// Menampilkan detail anggota
	$('.tampilModalDetail').on('click', function(){
		const id = $(this).data('id');
		const url = $(this).data('url');
		$.ajax({
			url: url + '/anggota/detail',
			data: {id: id},
			method: 'post',
			dataType: 'json',
			success: function(data){
				$('#imgDetail').attr('src', url + '/img/' + data.gambar);
				$('#imgDetail').attr('alt', data.nama);
				$('#namaDetail').html(data.nama);
				$('#ktpDetail').html(data.ktp);
				$('#emailDetail').html(data.email);
				$('#alamatDetail').html(data.alamat);
			}
		});
	});

// menampilkan alert konfirmasi hapus data
	$('.tampilModalAlert').on('click', function(){
		const id = $(this).data('id');
		const url = $(this).data('url');
		$('#anchorAlertModal').attr('href', url + '/anggota/delete/' + id);
		$('#alertModalLabel').html('Hapus Data Anggota');
		$('#anchorAlertModal').attr('class', 'btn btn-danger');
		$('#anchorAlertModal').html('Delete');
		$('#paragrafBodyModal').html('Yakin data akan di hapus..?');
	});
});
