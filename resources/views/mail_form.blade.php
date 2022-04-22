@extends('layouts.app')

@section('content')
<div class="content_name">お客様メールアドレス登録</div>

<form id="form" class="" name="faraday_form" action="{{ route('mail_confirm') }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="form_column">
        <div class="form_name">お名前<span class="require_mark">※</span></div>
        {{ Form::text('name', old('name'), ['class' => 'form_text', 'maxlength' => 20, 'placeholder' => '例）山田太郎']) }}
    </div>

    <div class="form_column">
        <div class="form_name">お名前（カナ）<span class="require_mark">※</span></div>
        {{ Form::text('name_kana', old('name_kana'), ['class' => 'form_text', 'maxlength' => 30, 'placeholder' => '例）ヤマダタロウ']) }}
    </div>

    <div class="form_column">
        <div class="form_name">メールアドレス<span class="require_mark">※</span></div>
        {{ Form::text('mail', old('mail'), ['class' => 'form_text', 'maxlength' => 100, 'placeholder' => '例）xxxxx@xxxxx.co.jp']) }}
    </div>

    <a href="#" onclick="clickFormButton()" class="btn_a">
        <div class="btn_green" style="margin-top:50px;">確認画面へ</div>
    </a>
</form>

@endsection




