<?php

namespace App\Http\Controllers;

use App\Models\Factor\FactorLanguage;
use App\Models\Page;
use App\Repository\AboutRepository;
use App\Service\Properties;
use Illuminate\Support\Facades\Cache;
use App\Models\Book\BookLanguage;

class AboutController extends Controller
{
    private $repository;

    public function __construct(AboutRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $dataPage = $this->repository->getDataPage(Properties::PAGE_ABOUT);
        $page = Page::with('pageLang')->where('name_page', Properties::PAGE_ABOUT)->first();
        $factors = Cache::remember(
            'factor_' . app()->getLocale(),
            now()->addDay(1),
            function () {
                return FactorLanguage::with('factor', 'type')->get();
            }
        );
        $lits = BookLanguage::with('book')
            ->latest('id')
            ->take(5)->get();
        return view(
            'about.about',
            compact([
                'factors',
                'dataPage',
                'lits',
                'page'
            ])
        );
    }
}
