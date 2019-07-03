<?php

/*
 * This file is part of the wedocreatives/wrike-php-jmsserializer package.
 *
 * (c) Zbigniew Ślązak
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace wedocreatives\WrikePhpJmsserializer\Tests\Model\Comment;

use wedocreatives\WrikePhpJmsserializer\Model\Comment\CommentResponseModel;
use wedocreatives\WrikePhpJmsserializer\Tests\Model\ResponseModelTestCase;

/**
 * Comment Response Model Test.
 */
class CommentResponseModelTest extends ResponseModelTestCase
{
    /**
     * @var string
     */
    protected $sourceClass = CommentResponseModel::class;
}
