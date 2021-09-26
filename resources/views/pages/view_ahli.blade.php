@extends('layouts.app', ['activePage' => 'user-management', 'titlePage' => __('Pengurusan Ahli')])

@section('content')

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/jasny-bootstrap/4.0.0/css/jasny-bootstrap.min.css">

<!-- Latest compiled and minified JavaScript -->
<script src="//cdnjs.cloudflare.com/ajax/libs/jasny-bootstrap/4.0.0/js/jasny-bootstrap.min.js"></script>

<div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header card-header-primary">
              <h4 class="card-title ">Lihat Ahli</h4>
              <p class="card-category"> Lihat butiran ahli di sini.</p>
            </div>
            @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
            @endif
            <div class="card-body" style="padding-left: 100px; padding-right: 100px;">
              <table class="table  table-borderless">
                <thead>
                  <tr>
                     <th colspan="2" style="text-align: center">
                      <div><img style="width: 160px; height: 200px; object-fit:contain; border-radius:10px; border:2px solid;" src="{{asset('storage/member-photo/'.$members->gambar)}}" alt=""></div></th>
                   </tr>
                 </thead>
                 <tbody>
                    <tr>
                       <td style="width: 20%;">Nama:</td>
                       <td>{{$members->nama}}</td>
                    </tr>
                    <tr>
                       <td>Alamat:</td>
                       <td>{{$members->alamat}}</td>
                    </tr>
                    <tr>
                       <td>No. Kad Pengenalan</td>
                       <td>{{$members->no_ic}}</td>
                    </tr>
                    <tr>
                       <td>Umur:</td>
                       <td>{{$members->umur}}</td>
                    </tr>
                    <tr>
                      <td>No. HP</td>
                      <td>{{$members->no_hp}}</td>
                    </tr>
                    <tr>
                      <td>Kod Kawasan:</td>
                      <td>{{$members->kodKawasan->kod_kawasan}}</td>
                   </tr>
                    <tr>
                      <td>No. Ahli Pas</td>
                      <td>{{$members->no_ahli_pas}}</td>
                    </tr>
                    <tr>
                      <td>Emel:</td>
                      <td>{{$members->emel}}</td>
                    </tr>
                    <tr>
                      <td>Pekerjaan:</td>
                      <td>{{$members->pekerjaan}}</td>
                    </tr>
                    <tr>
                      <td>Kemahiran:</td>
                      <td>{{$members->kemahiran}}</td>
                    </tr>
                    <tr>
                      <td>Nama Waris:</td>
                      <td>{{$members->nama_waris}}</td>
                    </tr>
                    <tr>
                      <td>Jawatan:</td>
                      <td>{{$members->jawatan}}</td>
                    </tr>
                    <tr>
                      <td>Maklumat Jawatan:</td>
                      @if($members->desc_jawatan != null)
                      <td>{{$members->desc_jawatan}}</td>
                      @else
                      <td>Tiada Maklumat</td>
                      @endif
                    </tr>
                    <tr>
                      <td>Tahun Sertai:</td>
                      @if($members->tahun_sertai != null)
                      <td>{{$members->tahun_sertai}}</td>
                      @else
                      <td>Ahli Baru</td>
                      @endif
                    </tr>
                    <tr>
                      <td>Tarikh Disahkan:</td>
                      <td>{{date("d/m/Y", strtotime($members->tarikh_disahkan))}}</td>
                    </tr>
                 </tbody>
              </table>
              <div class="text-center">
                <a href="{{url('/member')}}" class="btn btn-danger" type="button">Kembali</a>
              </div>
            </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection