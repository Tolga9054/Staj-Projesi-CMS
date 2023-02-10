<?php

namespace App\Http\Controllers\admin\setting;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setting;
use App\Models\LanguageContent;

class indexController extends Controller
{
    public function index()
    {
      $data = Setting::where('id',1)->get();
      return view('admin.setting.index',['data'=>$data]);
    }

    public function update(Request $request )
    {
        $all = $request->except('_token');
        if(isset($all['title'])){
          LanguageContent::InsertOrUpdate($all['title'],SITE_SETTING_LANGUAGE,TITLE_LANGUAGE,1);
          unset($all['title']);
        }
        if(isset($all['description'])){
          LanguageContent::InsertOrUpdate($all['description'],SITE_SETTING_LANGUAGE,DESCRIPTION_LANGUAGE,1);
          unset($all['description']);
        }
        if(isset($all['keywords'])){
          LanguageContent::InsertOrUpdate($all['keywords'],SITE_SETTING_LANGUAGE,KEYWORDS_LANGUAGE,1);
          unset($all['keywords']);
        }
        if(isset($all['footer_text'])){
          LanguageContent::InsertOrUpdate($all['footer_text'],SITE_SETTING_LANGUAGE,FOOTER_TEXT_LANGUAGE,1);
          unset($all['footer_text']);
        }
        if(isset($all['banner_title'])){
          LanguageContent::InsertOrUpdate($all['banner_title'],SITE_SETTING_LANGUAGE,BANNER_TITLE_LANGUAGE,1);
          unset($all['banner_title']);
        }
        if(isset($all['banner_description'])){
          LanguageContent::InsertOrUpdate($all['banner_description'],SITE_SETTING_LANGUAGE,BANNER_DESCRIPTION_LANGUAGE,1);
          unset($all['banner_description']);
        }

        $update = Setting::where('id',1)->update($all);
        return redirect()->back()->with('status','Bilgiler başarıyla düzenlendi.');
    }


}
