<table border="1">
<tr>
        @foreach($data as $key)
			<tr>
                <td rowspan="4"><img width="200px" height="300px" src="{{url('/img/'.$key->gambar)}}"></td>
                <td>{{$key->jenis_paket}}</td>
            </tr>
            <tr>
                <td>{{$key->keterangan}}</td>
            </tr>
            <tr>
                <td>{{$key->harga}}</td>
            </tr>
            <tr>
                <td>{{$key->nama_salon}}</td>
            </tr>
            
            @endforeach
</table>