<?php

/*
 * (c) Studio107 <mail@studio107.ru> http://studio107.ru
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
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
