<table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Pelanggan</th>
                        <th>email</th>
                        <th>alamat</th>
                        <th>No Hp</th>
                    </tr>
                </thead>
        @foreach($data as $key)
			<tr>
                <td> {{ $loop->iteration }} </td>
                <td> {{$key->nama_pelanggan}} </td>
                <td> {{$key->email}} </td>
                <td>  {{$key->alamat}}</td>
                <td> {{$key->no_hp}} </td>
            </tr>
            
            @endforeach
            </table>