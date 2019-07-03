<?php

/*
 * This file is part of the wedocreatives/wrike-php-jmsserializer package.
 *
 * (c) Zbigniew Ślązak
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace wedocreatives\WrikePhpJmsserializer\Tests\Transformer\Response;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\StreamInterface;
use wedocreatives\WrikePhpJmsserializer\Tests\TestCase;
use wedocreatives\WrikePhpLibrary\Resource\ContactResource;
use wedocreatives\WrikePhpLibrary\Transformer\ResponseTransformerInterface;

/**
 * Abstract Response Transformer Test Case.
 */
abstract class ResponseTransformerTestCase extends TestCase
{
    /**
     * @var ResponseTransformerInterface
     */
    protected $object;

    /**
     * @return array
     */
    public function normalizeParamsProvider()
    {
        $responseArray = ['key' => 'value', 'number' => 100];
        $responseString = json_encode($responseArray);
        $bodyMock = $this->getMockForAbstractClass(StreamInterface::class);
        $bodyMock->expects(self::any())
            ->method('getContents')
            ->willReturn($responseString);
        $responseMock = $this->getMockForAbstractClass(ResponseInterface::class);
        $responseMock->expects(self::any())
            ->method('getBody')
            ->willReturn($bodyMock);

        $stdClass = new \stdClass();

        return [
            // [response, resourceClass, isValid]
            [$responseMock, ContactResource::class, true],
            [$stdClass, ContactResource::class, false],
            ['', ContactResource::class, false],
            [$responseMock, 'wrong_class', false],
        ];
    }

    /**
     * @param mixed $response
     * @param mixed $resourceClass
     * @param bool  $isValid
     *
     * @dataProvider normalizeParamsProvider
     */
    public function test_normalizeParams($response, $resourceClass, $isValid)
    {
        $exceptionOccurred = false;
        $exceptionClass = '';
        $exceptionMessage = '';

        try {
            $this->object->transform($response, $resourceClass);
        } catch (\Throwable $t) {
            $exceptionOccurred = true;
        } catch (\Exception $e) {
            $exceptionOccurred = true;
            $exceptionClass = get_class($e);
            $exceptionMessage = $e->getMessage();
        }

        if (false === $isValid) {
            self::assertTrue($exceptionOccurred, 'Exception should be thrown');
        }
        if (true === $isValid) {
            self::assertFalse($exceptionOccurred, sprintf('Exception should not be thrown, "%s" "%s" occurred', $exceptionClass, $exceptionMessage));
        }
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function test_wrongResourceClassParam()
    {
        $responseArray = ['key' => 'value', 'number' => 100];
        $responseString = json_encode($responseArray);
        $bodyMock = $this->getMockForAbstractClass(StreamInterface::class);
        $bodyMock->expects(self::any())
            ->method('getContents')
            ->willReturn($responseString);
        $responseMock = $this->getMockForAbstractClass(ResponseInterface::class);
        $responseMock->expects(self::any())
            ->method('getBody')
            ->willReturn($bodyMock);

        $this->object->transform($responseMock, 'wrong class');
    }
}
