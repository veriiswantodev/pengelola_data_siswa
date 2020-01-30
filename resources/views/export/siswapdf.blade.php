<table border="1">
  <thead>
    <tr>
      <th>NAMA LENGKAP</th>
      <th>JENIS KELAMIN</th>
      <th>AGAMA</th>
      <th>RATA RATA</th>
    </tr>
  </thead>

  <tbody>
    @foreach ($siswa as $s) 
    <tr>
      <td>{{$s->nama_lengkap()}}</td>
      <td>{{$s->jenis_kelamin}}</td>
      <td>{{$s->agama}}</td>
      <td>{{$s->rataRata()}}</td>
    </tr>
    @endforeach
  </tbody>
</table>