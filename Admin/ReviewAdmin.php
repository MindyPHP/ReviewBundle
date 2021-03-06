<?php

/*
 * This file is part of Mindy Framework.
 * (c) 2017 Maxim Falaleev
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Mindy\Bundle\ReviewBundle\Admin;

use Mindy\Bundle\AdminBundle\Admin\AbstractModelAdmin;
use Mindy\Bundle\ReviewBundle\Form\Admin\ReviewForm;
use Mindy\Bundle\ReviewBundle\Model\Review;

class ReviewAdmin extends AbstractModelAdmin
{
    public $columns = ['name', 'created_at', 'is_published'];

    public $defaultOrder = ['-id'];

    public function getFormType()
    {
        return ReviewForm::class;
    }

    public function getModelClass()
    {
        return Review::class;
    }
}
