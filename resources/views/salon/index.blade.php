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
		<a href="barang/tambah" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
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
						<th>Alamat</th>
						<th>Jam Operasi</th>
						<th>Tindakan</th>
					</tr>
				</thead>
				<tbody>
					@foreach($data as $key)
					<tr>
						<td> {{ $loop->iteration }} </td>
						<td> {{$key->nama_salon}} </td>
						<td> {{$key->alamat}} </td>
						<td> {{$key->jam_operasional}}</td>
						<td>
							<center>
							<form method="post" action="/salon/{{$key->id_salon}}">
							@method('delete')
							@csrf
								<a href="#" data-id="{{ $key->id_salon }}" data-toggle="modal" data-target="#modalEdit"
									class="btn btn-sm btn-warning btn-edit" title="Edit">
									 Ubah
								</a>
								<button class="btn btn-sm btn-danger"
									onclick="return confirm('Yakin ingin menghapus data?')"> Hapus</button>
								</form>
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
				<h5 class="modal-title" id="exampleModalLabel">Tambah Salon</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>

			<form action="{{ url('/salon/tambah') }}" method="post">
				@csrf
				<div class="modal-body">
						<div class="modal-body">
							<div class="form-group">
								<label>Nama Salon</label>
								<input class="form-control" name="nama_salon" placeholder="Nama Salon">
							</div>
							<div class="form-group">
								<label>Alamat</label>
								<textarea class="form-control" rows="3" name="alamat"
									placeholder="Masukkan alamat"></textarea>
							</div>
							<div class="form-group">
								<label>Jam Operasional</label>
								<input class="form-control" name="jam_operasional" placeholder="ex : 08.00 - 16.00">
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

	<!-- Modal edit -->

	<div class="modal fade" id="modalEdit" tabindex="-1" role="dialog" aria-labelledby="modalEdit" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="modalEdit">Ubah Salon</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>

				<form action="#" id="form-edit">
					@csrf
					<div class="modal-body">

					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
						<button type="button" class="btn btn-primary btn-update">Ubah</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	@endsection

@section('js')

<script>
	$('.btn-edit').on('click', function () {

		let id = $(this).data('id')
		console.log(id)
		$.ajax({
			url: `/salon/${id}/edit`,
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
    $.ajax({
      url:`/salon/${id}`,
      method:"PUT",
      data: data,
      success: function(data){
        $('#modalEdit').modal('hide')
        window.location.assign('/salon')
      },
      error:function(error){
        console.log(error)
      }
    })
  })
</script>

@endsection
