<?php

namespace App\Enum;

enum Part: string {
    case Case = 'Case';
    case Cpu = 'Cpu';
    case Mainboard = 'Mainboard';
    case Psu = 'Psu';
    case Ram = 'Ram';
    case Storage = 'Storage';
    case Vga = 'Vga';
}
