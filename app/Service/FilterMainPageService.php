<?php


namespace App\Service;


use App\Models\Disease\Disease;
use App\Models\Factor\Factor;
use App\Models\Protocol\Protocol;
use App\Repository\FilterMainPageRepository;

class FilterMainPageService
{
    private $repository;

    public function __construct(FilterMainPageRepository $repository)
    {
        $this->repository = $repository;
    }

    public function uniqFilteredData($filteredData): array
    {
        $factorsProtocolsArr = array();
        foreach ($this->getNameFilteringModels() as $item){
            $factorsProtocols = implode(',', $filteredData->pluck($item)->all());
            $factorsProtocols = $factorsProtocols !='' ? explode(',', $factorsProtocols): false;
            $factorsProtocolsArr[$item] = $factorsProtocols ? array_values(array_unique($factorsProtocols)): false;
        }
        return $factorsProtocolsArr;
    }

    public function getNameFilteringModels(): array
    {
        return ['protocols', 'markers', 'remedies', 'diseases', 'factors'];
    }
}
