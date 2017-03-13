<?php

/*
 * (c) Studio107 <mail@studio107.ru> http://studio107.ru
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace Mindy\Bundle\ReviewBundle\Model;

use Mindy\Orm\Fields\BooleanField;
use Mindy\Orm\Fields\CharField;
use Mindy\Orm\Fields\DateTimeField;
use Mindy\Orm\Fields\EmailField;
use Mindy\Orm\Fields\TextField;
use Mindy\Orm\Model;

/**
 * Class Review
 *
 * @property string $name
 * @property string|\DateTime $created_at
 * @property string $review
 * @property int|bool $is_published
 *
 * @method static \Mindy\Bundle\ReviewBundle\Model\ReviewManager objects($instance = null)
 */
class Review extends Model
{
    public static function getFields()
    {
        return [
            'name' => [
                'class' => CharField::class,
            ],
            'timestamp' => [
                'class' => CharField::class,
            ],
            'email' => [
                'class' => EmailField::class,
            ],
            'created_at' => [
                'class' => DateTimeField::class,
                'autoNowAdd' => true,
            ],
            'review' => [
                'class' => TextField::class,
            ],
            'is_published' => [
                'class' => BooleanField::class,
                'default' => false,
            ],
        ];
    }

    public function __toString()
    {
        return (string)$this->name;
    }
}
