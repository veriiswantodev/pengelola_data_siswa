@extends('layout.main')

@section('title', 'Profile Siswa')

@section('content')
    <div class="main">
			<!-- MAIN CONTENT -->
			<div class="main-content">
				<div class="container-fluid">
					@if (session('sukses'))
                  <div class="alert alert-success" role="alert">
                    {{session('sukses')}}
                  </div>
              @endif
              @if (session('error'))
                  <div class="alert alert-danger" role="alert">
                    {{session('error')}}
                  </div>
              @endif
					<div class="panel panel-profile">
						<div class="clearfix">
							<!-- LEFT COLUMN -->
							<div class="profile-left">
								<!-- PROFILE HEADER -->
								<div class="profile-header">
									<div class="overlay"></div>
									<div class="profile-main">
										<img src="{{$siswa->getAvatar()}}" class="img-circle" width="100px" alt="Avatar">
										<h3 class="name">{{$siswa->nama_depan}}</h3>
										<span class="online-status status-available">Available</span>
									</div>
									<div class="profile-stat">
										<div class="row">
											<div class="col-md-4 stat-item">
												{{$siswa->mapel->count()}}<span>Mata Pelajaran</span>
											</div>
											<div class="col-md-4 stat-item">
												15 <span>Awards</span>
											</div>
											<div class="col-md-4 stat-item">
												2174 <span>Points</span>
											</div>
										</div>
									</div>
								</div>
								<!-- END PROFILE HEADER -->
								<!-- PROFILE DETAIL -->
								<div class="profile-detail">
									<div class="profile-info">
										<h4 class="heading">Data Diri</h4>
										<ul class="list-unstyled list-justify">
											<li>Jenis Kelamin <span>{{$siswa->jenis_kelamin}}</span></li>
											<li>Agama <span>{{$siswa->agama}}</span></li>
											<li>Alamat <span>{{$siswa->alamat}}</span></li>
										</ul>
									</div>

									<div class="text-center"><a href="/siswa/{{$siswa->id}}/edit" class="btn btn-warning">Edit Profile</a></div>
								</div>
								<!-- END PROFILE DETAIL -->
							</div>
							<!-- END LEFT COLUMN -->

							<!-- RIGHT COLUMN -->
							<div class="profile-right">
								<!-- TABBED CONTENT -->
								<!-- Button trigger modal -->
								<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
									Tambah Nilai
								</button>
								<div class="panel">
								<div class="panel-heading">
									<h3 class="panel-title">Mata Pelajaran</h3>
								</div>
								<div class="panel-body">
									<table class="table table-striped">
										<thead>
											<tr>
												<th>KODE</th>
												<th>NAMA</th>
												<th>SEMESTER</th>
												<th>NILAI</th>
											</tr>
										</thead>
										<tbody>
											@foreach ($siswa->mapel as $mapel)
											<tr>
												<td>{{$mapel->kode}}</td>
												<td>{{$mapel->nama}}</td>
												<td>{{$mapel->semester}}</td>
												<td>{{$mapel->pivot->nilai}}</td>
											</tr>
											@endforeach
										</tbody>
									</table>
								</div>
							</div>
								<!-- END TABBED CONTENT -->
							</div>
							<!-- END RIGHT COLUMN -->
						</div>
					</div>
				</div>
			</div>
			<!-- END MAIN CONTENT -->
			
			<!-- Modal -->
			<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLabel">Tambah Nilai</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<form action="/siswa/{{$siswa->id}}/addnilai" method="post">
									{{csrf_field()}}
									<div class="row">
										<div class="form-group col-md-12">
											<label for="mapel">Mapel</label>
											<select class="form-control @error('mapel') is-invalid @enderror" id="mapel" name="mapel">
												@foreach ($matapelajaran as $mp)
														<option value="{{$mp->id}}">{{$mp->nama}}</option>
												@endforeach
											</select>
											@error('mapel')
                        <span class="text-danger">{{ $message }}</span>
                      @enderror
										</div>
									</div>
                  <div class="row">
                    <div class="form-group col-md-12">
                      <label for="nilai">Nilai</label>
                      <input type="text" class="form-control @error('nilai') is-invalid @enderror" id="nilai" name="nilai" value="{{old('nilai')}}">
                      @error('nilai')
                        <span class="text-danger">{{ $message }}</span>
                      @enderror
										</div>
                  </div>
								</div>
								<div class="modal-footer">
									<button type="submit" class="btn btn-primary">Simpan</button>
								</div>
							</form>
					</div>
				</div>
			</div>
		</div>
@endsection