@extends('layouts.app')

@section('title', 'Confirm')

@section('css')
<link rel="stylesheet" href="{{ asset('css/confirm.css') }}">
@endsection

@section('content')
<div class="confirm-wrapper">

    <h2 class="confirm-title">Confirm</h2>

    {{-- 送信フォーム --}}
    <form action="{{ route('contacts.store') }}" method="post">
        @csrf

        <table class="confirm-table">
            <tr>
                <th>お名前</th>
                <td>{{ $data['last_name'] }} {{ $data['first_name'] }}</td>
            </tr>
            <tr>
                <th>性別</th>
                <td>
                    @if($data['gender'] == 1) 男性
                    @elseif($data['gender'] == 2) 女性
                    @else その他
                    @endif
                </td>
            </tr>
            <tr>
                <th>メールアドレス</th>
                <td>{{ $data['email'] }}</td>
            </tr>
            <tr>
                <th>電話番号</th>
                <td>{{ $data['tel1'] }}-{{ $data['tel2'] }}-{{ $data['tel3'] }}</td>
            </tr>
            <tr>
                <th>住所</th>
                <td>{{ $data['address'] }}</td>
            </tr>
            <tr>
                <th>建物名</th>
                <td>{{ $data['building'] }}</td>
            </tr>
            <tr>
                <th>お問い合わせの種類</th>
                <td>{{ $data['category_content'] }}</td>
            </tr>
            <tr>
                <th>お問い合わせ内容</th>
                <td>{{ $data['detail'] }}</td>
            </tr>
        </table>

        {{-- hidden --}}
        @foreach($data as $key => $value)
            <input type="hidden" name="{{ $key }}" value="{{ $value }}">
        @endforeach

        <div class="confirm-buttons">
            <button type="submit" class="confirm-submit">送信</button>
        </div>
    </form>

    <form action="{{ route('contacts.back') }}" method="post">
        @csrf
        @foreach($data as $key => $value)
            <input type="hidden" name="{{ $key }}" value="{{ $value }}">
        @endforeach
        <button type="submit">修正</button>
    </form>

</div>
@endsection