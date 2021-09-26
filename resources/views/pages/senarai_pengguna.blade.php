@extends('layouts.app', ['activePage' => 'senarai-pengguna', 'titlePage' => __('Senarai Pengguna')])

@section('content')

<div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header card-header-primary">
              <h4 class="card-title ">Senarai Pengguna</h4>
              <p class="card-category"> Kemaskini data pengguna di sini.</p>
            </div>
            @if (session('status'))
              <div class="alert alert-success">
                  {{ session('status') }}
              </div>
              @endif
            <div class="card-body">
              {{-- <a href="{{url('/tambah_ahli')}}" class="btn btn-success" role="button" style="float: right;">Tambah ahli</a> --}}
              <div class="table-responsive">
                <table class="table">
                  <thead class=" text-primary">
                    <th>No.</th>
                    <th>Nama</th>
                    <th>Emel</th>
                    <th style="text-align: center">Action</th>
                  </thead>
                  <tbody>
                    @foreach($data as $key => $user)
                    <tr>
                      <td>{{$key+1}}</td>
                      <td>{{$user->name}}</td>
                      <td>{{$user->email}}</td>
                      <td style="text-align: center;width:20%;"><a href="{{url('edit_pengguna/'.$user['id'])}}" class="btn btn-success btn-sm" role="button" title="Edit"><img src="{{asset('storage/pencil-fill.svg')}}" alt="Edit"></a>
                        {{-- <a href="{{url('view_ahli/'.$user['id'])}}" class="btn btn-info btn-sm" role="button" title="View"><img src="{{asset('storage/eye-fill.svg')}}" alt="View"></a> --}}
                        <a href="{{url('delete_pengguna/'.$user['id'])}}" onclick="return confirm('Adakah anda pasti untuk memadam data ini?')" class="btn btn-danger btn-sm" role="button" title="Delete"><img src="{{asset('storage/trash-fill.svg')}}" alt="Delete"></a></td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
              
            </div>
            
          </div>
          <div>
            <nav aria-label="...">
              <ul class="pagination justify-content-center">
  
                {{$data->links('pagination::bootstrap-4')}}
  
  
              </ul>
            </nav>
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection