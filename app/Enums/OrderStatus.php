<?php

namespace App\Enums;


/**
 * @package App\Enums
 */
enum OrderStatus: string
{
    case Paid = 'platita';
    case Pending = 'in asteptare';
    case ReadyForPickUp = 'Gata de ridicare';
    case Cancelled = 'anulata';
    //after payment for possible problems
    case Completed = 'completata';

    public static function getStatuses()
    {
        return [
            self::Paid, self::Cancelled, self::Completed , self::Pending , self::ReadyForPickUp
        ];
    }
}
