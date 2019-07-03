<?php

/*
 * This file is part of the wedocreatives/wrike-php-jmsserializer package.
 *
 * (c) Zbigniew Ślązak
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace wedocreatives\WrikePhpJmsserializer\Tests\Model\User;

use wedocreatives\WrikePhpJmsserializer\Model\User\UserResponseModel;
use wedocreatives\WrikePhpJmsserializer\Tests\Model\ResponseModelTestCase;

/**
 * User Response Model Test.
 */
class UserResponseModelTest extends ResponseModelTestCase
{
    /**
     * @var string
     */
    protected $sourceClass = UserResponseModel::class;
}
