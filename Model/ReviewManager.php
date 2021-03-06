<?php

/*
 * This file is part of Mindy Framework.
 * (c) 2017 Maxim Falaleev
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Mindy\Bundle\ReviewBundle\Model;

use Mindy\Orm\Manager;

class ReviewManager extends Manager
{
    public function published()
    {
        $this->filter(['is_published' => true]);

        return $this;
    }
}
