<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\Book\Book;
use App\Models\Category\CategoryForBooks;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class LiteratureController extends Controller
{
    public function index(Request $request)
    {
        //категории для новостей
        $categoriesForBooks = Cache::remember(
            'categoryForBooks',
            now()->addDay(1),
            function(){
                return CategoryForBooks::with('books')->get();
            }
        );
        /*
        //Выбраны тэги
        if($request->tagsActive){
            $books_id = array();                
            $tags = Tag::with('books')->whereIn('id',$request->tagsActive)->get();              
            foreach($tags as $tag){
                foreach($tag->books as $obj) {
                    array_push($books_id, $obj->id);
                }               
            }
            $booksWithTags = Book::with('tags')->whereIn('id',$books_id)->get()->pluck('id')->toArray();               
        }
        //Выбраны категории
        if($request->categoriesForBooksActive){
        
            $categoriesForBooksActive = $request->categoriesForBooksActive;

            $booksWithCategoriesForBooks = Book::with('categoriesForBooks')->whereHas(
                'categoriesForBooks', function ($query) use ( $categoriesForBooksActive ) {
                $query->whereIn('category_for_literature_id', $categoriesForBooksActive);
            })->get()->pluck('id')->toArray();
        }
        //Выбраны тэги или категории
        if($request->categoriesForBooksActive || $request->tagsActive){
            //если переменные с массивами выбранных категорий/тэгов не существуют => мы их создаем пустыми []
            $variableNames = ['booksWithCategoriesForBooks', 'booksWithTags'];
            foreach($variableNames as $variableName)
            if( !isset(${$variableName}) ){
                ${$variableName} = [];
            }

            //коллекция статей с учетом фильтра по категориям и тэгам                           
            $collection = array_unique(array_merge( $booksWithCategoriesForBooks, $booksWithTags ));

            //если не выбраны ни категории, ни тэги => отображаем все статьи
            if( count($collection) > 0){
                $books = Book::whereIn('id',$collection)->paginate(4);
            }else{
                $books = Book::paginate(4);
            }       
            return view('literature.literature-left.main-content', compact(['books']));
        }
        //пагинация
        if($request->page){
            $books = Book::paginate(4);
            return view('literature.literature-left.main-content', compact(['books']));
        }
        */
        //else{
            $books = Book::paginate(4);
            return view('literature.literature', compact(['books','categoriesForBooks']));
        //}
    }
}
