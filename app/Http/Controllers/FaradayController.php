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
