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
            <th>Prediction</th>
            <th>Nama</th>
            <th>Jenis Kelamin</th>
            <th>Umur</th>
            <th>Status Mahasiswa</th>
            <th>Status Nikah</th>
            <th>IPS 1</th>
            <th>IPS 2</th>
            <th>IPS 3</th>
            <th>IPS 4</th>
            <th>IPS 5</th>
            <th>IPS 6</th>
            <th>IPS 7</th>
            <th>IPS 8</th>
            <th>IPK</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          @foreach($predicted_datas as $ud)
          <tr>
            <td>{{ $loop->iteration }}</td>
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
            <td>
              <form action=" {{ route('prediction-valid') }} " method="post">
                @csrf
                <input type="hidden" name="id" value="{{ $ud->id }}">
                <button type="submit" class="btn btn-small btn-primary">validate</button>
              </form>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
