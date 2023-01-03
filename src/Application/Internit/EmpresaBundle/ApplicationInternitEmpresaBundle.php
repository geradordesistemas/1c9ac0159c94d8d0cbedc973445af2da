<?php

namespace App\Application\Internit\EmpresaBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class ApplicationInternitEmpresaBundle extends Bundle
{
    /** {@inheritdoc} */
    public function getParent()
    {
        return 'ApplicationInternitEmpresaBundle';
    }
}