<?php

namespace App\Application\Internit\SolicitacaoBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class ApplicationInternitSolicitacaoBundle extends Bundle
{
    /** {@inheritdoc} */
    public function getParent()
    {
        return 'ApplicationInternitSolicitacaoBundle';
    }
}