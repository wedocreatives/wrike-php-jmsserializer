<?php

/*
 * This file is part of the wedocreatives/wrike-php-jmsserializer package.
 *
 * (c) Zbigniew Ślązak
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace wedocreatives\WrikePhpJmsserializer\Tests;

use JMS\Serializer\Serializer;
use JMS\Serializer\SerializerInterface;
use wedocreatives\WrikePhpJmsserializer\SerializerFactory;

/**
 * Serializer Factory Test.
 */
class SerializerFactoryTest extends TestCase
{
    public function test_create()
    {
        $serializer = SerializerFactory::create();
        self::assertInstanceOf(SerializerInterface::class, $serializer);
        self::assertInstanceOf(Serializer::class, $serializer);
    }
}
