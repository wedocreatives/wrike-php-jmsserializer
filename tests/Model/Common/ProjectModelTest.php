<?php

/*
 * This file is part of the wedocreatives/wrike-php-jmsserializer package.
 *
 * (c) Zbigniew Ślązak
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace wedocreatives\WrikePhpJmsserializer\Tests\Model\Common;

use wedocreatives\WrikePhpJmsserializer\Model\Common\ProjectModel;
use wedocreatives\WrikePhpJmsserializer\Tests\Model\ResourceModelTestCase;

/**
 * Project Model Test.
 */
class ProjectModelTest extends ResourceModelTestCase
{
    /**
     * @var string
     */
    protected $sourceClass = ProjectModel::class;

    /**
     * @var array
     */
    protected $properties = [
        'authorId',
        'ownerIds',
        'status',
        'startDate',
        'endDate',
        'createdDate',
        'completedDate',
    ];
}
