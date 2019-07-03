<?php

/*
 * This file is part of the wedocreatives/wrike-php-jmsserializer package.
 *
 * (c) Zbigniew Ślązak
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace wedocreatives\WrikePhpJmsserializer\Tests\Model\Id;

use wedocreatives\WrikePhpJmsserializer\Model\Id\IdResponseModel;
use wedocreatives\WrikePhpJmsserializer\Tests\Model\ResponseModelTestCase;

/**
 * Id Response Model Test.
 */
class IdResponseModelTest extends ResponseModelTestCase
{
    /**
     * @var string
     */
    protected $sourceClass = IdResponseModel::class;
}
