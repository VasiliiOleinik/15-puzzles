<?php


namespace App\Service;

use Carbon\Carbon;

class VerificationService
{
    const URL_CHECK_DATA = 'confirm_email';

    public function getLink($request, $user): string
    {
        return \Request::root().'/'.app()->getLocale().'/'.self::URL_CHECK_DATA.'?hash='.$user->hash.'&id='.$user->id;
    }

    public function parseCrypt(string $hash): array
    {
        $parsedString = \Crypt::decrypt($hash);
        $parsedString = explode('_', $parsedString);
        return $parsedString;
    }

    public function checkIsValidData(array $dataUrl, array $dataUser)
    {
        if ($dataUrl[Properties::GET_HASH] != $dataUser[Properties::GET_HASH]) {
            throw new \Exception('Hash miss math in current user');
        }
        if ($dataUrl[Properties::GET_EXPIRE_HASH] < Carbon::now()) {
            throw new \Exception('Token has expire');
        }
        if ($dataUrl[Properties::GET_EMAIL] != $dataUser[Properties::GET_EMAIL]) {
            throw new \Exception('Email miss math in current user');
        }
    }


}
