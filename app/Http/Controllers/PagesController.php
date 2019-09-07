<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use AdminSection;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Redirect;

class PagesController extends Controller
{
    public function main(Request $request)
    {
       $content = view('sleeping-owl.pages.main');
	   return AdminSection::view($content, 'Страницы: главная');
    }

    public function memberCases(Request $request)
    {              
       $content = view('sleeping-owl.pages.seo', ['view' => 'member_cases'] );//view('sleeping-owl.pages.member-cases');
	   return AdminSection::view($content, 'Страницы SEO: истории болезней');
    }

    public function factorDiagram(Request $request)
    {              
       $content = view('sleeping-owl.pages.factor-diagram');
	   return AdminSection::view($content, 'Страницы: диаграмма факторов');
    }

    public function about(Request $request)
    {
       $content = view('sleeping-owl.pages.about');
	   return AdminSection::view($content, 'Страницы: о нас');
    }

    public function news(Request $request)
    {              
       $content = view('sleeping-owl.pages.seo', ['view' => 'news'] );//view('sleeping-owl.pages.news');
	   return AdminSection::view($content, 'Страницы SEO: новости');
    }

    public function literature(Request $request)
    {              
       $content = view('sleeping-owl.pages.seo', ['view' => 'literature'] );//view('sleeping-owl.pages.literature');
	   return AdminSection::view($content, 'Страницы SEO: литература');
    }

    public function faq(Request $request)
    {              
       $content = view('sleeping-owl.pages.seo', ['view' => 'faq'] );//view('sleeping-owl.pages.faq');
	   return AdminSection::view($content, 'Страницы SEO: faq');
    }

    public function post(Request $request)
    {
       if($request->page == "main"){
           //dd($request->all());
           $this->rewriteConfig($request->page, 'logo' , $request->logo);
           $this->rewriteConfig($request->page, 'title_ru' , $request->titleRu);
           $this->rewriteConfig($request->page, 'title_eng' , $request->titleEng);
           $this->rewriteConfig($request->page, '_description_ru' , $request->_descriptionRu);
           $this->rewriteConfig($request->page, '_description_eng' , $request->_descriptionEng);
           $this->rewriteConfig($request->page, 'h1_ru' , $request->h1Ru);
           $this->rewriteConfig($request->page, 'h1_eng' , $request->h1Eng);
           $this->rewriteConfig($request->page, 'description_ru' , $request->descriptionRu);
           $this->rewriteConfig($request->page, 'description_eng' , $request->descriptionEng);
           $this->rewriteConfig($request->page, 'puzzles_description_ru' , $request->puzzlesDescriptionRu);
           $this->rewriteConfig($request->page, 'puzzles_description_eng' , $request->puzzlesDescriptionEng);
           $this->rewriteConfig($request->page, 'link_video' , $request->linkVideo);
       }
       if($request->page == "about"){
           $this->rewriteConfig($request->page, 'img' , $request->img);
           $this->rewriteConfig($request->page, 'title_ru' , $request->titleRu);
           $this->rewriteConfig($request->page, 'title_eng' , $request->titleEng);
           $this->rewriteConfig($request->page, '_description_ru' , $request->_descriptionRu);
           $this->rewriteConfig($request->page, '_description_eng' , $request->_descriptionEng);
           $this->rewriteConfig($request->page, 'description_ru' , $request->descriptionRu);
           $this->rewriteConfig($request->page, 'description_eng' , $request->descriptionEng);
           $this->rewriteConfig($request->page, 'puzzles_description_ru' , $request->puzzlesDescriptionRu);
           $this->rewriteConfig($request->page, 'puzzles_description_eng' , $request->puzzlesDescriptionEng);
       }
       if($request->page == "member_cases" || $request->page == "faq" || $request->page == "literature" ||
          $request->page == "news" || $request->page == "factor_diagram" ){
           $this->rewriteConfig($request->page, 'title_ru' , $request->titleRu);
           $this->rewriteConfig($request->page, 'title_eng' , $request->titleEng);
           $this->rewriteConfig($request->page, '_description_ru' , $request->_descriptionRu);
           $this->rewriteConfig($request->page, '_description_eng' , $request->_descriptionEng);
       }


       return Redirect::back();
    }

    public function rewriteConfig($fileName, $variableName, $variableValue)
    {
       config([$fileName.'.'.$variableName => $variableValue]);
       $fp = fopen(base_path() .'/config/puzzles/'.$fileName.'.php' , 'w');
       fwrite($fp, '<?php return ' . var_export(config($fileName), true) . ';');
       fclose($fp);
    }
}
