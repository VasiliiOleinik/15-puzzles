<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\Book\Book;
use App\Models\Book\BookLanguage;
use App\Models\Category\CategoryForBooks;
use App\Models\Category\CategoryForBooksLanguage;
use App\Models\Book\LinkForBooks;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class LiteratureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        //категории для новостей
        $categoriesForBooks = Cache::remember(
            'categoryForBooks_'.app()->getLocale(),
            now()->addDay(1),
            function(){
                return CategoryForBooksLanguage::with('categoriesForBook')->get();
            }
        );        
        //Выбраны тэги
        if($request->tagsActive){
            if($request->tagsActive[0]) {
                $books_id = array();                
                $tags = Tag::with('books')->whereIn('id',$request->tagsActive)->get();              
                foreach($tags as $tag){
                    foreach($tag->books as $obj) {
                        array_push($books_id, $obj->id);
                    }               
                }
                $booksWithTags = Book::with('tags')->whereIn('id',$books_id)->get()->pluck('id')->toArray();
            }
        }          
        //Выбраны категории
        if($request->categoriesForBooksActive){
            if(count($request->categoriesForBooksActive) > 0) {
        
                $categoriesForBooksActive = $request->categoriesForBooksActive;

                $booksWithCategoriesForBooks = Book::with('categoriesForBooks')->whereHas(
                    'categoriesForBooks', function ($query) use ( $categoriesForBooksActive ) {
                    $query->whereIn('category_for_books_id', $categoriesForBooksActive);
                })->get()->pluck('id')->toArray();
            }
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
                $books = BookLanguage::with('book')->whereIn('book_id',$collection)->paginate(4);
            }else{
                $books = BookLanguage::with('book')->paginate(4);
            }       
            return view('literature.literature-left.main-content', compact(['books']));
        }
        //пагинация
        if($request->page){
            $books = BookLanguage::with('book')->paginate(4);
            return view('literature.literature-left.main-content', compact(['books']));
        }        
        else{
            $books = BookLanguage::with('book')->paginate(4);
            return view('literature.literature', compact(['books','categoriesForBooks']));
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function literatureModal(Request $request)
    {
        $links = LinkForBooks::with('books')->whereHas(
                    'books', function ($query) use ( $request ) {
                    $query->whereIn('book_id', [$request->id]);
                })->get();
        return view('literature.literature-left.modal', ['title' => $request->title, 'author' => $request->author,
                                              'description' => $request->description, 'img' => $request->img,
                                              'links' => $links]);
    }
}
