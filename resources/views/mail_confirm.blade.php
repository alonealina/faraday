@extends('layouts.app')

@section('content')
<div class="content_name">お客様メールアドレス登録</div>

<form id="form" class="" name="faraday_form" action="{{ route('mail_complete') }}" method="post" enctype="multipart/form-data">
    @csrf
    {{ Form::hidden('name', $name) }}
    {{ Form::hidden('name_kana', $name_kana) }}
    {{ Form::hidden('mail', $mail) }}
    <div class="form_column">
        <div class="form_name">お名前</div>
        <div class="confirm_content">{{ $name }}</div>
    </div>

    <div class="form_column">
        <div class="form_name">お名前（カナ）</div>
        <div class="confirm_content">{{ $name_kana }}</div>
    </div>

    <div class="form_column">
        <div class="form_name">メールアドレス</div>
        <div class="confirm_content">{{ $mail }}</div>
    </div>

    <a href="#" onclick="history.back(-1);return false;" class="btn_a">
        <div class="btn_white" style="margin-top:50px;">戻る</div>
    </a>

    <a href="#" onclick="clickFormButton()" class="btn_a">
        <div class="btn_green" style="margin-top:10px;">送信</div>
    </a>
</form>

@endsection




