@extends('layouts.app')

@section('title', 'Confirm')

@section('css')
<link rel="stylesheet" href="{{ asset('css/confirm.css') }}">
@endsection

@section('content')
<div class="confirm-wrapper">

    <h2 class="confirm-title">Confirm</h2>

    <form action="/thanks" method="post">
        @csrf

        <table class="confirm-table">
            <tr>
                <th>お名前</th>
                <td>
                    {{ $data['last_name'] ?? '' }}
                    {{ $data['first_name'] ?? '' }}
                </td>
            </tr>

            <tr>
                <th>性別</th>
                <td>
                    @if(($data['gender'] ?? null) == 1)
                        男性
                    @elseif(($data['gender'] ?? null) == 2)
                        女性
                    @elseif(($data['gender'] ?? null) == 3)
                        その他
                    @endif
                </td>
            </tr>

            <tr>
                <th>メールアドレス</th>
                <td>{{ $data['email'] ?? '' }}</td>
            </tr>

            <tr>
                <th>電話番号</th>
                <td>
                    {{ $data['tel1'] ?? '' }}{{ $data['tel2'] ?? '' }}{{ $data['tel3'] ?? '' }}
                </td>
            </tr>

            <tr>
                <th>住所</th>
                <td>{{ $data['address'] ?? '' }}</td>
            </tr>

            <tr>
                <th>建物名</th>
                <td>{{ $data['building'] ?? '' }}</td>
            </tr>

            <tr>
                <th>お問い合わせの種類</th>
                <td>{{ $data['category'] ?? '' }}</td>
            </tr>

            <tr>
                <th>お問い合わせ内容</th>
                <td>{{ $data['detail'] ?? '' }}</td>
            </tr>
        </table>

        {{-- hidden引き継ぎ --}}
        @foreach($data as $key => $value)
            <input type="hidden" name="{{ $key }}" value="{{ $value }}">
        @endforeach

        <div class="confirm-buttons">
            <button type="submit" class="confirm-submit">送信</button>
            <a href="/" class="confirm-back">修正</a>
        </div>

    </form>

</div>
@endsection