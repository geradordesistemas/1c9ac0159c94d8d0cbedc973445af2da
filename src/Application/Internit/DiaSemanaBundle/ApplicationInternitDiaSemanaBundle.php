<?php

namespace App\Application\Internit\DiaSemanaBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class ApplicationInternitDiaSemanaBundle extends Bundle
{
    /** {@inheritdoc} */
    public function getParent()
    {
        return 'ApplicationInternitDiaSemanaBundle';
    }
}