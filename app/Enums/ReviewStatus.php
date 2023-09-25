<?php

namespace App\Enums;


/**
 * @package App\Enums
 */
enum ReviewStatus: string
{
    case Pending = 'In asteptare';
    case Approved = 'Aprobat';
    case Cancelled = 'Anulat';

    //after payment for possible problems
    public static function getStatuses()
    {
        return [
            self::Pending,self::Approved,self::Cancelled,
        ];
    }
}
