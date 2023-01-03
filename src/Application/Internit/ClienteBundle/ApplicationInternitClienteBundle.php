<?php

namespace App\Application\Internit\ClienteBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class ApplicationInternitClienteBundle extends Bundle
{
    /** {@inheritdoc} */
    public function getParent()
    {
        return 'ApplicationInternitClienteBundle';
    }
}