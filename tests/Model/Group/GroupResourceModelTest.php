<?php

/*
 * This file is part of the wedocreatives/wrike-php-jmsserializer package.
 *
 * (c) Zbigniew Ślązak
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace wedocreatives\WrikePhpJmsserializer\Tests\Model\Group;

use wedocreatives\WrikePhpJmsserializer\Model\Group\GroupResourceModel;
use wedocreatives\WrikePhpJmsserializer\Tests\Model\ResourceModelTestCase;

/**
 * Group Resource Model Test.
 */
class GroupResourceModelTest extends ResourceModelTestCase
{
    /**
     * @var string
     */
    protected $sourceClass = GroupResourceModel::class;

    /**
     * @var array
     */
    protected $properties = [
        'id',
        'accountId',
        'title',
        'memberIds',
        'childIds',
        'parentIds',
        'avatarUrl',
        'myTeam',
        'metadata',
    ];
}
