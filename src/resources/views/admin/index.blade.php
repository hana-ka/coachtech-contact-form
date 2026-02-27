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
                <option value="1">男性</option>
                <option value="2">女性</option>
                <option value="3">その他</option>
            </select>

            <select>
                <option value="">お問い合わせの種類</option>
            </select>

            <input type="date">

            <button type="submit" class="search-btn">検索</button>
            <button type="reset" class="reset-btn">リセット</button>
        </form>
    </div>

    {{-- エクスポート & ページネーション --}}
    <div class="admin-top-row">
        <button class="export-btn">エクスポート</button>

        <div class="admin-pagination">
            {{ $contacts->links('pagination::bootstrap-4') }}
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

                @foreach($contacts as $contact)
                <tr>
                    <td>{{ $contact->name }}</td>

                    <td>
                        @if($contact->gender == 1) 男性
                        @elseif($contact->gender == 2) 女性
                        @else その他
                        @endif
                    </td>

                    <td>{{ $contact->email }}</td>

                    <td>{{ $contact->category->content ?? '' }}</td>

                    <td>
                        <label for="modal-{{ $contact->id }}" class="detail-btn">詳細</label>
                    </td>
                </tr>

                {{-- ===== 個別モーダル ===== --}}
                <input type="checkbox" id="modal-{{ $contact->id }}" class="modal-toggle">

                <div class="modal">
                    <div class="modal-content">

                        <label for="modal-{{ $contact->id }}" class="modal-close">×</label>

                        <h3>お問い合わせ詳細</h3>

                        <p><strong>お名前：</strong>{{ $contact->name }}</p>
                        <p><strong>性別：</strong>
                            @if($contact->gender == 1) 男性
                            @elseif($contact->gender == 2) 女性
                            @else その他
                            @endif
                        </p>
                        <p><strong>メール：</strong>{{ $contact->email }}</p>
                        <p><strong>電話番号：</strong>{{ $contact->tel }}</p>
                        <p><strong>住所：</strong>{{ $contact->address }}</p>
                        <p><strong>建物名：</strong>{{ $contact->building }}</p>
                        <p><strong>種類：</strong>{{ $contact->category->content ?? '' }}</p>
                        <p><strong>内容：</strong>{{ $contact->detail }}</p>

                        <form action="{{ route('admin.destroy', $contact->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="delete-btn">削除</button>
                        </form>

                    </div>
                </div>

                @endforeach

            </tbody>
        </table>
    </div>

</div>
@endsection