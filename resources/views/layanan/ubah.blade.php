<form action="#" id="form-edit">
@csrf
<input type="hidden" value="{{$data->id_layanan}}" id="id">
<div class="form-group">
	<label>Nama Layanan</label>
	<input class="form-control" name="nama_layanan" value="{{$data->nama_layanan}}">
</div>
<div class="form-group">
	<label>Harga</label>
	<input type="number" class="form-control" name="harga" value="{{$data->harga}}">
</div>
<div class="form-group">
	<label>Selects</label>
	<select class="form-control" name="id_salon">
        @foreach($salon as $salon)
            @if($salon->id_salon == $data->id_salon)
		        <option selected value="{{$salon->id_salon}}">{{$salon->nama_salon}}</option>
            @else
                <option value="{{$salon->id_salon}}">{{$salon->nama_salon}}</option>
            @endif
        @endforeach
	</select>
</div>

</form>