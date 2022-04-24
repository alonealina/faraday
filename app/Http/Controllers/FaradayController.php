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
        return view('regist_confirm', [
            'number_c' => $request['number_c'],
            'current_company' => $request['current_company'],
            'current_area' => $request['current_area'],
            'current_menu' => $request['current_menu'],
            'number_s' => $request['number_s'],
            'postal' => $request['postal'],
            'address' => $request['address'],
            'building' => $request['building'],
            'name' => $request['name'],
            'name_kana' => $request['name_kana'],
            'tel_select' => $request['tel_select'],
            'tel1' => $request['tel1'],
            'tel2' => $request['tel2'],
            'tel3' => $request['tel3'],
            'mail' => $request['mail'],
            'contact_diff' => $request['contact_diff'],
            'postal_diff' => $request['postal_diff'],
            'address_diff' => $request['address_diff'],
            'building_diff' => $request['building_diff'],
            'name_diff' => $request['name_diff'],
            'name_kana_diff' => $request['name_kana_diff'],
            'tel_select_diff' => $request['tel_select_diff'],
            'tel1_diff' => $request['tel1_diff'],
            'tel2_diff' => $request['tel2_diff'],
            'tel3_diff' => $request['tel3_diff'],
            'textarea' => $request['textarea'],
            'pay_type' => $request['pay_type'],
            'tel3_diff' => $request['tel3_diff'],
            'tel3_diff' => $request['tel3_diff'],
            'tel3_diff' => $request['tel3_diff'],
            'tel3_diff' => $request['tel3_diff'],
            'tel3_diff' => $request['tel3_diff'],
            'tel3_diff' => $request['tel3_diff'],
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
