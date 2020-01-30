  @extends('layout.main')

  @section('title', 'Data Siswa')

  @section('content')
    <div class="main">
      <div class="main-content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="panel">
								<div class="panel-heading">
                  <h3 class="panel-title">Data Siswa</h3>
                  <div class="right">
                    <button type="button" class="btn" data-toggle="modal" data-target="#exampleModal"><i class="lnr lnr-plus-circle"></i></button>
                  </div>
								</div>
								<div class="panel-body">
									<table class="table table-hover">
										<thead>
											<tr>
												<th>Nama Depan</th>
                        <th>Nama Belakang</th>
                        <th>Jenis Kelamin</th>
                        <th>Agama</th>
                        <th>Alamat</th>
                        <th>Rata Rata</th>
                        <th>Aksi</th>
											</tr>
										</thead>
										<tbody>
											@foreach ($data_siswa as $siswa)
                      <tr>
                        <td><a href="/siswa/{{$siswa->id}}/profile">{{$siswa->nama_depan}}</a></td>
                        <td><a href="/siswa/{{$siswa->id}}/profile">{{$siswa->nama_belakang}}</a></td>
                        <td>{{$siswa->jenis_kelamin}}</td>
                        <td>{{$siswa->agama}}</td>
                        <td>{{$siswa->alamat}}</td>
                        <td>{{$siswa->rataRata()}}</td>
                        <td><a href="/siswa/{{$siswa->id}}/edit" class="btn btn-warning btn-sm">Edit</a>
                        <a href="/siswa/{{$siswa->id}}/delete" class="btn btn-danger btn-sm" onclick="return confirm('Anda yakin data akan dihapus?')">Hapus</a></<a>
                      </tr>
                      @endforeach
										</tbody>
									</table>
								</div>
							</div>
            </div>
          </div>
        </div>
      </div>
    </div>

   <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data Siswa</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form action="/siswa/create" method="post" enctype="multipart/form-data">
                  {{csrf_field()}}
                  <div class="row">
                    <div class="form-group col-md-6">
                      <label for="nama_depan">Nama Depan</label>
                      <input type="text" class="form-control @error('nama_depan') is-invalid @enderror" id="nama_depan" name="nama_depan" value="{{old('nama_depan')}}">
                      @error('nama_depan')
                        <span class="text-danger">{{ $message }}</span>
                      @enderror
                    </div>
                    <div class="form-group col-md-6">
                      <label for="nama_belakang">Nama Belakang</label>
                      <input type="text" class="form-control @error('nama_belakang') is-invalid @enderror" id="nama_belakang" name="nama_belakang" value="{{old('nama_belakang')}}">
                      @error('nama_belakang')
                        <span class="text-danger">{{ $message }}</span>
                      @enderror
                    </div>
                  </div>
                  <div class="row">
                    <div class="form-group col-md-6">
                      <label for="inputState">Jenis Kelamin</label>
                      <select id="jenis_kelamin" class="form-control @error('jenis_kelamin') is-invalid @enderror" name="jenis_kelamin">
                        <option >Choose...</option>
                        <option value="L"{{(old('jenis_kelamin') == 'L') ? 'selected' : ''}}>Laki-Laki</option>
                        <option value="P"{{(old('jenis_kelamin') == 'P') ? 'selected' : ''}}>Perempuan</option>
                      </select>
                      @error('jenis_kelamin')
                        <span class="text-danger">{{ $message }}</span>
                      @enderror
                    </div>
                    
                    <div class="form-group col-md-6">
                      <label for="inputState">Agama</label>
                      <select id="agama" class="form-control @error('agama') is-invalid @enderror" name="agama">
                        <option>Choose...</option>
                        <option value="islam"{{(old('agama') == 'islam') ? 'selected' : ''}}>Islam</option>
                        <option value="kristen"{{(old('agama') == 'kristen') ? 'selected' : ''}}>Kristen</option>
                        <option value="budha"{{(old('agama') == 'budha') ? 'selected' : ''}}>Budha</option>
                        <option value="Hindu"{{(old('agama') == 'hindu') ? 'selected' : ''}}>Hindu</option>
                      </select>
                      @error('agama')
                        <span class="text-danger">{{ $message }}</span>
                      @enderror
                    </div>
                  </div>
                  <div class="row">
                    <div class="form-group col-md-12">
                      <label for="email">Email</label>
                      <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{old('email')}}">
                    </div>
                    @error('email')
                        <span class="text-danger">{{ $message }}</span>
                      @enderror
                  </div>
                  <div class="form-group">
                    <label for="inputAddress">Alamat</label>
                    <textarea class="form-control @error('alamat') is-invalid @enderror" name="alamat" rows="3">{{old('alamat')}}</textarea>
                    @error('alamat')
                        <span class="text-danger">{{ $message }}</span>
                      @enderror
                  </div>

                  <div class="form-group">
                    <label for="">Avatar</label>
                    <input type="file" name="avatar" class="form-control @error('avatar') is-invalid @enderror">
                    @error('avatar')
                        <span class="text-danger">{{ $message }}</span>
                      @enderror
                  </div>
              <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Simpan</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              </div>
            </form>
            </div>
          </div>
        </div>
  @endsection