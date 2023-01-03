<?php

namespace App\Application\Internit\DepartamentoBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class ApplicationInternitDepartamentoBundle extends Bundle
{
    /** {@inheritdoc} */
    public function getParent()
    {
        return 'ApplicationInternitDepartamentoBundle';
    }
}