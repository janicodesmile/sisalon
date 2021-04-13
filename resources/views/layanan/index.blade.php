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
		<a href="layanan/tambah" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
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
						<th>Jumlah Layanan</th>
                        <th>Daftar Layanan</th>
						<th>Tindakan</th>
					</tr>
				</thead>
				<tbody>
					@foreach($join as $key)
					<tr>
						<td> {{ $loop->iteration }} </td>
						<td> {{$key->nama_salon}} </td>
						<td> {{$key->jmlh_layanan}} </td>
                        <td>
                            @foreach($data as $d)
                                @if($d->id_salon == $key->id_salon)
                                    - {{$d->nama_layanan}} : {{$d->harga}}<br>
                                @endif
                            @endforeach
                        </td>
						<td>
							<center>
								<a href="#" data-id="{{ $key->id_salon }}" data-toggle="modal" data-target="#modalTambah"
									class="btn btn-sm btn-warning btn-tambah" title="Tambah">
									Tambah layanan {{$key->nama_salon}}
								</a>
								<a href="\layanan\{{$key->id_salon}}\info" class="btn btn-sm btn-info">Info</a>
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
				<h5 class="modal-title" id="exampleModalLabel">Tambah Layanan</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>

			<form action="{{ url('/layanan/tambah') }}" method="post">
				@csrf
				<div class="modal-body">
						<div class="modal-body">
							<div class="form-group">
								<label>Nama Layanan</label>
								<input class="form-control" name="nama_layanan" placeholder="Nama Layanan">
							</div>
							<div class="form-group">
								<label>Harga</label>
								<input type="number" class="form-control" name="harga" placeholder="Harga">
							</div>
                            <div class="form-group">
								<label>Selects</label>
								<select class="form-control" name="id_salon">
                                    <option disabled selected>Pilih salon</option>
                                    @foreach($salon as $sal)
									<option value="{{$sal->id_salon}}">{{$sal->nama_salon}}</option>
                                    @endforeach
								</select>
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

	<!-- Modal Tambah Layanan -->

	<div class="modal fade" id="modalTambah" tabindex="-1" role="dialog" aria-labelledby="modalEdit" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="modalEdit">Tambah Layanan</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>

                <form action="{{ url('/layanan/tambah') }}" method="post">
				@csrf
				<div class="modal-body">

				</div>
						<div class="modal-footer">
							<button type="submit" class="btn btn-primary">Tambah</button>
							<button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
						</div>
					</form>
			</div>
		</div>
	</div>
	@endsection

@section('js')

<script>

	$('.btn-tambah').on('click', function () {

		let id = $(this).data('id')
		console.log(id)
		$.ajax({
			url: `/layanan/${id}/tam`,
			method: "GET",
			success: function (data) {
				$('#modalTambah').find('.modal-body').html(data)
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
