<?php

/*
 * This file is part of the wedocreatives/wrike-php-jmsserializer package.
 *
 * (c) Zbigniew Ślązak
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace wedocreatives\WrikePhpJmsserializer\Tests\Model\Version;

use wedocreatives\WrikePhpJmsserializer\Model\Version\VersionResourceModel;
use wedocreatives\WrikePhpJmsserializer\Tests\Model\ResourceModelTestCase;

/**
 * Version Resource Model Test.
 */
class VersionResourceModelTest extends ResourceModelTestCase
{
    /**
     * @var string
     */
    protected $sourceClass = VersionResourceModel::class;

    /**
     * @var array
     */
    protected $properties = [
        'major',
        'minor',
    ];
}
