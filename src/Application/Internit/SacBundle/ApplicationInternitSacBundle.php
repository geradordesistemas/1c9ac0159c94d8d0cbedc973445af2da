<?php

namespace App\Application\Internit\SacBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class ApplicationInternitSacBundle extends Bundle
{
    /** {@inheritdoc} */
    public function getParent()
    {
        return 'ApplicationInternitSacBundle';
    }
}