<?php

namespace App\Enum;

enum AboutUsStatus: int
{
    case Header = 0;
    case Who_We_Are = 1;
    case Mission = 2;
    case Vision = 3;
    case Services = 4;
    case Team = 5;
}
