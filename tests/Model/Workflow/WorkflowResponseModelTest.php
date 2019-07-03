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

use wedocreatives\WrikePhpJmsserializer\Model\Workflow\WorkflowResponseModel;
use wedocreatives\WrikePhpJmsserializer\Tests\Model\ResponseModelTestCase;

/**
 * Workflow Response Model Test.
 */
class WorkflowResponseModelTest extends ResponseModelTestCase
{
    /**
     * @var string
     */
    protected $sourceClass = WorkflowResponseModel::class;
}
