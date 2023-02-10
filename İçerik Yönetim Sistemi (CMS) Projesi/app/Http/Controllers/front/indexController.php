<?php

namespace App\Http\Controllers\front;

use App\Helper\mHelper;
use App\Http\Controllers\Controller;
use App\Models\LanguageContent;
use App\Models\Newsletter;
use App\Models\Setting;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use App\Models\Slider;
use App\Models\Services;
use App\Models\Project;
use App\Models\Team;
use App\Models\Blog;
use App\Models\Referans;
use App\Models\Language;
use Illuminate\Support\Facades\Mail;


class indexController extends Controller
{
    public function index()
    {
      $slider = Slider::orderBy('orderNumber','asc')->get();
      $services = Services::where('isHome',ACTIVE)->orderBy('orderNumber','asc')->get();
      $projects = Project::where('isShow',ACTIVE)->orderBy('orderNumber','asc')->get();
      $teams = Team::orderBy('orderNumber','asc')->get();
      $blog = Blog::where('isShow',ACTIVE)->orderBy('date','desc')->limit(3)->get();
      $referans = Referans::orderBy('orderNumber','asc')->get();
      $settings = Setting::where('id',1)->get();

      return view('front.index',[
        'slider'=>$slider,
        'services'=>$services,
        'projects'=>$projects,
        'teams'=>$teams,
        'blog'=>$blog,
        'referans'=>$referans,
          'settings' => $settings
      ]);
    }


    public function lang($lang){
        $c = Language::where('code',$lang)->count();
        if ($c!=0){
            session(['locale'=>$lang]);
        }
        return redirect('/'.$lang);
    }

    public function offer(Request $request)
    {
        $request->validate(['name'=>'required','email'=>'required','subject'=>'required','message'=>'required']);
        $all = $request->except('_token');

        $data = ['name'=>$all['name'],'email'=>$all['email'],'subject'=>$all['subject'],'text'=>$all['message']];

        try{
            mail::send('mail.offer',$data, function ($message){
                $message->subject('Online Teklif');
                $message->to(SYSTEM_EMAIL);
            });
            return redirect()->back()->with('swal',trans('general.offer_success'));
        }
        catch(\Exception $e){
            Log::info($e->getMessage());
            return redirect()->back()->with('swal',trans('general.offer_alert'));
        }

    }

    public function sitemap()
    {
        $languageId = mHelper::getLanguageId();
        $service = LanguageContent::where('languageId',$languageId)->where('chapter',SERVICE_LANGUAGE)
            ->where('chapterSub',SLUG_LANGUAGE)
            ->get();
        $page = LanguageContent::where('languageId',$languageId)->where('chapter',PAGE_LANGUAGE)
            ->where('chapterSub',SLUG_LANGUAGE)
            ->get();
        $blog = LanguageContent::where('languageId',$languageId)->where('chapter',BLOG_LANGUAGE)
            ->where('chapterSub',SLUG_LANGUAGE)
            ->get();

        $now = Carbon::now()->toAtomString();
        $content = view('front.sitemap',compact('service','page','blog','now'));
        return response($content)->header('Content-Type','application/xml');
    }

    public function newsletter(Request $request){

        $request->validate(['email'=>'required']);
        $email = $request->get('email');
        $c = Newsletter::where('email',$email)->count();
        if($c!=0){
            return redirect('/')->with('swal',trans("general.newsletter_found"));
        }
        else{
            Newsletter::create(['email'=>$email]);
            return redirect('/')->with('swal',trans("general.newsletter_ok"));
        }
    }



}
