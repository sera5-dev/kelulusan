<div class="card">
  <form action="{{ route('prediction-store') }}" method="post">
    <div class="card-header">
      <h4>Form Input Data</h4>
    </div>
    <div class="card-body">
      <div class="row">
        <div class="col-md-8">
          <div class="form-group">
            <label>Nama</label>
            <input required name="nama" type="text" class="form-control">
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
            <label>Umur</label>
            <input required name="umur" step="0.01" type="number" class="form-control">
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-4">
          <div class="form-group">
            <label>Jenis Kelamin</label>
            <select required name="jenis_kelamin" class="form-control">
              <option value="LAKI - LAKI">Laki - Laki</option>
              <option value="PEREMPUAN">Perempuan</option>
            </select>
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
            <label>Status Mahasiswa</label>
            <select required name="status_mahasiswa" class="form-control">
              <option value="BEKERJA">Bekerja</option>
              <option value="MAHASISWA">Mahasiswa</option>
            </select>
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
            <label>Status Nikah</label>
            <select required name="status_nikah" class="form-control">
              <option value="BELUM MENIKAH">Belum Menikah</option>
              <option value="MENIKAH">Menikah</option>
            </select>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-3">
          <div class="form-group">
            <label>IP Semester 1</label>
            <input max="4.0" required name="ips1" step="0.01" type="number" class="form-control">
          </div>
        </div>
        <div class="col-md-3">
          <div class="form-group">
            <label>IP Semester 2</label>
            <input max="4.0" required name="ips2" step="0.01" type="number" class="form-control">
          </div>
        </div>
        <div class="col-md-3">
          <div class="form-group">
            <label>IP Semester 3</label>
            <input max="4.0" required name="ips3" step="0.01" type="number" class="form-control">
          </div>
        </div>
        <div class="col-md-3">
          <div class="form-group">
            <label>IP Semester 4</label>
            <input max="4.0" required name="ips4" step="0.01" type="number" class="form-control">
          </div>
        </div>
        <div class="col-md-3">
          <div class="form-group">
            <label>IP Semester 5</label>
            <input max="4.0" required name="ips5" step="0.01" type="number" class="form-control">
          </div>
        </div>
        <div class="col-md-3">
          <div class="form-group">
            <label>IP Semester 6</label>
            <input max="4.0" required name="ips6" step="0.01" type="number" class="form-control">
          </div>
        </div>
        <div class="col-md-3">
          <div class="form-group">
            <label>IP Semester 7</label>
            <input max="4.0" required name="ips7" step="0.01" type="number" class="form-control">
          </div>
        </div>
        <div class="col-md-3">
          <div class="form-group">
            <label>IP Semester 8</label>
            <input max="4.0" required name="ips8" step="0.01" type="number" class="form-control">
          </div>
        </div>
      </div>
    </div>
    <div class="card-footer text-right">
      <button class="btn btn-primary mr-1" type="submit">Submit</button>
      <button class="btn btn-secondary" type="reset">Reset</button>
    </div>
    @csrf
  </form>
</div>
