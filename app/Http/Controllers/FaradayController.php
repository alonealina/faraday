<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\StreamedResponse;
use App\Models\Application;
use App\Models\Adminuser;
use App\Rules\AlphaNumCheck;
use App\Rules\PhoneCheck;
use App\Rules\MailCheck;
use DB;
use Mail;
use Session;

class FaradayController extends Controller
{
    public function regist_form()
    {
        return view('regist_form');
    }

    public function regist_confirm(Request $request)
    {
        $rules = [
            'number_c' => 'required',
            'number_s1' => 'required',
            'number_s2' => 'required',
            'number_s3' => 'required',
            'number_s4' => 'required',
            'number_s5' => 'required',
            'number_s6' => 'required',
            'zip' => 'required',
            'pref_name' => 'required',
            'city_name' => 'required',
            'town_name' => 'required',
            'add_name' => 'required',
            'name' => 'required',
            'name_kana' => 'required',
            'tel1' => 'required',
            'tel2' => 'required',
            'tel3' => 'required',
            'mail' => 'required',
        ];

        $messages = [
            'number_c.required' => '契約番号を入力してください',
            'number_s1.required' => '供給地点特定番号を入力してください',
            'number_s2.required' => '供給地点特定番号を入力してください',
            'number_s3.required' => '供給地点特定番号を入力してください',
            'number_s4.required' => '供給地点特定番号を入力してください',
            'number_s5.required' => '供給地点特定番号を入力してください',
            'number_s6.required' => '供給地点特定番号を入力してください',
            'zip.required' => '郵便番号を入力してください',
            'pref_name.required' => '都道府県を入力してください',
            'city_name.required' => '市区郡名を入力してください',
            'town_name.required' => '町名を入力してください',
            'add_name.required' => '丁目・番地を入力してください',
            'name.required' => 'お名前を入力してください',
            'name_kana.required' => 'お名前（カナ）を入力してください',
            'tel1.required' => '電話番号を入力してください',
            'tel2.required' => '電話番号を入力してください',
            'tel3.required' => '電話番号を入力してください',
            'mail.required' => 'メールアドレスを入力してください',
        ];

        Validator::make($request->all(), $rules, $messages)->validate();

        return view('regist_confirm', [
            'number_c' => $request['number_c'],
            'current_company' => $request['current_company'],
            'current_area' => $request['current_area'],
            'current_menu' => $request['current_menu'],
            'number_s1' => $request['number_s1'],
            'number_s2' => $request['number_s2'],
            'number_s3' => $request['number_s3'],
            'number_s4' => $request['number_s4'],
            'number_s5' => $request['number_s5'],
            'number_s6' => $request['number_s6'],
            'zip' => $request['zip'],
            'pref_name' => $request['pref_name'],
            'city_name' => $request['city_name'],
            'town_name' => $request['town_name'],
            'add_name' => $request['add_name'],
            'building' => $request['building'],
            'name_type' => $request['name_type'],
            'name' => $request['name'],
            'name_kana' => $request['name_kana'],
            'name_cp' => $request['name_cp'],
            'name_kana_cp' => $request['name_kana_cp'],
            'charge_depart' => $request['charge_depart'],
            'charge_name' => $request['charge_name'],
            'tel_select' => $request['tel_select'],
            'tel1' => $request['tel1'],
            'tel2' => $request['tel2'],
            'tel3' => $request['tel3'],
            'mail' => $request['mail'],
            'contact_diff' => $request['contact_diff'],
            'zip_diff' => $request['zip_diff'],
            'pref_name2' => $request['pref_name2'],
            'city_name2' => $request['city_name2'],
            'town_name2' => $request['town_name2'],
            'add_name2' => $request['add_name2'],
            'building_diff' => $request['building_diff'],
            'tel_select_diff' => $request['tel_select_diff'],
            'tel1_diff' => $request['tel1_diff'],
            'tel2_diff' => $request['tel2_diff'],
            'tel3_diff' => $request['tel3_diff'],
            'textarea' => $request['textarea'],
            'pay_type' => $request['pay_type'],
        ]);
    }

    public function regist_complete(Request $request)
    {
        return view('regist_complete');
    }

    public function mail_form()
    {
        return view('mail_form');
    }

    public function mail_confirm(Request $request)
    {
        return view('mail_confirm', [
            'name' => $request['name'],
            'name_kana' => $request['name_kana'],
            'mail' => $request['mail'],
        ]);
    }

    public function mail_complete(Request $request)
    {
        return view('mail_complete');
    }

}
