<?php

namespace App\Application\Internit\AcompanhamentoBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class ApplicationInternitAcompanhamentoBundle extends Bundle
{
    /** {@inheritdoc} */
    public function getParent()
    {
        return 'ApplicationInternitAcompanhamentoBundle';
    }
}