<?php

namespace Xm\MessageBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class XmMessageBundle extends Bundle
{
	public function getParent()
    {
        return 'FOSMessageBundle';
    }
}
