<?php

namespace App\Application\Internit\DownloadBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class ApplicationInternitDownloadBundle extends Bundle
{
    /** {@inheritdoc} */
    public function getParent()
    {
        return 'ApplicationInternitDownloadBundle';
    }
}