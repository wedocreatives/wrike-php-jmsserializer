<?php

/*
 * This file is part of the wedocreatives/wrike-php-jmsserializer package.
 *
 * (c) Zbigniew Ślązak
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace wedocreatives\WrikePhpJmsserializer\Tests\Model;

use wedocreatives\WrikePhpJmsserializer\Model\AbstractModel;
use wedocreatives\WrikePhpJmsserializer\Model\ModelInterface;
use wedocreatives\WrikePhpJmsserializer\Model\ResponseModelInterface;
use wedocreatives\WrikePhpJmsserializer\Tests\TestCase;

/**
 * Response Model Test Case.
 */
abstract class ResponseModelTestCase extends TestCase
{
    /**
     * @var string
     */
    protected $sourceClass;

    /**
     * @var ResponseModelInterface
     */
    protected $object;

    /**
     * @var array
     */
    protected $properties = [
        'kind',
        'data',
    ];

    /**
     * Sets up the exception.
     */
    public function setUp()
    {
        $this->object = new $this->sourceClass();
    }

    /**
     * Test exception inheritance.
     */
    public function test_ExtendProperClasses()
    {
        self::assertInstanceOf(ResponseModelInterface::class, $this->object, sprintf('"%s" should extend "%s"', get_class($this->object), ResponseModelInterface::class));
        self::assertInstanceOf($this->sourceClass, $this->object, sprintf('"%s" should extend "%s"', get_class($this->object), $this->sourceClass));
        self::assertInstanceOf(AbstractModel::class, $this->object, sprintf('"%s" should extend "%s"', get_class($this->object), AbstractModel::class));
        self::assertInstanceOf(ModelInterface::class, $this->object, sprintf('"%s" should extend "%s"', get_class($this->object), ModelInterface::class));
    }

    /**
     * Test properties methods.
     */
    public function test_properPropertiesMethods()
    {
        foreach ($this->properties as $propertyName) {
            $getter = sprintf('get%s', ucwords($propertyName));
            self::assertTrue(method_exists($this->object, $getter), sprintf('"%s" not exist for "%s"', $getter, $this->sourceClass));
            $setter = sprintf('set%s', ucwords($propertyName));
            self::assertTrue(method_exists($this->object, $setter), sprintf('"%s" not exist for "%s"', $setter, $this->sourceClass));
        }
    }

    /**
     * Test properties methods.
     */
    public function test_getSetMethods()
    {
        $testValue = 'testValue';

        foreach ($this->properties as $propertyName) {
            $getter = sprintf('get%s', ucwords($propertyName));
            self::assertNull($this->object->{$getter}());
            $setter = sprintf('set%s', ucwords($propertyName));
            self::assertSame($this->object->{$setter}($testValue), $this->object);
            self::assertSame($testValue, $this->object->{$getter}());
        }
    }
}
