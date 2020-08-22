@extends('layouts.master')

@section('title', 'Vérrouillage session')

@section('lockscreen-content')
    <div class="lockscreen-wrapper">
        <div class="lockscreen-logo" style="margin-bottom: -30px">
            <img src="/images/movecore.png" height="199px" alt="" class="">
{{--            <a href="#"><b>MOVe</b>CORE</a>--}}
        </div>
        <!-- User name -->
        <div class="lockscreen-name">{{ Auth::user()->name }}</div>

        <!-- START LOCK SCREEN ITEM -->
        <div class="lockscreen-item">
            <!-- lockscreen image -->
            <div class="lockscreen-image">
                <img src="/master/dist/img/user1-128x128.jpg" width="128px" alt="{{ Auth::user()->name }}">
            </div>
            <!-- /.lockscreen-image -->

            <!-- lockscreen credentials (contains the form) -->
            <form class="lockscreen-credentials" method="post" action="{{ route('lockscreen.store') }}">
                @csrf

                <div class="input-group">
                    <input name="password" type="password" class="form-control @error("password") is-invalid @enderror" placeholder="Mot de passe...">
                    <div class="input-group-append">
                        <button type="button" class="btn">
                            <i class="fas fa-arrow-right text-muted"></i>
                        </button>
                    </div>
                </div>
                @error("password")
                <span class="text-danger">
                        {{ $message }}
                    </span>
                @enderror
            </form>
            <!-- /.lockscreen credentials -->

        </div>
        <!-- /.lockscreen-item -->
        <div class="help-block text-center">
            Entrez votre mot de passe reprendre votre session
        </div>
        <div class="text-center">
            Or
            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Connectez-vous en tant qu'autre utilisateur</a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </div>
        <div class="lockscreen-footer text-center text-xs">
            <strong>Copyright MOVe GLOBAL &copy; 2020</strong>
            All rights reserved.
            <div class="float-right d-none d-sm-inline-block">
                <b>Version</b> 1.0.0
            </div>
        </div>
    </div>
@endsection