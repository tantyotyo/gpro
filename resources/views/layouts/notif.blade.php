@if(session('input'))
<div class="alert alert-success alert-dismissible mr-2 ml-2">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <h5><i class="icon fas fa-check"></i> Selamat!</h5>
    Data berhasil ditambahkan.
</div>
@elseif(session('update'))
<div class="alert alert-success alert-dismissible mr-2 ml-2">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <h5><i class="icon fas fa-check"></i> Selamat!</h5>
    Data berhasil diubah.
</div>
@elseif(session('delete'))
<div class="alert alert-danger alert-dismissible mr-2 ml-2">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <h5><i class="icon fas fa-ban"></i> Upssss!</h5>
    Data berhasil dihapus, data yang telah dihapus tidak akan dapat kembali!!!.
</div>
@elseif(session('kosong'))
<div class="alert alert-warning alert-dismissible mr-2 ml-2">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <h5><i class="icon fas fa-exclamation-triangle"></i> Perhatian!</h5>
    Data tidak ditemukan.
</div>
@endif