<div class="card">
  <div class="card-header">
    <h4>Unvalidated Data</h4>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table" id="table-2">
        <thead>
          <tr>
            <th>#</th>
            <th colspan="2">Validate</th>
            <th>Prediction</th>
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
          @foreach($predicted_datas as $ud)
          <tr>
            <td>{{ $loop->iteration }}</td>
            <td>
              <form action=" {{ route('prediction-valid') }} " method="post">
                @csrf
                <input type="hidden" name="id" value="{{ $ud->id }}">
                <input type="hidden" name="status" value="TEPAT">
                <button type="submit" class="btn btn-small btn-info">Tepat</button>
              </form>
            </td>
            <td>
              <form action=" {{ route('prediction-valid') }} " method="post">
                @csrf
                <input type="hidden" name="id" value="{{ $ud->id }}">
                <input type="hidden" name="status" value="TERLAMBAT">
                <button type="submit" class="btn btn-small btn-warning">Terlambat</button>
              </form>
            </td>
            <td>{{ $ud->status_kelulusan }}</td>
            <td>{{ $ud->nama }}</td>
            <td>{{ $ud->jenis_kelamin }}</td>
            <td>{{ $ud->umur }}</td>
            <td>{{ $ud->status_mahasiswa }}</td>
            <td>{{ $ud->status_nikah }}</td>
            <td>{{ $ud->ips1 }}</td>
            <td>{{ $ud->ips2 }}</td>
            <td>{{ $ud->ips3 }}</td>
            <td>{{ $ud->ips4 }}</td>
            <td>{{ $ud->ips5 }}</td>
            <td>{{ $ud->ips6 }}</td>
            <td>{{ $ud->ips7 }}</td>
            <td>{{ $ud->ips8 }}</td>
            <td>{{ $ud->ipk }}</td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
