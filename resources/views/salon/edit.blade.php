<div class="modal-body">
    <input type="hidden" id="id" value="{{$data->id_salon}}">
	<div class="form-group">
		<label>Nama Salon</label>
		<input class="form-control" name="nama_salon" value="{{$data->nama_salon}}">
	</div>
	<div class="form-group">
		<label>Alamat</label>
		<textarea class="form-control" rows="3" name="alamat">{{$data->alamat}}</textarea>
	</div>
	<div class="form-group">
		<label>Jam Operasional</label>
		<input class="form-control" name="jam_operasional" value="{{$data->jam_operasional}}">
	</div>
</div>