@extends('adminlte::page')

@section('title', 'Products')
@section('content_header')
<h1 class="text-center text-bold">BARANG</h1>
@stop

@section('content')
<div class="container">
 <div class="row justify-content-center">
  <div class="col-md-12">
   <div class="card">
    <div class="card-header">
     {{ __('Product Setting') }}

    </div>
    <div class="card-body">
     <button class="btn btn-primary float-left mr-3" data-toggle="modal" data-target="#tambahData"><i class="fa fa-plus"></i> Add Data</button>

     <div class="btn-group mb-5" role="group" aria-label="Basis Example">

     </div>
     <table id="table-data" class="table table-borderer display nowrap" style="width:100%">
      <thead>
       <tr>
        <th>NO</th>
        <th>FOTO</th>
        <th>NAMA</th>
        <th>KATEGORI</th>
        <th>MEREK</th>
        <th>HARGA</th>
        <th>STOK</th>
        <th>ACTION</th>
       </tr>
      </thead>
      <tbody>
       @php $no=1; @endphp
       @foreach($barang as $key)
       <tr>
        <td>{{$no++}}</td>
        <td>
         @if($key->photo !== null)
         <img src="{{ asset('storage/photo_barang/'.$key->photo) }}" width="100px" />
         @else
         [Picture Not Found]
         @endif
        </td>
        <td>{{$key->name}}</td>
        <td>{{$key->categories_id}}</td>
        <td>{{$key->brands_id}}</td>
        <td>{{$key->harga}}</td>
        <td>{{$key->stok}}</td>
        <td>
         <div class="btn-group" role="group" aria-label="Basic example">
          <button type="button" id="btn-edit-buku" class="btn" data-toggle="modal" data-target="#editBukuModal" data-id="{{ $key->id }}"><i class="fa fa-edit"></i></button>
          <button type="button" id="btn-delete-buku" class="btn" data-toggle="modal" data-target="#deleteBukuModal" data-id="{{ $key->id }}" data-photo="{{ $key->photo }}"><i class="fa fa-trash"></i></button>
         </div>
        </td>
       </tr>
       @endforeach
      </tbody>
     </table>
    </div>
   </div>
  </div>
 </div>
</div>
<div class="modal fade" id="tambahData" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
 <div class="modal-dialog">
  <div class="modal-content">
   <div class="modal-header">
    <h5 class="modal-title" id="exampleModalLabel">Tambah Data Barang</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
     <span aria-hidden="true">&times;</span>
    </button>
   </div>
   <div class="modal-body col-md-12">
    <form method="post" action="{{ route('admin.product.submit') }}" enctype="multipart/form-data">
     @csrf
     <div class="form-group">
      <label for="judul">Nama</label>
      <input type="text" class="form-control" name="judul" id="judul" required />
     </div>
     <div class="form-group">
      <label for="penulis">Jumlah</label>
      <input type="text" class="form-control" name="penulis" id="penulis" required />
     </div>
     <div class="form-group">
      <label for="tahun">Harga</label>
      <div class="input-group mb-3">
       <div class="input-group-prepend">
        <span class="input-group-text">Rp.</span>
       </div>
       <input type="text" class="form-control" aria-label="Amount (to the nearest dollar)">

      </div>
     </div>
     <div class="form-group">
      <label for="penerbit">Kategori</label>
      <!-- <input type="text" class="form-control" name="penerbit" id="penerbit" required /> -->
      <div class="input-group">
       <input type="text" class="form-control" aria-label="Text input with dropdown button">
       <div class="input-group-append">
        
      </div>
     </div>
     <div class="form-group">
      <label for="penerbit">Merek</label>
      <!-- <input type="text" class="form-control" name="penerbit" id="penerbit" required /> -->
      <div class="input-group">
       <input type="text" class="form-control" aria-label="Text input with dropdown button">
       <div class="input-group-append">
       </div>
      </div>
     </div>
     <div class="form-group">
      <label for="cover">Photo Barang</label>
      <input type="file" class="form-control" name="cover" id="cover" />
     </div>

   </div>
   <div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
    <button type="submit" class="btn btn-primary">Add</button>
    </form>
   </div>
  </div>
 </div>
</div>


@stop
@section('js')
<script>
 $(function() {
  $("#datepicker").datepicker({
   format: "yyyy", // Notice the Extra space at the beginning
   viewMode: "years",
   minViewMode: "years"
  });
  $(document).on('click', '#btn-delete-buku', function() {
   let id = $(this).data('id');
   let cover = $(this).data('cover');
   $('#delete-id').val(id);
   $('#delete-old-cover').val(cover);
   console.log("hallo");
  });



  $(document).on('click', '#btn-edit-buku', function() {
   let id = $(this).data('id');

   $('#image-area').empty();

   $.ajax({
    type: "get",
    url: baseurl + '/admin/ajaxadmin/dataBuku/' + id,
    dataType: 'json',
    success: function(res) {
     $('#edit-judul').val(res.judul);
     $('#edit-penerbit').val(res.penerbit);
     $('#edit-penulis').val(res.penulis);
     $('#edit-tahun').val(res.tahun);
     $('#edit-id').val(res.id);
     $('#edit-old-cover').val(res.cover);

     if (res.cover !== null) {
      $('#image-area').append(
       "<img src='" + baseurl + "/storage/cover_buku/" + res.cover + "' width='200px'/>"
      );
     } else {
      $('#image-area').append('[Gambar tidak tersedia]');
     }
    },
   });
  });

 });
</script>
@stop
@section('js')
<script>

</script>
@stop