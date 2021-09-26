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
              <h4 class="card-title ">Kemaskini Data Ahli</h4>
              <p class="card-category"> Kemaskini data ahli di sini.</p>
            </div>
            @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
            @endif
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            <div class="card-body" style="padding-left: 100px; padding-right: 100px;">
              <form action="/update/{{$members->id}}" method="post" enctype="multipart/form-data" style="padding-top: 30px;">
                  @csrf
                  <input type="hidden" name="id" id="" value="{{$members->id}}">
                  <div class="form-group">
                    <label for="nama">Nama Penuh: </label>
                    <input type="text" class="form-control" name="nama" placeholder="" value="{{$members['nama']}}" required>
                  </div>
                  <div class="form-group">
                    <label for="alamat">Alamat Surat Menyurat:</label>
                    <input type="text" class="form-control" name="alamat" value="{{$members['alamat']}}" placeholder="">
                  </div>
                  <div class="row">
                    <div class="col">
                        <div class="form-group">
                        <label for="no_ic">No. Kad Pengenalan:</label>
                      <input type="text" class="form-control" name="no_ic" value="{{$members['no_ic']}}" placeholder="e.g 890603025457">
                      </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                        <label for="umur">Umur:</label>
                      <input type="text" class="form-control" name="umur" value="{{$members['umur']}}" placeholder="">
                        </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="no_hp">No. H/P Sendiri:</label>
                    <input type="text" class="form-control" name="no_hp" value="{{$members['no_hp']}}" placeholder="e.g 0123456789">
                  </div>
                  <div class="row">
                    <div class="col">
                        <div class="form-group">
                        <label for="no_ahli_pas">No. Ahli Pas:</label>
                      <input type="text" class="form-control" name="no_ahli_pas" value="{{$members['no_ahli_pas']}}" placeholder="">
                      </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                        <label for="no_ahli_amal">No. Ahli Amal:</label>
                      <input type="text" class="form-control" name="no_ahli_amal" value="{{$members['no_ahli_amal']}}" placeholder="">
                        </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="gambar">Gambar: (*ukuran passport)</label>
                  </div>
                  <div class="fileinput fileinput-new" data-provides="fileinput">
                    <div class="fileinput-preview img-thumbnail" data-trigger="fileinput" style="width: 180px; height: 200px;"><img src="{{asset('storage/member-photo/'.$members->gambar)}}" alt=""></div>
                    <div>
                      <span class="btn btn-outline-secondary btn-file">
                        <span class="fileinput-new">Pilih Gambar</span>
                        <span class="fileinput-exists">Tukar</span>
                        <input type="file" name="gambar">
                      </span>
                      <a href="#" class="btn btn-outline-secondary fileinput-exists" data-dismiss="fileinput">Buang</a>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="kod_kawasan">Kod Kawasan:</label>
                    <select class="form-control selectpicker" data-style="btn btn-link" title="Pilih Kawasan..." name="kod_kawasan">
                      @foreach ($kod_kawasan as $kawasan)
                      <option value="{{$kawasan->id}}" {{ $kawasan->id == $members->kod_kawasans_id ? 'selected' : '' }}>{{ $kawasan->kod_kawasan }}</option>
                      @endforeach
                      </select>
                  </div>
                  <div class="form-group">
                    <label for="emel">Emel:</label>
                    <input type="email" class="form-control" name="emel" value="{{$members['emel']}}" placeholder="">
                  </div>
                  <div class="form-group">
                    <label for="pekerjaan">Pekerjaan:</label>
                    <input type="text" class="form-control" name="pekerjaan" value="{{$members['pekerjaan']}}" placeholder="">
                  </div>
                  <div class="form-group">
                    <label for="kemahiran">Kemahiran:</label>
                    <input type="text" class="form-control" name="kemahiran" value="{{$members['kemahiran']}}" placeholder="">
                  </div>
                  <div class="form-group">
                    <label for="nama_waris">Nama Waris:</label>
                    <input type="text" class="form-control" name="nama_waris" value="{{$members['nama_waris']}}" placeholder="">
                  </div>
                  <div class="form-group">
                    <label for="no_hp_waris">No. H/P Waris:</label>
                    <input type="text" class="form-control" name="no_hp_waris" value="{{$members['no_hp_waris']}}" placeholder="">
                  </div>
                  <div class="form-group">
                    <label for="no_hp_waris">Jawatan Yang Diamanahkan Dalam Jabatan Amal Malaysia:</label>
                  </div>
                  <div class="form-check">
                    <input type="radio" name="jawatan" value="Ahli Biasa" {{ ($members->jawatan=="Ahli Biasa")? "checked" : "" }}>
                      <label for="ahli_biasa">Ahli Biasa</label><br>
                    <input type="radio" name="jawatan" value="Pusat" {{ ($members->jawatan=="Pusat")? "checked" : "" }}>
                      <label for="pusat">Pusat</label><br>
                    <input type="radio" name="jawatan" value="Negeri" {{ ($members->jawatan=="Negeri")? "checked" : "" }}>
                      <label for="negeri">Negeri</label><br>
                    <input type="radio" name="jawatan" value="Kawasan" {{ ($members->jawatan=="Kawasan")? "checked" : "" }}>
                      <label for="kawasan">Kawasan</label>
                  </div>
                  <div class="form-group">
                    <label for="desc_jawatan">Sila Nyatakan Bagi Peringkat Tersebut: (*Jika ada)</label>
                    <input type="text" class="form-control" name="desc_jawatan" value="{{$members['desc_jawatan']}}" placeholder="">
                  </div>
                  <div class="form-group">
                    <label for="ahli_baru">Menyertai Jabatan Amal Sejak Tahun:</label>
                    <div class="form-check">
                      <label class="form-check-label">
                        <input type="checkbox" class="form-check-input" name="ahli_baru" value="{{$members->ahli_baru}}" {{ ($members->ahli_baru==1)? "checked" : "" }}>
                        Ahli Baru (*Sila tanda untuk ahli baru atau nyatakan tahun dibawah.)
                        <span class="form-check-sign">
                          <span class="check"></span>
                        </span>
                      </label>
                        {{-- <input class="form-check-input" type="checkbox" name="tahun_sertai" value="Ahli Biasa">
                          <label for="ahli_biasa">Ahli Baru (*Sila tanda untuk ahli baru atau nyatakan tahun dibawah.)</label> --}}
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="tahun_sertai">Tahun:</label>
                    <input type="text" class="form-control" name="tahun_sertai" value="{{$members['tahun_sertai']}}" placeholder="">
                  </div>
                  <div class="form-group">
                    <label for="yuran_keahlian">Yuran Keahlian:</label>
                  </div>
                  <div class="form-check">
                    <label class="form-check-label">
                        <input class="form-check-input" name="yuran_keahlian" type="checkbox" value="10" {{ ($members->yuran_keahlian=="10")? "checked" : "" }}>
                        RM10
                        <span class="form-check-sign">
                            <span class="check"></span>
                        </span>
                    </label>
                </div>
                  <div class="form-group">
                    <label for="yuran_tahunan">Tahunan:</label>
                  </div>
                  <div class="form-check">
                    <label class="form-check-label">
                        <input class="form-check-input" name="yuran_tahunan" type="checkbox" value="5">
                        RM5
                        <span class="form-check-sign">
                            <span class="check"></span>
                        </span>
                    </label>
                </div>
                  <div class="form-group">
                    <label for="yuran_keahlian">Tarikh Disahkan:</label>
                    <input type="date" name="tarikh_disahkan" value="{{$members->tarikh_disahkan}}">
                  </div><br>
                  <div class="text-center">
                    <button class="btn btn-success" type="submit">Kemaskini</button>
                    <a href="{{url('/member')}}" class="btn btn-danger" type="button">Kembali</a>
                  </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection