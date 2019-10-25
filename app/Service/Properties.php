<?php

namespace App\Service;

class Properties
{
    public const PAGE_ABOUT = 'about';
    public const PAGE_MAIN = 'main';
    public const PAGE_FACTOR_DIAGRAM = 'factor_diagram';
    public const PAGE_FAQ = 'FAQ';
    public const PAGE_LITERATURE = 'literature';
    public const PAGE_MEMBER_CASES = 'member_cases';
    public const PAGE_NEWS = 'news';
    public const PAGE_PERSONAL_CABINET = 'personal_cabinet';

    const NAME_FACTOR_MODEL = 'factors';
    const NAME_DISEASE_MODEL = 'diseases';
    const NAME_PROTOCOLS_MODEL = 'protocols';
    const NAME_MARKERS_MODEL = 'markers';
    const NAME_REMEDIES_MODEL = 'remedies';

    const GET_HASH = 0;
    //время жизни хеша
    const GET_EXPIRE_HASH = 1;
    const GET_EMAIL = 2;
}
