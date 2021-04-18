<form action="{{url('/paket/'.$data->id)}}" method="post" enctype="multipart/form-data">
	@method('put')
	@csrf
				<div class="modal-body">
						<div class="modal-body">
							<div class="form-group">
								<label>Salon</label>
								<select class="form-control" name="id_salon">
									<option disabled selected>Pilih salon</option>
									@foreach($salon as $sal)
									@if($sal->id_salon == $data->id_salon)
										<option value="{{$sal->id_salon}}" selected>{{$sal->nama_salon}}</option>
									@else
										<option value="{{$sal->id_salon}}">{{$sal->nama_salon}}</option>
									@endif
									@endforeach
								</select>
							</div>
							<div class="form-group">
								<label>Jenis Paket</label>
								<input class="form-control" name="jenis_paket" value="{{$data->jenis_paket}}" required>
							</div>
							<div class="form-group">
								<label>Keterangan</label>
								<textarea class="form-control" name="keterangan" rows="3"  required>{{$data->keterangan}}</textarea>
							</div>
							<div class="form-group">
								<label>harga</label>
								<input class="form-control" type="number" name="harga" type="number"  value="{{$data->harga}}" required>
							</div>
							<div class="form-group">
								<label>Gambar</label>
								<input class="form-control" type="file" name="gambar" required>
							</div>
							<div class="form-group">
								<img src="{{url('/img/'.$data->gambar)}}" height="10%" width="50%" alt="">
							</div>
						</div>
						<div class="modal-footer">
							<button type="submit" class="btn btn-warning">Ubah</button>
							<button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
						
						</div>
					</form>