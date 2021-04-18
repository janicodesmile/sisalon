@extends('template/temp')

@section('header')
<div class="row">
	<ol class="breadcrumb">
		<li><a href="#">
				<em class="fa fa-home"></em>
			</a></li>
		<li class="active">{{$judul}}</li>
	</ol>
</div>
<!--/.row-->

<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">{{$judul}}</h1>
	</div>
</div>
<!--/.row-->

@endsection


@section('konten')

<div class="panel panel-default">
	<div class="panel-heading">
		<a href="pelanggan/tambah" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
			<i class="fa fa-plus">
				Tambah Data
			</i>
		</a>
	</div>
	<div class="panel-body">
	<div class="col-md-12">
	@if(session('pesan'))
                      <div class="col-lg-6 alert alert-success">
                         {{ session('pesan') }}
                      </div>
	@endif
	</div>
		<div class="col-md-12">

			<table id="example1" class="table table-bordered table-striped">
				<thead>
					<tr>
						<th>No</th>
						<th>Nama Salon</th>
						<th>Jumlah Paket</th>
						<th width="400">Daftar Paket</th>
						<th>Tindakan</th>
					</tr>
				</thead>
				<tbody>
					@foreach($join as $key)
					<tr>
						<td> {{ $loop->iteration }} </td>
						<td> {{$key->nama_salon}} </td>
						<td> {{$key->jmlh_paket}} </td>
						<td>
								<table>
									@foreach($data as $d)
                                		@if($d->id_salon == $key->id_salon)
                                    		<tr>
                                    			<form method="post" action="/paket/{{$d->id}}">
												@method('delete')
												@csrf
												<td width="250">{{$d->jenis_paket}}</td>
												<td width="50">
													<a href="#" data-id="{{ $d->id }}" data-toggle="modal" data-target="#modalEdit" class="btn-edit" title="ubah">Ubah</a>
												</td>
												<td width="50">
													<button class="btn btn-sm" onclick="return confirm(`Yakin ingin menghapus data {{$d->jenis_paket}} dari {{$key->nama_salon}}?`)"> Hapus</button>
												</td>
											</form>
											</tr>
                                		@endif
                            		@endforeach
								</table>
						</td>
						<td>
							<center>
								<a href="#" data-id="{{ $key->id_salon }}" data-nama="{{ $key->nama_salon }}" data-toggle="modal" data-target="#modalInfo"
									class="btn btn-sm btn-info" title="Info">
									 Info
								</a>
							</center>
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>



		</div>
	</div>
</div><!-- /.panel-->
@endsection

@section('modal')
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
	aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Tambah Paket</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>

			<form action="{{ url('/paket/tambah') }}" method="post" enctype="multipart/form-data">
				@csrf
				<div class="modal-body">
						<div class="modal-body">
							<div class="form-group">
								<label>Salon</label>
								<select class="form-control" name="id_salon">
									<option disabled selected hidden>Pilih salon</option>
	                                @foreach($salon as $sal)
										<option value="{{$sal->id_salon}}">{{$sal->nama_salon}}</option>
	                                @endforeach
								</select>
							</div>
							<div class="form-group">
								<label>Jenis Paket</label>
								<input class="form-control" name="jenis_paket" placeholder="Jenis paket" required>
							</div>
							<div class="form-group">
								<label>Keterangan</label>
								<textarea class="form-control" name="keterangan" rows="3" placeholder="masukkan keterangan" required></textarea>
							</div>
							<div class="form-group">
								<label>harga</label>
								<input class="form-control" type="number" name="harga" type="number" placeholder="100000" required>
							</div>
							<div class="form-group">
								<label>Gambar</label>
								<input class="form-control" type="file" name="gambar" placeholder="gambar" required>
							</div>
						</div>
						<div class="modal-footer">
							<button type="submit" class="btn btn-primary">Tambah</button>
							<button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
						</div>
					</form>
				</div>
		</div>
	</div>
</div>

	<!-- Modal info -->

	<div class="modal fade" id="modalInfo" tabindex="-1" role="dialog" aria-labelledby="modalInfo" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">

				</div>


					<div class="modal-body">


					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					</div>
			</div>
		</div>
	</div>

		<!-- Modal edit -->

	<div class="modal fade" id="modalEdit" tabindex="-1" role="dialog" aria-labelledby="modalEdit" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Ubah Data Paket</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>

				<div class="modal-body">

				</div>
			</div>
		</div>
	</div>
	@endsection

@section('js')

<script>
	$('.btn-info').on('click', function () {

		let id = $(this).data('id')
		let nama = $(this).data('nama')
		console.log(id)
		$.ajax({
			url: `/paket/${id}/info`,
			method: "GET",
			success: function (data) {
				$('#modalInfo').find('.modal-body').html(data)
				$('#modalInfo').find('.modal-header').html(`<h5 class="modal-title" id="modalInfo">Informasi Anggota di salon ${nama}</h5>`)
			},
			error: function (error) {
				console.log(error)
			}
		})
	})

	$('.btn-edit').on('click', function () {

		let id = $(this).data('id')
		console.log(id)
		$.ajax({
			url: `/paket/${id}/edit`,
			method: "GET",
			success: function (data) {
				$('#modalEdit').find('.modal-body').html(data)
			},
			error: function (error) {
				console.log(error)
			}
		})
	})

    $('.btn-update').on('click',function(){

    let id = $('#form-edit').find('#id').val()
    let data = $('#form-edit').serialize()
    console.log(data)
    $.ajax({
      url:`/paket/${id}`,
      method:"PUT",
      data: data,
      success: function(data){
        console.log(data)
      },
      error:function(error){
        console.log(error)
      }
    })
  })
</script>

@endsection
