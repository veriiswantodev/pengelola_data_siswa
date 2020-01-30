@extends('layout.main')

@section('title', 'Dashboard')
    


@section('content')
<div class="main">
  <div class="main-content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-6">
          <div class="panel">
								<div class="panel-heading">
                  <h3 class="panel-title">Ranking 5 Besar</h3>
                </div>
								<div class="panel-body">
									<table class="table table-hover">
										<thead>
											<tr>
												<th>Ranking</th>
                        <th>Nama</th>
                        <th>Kelas</th>
											</tr>
										</thead>
										<tbody>
                      @foreach (ranking5Besar() as $s) 
                      <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$s->nama_lengkap()}}</td>
                        <td>{{$s->rataRata()}}</td>
                      </tr>
                      @endforeach
										</tbody>
									</table>
								</div>
							</div>
        </div>
        {{-- Total Siswa --}}
        <div class="col-md-3">
          <div class="metric">
            <span class="icon"><i class="fa fa-user"></i></span>
            <p>
              <span class="number">{{totalsiswa()}}</span>
              <span class="title">Total Siswa</span>
            </p>
          </div>
        </div>

        {{-- Total Guru --}}
        <div class="col-md-3">
          <div class="metric">
            <span class="icon"><i class="fa fa-user"></i></span>
            <p>
              <span class="number">{{totalguru()}}</span>
              <span class="title">Total Guru</span>
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection