@extends('layouts.app', ['activePage' => 'user-management', 'titlePage' => __('Pengurusan Ahli')])

@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title ">Senarai Ahli</h4>
            <p class="card-category"> Kemaskini data ahli di sini.</p>
          </div>
          @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
            @endif
          <div class="card-body">
            @role('Admin|Admin_Kawasan')
            <a href="{{url('/tambah_ahli')}}" class="btn btn-success" role="button" style="float: right;">Tambah ahli</a>
            @endrole
            <div class="table-responsive">
              <table class="table">
                <thead class=" text-primary">
                  <th>No.</th>
                  <th>Nama</th>
                  <th>Kod Kawasan</th>
                  <th>No.H/P</th>
                  <th>No.Ahli Pas</th>
                  <th style="text-align: center">Action</th>
                </thead>
                <tbody>
                  @if (count($members) > 0)
                  @foreach($members as $key => $member)
                  <tr>
                    <td>{{$key+1}}</td>
                    <td>{{$member->nama}}</td>
                    <td>{{$member->kodKawasan->kod_kawasan}}</td>
                    <td>{{$member['no_hp']}}</td>
                    <td>{{$member['no_ahli_pas']}}</td>
                    @role('Admin|Admin_Kawasan')
                    <td style="text-align: center;width:20%;"><a href="{{url('edit_ahli/'.$member['id'])}}" class="btn btn-success btn-sm" role="button" title="Edit"><img src="{{asset('storage/pencil-fill.svg')}}" alt="Edit"></a>
                      <a href="{{url('view_ahli/'.$member['id'])}}" class="btn btn-info btn-sm" role="button" title="View"><img src="{{asset('storage/eye-fill.svg')}}" alt="View"></a>
                      <a href="{{url('delete/'.$member['id'])}}" onclick="return confirm('Adakah anda pasti untuk memadam data ini?')" class="btn btn-danger btn-sm" role="button" title="Delete"><img src="{{asset('storage/trash-fill.svg')}}" alt="Delete"></a></td>
                    </tr>
                    @else 
                    <td style="text-align: center;width:20%;">
                      <a href="{{url('view_ahli/'.$member['id'])}}" class="btn btn-info btn-sm" role="button" title="View"><img src="{{asset('storage/eye-fill.svg')}}" alt="View"></a>
                    </td>
                  </tr>
                  @endrole
                  @endforeach
                  @else 
                  <tr>
                    <td colspan="6" style="text-align: center;"><h4>Tiada Maklumat Ditemui.</h4></td>
                  </tr>
                  @endif
                </tbody>
              </table>
            </div>
            
          </div>
          
        </div>
        <div>
          <nav aria-label="...">
            <ul class="pagination justify-content-center">

              {{$members->links('pagination::bootstrap-4')}}


            </ul>
          </nav>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection