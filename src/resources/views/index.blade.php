@extends('layouts.app')

@section('title', 'Contact')

@section('css')
<link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection

@section('content')
<div class="contact-wrapper">

    <h2 class="contact-title">Contact</h2>

    <form action="/confirm" method="post" class="contact-form" novalidate>
        @csrf

        {{-- お名前 --}}
        <div class="form-item">
            <div class="form-label">
                お名前 <span class="required">※</span>
            </div>
            <div class="form-input name-row">
                <input type="text" name="last_name" placeholder="例：山田">

                @error('last_name')
                <p class="error-message">{{ $message }}</p>
                @enderror

                <input type="text" name="first_name" placeholder="例：太郎">

                @error('first_name')
                <p class="error-message">{{ $message }}</p>
                @enderror
            </div>
        </div>

        {{-- 性別 --}}
        <div class="form-item">
            <div class="form-label">
                性別 <span class="required">※</span>
            </div>
            <div class="form-input radio-row">
                <label><input type="radio" name="gender" value="1"> 男性</label>
                <label><input type="radio" name="gender" value="2"> 女性</label>
                <label><input type="radio" name="gender" value="3"> その他</label>

                @error('gender')
                <p class="error-message">{{ $message }}</p>
                @enderror
            </div>
        </div>

        {{-- メール --}}
        <div class="form-item">
            <div class="form-label">
                メールアドレス <span class="required">※</span>
            </div>
            <div class="form-input">
                <input type="email" name="email" placeholder="例：example@test.com">

                @error('email')
                <p class="error-message">{{ $message }}</p>
                @enderror
            </div>
        </div>

        {{-- 電話番号 --}}
        <div class="form-item">
            <div class="form-label">
                電話番号 <span class="required">※</span>
            </div>
            <div class="form-input tel-row">
                <input type="text" name="tel1" placeholder="080">
                <span>-</span>
                <input type="text" name="tel2" placeholder="1234">
                <span>-</span>
                <input type="text" name="tel3" placeholder="5678">

                @error('tel1')
                <p class="error-message">{{ $message }}</p>
                @enderror
            </div>
        </div>

        {{-- 住所 --}}
        <div class="form-item">
            <div class="form-label">
                住所 <span class="required">※</span>
            </div>
            <div class="form-input">
                <input type="text" name="address" placeholder="例：東京都渋谷区渋谷1-23">

                @error('address')
                <p class="error-message">{{ $message }}</p>
                @enderror
            </div>
        </div>

        {{-- 建物名 --}}
        <div class="form-item">
            <div class="form-label">
                建物名
            </div>
            <div class="form-input">
                <input type="text" name="building" placeholder="例：渋谷マンション101">
            </div>
        </div>

        {{-- 種類 --}}
        <div class="form-item">
            <div class="form-label">
                お問い合わせの種類 <span class="required">※</span>
            </div>
            <div class="form-input">
                <select name="category_id">
                    <option value="" disabled selected>選択してください</option>
                </select>
                @error('category_id')
                <p class="error-message">{{ $message }}</p>
                @enderror
            </div>
        </div>

        {{-- 内容 --}}
        <div class="form-item">
            <div class="form-label">
                お問い合わせ内容 <span class="required">※</span>
            </div>
            <div class="form-input">
                <textarea name="detail" placeholder="お問合せ内容をご記載ください"></textarea>

                @error('detail')
                <p class="error-message">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <div class="form-button">
            <button type="submit">確認画面</button>
        </div>

    </form>
</div>
@endsection