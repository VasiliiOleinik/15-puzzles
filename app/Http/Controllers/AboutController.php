<?php

namespace App\Http\Controllers;

use App\Models\Factor\FactorLanguage;
use App\Models\Group;
use App\Models\Page;
use App\Repository\AboutRepository;
use App\Service\PazzlesService;
use App\Service\Properties;
use Illuminate\Support\Facades\Cache;
use App\Models\Book\BookLanguage;

class AboutController extends Controller
{
    private $repository;
    private $pazzlesService;

    public function __construct(AboutRepository $repository, PazzlesService $pazzlesService)
    {
        $this->repository = $repository;
        $this->pazzlesService = $pazzlesService;
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
        $typeFactors = $this->pazzlesService->chunkCollect(Group::all());
        $lits = BookLanguage::with('book')
            ->latest('id')
            ->take(5)->get();
        return view(
            'about.about',
            compact([
                'factors',
                'dataPage',
                'lits',
                'page',
                'typeFactors'
            ])
        );
    }
}
