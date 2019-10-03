<?php

namespace App\Http\Controllers;

use App\Models\Factor\FactorLanguage;
use App\Repository\AboutRepository;
use App\Service\Properties;
use Illuminate\Support\Facades\Cache;

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
        $factors = Cache::remember(
            'factor_' . app()->getLocale(),
            now()->addDay(1),
            function () {
                return FactorLanguage::with('factor', 'type')->get();
            }
        );
        return view('about.about',
            compact([
                'factors',
                'dataPage'
            ]));
    }
}
