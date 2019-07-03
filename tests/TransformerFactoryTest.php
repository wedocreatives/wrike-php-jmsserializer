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

use wedocreatives\WrikePhpJmsserializer\SerializerFactory;
use wedocreatives\WrikePhpJmsserializer\Transformer\Response\ResourceModelTransformer;
use wedocreatives\WrikePhpJmsserializer\Transformer\Response\ResponseModelTransformer;
use wedocreatives\WrikePhpJmsserializer\TransformerFactory;
use wedocreatives\WrikePhpLibrary\Transformer\ResponseTransformerInterface;

/**
 * Transformer Factory Test.
 */
class TransformerFactoryTest extends TestCase
{
    public function test_createResourceModelTransformer()
    {
        $transformer = TransformerFactory::createResourceModelTransformer();
        self::assertInstanceOf(ResponseTransformerInterface::class, $transformer);
        self::assertInstanceOf(ResourceModelTransformer::class, $transformer);

        $serializer = SerializerFactory::create();
        $transformer = TransformerFactory::createResourceModelTransformer($serializer);
        self::assertInstanceOf(ResponseTransformerInterface::class, $transformer);
        self::assertInstanceOf(ResourceModelTransformer::class, $transformer);
    }

    public function test_createResponseModelTransformer()
    {
        $transformer = TransformerFactory::createResponseModelTransformer();
        self::assertInstanceOf(ResponseTransformerInterface::class, $transformer);
        self::assertInstanceOf(ResponseModelTransformer::class, $transformer);

        $serializer = SerializerFactory::create();
        $transformer = TransformerFactory::createResponseModelTransformer($serializer);
        self::assertInstanceOf(ResponseTransformerInterface::class, $transformer);
        self::assertInstanceOf(ResponseModelTransformer::class, $transformer);
    }
}
