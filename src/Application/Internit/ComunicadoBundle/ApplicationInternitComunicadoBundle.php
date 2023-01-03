<?php

namespace App\Application\Internit\ComunicadoBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class ApplicationInternitComunicadoBundle extends Bundle
{
    /** {@inheritdoc} */
    public function getParent()
    {
        return 'ApplicationInternitComunicadoBundle';
    }
}