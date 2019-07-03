<?php

/*
 * This file is part of the wedocreatives/wrike-php-jmsserializer package.
 *
 * (c) Zbigniew Ślązak
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace wedocreatives\WrikePhpJmsserializer\Model\Common;

use JMS\Serializer\Annotation as SA;
use wedocreatives\WrikePhpJmsserializer\Model\AbstractModel;
use wedocreatives\WrikePhpJmsserializer\Model\ResourceModelInterface;

/**
 * Avatar Model.
 */
class AvatarModel extends AbstractModel implements ResourceModelInterface
{
    /**
     * Group letters (2 symbols max), ex. ZS.
     *
     * @SA\Type("string")
     * @SA\SerializedName("letters")
     *
     * @var string|null
     */
    protected $letters;

    /**
     * Hex color code, ex. #fe73a1.
     *
     * @SA\Type("string")
     * @SA\SerializedName("color")
     *
     * @var string|null
     */
    protected $color;

    /**
     * @return null|string
     */
    public function getLetters()
    {
        return $this->letters;
    }

    /**
     * @param null|string $letters
     *
     * @return $this
     */
    public function setLetters($letters)
    {
        $this->letters = $letters;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getColor()
    {
        return $this->color;
    }

    /**
     * @param null|string $color
     *
     * @return $this
     */
    public function setColor($color)
    {
        $this->color = $color;

        return $this;
    }
}
