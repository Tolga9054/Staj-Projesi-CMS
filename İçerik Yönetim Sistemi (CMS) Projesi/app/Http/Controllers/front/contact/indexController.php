<?php

namespace App\Http\Controllers\front\contact;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use App\Models\Setting;

class indexController extends Controller
{
    public function index()
    {
        $settings = Setting::where('id',1)->get();
        return view('front.contact.index',['settings' => $settings]);
    }

    public function store(Request $request)
    {
        $request->validate(['name'=>'required','email'=>'required','message'=>'required']);
        $all = $request->except('token');

        $data = ['name'=>$all['name'],'email'=>$all['email'],'text'=>$all['message']];
        try{
            mail::send('mail.contact',$data, function ($message){
                $message->subject('İletişim');
                $message->to(SYSTEM_EMAIL);
            });
            return redirect()->back()->with('swal',trans('general.contact_form_success'));
        }
        catch(\Exception $e){
            Log::info($e->getMessage());
            return redirect()->back()->with('swal',trans('general.contact_form_alert'));
        }

    }
}
