<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use AdminSection;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Redirect;

class OptionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $content = view('sleeping-owl.options.options');
	   return AdminSection::view($content, 'Настройки');
    }

    public function post(Request $request)
    {              
       $fileName = 'puzzles.options';
       $this->rewriteConfig($fileName, 'admin_email' , $request->adminEmail);
       $this->rewriteConfig($fileName, 'logo' , $request->logo);
       $this->rewriteConfig($fileName, 'privacy_policy' , $request->privacyPolicy);
       $this->rewriteConfig($fileName, 'terms_of_service' , $request->termsOfService);

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
