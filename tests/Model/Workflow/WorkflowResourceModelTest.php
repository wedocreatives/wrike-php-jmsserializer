<?php

/*
 * This file is part of the wedocreatives/wrike-php-jmsserializer package.
 *
 * (c) Zbigniew Ślązak
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace wedocreatives\WrikePhpJmsserializer\Tests\Model\Workflow;

use wedocreatives\WrikePhpJmsserializer\Model\Workflow\WorkflowResourceModel;
use wedocreatives\WrikePhpJmsserializer\Tests\Model\ResourceModelTestCase;

/**
 * Workflow Resource Model Test.
 */
class WorkflowResourceModelTest extends ResourceModelTestCase
{
    /**
     * @var string
     */
    protected $sourceClass = WorkflowResourceModel::class;

    /**
     * @var array
     */
    protected $properties = [
        'id',
        'name',
        'standard',
        'hidden',
        'customStatuses',
    ];
}
