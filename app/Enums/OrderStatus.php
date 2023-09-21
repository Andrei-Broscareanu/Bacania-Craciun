<?php

namespace App\Enums;


/**
 * @package App\Enums
 */
enum OrderStatus: string
{
    case Paid = 'Platita';
    case Pending = 'In asteptare';
    case ReadyForPickUp = 'Gata de ridicare';
    case Cancelled = 'Anulata';
    //after payment for possible problems
    case Completed = 'Completata';

    public static function getStatuses()
    {
        return [
            self::Paid, self::Cancelled, self::Completed , self::Pending , self::ReadyForPickUp
        ];
    }
}
