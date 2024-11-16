<?php

namespace App\Hateoas;

use App\Models\Floor;
use GDebrauwer\Hateoas\Link;
use GDebrauwer\Hateoas\Traits\CreatesLinks;

class FloorHateoas
{
    use CreatesLinks;

    public function self(Floor $floor) : ?Link
    {
        //
    }
}
