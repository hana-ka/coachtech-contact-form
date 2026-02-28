@extends('layouts.app')

@section('title', 'Login')

@section('css')
<link rel="stylesheet" href="{{ asset('css/auth.css') }}">
@endsection

@section('header-btn')
<a href="/register">register</a>
@endsection

@section('content')

<h2 class="login__title">Login</h2>

<div class="login">
    <form action="/login" method="post" novalidate>
        @csrf

        <div class="form-group">
            <label for="email">メールアドレス</label>
            <input type="email" name="email" id="email"
                value="{{ old('email') }}"
                placeholder="例：example@test.com">

            @error('email')
                <p class="error-message">{{ $message }}</p>
            @enderror
        </div>

        <div class="form-group">
            <label for="password">パスワード</label>
            <input type="password" name="password" id="password"
                placeholder="例：coachtech">

            @error('password')
                <p class="error-message">{{ $message }}</p>
            @enderror
        </div>

        <div class="auth-button">
            <button type="submit">ログイン</button>
        </div>
    </form>
</div>
@endsection