<?php

use JetBrains\PhpStorm\Pure;

function fuelCost($x): float{
    return ($x/2) * ($x+1);
    // 1-4
    // 1 + 2 +3
    // (3/2)(3+1)
    // (1.5)(4)
    // 6
}

function distance($start, $end): float {
    return abs($start-$end);
}

#[Pure] function calculateFuel($start, $end): float {
    return fuelCost(distance($start, $end));
}
$count= 0;
$count += calculateFuel(16,5);
echo(" \r\n");
echo(calculateFuel(1,5));
echo(" \r\n");
echo(calculateFuel(2,5));
echo(" \r\n");
echo(calculateFuel(0,5));
echo(" \r\n");
echo(calculateFuel(4,5));
echo(" \r\n");
echo(calculateFuel(2,5));
echo(" \r\n");
echo(calculateFuel(7,5));
echo(" \r\n");
echo(calculateFuel(1,5));
echo(" \r\n");
echo(calculateFuel(2,5));
echo(" \r\n");
echo(calculateFuel(14,5));
echo(" \r\n");
echo(calculateFuel(0,471));