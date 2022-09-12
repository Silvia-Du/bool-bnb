@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center my-5">
        <div class="col-md-8">
            <div class="card b-round b-shadow">
                <div class="card-header">{{ __('Registrazione') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            {{-- name --}}
                            <label for="name" class=" col-md-4 col-form-label text-md-right">{{ __('Nome') }} *</label>

                            <div class="col-md-6" id="nameDiv">
                                <input id="name" type="text" class="js-data form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        {{-- surname --}}
                        <div class="form-group row">
                            <label for="surname" class="col-md-4 col-form-label text-md-right">Cognome *</label>

                            <div class="col-md-6" id="surnameDiv">
                                <input
                                id="surname" type="text"
                                class="js-data form-control @error('surname') is-invalid @enderror" name="surname" value="{{ old('surname') }}" required
                                autofocus>

                                @error('surname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        {{-- date-of-birth --}}
                        <div class="form-group row">

                            <label class="col-md-4 col-form-label text-md-right" for="date_of_birth">Data di nascita *</label>
                            <div class="col-md-6" id="dateDiv">
                                <input class="form-control js-data @error('date_of_birth') is-invalid @enderror" type="date" id="date_of_birth" name="date_of_birth">
                                @error('date_of_birth')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                        </div>

                        <div class="form-group row">
                            {{-- email --}}
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Indirizzo E-Mail') }} *</label>

                            <div class="col-md-6" id="emailDiv">
                                <input id="email" type="email" class="js-data form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            {{-- p-word --}}
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }} *</label>

                            <div class="col-md-6" id="passwordDiv">
                                <input id="password" type="password" class="js-data form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>
                        </div>

                        <div class="form-group row">
                            {{-- pword-confirm --}}
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Conferma Password') }} *</label>

                            <div class="col-md-6" id="password-confirm-Div">
                                <input id="password-confirm" type="password" class="js-data form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button id="btn-register" type="submit" class="btn-register-plus">
                                    {{ __('Registrati') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
