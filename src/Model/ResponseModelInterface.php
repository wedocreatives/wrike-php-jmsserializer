<?php

/*
 * This file is part of the wedocreatives/wrike-php-jmsserializer package.
 *
 * (c) Zbigniew Ślązak
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace wedocreatives\WrikePhpJmsserializer\Model;

/**
 * Response Model Interface.
 */
interface ResponseModelInterface extends ModelInterface
{
    /**
     * @return array|ResourceModelInterface[]|null
     */
    public function getData();

    /**
     * @param array|ResourceModelInterface[]|null $data
     *
     * @return $this
     */
    public function setData($data);

    /**
     * @return null|string
     */
    public function getKind();

    /**
     * @param null|string $kind
     *
     * @return $this
     */
    public function setKind($kind);
}
