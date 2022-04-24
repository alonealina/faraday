@extends('layouts.app')

@section('content')
<div class="regist_text">カンタン入力で登録完了！</div>
<img src="{{ asset('img/bar1.png') }}" class="regist_img">

<div class="content_name">お申し込みの前に</div>
<div class="regist_explain">
    <a href="">特定商取引法に基づく表記</a>についてをご覧ください。<br>
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
    <div class="form_column">
        <div class="form_name">供給地点特定番号<span class="require_mark">※</span></div>
        <div>
        {{ Form::text('number_s', old('number_s'), ['class' => 'form_text', 'maxlength' => 22, 'placeholder' => '']) }}
        <div class="supplement">他社よりお乗り換えの場合は検針票に記載のある22桁の番号を入力してください。<br>お引越しの場合は転居先の供給地点特定番号を入力してください。</div>
        </div>
    </div>
    <div class="form_column">
        <div class="form_name">郵便番号<span class="require_mark">※</span></div>
            <div style="width: 480px;">
            {{ Form::text('postal', old('postal'), ['class' => 'postal_input', 'maxlength' => 10, 'placeholder' => '',
                'onkeyup' => "AjaxZip3.zip2addr(this,'','address','address')"]) }}
            <img src="{{ asset('img/address_btn.png') }}" style="margin-left:20px;">
            <div class="supplement">ハイフンなしで入力してください。</div>
        </div>
    </div>
    <div class="form_column">
        <div class="form_name">都道府県・<br>市区町村・番地<span class="require_mark">※</span></div>
        {{ Form::text('address', old('address'), ['class' => 'form_text', 'maxlength' => 30, 'placeholder' => '例）大阪府大阪市北区１－２－３']) }}
    </div>
    <div class="form_column">
        <div class="form_name">建物名など<span class="require_mark">※</span></div>
        {{ Form::text('building', old('building'), ['class' => 'form_text', 'maxlength' => 30, 'placeholder' => '例）電気ハイム　１０１号室']) }}
    </div>
    <div class="form_column">
        <div class="form_name">お名前<span class="require_mark">※</span></div>
        {{ Form::text('name', old('name'), ['class' => 'form_text', 'maxlength' => 30, 'placeholder' => '例）山田太郎']) }}
    </div>
    <div class="form_column">
        <div class="form_name">お名前（カナ）<span class="require_mark">※</span></div>
        {{ Form::text('name_kana', old('name_kana'), ['class' => 'form_text', 'maxlength' => 30, 'placeholder' => '例）ヤマダタロウ']) }}
    </div>
    <div class="form_column">
        <div class="form_name">電話番号<span class="require_mark">※</span></div>
        <div class="tel_column">
            <select name="tel_select" class="tel_select">
                <option value="a">選択</option>
            </select>
            {{ Form::text('tel1', old('tel1'), ['class' => 'tel_text', 'maxlength' => 5, 'placeholder' => '']) }}
            {{ Form::text('tel2', old('tel2'), ['class' => 'tel_text', 'maxlength' => 5, 'placeholder' => '']) }}
            {{ Form::text('tel3', old('tel3'), ['class' => 'tel_text', 'maxlength' => 5, 'placeholder' => '']) }}
        </div>
    </div>
    <div class="form_column">
        <div class="form_name">メールアドレス<span class="require_mark">※</span></div>
        {{ Form::text('mail', old('mail'), ['class' => 'form_text', 'maxlength' => 30, 'placeholder' => '例）xxxxx@xxxxx.co.jp']) }}
    </div>

    <div class="content_name">ご連絡先情報</div>
    <div class="contact_check_div" style="padding: 10px;">
        <input type="checkbox" name="contact_diff" value="1" style="transform:scale(2.0);">
        <span class="contact_diff_span">ご連絡先</span>とご契約者様が<span class="contact_diff_span">異なる</span>場合チェックを入れてください。
        <div id="contact_diff_div">
            <div class="form_column">
                <div class="form_name">郵便番号<span class="require_mark">※</span></div>
                <div style="width: 480px;">
                {{ Form::text('postal_diff', old('postal_diff'), ['class' => 'postal_input', 'maxlength' => 10, 'placeholder' => '',
                    'onkeyup' => "AjaxZip3.zip2addr(this,'','address_diff','address_diff')"]) }}
                <img src="{{ asset('img/address_btn.png') }}" style="margin-left:20px;">
                <div class="supplement">ハイフンなしで入力してください。</div>

                </div>
            </div>
            <div class="form_column">
                <div class="form_name">都道府県・<br>市区町村・番地<span class="require_mark">※</span></div>
                {{ Form::text('address_diff', old('address_diff'), ['class' => 'form_text', 'maxlength' => 30, 'placeholder' => '例）大阪府大阪市北区１－２－３']) }}
            </div>
            <div class="form_column">
                <div class="form_name">建物名など<span class="require_mark">※</span></div>
                {{ Form::text('building_diff', old('building_diff'), ['class' => 'form_text', 'maxlength' => 30, 'placeholder' => '例）電気ハイム　１０１号室']) }}
            </div>
            <div class="form_column">
                <div class="form_name">お名前<span class="require_mark">※</span></div>
                {{ Form::text('name_diff', old('name_diff'), ['class' => 'form_text', 'maxlength' => 30, 'placeholder' => '例）山田太郎']) }}
            </div>
            <div class="form_column">
                <div class="form_name">お名前（カナ）<span class="require_mark">※</span></div>
                {{ Form::text('name_kana_diff', old('name_kana_diff'), ['class' => 'form_text', 'maxlength' => 30, 'placeholder' => '例）ヤマダタロウ']) }}
            </div>
            <div class="form_column">
                <div class="form_name">電話番号<span class="require_mark">※</span></div>
                <div class="tel_column">
                    <select name="tel_select_diff" class="tel_select">
                        <option value="a">選択</option>
                    </select>
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
        <input type="radio" name="pay_type" value="クレジットカード" style="transform:scale(1.2);"> クレジットカード<br>
        <input type="radio" name="pay_type" value="口座振替" style="transform:scale(1.2);"> 口座振替<br>
        <input type="radio" name="pay_type" value="コンビニ決済（払込票）" style="transform:scale(1.2);"> コンビニ決済（払込票）<br>
        <div class="pay_page_btn">GMO決済ページへ移動</div>
        <div class="supplement">※当社サービスの決済はGMOペイメントを使用しています。</div>

    </div>

    <div class="content_name">各種約款に対する遵守事項</div>
    <div class="content_compli">
        <div class="compli_div">
            <input type="checkbox" name="compli" value="1" style="transform:scale(2.0);">
            <span>契約締結前交付書面を確認の上、内容について承諾します。</span>
        </div>
        <div class="supplement" style="margin-left: 42px;"><a href="">契約締結前交付書面</a>をご覧ください。</div>
    </div>

    <div class="content_compli">
        <div class="compli_div">
            <input type="checkbox" name="compli" value="1" style="transform:scale(2.0);">
            <span>低圧電気供給約款を確認の上、</span><br><span style="margin-left:33px;">本規約を電気需給契約の内容とすることについて承諾します。</span>
        </div>
        <div class="supplement" style="margin-left: 42px;">低圧電気需給約款をご覧ください。<br>個別利用規約をご覧ください。</div>
    </div>

    <div class="content_compli">
        <div class="compli_div">
            <input type="checkbox" name="compli" value="1" style="transform:scale(2.0);">
            <span>個人情報の取り扱いについて承諾します。</span>
        </div>
        <div class="supplement" style="margin-left: 42px;"><a href="">個人情報保護方針について</a>をご覧ください。</div>
    </div>
    <script src="https://ajaxzip3.github.io/ajaxzip3.js" charset="UTF-8"></script>
</form>

<a href="#" onclick="clickFormButton()" class="btn_a">
    <div class="btn_green" style="margin-top:50px;">確認画面へ</div>
</a>
@endsection




