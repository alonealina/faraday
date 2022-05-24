@extends('layouts.app')

@section('content')
<div class="regist_text">カンタン入力で登録完了！</div>
<img src="{{ asset('img/bar2.png') }}" class="regist_img">

<form id="form" class="" name="faraday_form" action="{{ route('regist_complete') }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="content_name">現在の申込種別</div>
    <div class="form_column">
        <div class="form_name">現在の契約番号<span class="require_mark">※</span></div>
        <div class="form_confirm">{{ $number_c }}</div>
    </div>
    <div class="form_column">
        <div class="form_name">現在の電力会社<span class="require_mark">※</span></div>
        <div class="form_confirm">{{ $current_company }}</div>
    </div>
    <div class="form_column">
        <div class="form_name">現在の電力エリア<span class="require_mark">※</span></div>
        <div class="form_confirm">{{ $current_area }}</div>
    </div>
    <div class="form_column">
        <div class="form_name">現在の料金メニュー<span class="require_mark">※</span></div>
        <div class="form_confirm">{{ $current_menu }}</div>
    </div>

    <div class="content_name">ご契約者様情報</div>
    <div class="form_column">
        <div class="form_name">供給地点特定番号<span class="require_mark">※</span></div>
        <div class="form_confirm">{{ $number_s1 }}-{{ $number_s2 }}-{{ $number_s3 }}-{{ $number_s4 }}-{{ $number_s5 }}-{{ $number_s6 }}</div>
    </div>
    <div class="form_column">
        <div class="form_name">郵便番号<span class="require_mark">※</span></div>
        <div class="form_confirm">{{ $zip }}</div>
    </div>
    <div class="form_column">
        <div class="form_name">都道府県<span class="require_mark">※</span></div>
        <div class="form_confirm">{{ $pref_name }}</div>
    </div>
    <div class="form_column">
        <div class="form_name">市区郡名<span class="require_mark">※</span></div>
        <div class="form_confirm">{{ $city_name }}</div>
    </div>
    <div class="form_column">
        <div class="form_name">町名<span class="require_mark">※</span></div>
        <div class="form_confirm">{{ $town_name }}</div>
    </div>
    <div class="form_column">
        <div class="form_name">丁目・番地<span class="require_mark">※</span></div>
        <div class="form_confirm">{{ $add_name }}</div>
    </div>
    <div class="form_column">
        <div class="form_name">建物名など<span class="require_mark">※</span></div>
        <div class="form_confirm">{{ $building }}</div>
    </div>

    @if($name_type == '個人')
    <div class="form_column">
        <div class="form_name">お名前<span class="require_mark">※</span></div>
        <div class="form_confirm">{{ $name }}</div>
    </div>
    <div class="form_column">
        <div class="form_name">お名前（カナ）<span class="require_mark">※</span></div>
        <div class="form_confirm">{{ $name_kana }}</div>
    </div>
    @else
    <div class="form_column">
        <div class="form_name">法人名<span class="require_mark">※</span></div>
        <div class="form_confirm">{{ $name_cp }}</div>
    </div>
    <div class="form_column">
        <div class="form_name">法人名（カナ）<span class="require_mark">※</span></div>
        <div class="form_confirm">{{ $name_kana_cp }}</div>
    </div>
    <div class="form_column">
        <div class="form_name">ご担当者様部署<span class="require_mark">※</span></div>
        <div class="form_confirm">{{ $charge_depart }}</div>
    </div>
    <div class="form_column">
        <div class="form_name">ご担当者様名<span class="require_mark">※</span></div>
        <div class="form_confirm">{{ $charge_name }}</div>
    </div>
    @endif


    <div class="form_column">
        <div class="form_name">電話番号<span class="require_mark">※</span></div>
        <div class="tel_column">
            <div class="form_confirm">{{ $tel1 }}-{{ $tel2 }}-{{ $tel3 }}</div>
        </div>
    </div>
    <div class="form_column">
        <div class="form_name">メールアドレス<span class="require_mark">※</span></div>
        <div class="form_confirm">{{ $mail }}</div>
    </div>

    @if($contact_diff)
    <div class="content_name">ご連絡先情報</div>
    <div class="form_column">
        <div class="form_name">郵便番号<span class="require_mark">※</span></div>
        <div class="form_confirm">{{ $zip_diff }}</div>
    </div>
    <div class="form_column">
        <div class="form_name">都道府県<span class="require_mark">※</span></div>
        <div class="form_confirm">{{ $pref_name2 }}</div>
    </div>
    <div class="form_column">
        <div class="form_name">市区郡名<span class="require_mark">※</span></div>
        <div class="form_confirm">{{ $city_name2 }}</div>
    </div>
    <div class="form_column">
        <div class="form_name">町名<span class="require_mark">※</span></div>
        <div class="form_confirm">{{ $town_name2 }}</div>
    </div>
    <div class="form_column">
        <div class="form_name">丁目・番地<span class="require_mark">※</span></div>
        <div class="form_confirm">{{ $add_name2 }}</div>
    </div>    <div class="form_column">
        <div class="form_name">建物名など<span class="require_mark">※</span></div>
        <div class="form_confirm">{{ $building_diff }}</div>
    </div>
    <div class="form_column">
        <div class="form_name">電話番号<span class="require_mark">※</span></div>
        <div class="tel_column">
            <div class="form_confirm">{{ $tel1_diff }}-{{ $tel2_diff }}-{{ $tel3_diff }}</div>
        </div>
    </div>
    @endif

    <div class="content_name">ご連絡事項</div>
    <div class="content_textarea">{{ $textarea }}</div>

    <div class="content_name">お支払方法選択</div>
    <div class="form_column">
        <div class="form_name">お支払方法<span class="require_mark">※</span></div>
        <div class="tel_column">
            <div class="form_confirm">{{ $pay_type }}</div>
        </div>
    </div>
</form>

<a href="#" onclick="history.back(-1);return false;" class="btn_a">
    <div class="btn_green" style="margin-top:50px;">戻る</div>
</a>
<a href="#" onclick="clickFormButton()" class="btn_a">
    <div class="btn_green" style="margin-top:50px;">内容を確認し完了</div>
</a>

@endsection




