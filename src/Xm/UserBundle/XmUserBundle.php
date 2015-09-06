<?php

namespace Xm\UserBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class XmUserBundle extends Bundle
{
	public function getParent()
    {
        return 'FOSUserBundle';
    }
}
