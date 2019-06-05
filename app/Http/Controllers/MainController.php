<?php

namespace App\Http\Controllers;

use App\Models\User\User;
use App\Models\Permission;

use App\Models\Piece\Piece;
use App\Models\Disease\Disease;
use App\Models\Protocol\Protocol;
use App\Models\Remedy;
use App\Models\Marker;


use Illuminate\Http\Request;

class MainController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware(['auth','verified']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $user = $request->user();
        $role = null;
        $role_permissions = null;
        $permissions = array();
        $protocols = Protocol::all();

        $pieces = Piece::all();
        $diseases = Disease::all();
        $pieces_and_diseases = array();
        array_push($pieces_and_diseases, $pieces);
        array_push($pieces_and_diseases, $diseases);


        /*
        $model = Remedy::all();
        $_active_pieces_id = [11];
        $_active_diseases_id = [16];
        $_active_protocols_id = [13001];

           

        {
            $target = null;
            $model_pieces = null;
            $count = 0;
            $model_eloquient = array();

            foreach($model as $model_element)
            {
                $model_pieces = $model_element->pieceRemedies;
                $count = 0;
                foreach($model_pieces as $obj) {

                    $target = $obj->piece_id;                
                    foreach($_active_pieces_id as $id){
                    
                        if($id == $target){
                            $count ++;
                        }
                    
                    }                
                }
                if($count == count($_active_pieces_id)){
                    array_push($model_eloquient, $model_element);
                }

            }
            $model = $model_eloquient;
        }
        

        {
            $target = null;
            $model_diseases = null;
            $count = 0;
            $model_eloquient = array();

            foreach($model as $model_element)
            {
           
                $model_diseases = $model_element->diseaseRemedies;
              
                $count = 0;
                foreach($model_diseases as $obj) {

                    $target = $obj->disease_id;                
                    foreach($_active_diseases_id as $id){
                    
                        if($id == $target){
                            $count ++;
                        }
                    
                    }                
                }
                if($count == count($_active_diseases_id)){
                    array_push($model_eloquient, $model_element);
                }

            }
            $model = $model_eloquient;
        }
        
        {
            $target = null;
            $model_protocols = null;
            $count = 0;
            $model_eloquient = array();

            foreach($model as $model_element)
            {
           
                $model_protocols = $model_element->protocolRemedies;

                $count = 0;
                foreach($model_protocols as $obj) {

                    $target = $obj->protocol_id;                
                    foreach($_active_protocols_id as $id){
                    
                        if($id == $target){
                            $count ++;
                        }
                    
                    }                
                }
                if($count == count($_active_protocols_id)){
                    array_push($model_eloquient, $model_element);
                }

            }
            $model = $model_eloquient;
        }
        
        dd($model );
        */


        /*
        $_active_pieces_id = [7];            
           
            $target = null;
            $protocol_pieces = null;
            $count = 0;
            $protocols_eloquient = array();

            foreach($protocols as $protocol){

                $protocol_pieces = $protocol->pieceProtocols;
                $count = 0;
                foreach($protocol_pieces as $obj) {

                    $target = $obj->piece_id;                
                    foreach($_active_pieces_id as $id){
                    
                        if($id == $target){
                            $count ++;
                        }
                    
                    }                
                }
                if($count == count($_active_pieces_id)){
                    array_push($protocols_eloquient, $protocol);
                }

            }
            $protocols = $protocols_eloquient;
            //dd($protocols );
        ////////


        $_active_diseases_id = [16];            

            $target = null;
            $protocol_diseases = null;
            $count = 0;
            $protocols_eloquient = array();

            foreach($protocols as $protocol){

                $protocol_diseases = $protocol->diseaseProtocols;
                $count = 0;
                foreach($protocol_diseases as $obj) {

                    $target = $obj->disease_id;                
                    foreach($_active_diseases_id as $id){
                    
                        if($id == $target){
                            var_dump($target);
                            $count ++;
                        }
                    
                    }                
                }
                if($count == count($_active_diseases_id)){
                    array_push($protocols_eloquient, $protocol);
                }

            }
            $protocols = $protocols_eloquient;
            dd($protocols );           
        /////////
        */


        /*
        $protocol = Protocol::find(1277);
            $protocol_pieces = $protocol->pieceProtocols;

            $pieces_id = array();

            foreach($protocol_pieces as $obj) {
                var_dump($obj);
                //array_push($pieces_id, $obj->piece_id);
            }
             //dd($protocol_pieces);
            die();
*/

//        $piece = Piece::where('id','=',1)->first();
//        $piece_protocols = $piece->pieceProtocols;
//        foreach($piece_protocols as $obj) {
//            var_dump($obj->protocol_id);
//        }
//        die();
        if($user){

            $user = User::where('id','=',$user->id)->first();
            $role = $user->role;
            $role_permissions = $role->rolePermissions;

            foreach($role_permissions as $obj){
                array_push( $permissions, Permission::find($obj->permission_id) );
            }
        }

        return view('main', compact(['role','role_permissions', 'permissions', 'pieces', 'diseases', 'pieces_and_diseases', 'protocols']));
    }

    public function pieces_content(Request $request)
    {
        if($request['_active_pieces_id']){
            $_active_pieces_id = $request['_active_pieces_id'];
        }else{
            $_active_pieces_id = "";
        }
        $result = "";
        if( $_active_pieces_id != ""){
            
            $pieces = Piece::where('id','=',$_active_pieces_id[0]);

            for( $i = 1; $i < count($_active_pieces_id); $i++ ){
                $pieces->orWhere('id','=',$_active_pieces_id[$i]);
            }
            $result = $pieces->get();
        }else{
            $result = "";
        }
      
        
        return $result;
    }

    public function diseases_content(Request $request)
    {
        if($request['_active_pieces_id']){
            $_active_diseases_id = $request['_active_pieces_id'];
        }else{
            $_active_diseases_id = "";
        }
        $result = "";
        if( $_active_diseases_id != ""){
            
            $diseases = Disease::where('id','=',$_active_diseases_id[0]);

            for( $i = 1; $i < count($_active_diseases_id); $i++ ){
                $diseases->orWhere('id','=',$_active_diseases_id[$i]);
            }
            $result = $diseases->get();
        }else{
            $result = "";
        }
      
        
        return $result;
    }

    public function protocols_content(Request $request)
    {
        $result = "";
        $protocols = Protocol::all();
        if($request['_active_pieces_id']){
            
            $_active_pieces_id = $request['_active_pieces_id'];            
           
            $target = null;
            $protocol_pieces = null;
            $count = 0;
            $protocols_eloquient = array();

            foreach($protocols as $protocol){

                $protocol_pieces = $protocol->pieceProtocols;
                $count = 0;
                foreach($protocol_pieces as $obj) {

                    $target = $obj->piece_id;                
                    foreach($_active_pieces_id as $id){
                    
                        if($id == $target){
                            $count ++;
                        }
                    
                    }                
                }
                if($count == count($_active_pieces_id)){
                    array_push($protocols_eloquient, $protocol);
                }

            }

            //dd($protocols_eloquient );

            $protocols = $protocols_eloquient;
            $result = $protocols;
        }


        if($request['_active_diseases_id']){

            $_active_diseases_id = $request['_active_diseases_id'];            


            $target = null;
            $protocol_diseases = null;
            $count = 0;
            $protocols_eloquient = array();

            foreach($protocols as $protocol){

                $protocol_diseases = $protocol->diseaseProtocols;
                $count = 0;
                foreach($protocol_diseases as $obj) {

                    $target = $obj->disease_id;                
                    foreach($_active_diseases_id as $id){
                    
                        if($id == $target){
                            $count ++;
                        }
                    
                    }                
                }
                if($count == count($_active_diseases_id)){
                    array_push($protocols_eloquient, $protocol);
                }

            }


            $protocols = $protocols_eloquient;
            $result = $protocols;
         
        }

        if(!$request['_active_pieces_id'] &&!$request['_active_diseases_id']){

            $protocols = Protocol::all();
            $result = $protocols;
        }
         //$_active_diseases_id = $request['_active_diseases_id'];
         return $result;
        return $request->has('_active_diseases_id');
    }

    public function remedies_content(Request $request)
    {
        $result = '';
        $model = Remedy::all();

        //pieces
        if($request['_active_pieces_id'])             
        {
            $_active_pieces_id = $request['_active_pieces_id'];

            $target = null;
            $model_pieces = null;
            $count = 0;
            $model_eloquient = array();

            foreach($model as $model_element)
            {
                $model_pieces = $model_element->pieceRemedies;
                $count = 0;
                foreach($model_pieces as $obj) {

                    $target = $obj->piece_id;                
                    foreach($_active_pieces_id as $id){
                    
                        if($id == $target){
                            $count ++;
                        }
                    
                    }                
                }
                if($count == count($_active_pieces_id)){
                    array_push($model_eloquient, $model_element);
                }

            }
            $model = $model_eloquient;
        }
        
        //diseases
        if($request['_active_diseases_id'])              
        {
            $_active_diseases_id = $request['_active_diseases_id'];  

            $target = null;
            $model_diseases = null;
            $count = 0;
            $model_eloquient = array();

            foreach($model as $model_element)
            {
           
                $model_diseases = $model_element->diseaseRemedies;
              
                $count = 0;
                foreach($model_diseases as $obj) {

                    $target = $obj->disease_id;                
                    foreach($_active_diseases_id as $id){
                    
                        if($id == $target){
                            $count ++;
                        }
                    
                    }                
                }
                if($count == count($_active_diseases_id)){
                    array_push($model_eloquient, $model_element);
                }

            }
            $model = $model_eloquient;
        }

        //protocols
        if($request['_active_protocols_id'])             
        {
            $_active_protocols_id = $request['_active_protocols_id'];

            $target = null;
            $model_protocols = null;
            $count = 0;
            $model_eloquient = array();

            foreach($model as $model_element)
            {
           
                $model_protocols = $model_element->protocolRemedies;

                $count = 0;
                foreach($model_protocols as $obj) {

                    $target = $obj->protocol_id;                
                    foreach($_active_protocols_id as $id){
                    
                        if($id == $target){
                            $count ++;
                        }
                    
                    }                
                }
                if($count == count($_active_protocols_id)){
                    array_push($model_eloquient, $model_element);
                }

            }
            $model = $model_eloquient;
        }
        $result = $model;

        return $result;
    }

    public function markers_content(Request $request)
    {
        $result = '';
        $model = Marker::all();

        //pieces
        if($request['_active_pieces_id'])             
        {
            $_active_pieces_id = $request['_active_pieces_id'];

            $target = null;
            $model_pieces = null;
            $count = 0;
            $model_eloquient = array();

            foreach($model as $model_element)
            {
                $model_pieces = $model_element->pieceMarkers;
                $count = 0;
                foreach($model_pieces as $obj) {

                    $target = $obj->piece_id;                
                    foreach($_active_pieces_id as $id){
                    
                        if($id == $target){
                            $count ++;
                        }
                    
                    }                
                }
                if($count == count($_active_pieces_id)){
                    array_push($model_eloquient, $model_element);
                }

            }
            $model = $model_eloquient;
        }
        
        //diseases
        if($request['_active_diseases_id'])              
        {
            $_active_diseases_id = $request['_active_diseases_id'];  

            $target = null;
            $model_diseases = null;
            $count = 0;
            $model_eloquient = array();

            foreach($model as $model_element)
            {
           
                $model_diseases = $model_element->diseaseMarkers;
              
                $count = 0;
                foreach($model_diseases as $obj) {

                    $target = $obj->disease_id;                
                    foreach($_active_diseases_id as $id){
                    
                        if($id == $target){
                            $count ++;
                        }
                    
                    }                
                }
                if($count == count($_active_diseases_id)){
                    array_push($model_eloquient, $model_element);
                }

            }
            $model = $model_eloquient;
        }

        //protocols
        if($request['_active_protocols_id'])             
        {
            $_active_protocols_id = $request['_active_protocols_id'];

            $target = null;
            $model_protocols = null;
            $count = 0;
            $model_eloquient = array();

            foreach($model as $model_element)
            {
           
                $model_protocols = $model_element->protocolMarkers;

                $count = 0;
                foreach($model_protocols as $obj) {

                    $target = $obj->protocol_id;                
                    foreach($_active_protocols_id as $id){
                    
                        if($id == $target){
                            $count ++;
                        }
                    
                    }                
                }
                if($count == count($_active_protocols_id)){
                    array_push($model_eloquient, $model_element);
                }

            }
            $model = $model_eloquient;
        }
        $result = $model;

        return $result;
    }

    public function details_content(Request $request)
    {
        $result = "";
        if($request['id']){

            $id = $request['id'];
            
            if($request['table']){

                if($request['table'] == "protocols"){

                    $model = Protocol::find($id);

                    $result = $model;
                }
                if($request['table'] == "remedies"){

                    $model = Remedy::find($id);

                    $result = $model;
                }
                if($request['table'] == "markers"){

                    $model = Marker::find($id);

                    $result = $model;
                }
            }
            
        }

        return $result;
    }

    public function protocol_pieces(Request $request)
    {
        $result = "";

        if($request['id']){
            $protocol_id = $request['id'];

            $protocol = Protocol::find($protocol_id);
            $protocol_pieces = $protocol->pieceProtocols;

            $pieces_id = array();

            foreach($protocol_pieces as $obj) {
                array_push($pieces_id, $obj->piece_id);
            }

            $result = $pieces_id;
        }

        return  $result;
    }

}
