<?php

namespace App\Enum;

enum TravelServiceStatus: int
{
    case Accommodation = 0;
    case Transportation = 1;
    case Flight_Reservation = 2;
    case Visa_Formalities = 3;
    case Tour_Guidance = 4;

    public function label(): string
    {
        return match ($this) {
            self::Accommodation => 'Accommodation',
            self::Transportation => 'Transportation',
            self::Flight_Reservation => 'Flight Reservation',
            self::Visa_Formalities => 'Visa Formalities',
            self::Tour_Guidance => 'Tour Guidance',
        };
    }
}
