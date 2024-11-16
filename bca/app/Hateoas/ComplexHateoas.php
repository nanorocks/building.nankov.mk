<?php

namespace App\Hateoas;

use App\Models\Complex;
use GDebrauwer\Hateoas\Link;
use GDebrauwer\Hateoas\Traits\CreatesLinks;

class ComplexHateoas
{
    use CreatesLinks;

    public function self(Complex $complex) : ?Link
    {
        //
    }
}
