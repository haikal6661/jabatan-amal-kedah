@extends('layouts.app', ['activePage' => 'daftar', 'titlePage' => __('Daftar')])

@section('content')

<div class="content">
 <div class="container-fluid">
    <div class="row">
        <div class="col-lg-12 col-md-10">
            <div class="card">
                <div class="card-header card-header-success">
                    <h4 class="card-title">Tambah Pengguna</h4>
                    <p class="card-category">Tambah Pengguna baru pada sistem ini.</p>
                </div>
                @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
                @endif
                <div class="card-body table-responsive">
                    <form class="form" method="POST" action="daftar">
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
                                <input type="text" name="name" class="form-control" placeholder="{{ __('Nama...') }}" value="{{ old('name') }}" required>
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
                                <input type="email" name="email" class="form-control" placeholder="{{ __('Emel...') }}" value="{{ old('email') }}" required>
                              </div>
                              @if ($errors->has('email'))
                                <div id="email-error" class="error text-danger pl-3" for="email" style="display: block;">
                                  <strong>{{ $errors->first('email') }}</strong>
                                </div>
                              @endif
                            </div>
                            <div class="bmd-form-group mt-3">
                              <div class="input-group">
                                <div class="input-group-prepend">
                                  <span class="input-group-text">
                                    <i class="material-icons">place</i>
                                  </span>
                                </div>
                                <select class="form-control" data-style="btn btn-link" title="Pilih Kawasan..." name="kod_kawasan">
                                  <option value="">Pilih Kawasan...</option>
                                  @foreach ($kod_kawasan as $kawasan)
                                  <option value="{{$kawasan->id}}">{{$kawasan->kod_kawasan}}</option>
                                  @endforeach
                                </select>
                              </div>
                            </div>
                            <div class="bmd-form-group{{ $errors->has('password') ? ' has-danger' : '' }} mt-3">
                              <div class="input-group">
                                <div class="input-group-prepend">
                                  <span class="input-group-text">
                                    <i class="material-icons">lock_outline</i>
                                  </span>
                                </div>
                                <input type="password" name="password" id="password" class="form-control" placeholder="{{ __('Kata Laluan...') }}" required>
                              </div>
                              @if ($errors->has('password'))
                                <div id="password-error" class="error text-danger pl-3" for="password" style="display: block;">
                                  <strong>{{ $errors->first('password') }}</strong>
                                </div>
                              @endif
                            </div>
                            <div class="bmd-form-group{{ $errors->has('password_confirmation') ? ' has-danger' : '' }} mt-3">
                              <div class="input-group">
                                <div class="input-group-prepend">
                                  <span class="input-group-text">
                                    <i class="material-icons">lock_outline</i>
                                  </span>
                                </div>
                                <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" placeholder="{{ __('Sahkan Kata Laluan...') }}" required>
                              </div>
                              @if ($errors->has('password_confirmation'))
                                <div id="password_confirmation-error" class="error text-danger pl-3" for="password_confirmation" style="display: block;">
                                  <strong>{{ $errors->first('password_confirmation') }}</strong> 
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
                            <button type="submit" class="btn btn-success">{{ __('Daftar Pengguna') }}</button>
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