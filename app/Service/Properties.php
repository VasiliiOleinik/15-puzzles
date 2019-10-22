<?php


namespace App\Service;


class Properties
{
    public const PAGE_ABOUT = 'about';
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
