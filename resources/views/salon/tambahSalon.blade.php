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
		<option value="{{$data->id_salon}}">{{$data->nama_salon}}</option>
	</select>
</div>