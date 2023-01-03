<?php

namespace App\Application\Internit\UnidadeBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class ApplicationInternitUnidadeBundle extends Bundle
{
    /** {@inheritdoc} */
    public function getParent()
    {
        return 'ApplicationInternitUnidadeBundle';
    }
}