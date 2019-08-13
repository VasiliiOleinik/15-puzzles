<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use AdminSection;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Redirect;

class ConfigController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $adminEmail =  config('puzzles.admin_email');
       $privacyPolicy =  config('puzzles.privacy_policy');
       $termsOfService =  config('puzzles.terms_of_service');

       $content = view('sleeping-owl.config.index',compact(['adminEmail', 'privacyPolicy', 'termsOfService']));
	   return AdminSection::view($content, 'Настройки');
    }

    public function link(Request $request)
    {              
       $fileName = 'puzzles';
       $this->rewriteConfig($fileName, 'admin_email' , $request->adminEmail);
       $this->rewriteConfig($fileName, 'privacy_policy' , $request->privacyPolicy);
       $this->rewriteConfig($fileName, 'terms_of_service' , $request->termsOfService);

       return Redirect::to('/admin/config');
    }

    public function rewriteConfig($fileName, $variableName, $variableValue)
    {
       config([$fileName.'.'.$variableName => $variableValue]);
       $fp = fopen(base_path() .'/config/'.$fileName.'.php' , 'w');
       fwrite($fp, '<?php return ' . var_export(config($fileName), true) . ';');
       fclose($fp);
    }
}
