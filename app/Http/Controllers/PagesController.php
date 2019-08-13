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
       $logo = config('puzzles.logo');

       $titleRu = config('puzzles.title_ru');       
       $titleEng = config('puzzles.title_eng');

       $h1Ru = config('puzzles.h1_ru');
       $h1Eng = config('puzzles.h1_eng');

       $descriptionRu = config('puzzles.description_ru');
       $descriptionEng = config('puzzles.description_eng');

       $puzzlesDescriptionRu = config('puzzles.puzzles_description_ru');
       $puzzlesDescriptionEng = config('puzzles.puzzles_description_eng');

       $linkVideo = config('puzzles.video_url');

       $content = view('sleeping-owl.pages.main',compact(['logo', 'titleRu', 'h1Ru', 'titleEng', 'h1Eng',
                                                          'descriptionRu', 'descriptionEng', 'puzzlesDescriptionRu',
                                                          'puzzlesDescriptionEng', 'linkVideo']));
	   return AdminSection::view($content, 'Страницы: главная');
    }

     public function post(Request $request)
    {              
       $fileName = 'puzzles';
       $this->rewriteConfig($fileName, 'logo' , $request->logo);
       $this->rewriteConfig($fileName, 'title_ru' , $request->titleRu);
       $this->rewriteConfig($fileName, 'title_eng' , $request->titleEng);
       $this->rewriteConfig($fileName, 'h1_ru' , $request->h1Ru);
       $this->rewriteConfig($fileName, 'h1_eng' , $request->h1Eng);
       $this->rewriteConfig($fileName, 'description_ru' , $request->descriptionRu);
       $this->rewriteConfig($fileName, 'description_eng' , $request->descriptionEng);
       $this->rewriteConfig($fileName, 'puzzles_description_ru' , $request->puzzlesDescriptionRu);
       $this->rewriteConfig($fileName, 'puzzles_description_eng' , $request->puzzlesDescriptionEng);

       return Redirect::back();
    }

    public function rewriteConfig($fileName, $variableName, $variableValue)
    {
       config([$fileName.'.'.$variableName => $variableValue]);
       $fp = fopen(base_path() .'/config/'.$fileName.'.php' , 'w');
       fwrite($fp, '<?php return ' . var_export(config($fileName), true) . ';');
       fclose($fp);
    }
}
