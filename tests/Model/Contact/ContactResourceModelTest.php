<?php

/*
 * This file is part of the wedocreatives/wrike-php-jmsserializer package.
 *
 * (c) Zbigniew Ślązak
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace wedocreatives\WrikePhpJmsserializer\Tests\Model\Contact;

use wedocreatives\WrikePhpJmsserializer\Model\Contact\ContactResourceModel;
use wedocreatives\WrikePhpJmsserializer\Tests\Model\ResourceModelTestCase;

/**
 * Contact Resource Model Test.
 */
class ContactResourceModelTest extends ResourceModelTestCase
{
    /**
     * @var string
     */
    protected $sourceClass = ContactResourceModel::class;

    /**
     * @var array
     */
    protected $properties = [
        'id',
        'firstName',
        'lastName',
        'type',
        'profiles',
        'avatarUrl',
        'timezone',
        'locale',
        'deleted',
        'me',
        'memberIds',
        'metadata',
        'myTeam',
        'title',
        'companyName',
        'phone',
        'location',
    ];
}
