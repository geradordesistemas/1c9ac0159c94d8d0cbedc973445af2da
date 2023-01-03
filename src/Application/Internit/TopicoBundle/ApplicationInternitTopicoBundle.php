<?php

namespace App\Application\Internit\TopicoBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class ApplicationInternitTopicoBundle extends Bundle
{
    /** {@inheritdoc} */
    public function getParent()
    {
        return 'ApplicationInternitTopicoBundle';
    }
}