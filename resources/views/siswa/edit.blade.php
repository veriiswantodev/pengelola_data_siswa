  @extends('layout.main')

  @section('title', 'Edit Data Siswa')

  @section('content')
      <div class="main">
        <div class="main-content">
          <div class="container-fluid">
            <div class="row">
              <div class="col-md-12">
                <div class="panel">
								<div class="panel-heading">
									<h3 class="panel-title">Edit Data Siswa</h3>
								</div>
								<div class="panel-body">
									<form action="/siswa/{{$siswa->id}}/update" method="post" enctype="multipart/form-data">
                  {{csrf_field()}}
                  <div class="row">
                    <div class="form-group col-md-6">
                      <label for="nama_depan">Nama Depan</label>
                      <input type="text" class="form-control" id="nama_depan" name="nama_depan" value="{{$siswa->nama_depan}}">
                    </div>
                    <div class="form-group col-md-6">
                      <label for="nama_belakang">Nama Belakang</label>
                      <input type="text" class="form-control" id="nama_belakang" name="nama_belakang" value="{{$siswa->nama_belakang}}">
                    </div>
                  </div>
                  <div class="row">
                    <div class="form-group col-md-6">
                      <label for="inputState">Jenis Kelamin</label>
                      <select id="jenis_kelamin" class="form-control" name="jenis_kelamin">
                        <option value="L" @if ($siswa->jenis_kelamin == 'L')
                            selected
                        @endif>Laki-Laki</option>
                        <option value="P" @if ($siswa->jenis_kelamin == 'P')
                            selected
                        @endif>Perempuan</option>
                      </select>
                    </div>

                    <div class="form-group col-md-6">
                      <label for="inputState">Agama</label>
                      <select id="agama" class="form-control" name="agama">
                        <option value="islam" @if ($siswa->agama == 'islam')
                            selected
                        @endif>Islam</option>
                        <option value="kristen"  value="islam" @if ($siswa->agama == 'kristen')
                            selected
                        @endif>Kristen</option>
                        <option value="budha"  value="islam" @if ($siswa->agama == 'budha')
                            selected
                        @endif>Budha</option>
                        <option value="Hindu"  value="islam" @if ($siswa->agama == 'hindu')
                            selected
                        @endif>Hindu</option>
                      </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputAddress">Address</label>
                    <textarea class="form-control" name="alamat" rows="3">{{$siswa->alamat}}</textarea>
                  </div>

                  <div class="form-group">
                    <label for="">Avatar</label>
                    <input type="file" name="avatar" class="form-control">
                  </div>
                  <button type="submit" class="btn btn-warning">Update</button>
                </form>
							</div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  @endsection

  @section('content1')
      
    @if (session('sukses'))    
      <div class="alert alert-success" role="alert">
        {{session('sukses')}}
      </div>
    @endif
    <div class="row">
      <div class="col-md-12">
        <h2>Edit Data Siswa</h2>
        
        </div>
@endsection