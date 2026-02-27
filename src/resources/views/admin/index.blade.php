@extends('layouts.app')

@section('title', 'Admin')

@section('header-btn')
<form action="{{ route('logout') }}" method="POST">
    @csrf
    <button type="submit" class="logout-btn">logout</button>
</form>
@endsection

@section('css')
<link rel="stylesheet" href="{{ asset('css/admin.css') }}">
@endsection

@section('content')
<div class="admin-wrapper">

    <h2 class="admin-title">Admin</h2>

    {{-- ================= 検索フォーム ================= --}}
    <div class="admin-search">
        <form class="search-form">

            <input type="text" placeholder="名前やメールアドレスを入力してください">

            <select>
                <option value="">性別</option>
                <option>男性</option>
                <option>女性</option>
                <option>その他</option>
            </select>

            <select>
                <option value="">お問い合わせの種類</option>
            </select>

            <input type="date">

            <button type="submit" class="search-btn">検索</button>
            <button type="reset" class="reset-btn">リセット</button>

        </form>
    </div>

    <div class="admin-top-row">
    <button class="export-btn">エクスポート</button>

    <div class="admin-pagination">
        <span>&lt;</span>
        <span class="active">1</span>
        <span>2</span>
        <span>3</span>
        <span>4</span>
        <span>5</span>
        <span>&gt;</span>
    </div>
</div>


    {{-- ================= 一覧テーブル ================= --}}
    <div class="admin-table">
        <table>
            <thead>
                <tr>
                    <th>お名前</th>
                    <th>性別</th>
                    <th>メールアドレス</th>
                    <th>お問い合わせの種類</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                {{-- ダミーデータ --}}
                <tr>
                    <td>山田 太郎</td>
                    <td>男性</td>
                    <td>test@example.com</td>
                    <td>商品のお問い合わせ</td>
                    <td>
                        <button class="detail-btn">詳細</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

</div>
@endsection