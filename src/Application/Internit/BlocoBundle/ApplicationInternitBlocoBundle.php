<?php

namespace App\Application\Internit\BlocoBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class ApplicationInternitBlocoBundle extends Bundle
{
    /** {@inheritdoc} */
    public function getParent()
    {
        return 'ApplicationInternitBlocoBundle';
    }
}