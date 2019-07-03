<?php

/*
 * This file is part of the wedocreatives/wrike-php-jmsserializer package.
 *
 * (c) Zbigniew Ślązak
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace wedocreatives\WrikePhpJmsserializer\Transformer\Response;

use Psr\Http\Message\ResponseInterface;
use wedocreatives\WrikePhpJmsserializer\Model\ResourceModelInterface;
use wedocreatives\WrikePhpJmsserializer\Model\ResponseModelInterface;

/**
 * Resource Model Transformer.
 */
class ResourceModelTransformer extends AbstractResponseTransformer
{
    /**
     * @param ResponseInterface $response
     * @param string            $resourceClass
     *
     * @throws \InvalidArgumentException
     * @throws \RuntimeException
     *
     * @return array|ResourceModelInterface[]|null
     */
    public function transform($response, $resourceClass)
    {
        $stringBody = $this->transformToStringBody($response);
        /** @var ResponseModelInterface $responseModel */
        $responseModel = $this->serializer->deserialize(
            $stringBody,
            $this->getModelClassForResource($resourceClass),
            'json'
        );

        return $responseModel->getData();
    }
}
