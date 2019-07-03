<?php

/*
 * This file is part of the wedocreatives/wrike-php-jmsserializer package.
 *
 * (c) Zbigniew Ślązak
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace wedocreatives\WrikePhpJmsserializer\Model\Timelog;

use JMS\Serializer\Annotation as SA;
use wedocreatives\WrikePhpJmsserializer\Model\AbstractModel;
use wedocreatives\WrikePhpJmsserializer\Model\ResponseModelInterface;

/**
 * Timelog Response Model.
 */
class TimelogResponseModel extends AbstractModel implements ResponseModelInterface
{
    /**
     * Kind of response.
     *
     * @SA\Type("string")
     * @SA\SerializedName("kind")
     *
     * @var string|null
     */
    protected $kind;

    /**
     * Collection of response models.
     *
     * @SA\Type("array<wedocreatives\WrikePhpJmsserializer\Model\Timelog\TimelogResourceModel>")
     * @SA\SerializedName("data")
     *
     * @var array|TimelogResourceModel]|null
     */
    protected $data;

    /**
     * @return null|string
     */
    public function getKind()
    {
        return $this->kind;
    }

    /**
     * @param null|string $kind
     *
     * @return $this
     */
    public function setKind($kind)
    {
        $this->kind = $kind;

        return $this;
    }

    /**
     * @return array|TimelogResourceModel[]|null
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * @param array|TimelogResourceModel[]|null $data
     *
     * @return $this
     */
    public function setData($data)
    {
        $this->data = $data;

        return $this;
    }
}
