<?php

namespace App\Http\Controllers\front\page;

use App\Http\Controllers\Controller;
use App\Models\Language;
use App\Models\LanguageContent;
use Illuminate\Http\Request;


class indexController extends Controller
{
    public function index($slug)
    {


        $id = LanguageContent::getSlugToId(PAGE_LANGUAGE,$slug);

        if($id!=0)
        {

            $name = LanguageContent::getName(PAGE_LANGUAGE,$id);
            $text = LanguageContent::getText(PAGE_LANGUAGE,$id);
            $image = LanguageContent::getImage(PAGE_LANGUAGE,$id);
            return view('front.page.index',['id'=>$id,'name'=>$name,'text'=>$text,'image'=>$image] );


        }
        else{
            return abort(404);
        }
    }
}
