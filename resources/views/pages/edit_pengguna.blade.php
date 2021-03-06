@extends('layouts.app', ['activePage' => 'edit-pengguna', 'titlePage' => __('Kemaskini Pengguna')])

@section('content')

<div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header card-header-primary">
              <h4 class="card-title ">Kemaskini Pengguna</h4>
              <p class="card-category"> Kemaskini data pengguna di sini.</p>
            </div>
            @if (session('status'))
              <div class="alert alert-success">
                  {{ session('status') }}
              </div>
              @endif
            <div class="card-body">
              {{-- <a href="{{url('/tambah_ahli')}}" class="btn btn-success" role="button" style="float: right;">Tambah ahli</a> --}}
              <form class="form" method="POST" action="/update/{{$users->id}}">
                @csrf
        
                <div class="card card-login card-hidden mb-3">
                  <div class="card-body ">
                    <div class="bmd-form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text">
                              <i class="material-icons">face</i>
                          </span>
                        </div>
                        <input type="text" name="name" class="form-control" placeholder="{{ __('Nama...') }}" value="{{$users->name}}" required>
                      </div>
                      @if ($errors->has('name'))
                        <div id="name-error" class="error text-danger pl-3" for="name" style="display: block;">
                          <strong>{{ $errors->first('name') }}</strong>
                        </div>
                      @endif
                    </div>
                    <div class="bmd-form-group{{ $errors->has('email') ? ' has-danger' : '' }} mt-3">
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text">
                            <i class="material-icons">email</i>
                          </span>
                        </div>
                        <input type="email" name="email" class="form-control" placeholder="{{ __('Emel...') }}" value="{{$users->email}}" required>
                      </div>
                      @if ($errors->has('email'))
                        <div id="email-error" class="error text-danger pl-3" for="email" style="display: block;">
                          <strong>{{ $errors->first('email') }}</strong>
                        </div>
                      @endif
                    </div>
                    
                    {{-- <div class="form-check mr-auto ml-3 mt-3">
                      <label class="form-check-label">
                        <input class="form-check-input" type="checkbox" id="policy" name="policy" {{ old('policy', 1) ? 'checked' : '' }} >
                        <span class="form-check-sign">
                          <span class="check"></span>
                        </span>
                        {{ __('I agree with the ') }} <a href="#">{{ __('Privacy Policy') }}</a>
                      </label>
                    </div> --}}
                  </div>
                  <div class="card-footer justify-content-center">
                    <button type="submit" class="btn btn-success">{{ __('Kemaskini Pengguna') }}</button>
                    <a href="{{url('/senarai_pengguna')}}" class="btn btn-danger" type="button">Kembali</a>
                  </div>
                </div>
              </form>
              
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection