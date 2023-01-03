<?php

namespace App\Application\Internit\AgendamentoBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class ApplicationInternitAgendamentoBundle extends Bundle
{
    /** {@inheritdoc} */
    public function getParent()
    {
        return 'ApplicationInternitAgendamentoBundle';
    }
}