<?php

/*
 * This file is part of the wedocreatives/wrike-php-jmsserializer package.
 *
 * (c) Zbigniew Ślązak
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace wedocreatives\WrikePhpJmsserializer\Tests\Model\Common;

use wedocreatives\WrikePhpJmsserializer\Model\Common\AvatarModel;
use wedocreatives\WrikePhpJmsserializer\Tests\Model\ResourceModelTestCase;

/**
 * Avatar Model Test.
 */
class AvatarModelTest extends ResourceModelTestCase
{
    /**
     * @var string
     */
    protected $sourceClass = AvatarModel::class;

    /**
     * @var array
     */
    protected $properties = [
        'letters',
        'color',
    ];
}
