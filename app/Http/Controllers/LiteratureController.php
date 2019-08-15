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
use Illuminate\Support\Facades\Redirect;

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
                $books = BookLanguage::with('book')->whereIn('book_id',$collection)
                                                   ->orderBy('book_id', 'DESC')->paginate(4);
            }else{
                $books = BookLanguage::with('book')->orderBy('book_id', 'DESC')->paginate(4);
            }       
            return view('literature.literature-left.main-content', compact(['books']));
        }
        //пагинация
        if($request->page){
            $books = BookLanguage::with('book')->orderBy('book_id', 'DESC')->paginate(4);
            return view('literature.literature-left.main-content', compact(['books']));
        }        
        else{
            $books = BookLanguage::with('book')->orderBy('book_id', 'DESC')->paginate(4);
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

    /**
     * Show the form for creating a new resource.
     *
     * @param  Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //dd($request->all());
        $validatedData = $request->validate([
        'titleEng' => ['required', 'string', 'max:191'],
        'titleRu' => ['required', 'string', 'max:191'],
        'descriptionEng' => ['required', 'max:64000'],
        'descriptionRu' => ['required', 'max:64000'],  
        'authorEng' => ['required', 'max:191'],
        'authorRu' => ['required', 'max:191'],      
        'img' => ['nullable'],       
        ]);
        
        $bookLanguageEng = new BookLanguage;
        $bookLanguageRu = new BookLanguage;
        $book = new Book;
        //находим наивысшее значение id и ставим больше на 1
        $book->id = Book::orderBy('id', 'desc')->first()->id + 1;
        if($request->img != null){          
          $book->img = $request['img'];
        }        
        $book->save();
        if(array_key_exists("linksForBooks", $request->book)){
            $book->linksForBooks()->sync( $request->book['linksForBooks'] );
        }

        $bookLanguageEng->language = "eng";
        $bookLanguageEng->title = $request['titleEng'];
        $bookLanguageEng->description = $request['descriptionEng'];
        $bookLanguageEng->author = $request['authorEng'];
        $bookLanguageEng->book_id = $book->id;

        $bookLanguageRu->language = "ru";
        $bookLanguageRu->title = $request['titleRu'];
        $bookLanguageRu->description = $request['descriptionRu'];
        $bookLanguageRu->author = $request['authorRu'];
        $bookLanguageRu->book_id = $book->id;
        
        $bookLanguageEng->save();
        $bookLanguageRu->save();

        return Redirect::to('/admin/literature/');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id, Request $request
     * @return \Illuminate\Http\Response
     */
    public function edit($id, Request $request)
    {
        $id = BookLanguage::find($id)->book_id;
        $book = Book::find($id);
        if($request->img != null){          
          $book->img = $request['img'];
        }        
        $book->save();
        if(array_key_exists("linksForBooks", $request->book)){
            $book->linksForBooks()->sync( $request->book['linksForBooks'] );
        }

        if( $request->has("next_action") ){
            if($request['next_action'] == "save_and_continue"){
                return redirect()->back();
            }
            if($request['next_action'] == "save_and_create"){
                return redirect()->route('admin.model.create',['adminModel' => 'literature']);
            }
        }

        return Redirect::to('/admin/literature/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $id = BookLanguage::find($id)->book_id;
        Book::find($id)->delete();
        return Redirect::to('/admin/literature/');
    }
}
