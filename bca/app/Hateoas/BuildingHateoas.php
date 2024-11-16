<?php

namespace App\Hateoas;

use App\Models\Building;
use GDebrauwer\Hateoas\Link;
use GDebrauwer\Hateoas\Traits\CreatesLinks;

class BuildingHateoas
{
    use CreatesLinks;

    public function self(Building $building) : ?Link
    {
        //
    }
}
