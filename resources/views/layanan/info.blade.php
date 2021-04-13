@extends('template/temp')

@section('header')
<div class="row">
	<ol class="breadcrumb">
		<li><a href="#">
				<em class="fa fa-home"></em>
			</a></li>
		<li class="active">Layanan {{$nama->nama_salon}}</li>
	</ol>
</div>
<!--/.row-->

<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Layanan {{$nama->nama_salon}}</h1>
	</div>
</div>
<!--/.row-->

@endsection


@section('konten')

<div class="row">
        @foreach($data as $data)
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">
                        <form method="post" action="/layanan/{{$data->id_layanan}}">
                          @method('delete')
                          @csrf
                        <button class="btn btn-sm btn-danger "  onclick = "return confirm('Yakin ingin menghapus data?')"> <i class="fa fa-trash"></i> Hapus</button>
                        <a href="#" data-id="{{$data->id_layanan}}" data-toggle="modal" data-target="#modalUbah"
									class="btn btn-sm btn-warning btn-ubah float-right" title="Ubah">
									Ubah layanan 
								</a>
                        </form>
                    </div>
					<div class="panel-body">
						<div class="col-md-12">
							
                        <div class="form-group">
                            <label>Nama Layanan</label>
                            <input class="form-control" name="nama_layanan" value="{{$data->nama_layanan}}" disabled>
                        </div>
                        <div class="form-group">
                            <label>Harga</label>
                            <input type="number" class="form-control" name="harga" value="{{$data->harga}}" disabled>
                        </div>
                        <div class="form-group">
                            <label>Selects</label>
                            <select class="form-control" name="id_salon" disabled>
                                <option value="{{$data->id_salon}}">{{$data->nama_salon}}</option>
                            </select>
                        </div>

						</div>
					</div>
				</div><!-- /.panel-->
			</div>
            
            @endforeach
		</div>

    
@endsection

@section('modal')
<!-- Modal Ubah Layanan -->

<div class="modal fade" id="modalUbah" tabindex="-1" role="dialog" aria-labelledby="modalEdit" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="modalEdit">Ubah Layanan</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>


				<div class="modal-body">

				</div>
						<div class="modal-footer">
							<button type="button"  class="btn btn-primary  btn-update">Ubah</button>
							<button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
						</div>
			</div>
		</div>
	</div>
	@endsection

    @section('js')

    <script>
        $('.btn-ubah').on('click', function () {

        let id = $(this).data('id')
        console.log(id)
        $.ajax({
            url: `/layanan/${id}/ubah`,
            method: "GET",
            success: function (data) {
                $('#modalUbah').find('.modal-body').html(data)
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
        url:`/layanan/${id}`,
        method:"PUT",
        data: data,
        success: function(data){
            $('#modalUbah').modal('hide')
            window.location.assign('/layanan')
        },
        error:function(error){
            console.log(error)
        }
        })
        })
    </script>

    @endsection