<div class="card">
  <div class="card-header">
    <h4>Validated Data</h4>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table" id="table-1">
        <thead>
          <tr>
            <th>#</th>
            <th>Status Kelulusan</th>
            <th>Nama</th>
            <th>Jenis Kelamin</th>
            <th>Umur</th>
            <th>Status Mahasiswa</th>
            <th>Status Nikah</th>
            <th>IP1</th>
            <th>IP2</th>
            <th>IP3</th>
            <th>IP4</th>
            <th>IP5</th>
            <th>IP6</th>
            <th>IP7</th>
            <th>IP8</th>
            <th>IPK</th>
          </tr>
        </thead>
        <tbody>
          @foreach($data['validated'] as $pd)
          <tr>
            <td>{{ $loop->iteration }}</td>
            <td>
              @if($pd->status_kelulusan == "TEPAT")
              <span class="badge badge-info">{{$pd->status_kelulusan}}</span>
              @else
              <span class="badge badge-warning">{{$pd->status_kelulusan}}</span>
              @endif
            </td>
            <td>{{ $pd->nama }}</td>
            <td>{{ $pd->jenis_kelamin }}</td>
            <td>{{ $pd->umur }}</td>
            <td>{{ $pd->status_mahasiswa }}</td>
            <td>{{ $pd->status_nikah }}</td>
            <td>{{ $pd->ips1 }}</td>
            <td>{{ $pd->ips2 }}</td>
            <td>{{ $pd->ips3 }}</td>
            <td>{{ $pd->ips4 }}</td>
            <td>{{ $pd->ips5 }}</td>
            <td>{{ $pd->ips6 }}</td>
            <td>{{ $pd->ips7 }}</td>
            <td>{{ $pd->ips8 }}</td>
            <td>{{ $pd->ipk }}</td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
