<form action="#" id="form-edit">
@csrf
<input type="hidden" id="id" value="{{$data->id_pelanggan}}">
<div class="form-group">
	<label>Nama Pelanggan</label>
	<input class="form-control" name="nama_pelanggan" value="{{$data->nama_pelanggan}}" required>
</div>
<div class="form-group">
	<label>email</label>
	<input type="email" class="form-control" name="email" value="{{$data->email}}">
</div>
<div class="form-group">
	<label>Alamat</label>
	<textarea class="form-control" rows="3" name="alamat" required >{{$data->alamat}}</textarea>
</div>
<div class="form-group">
	<label>No HP</label>
	<input class="form-control" name="no_hp" type="number" placeholder="08xxxx" value="{{$data->no_hp}}" required>
</div>
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

</form>