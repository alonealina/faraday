@extends('layouts.app')

@section('content')
<div class="regist_text">カンタン入力で登録完了！</div>
<img src="{{ asset('img/bar1.png') }}" class="regist_img">

<div class="content_name">お申し込みの前に</div>
<div class="regist_explain">
    <a href="{{ asset('pdf/law.pdf') }}" target="_blank">特定商取引法に基づく表記</a>についてをご覧ください。<br>
    お申込みの前に、あらかじめ下記の書類をお手元にご準備ください。<br>
    なお、お引越しの場合で転居先の供給地点特定番号が不明な場合はお問い合わせください。
</div>

<div class="check_column">
    <img src="{{ asset('img/check_img.png') }}" class="check_img">
    <div class="check_text">電気ご使用量のお知らせ（検針票）をお手元にご用意ください</div>
</div>

<div class="check_column">
    <img src="{{ asset('img/check_img.png') }}" class="check_img">
    <div class="check_text">登録するクレジットカード</div>
</div>

<form id="form" class="" name="faraday_form" action="{{ route('regist_confirm') }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="content_name">現在の申込種別</div>
    @if($errors->has('number_c'))
    <div class="error">{{ $errors->first('number_c') }}</div>
    @endif
    <div class="form_column">
        <div class="form_name">現在の契約番号<span class="require_mark">※</span></div>
        <div>
            {{ Form::text('number_c', old('number_c'), ['class' => 'form_text', 'maxlength' => 30, 'placeholder' => '']) }}
            <div class="supplement">統計表をご確認ください。</div>
        </div>
    </div>
    <div class="form_column">
        <div class="form_name">現在の電力会社<span class="require_mark">※</span></div>
        <select name="current_company">
            <option value="00電力">00電力</option>
        </select>
    </div>
    <div class="form_column">
        <div class="form_name">現在の電力エリア<span class="require_mark">※</span></div>
        <select name="current_area">
            <option value="関西電力">関西電力</option>
        </select>
    </div>
    <div class="form_column">
        <div class="form_name">現在の料金メニュー<span class="require_mark">※</span></div>
        <select name="current_menu">
            <option value="エコ未来でんき使い放題">エコ未来でんき使い放題</option>
        </select>
    </div>

    <div class="content_name">開始のご希望日時</div>
    <div class="begin_text">
        切替日（供給開始予定日）は次回検針日または次々回検針日となります。<br>
        日程は、メールにてお知らせいたします。
    </div>

    <div class="content_name">ご契約者様情報</div>
    @if($errors->has('number_s1'))
    <div class="error">{{ $errors->first('number_s1') }}</div>
    @elseif($errors->has('number_s2'))
    <div class="error">{{ $errors->first('number_s2') }}</div>
    @elseif($errors->has('number_s3'))
    <div class="error">{{ $errors->first('number_s3') }}</div>
    @elseif($errors->has('number_s4'))
    <div class="error">{{ $errors->first('number_s4') }}</div>
    @elseif($errors->has('number_s5'))
    <div class="error">{{ $errors->first('number_s5') }}</div>
    @elseif($errors->has('number_s6'))
    <div class="error">{{ $errors->first('number_s6') }}</div>
    @endif
    <div class="form_column">
        <div class="form_name">供給地点特定番号<span class="require_mark">※</span></div>
        <div>
            <div class="number_s_column">
                {{ Form::text('number_s1', old('number_s1'), ['class' => 'number_text2', 'maxlength' => 2, 'onkeyup' => 'nextfeild(this)']) }}
                {{ Form::text('number_s2', old('number_s2'), ['class' => 'number_text4', 'maxlength' => 4, 'onkeyup' => 'nextfeild(this)']) }}
                {{ Form::text('number_s3', old('number_s3'), ['class' => 'number_text4', 'maxlength' => 4, 'onkeyup' => 'nextfeild(this)']) }}
                {{ Form::text('number_s4', old('number_s4'), ['class' => 'number_text4', 'maxlength' => 4, 'onkeyup' => 'nextfeild(this)']) }}
                {{ Form::text('number_s5', old('number_s5'), ['class' => 'number_text4', 'maxlength' => 4, 'onkeyup' => 'nextfeild(this)']) }}
                {{ Form::text('number_s6', old('number_s6'), ['class' => 'number_text4', 'maxlength' => 4, 'onkeyup' => 'nextfeild(this)']) }}
            </div>
            <div class="supplement">他社よりお乗り換えの場合は検針票に記載のある22桁の番号を入力してください。<br>お引越しの場合は転居先の供給地点特定番号を入力してください。</div>
        </div>
    </div>

    @if($errors->has('zip'))
    <div class="error">{{ $errors->first('zip') }}</div>
    @endif
    <div class="form_column">
        <div class="form_name">郵便番号<span class="require_mark">※</span></div>
            <div class="zip_div">
            {{ Form::text('zip', old('zip'), ['class' => 'zip_input', 'maxlength' => 10, 'placeholder' => '',
                'onkeyup' => "AjaxZip3.zip2addr(this,'','pref_name','city_name','town_name','add_name')"]) }}
            <img src="{{ asset('img/address_btn.png') }}" style="margin-left:20px;">
            <div class="supplement">ハイフンなしで入力してください。</div>
        </div>
    </div>
    @if($errors->has('pref_name'))
    <div class="error">{{ $errors->first('pref_name') }}</div>
    @endif
    <div class="form_column">
        <div class="form_name">都道府県<span class="require_mark">※</span></div>
        {{ Form::text('pref_name', old('pref_name'), ['class' => 'form_text', 'maxlength' => 30, 'placeholder' => '']) }}
    </div>
    @if($errors->has('city_name'))
    <div class="error">{{ $errors->first('city_name') }}</div>
    @endif
    <div class="form_column">
        <div class="form_name">市区郡名<span class="require_mark">※</span></div>
        {{ Form::text('city_name', old('city_name'), ['class' => 'form_text', 'maxlength' => 30, 'placeholder' => '']) }}
    </div>
    @if($errors->has('town_name'))
    <div class="error">{{ $errors->first('town_name') }}</div>
    @endif
    <div class="form_column">
        <div class="form_name">町名<span class="require_mark">※</span></div>
        {{ Form::text('town_name', old('town_name'), ['class' => 'form_text', 'maxlength' => 30, 'placeholder' => '']) }}
    </div>
    @if($errors->has('add_name'))
    <div class="error">{{ $errors->first('add_name') }}</div>
    @endif
    <div class="form_column">
        <div class="form_name">丁目・番地<span class="require_mark">※</span></div>
        {{ Form::text('add_name', old('add_name'), ['class' => 'form_text', 'maxlength' => 30, 'placeholder' => '']) }}
    </div>
    <div class="form_column">
        <div class="form_name">建物名など</div>
        {{ Form::text('building', old('building'), ['class' => 'form_text', 'maxlength' => 30, 'placeholder' => '例）電気ハイム　１０１号室']) }}
    </div>

    <div class="content_radio">
        <input type="radio" name="name_type" value="個人" id="Individual" checked> 個人<br>
        <input type="radio" name="name_type" value="法人" id="Corporate"> 法人<br>
    </div>

    <div id="individual_div">
        @if($errors->has('name'))
        <div class="error">{{ $errors->first('name') }}</div>
        @endif
        <div class="form_column">
            <div class="form_name">お名前<span class="require_mark">※</span></div>
            {{ Form::text('name', old('name'), ['class' => 'form_text', 'maxlength' => 30, 'placeholder' => '例）山田太郎']) }}
        </div>
        @if($errors->has('name_kana'))
        <div class="error">{{ $errors->first('name_kana') }}</div>
        @endif
        <div class="form_column">
            <div class="form_name">お名前（カナ）<span class="require_mark">※</span></div>
            {{ Form::text('name_kana', old('name_kana'), ['class' => 'form_text', 'maxlength' => 30, 'placeholder' => '例）ヤマダタロウ']) }}
        </div>
    </div>

    <div id="corporate_div" hidden>
        <div class="form_column">
            <div class="form_name">法人名<span class="require_mark">※</span></div>
            {{ Form::text('name_cp', old('name_cp'), ['class' => 'form_text', 'maxlength' => 30, 'placeholder' => '例）株式会社ファラデー']) }}
        </div>
        <div class="form_column">
            <div class="form_name">法人名（カナ）<span class="require_mark">※</span></div>
            {{ Form::text('name_kana_cp', old('name_kana_cp'), ['class' => 'form_text', 'maxlength' => 30, 'placeholder' => '例）カブシキガイシャファラデー']) }}
        </div>
        <div class="form_column">
            <div class="form_name">ご担当者様部署<span class="require_mark">※</span></div>
            {{ Form::text('charge_depart', old('charge_depart'), ['class' => 'form_text', 'maxlength' => 30, 'placeholder' => '']) }}
        </div>
        <div class="form_column">
            <div class="form_name">ご担当者様名<span class="require_mark">※</span></div>
            {{ Form::text('charge_name', old('charge_name'), ['class' => 'form_text', 'maxlength' => 30, 'placeholder' => '']) }}
        </div>
    </div>

    @if($errors->has('tel1'))
    <div class="error">{{ $errors->first('tel1') }}</div>
    @elseif($errors->has('tel2'))
    <div class="error">{{ $errors->first('tel2') }}</div>
    @elseif($errors->has('tel3'))
    <div class="error">{{ $errors->first('tel3') }}</div>
    @endif
    <div class="form_column">
        <div class="form_name">電話番号<span class="require_mark">※</span></div>
        <div class="tel_column">
            {{ Form::text('tel1', old('tel1'), ['class' => 'tel_text', 'maxlength' => 5, 'placeholder' => '']) }}
            {{ Form::text('tel2', old('tel2'), ['class' => 'tel_text', 'maxlength' => 5, 'placeholder' => '']) }}
            {{ Form::text('tel3', old('tel3'), ['class' => 'tel_text', 'maxlength' => 5, 'placeholder' => '']) }}
        </div>
    </div>
    @if($errors->has('name_kana'))
    <div class="error">{{ $errors->first('mail') }}</div>
    @endif
    <div class="form_column">
        <div class="form_name">メールアドレス<span class="require_mark">※</span></div>
        {{ Form::text('mail', old('mail'), ['class' => 'form_text', 'maxlength' => 30, 'placeholder' => '例）xxxxx@xxxxx.co.jp']) }}
    </div>

    <div class="content_name">ご連絡先情報</div>
    <div class="contact_check_div">
        <input type="checkbox" name="contact_diff" value="1">
        <span class="contact_diff_span">ご連絡先</span>とご契約者様が<span class="contact_diff_span">異なる</span>場合チェックを入れてください。
        <div id="contact_diff_div">
            <div class="form_column">
                <div class="form_name">郵便番号<span class="require_mark">※</span></div>
                <div style="width: 480px;">
                {{ Form::text('zip_diff', old('zip_diff'), ['class' => 'zip_input', 'maxlength' => 10, 'placeholder' => '',
                    'onkeyup' => "AjaxZip3.zip2addr(this,'','pref_name2','city_name2','town_name2','add_name2')"]) }}
                <img src="{{ asset('img/address_btn.png') }}" style="margin-left:20px;">
                <div class="supplement">ハイフンなしで入力してください。</div>

                </div>
            </div>
            <div class="form_column">
                <div class="form_name">都道府県<span class="require_mark">※</span></div>
                {{ Form::text('pref_name2', old('pref_name2'), ['class' => 'form_text', 'maxlength' => 30, 'placeholder' => '']) }}
            </div>
            <div class="form_column">
                <div class="form_name">市区郡名<span class="require_mark">※</span></div>
                {{ Form::text('city_name2', old('city_name2'), ['class' => 'form_text', 'maxlength' => 30, 'placeholder' => '']) }}
            </div>
            <div class="form_column">
                <div class="form_name">町名<span class="require_mark">※</span></div>
                {{ Form::text('town_name2', old('town_name2'), ['class' => 'form_text', 'maxlength' => 30, 'placeholder' => '']) }}
            </div>
            <div class="form_column">
                <div class="form_name">丁目・番地<span class="require_mark">※</span></div>
                {{ Form::text('add_name2', old('add_name2'), ['class' => 'form_text', 'maxlength' => 30, 'placeholder' => '']) }}
            </div>
            <div class="form_column">
                <div class="form_name">建物名など<span class="require_mark">※</span></div>
                {{ Form::text('building', old('building'), ['class' => 'form_text', 'maxlength' => 30, 'placeholder' => '例）電気ハイム　１０１号室']) }}
            </div>
            <div class="form_column">
                <div class="form_name">電話番号<span class="require_mark">※</span></div>
                <div class="tel_column">
                    {{ Form::text('tel1_diff', old('tel1_diff'), ['class' => 'tel_text', 'maxlength' => 5, 'placeholder' => '']) }}
                    {{ Form::text('tel2_diff', old('tel2_diff'), ['class' => 'tel_text', 'maxlength' => 5, 'placeholder' => '']) }}
                    {{ Form::text('tel3_diff', old('tel3_diff'), ['class' => 'tel_text', 'maxlength' => 5, 'placeholder' => '']) }}
                </div>
            </div>
        </div>
    </div>

    <div class="content_name">ご連絡事項</div>
    <div class="content_textarea">
        <textarea name="textarea"></textarea>
        <div class="supplement">全角（300文字以内）で入力してください。</div>
    </div>

    <div class="content_name">お支払方法選択</div>
    <div class="content_radio">
        <input type="radio" name="pay_type" value="クレジットカード"> クレジットカード<br>
        <input type="radio" name="pay_type" value="口座振替"> 口座振替<br>
        <input type="radio" name="pay_type" value="コンビニ決済（払込票）"> コンビニ決済（払込票）<br>
        <div class="pay_page_btn">GMO決済ページへ移動</div>
        <div class="supplement" style="width: 350px;">※当社サービスの決済はGMOペイメントを使用しています。</div>
    </div>

    <div class="content_name">各種約款に対する遵守事項</div>
    <div class="content_compli">
        <div class="compli_div">
            <input type="checkbox" id="Check1" value="1">
            <span>契約締結前交付書面を確認の上、内容について承諾します。</span>
        </div>
        <div class="supplement compli_ml"><a href="{{ asset('pdf/contract.pdf') }}" target="_blank">契約締結前交付書面</a>をご覧ください。</div>
    </div>

    <div class="content_compli">
        <div class="compli_div">
            <input type="checkbox" id="Check2" value="1">
            <span>低圧電気供給約款を確認の上、</span><br><span class="compli_span">本規約を電気需給契約の内容とすることについて承諾します。</span>
        </div>
        <div class="supplement compli_ml">低圧電気需給約款をご覧ください。<br>個別利用規約をご覧ください。</div>
    </div>

    <div class="content_compli">
        <div class="compli_div">
            <input type="checkbox" id="Check3" value="1">
            <span>個人情報の取り扱いについて承諾します。</span>
        </div>
        <div class="supplement compli_ml"><a href="{{ asset('pdf/policy.pdf') }}" target="_blank">個人情報保護方針について</a>をご覧ください。</div>
    </div>
    <script src="https://ajaxzip3.github.io/ajaxzip3.js" charset="UTF-8"></script>
</form>

<a onclick="clickFormButton()" class="btn_a">
    <div class="btn_green" style="margin-top:50px;">確認画面へ</div>
</a>
@endsection




