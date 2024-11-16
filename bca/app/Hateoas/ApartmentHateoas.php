<?php

namespace App\Hateoas;

use App\Models\Apartment;
use GDebrauwer\Hateoas\Link;
use GDebrauwer\Hateoas\Traits\CreatesLinks;

class ApartmentHateoas
{
    use CreatesLinks;

    public function self(Apartment $apartment) : ?Link
    {
        //
    }
}
