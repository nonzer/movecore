@extends('layouts.master')

@section('title', 'Connexion')

@section('login-content')
    <div class="login-box">
        <div class="login-logo" style="margin-bottom: -30px">
{{--            <a href="#"><b>MOVe</b>Core</a>--}}
            <img src="/images/movecore.png" height="199px" alt="" class="">
        </div>
        <!-- /.login-logo -->
        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg">Démarrer la session</p>

                <form action="{{ route('login') }}" method="post">
                    @csrf

                    <div class="input-group mb-3">
                        <input name="login" type="text" class="@error('login')is-invalid @enderror form-control" value="{{ old('login') }}" placeholder="Identifiant">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                        @error('login')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="input-group mb-3">
                        <input name="password" type="password" class="@error('password')is-invalid @enderror form-control form-control" placeholder="Mot de passe">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                        @error('password')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="row">
                            <button type="submit" class="btn btn-danger btn-block">Se connecter</button>
                    </div>
                </form>

                <p class="mt-2 mb-1 text-center">Pour avoir accès au tableau de bord, il est important de se connecter</p>
            </div>
            <!-- /.login-card-body -->
        </div>
    </div>
    <!-- /.login-box -->

    <div class="text-xs">
        <strong>Copyright MOVe GLOBAL &copy; 2020</strong>
        All rights reserved.
        <div class="float-right d-none d-sm-inline-block">
            <b>Version</b> 1.0.0
        </div>
    </div>
@endsection
