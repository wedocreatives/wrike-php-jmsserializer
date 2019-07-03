<?php

/*
 * This file is part of the wedocreatives/wrike-php-jmsserializer package.
 *
 * (c) Zbigniew Ślązak
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace wedocreatives\WrikePhpJmsserializer\Tests\Model\Attachment;

use wedocreatives\WrikePhpJmsserializer\Model\Attachment\AttachmentResourceModel;
use wedocreatives\WrikePhpJmsserializer\Tests\Model\ResourceModelTestCase;

/**
 * Attachment Resource Model Test.
 */
class AttachmentResourceModelTest extends ResourceModelTestCase
{
    /**
     * @var string
     */
    protected $sourceClass = AttachmentResourceModel::class;

    /**
     * @var array
     */
    protected $properties = [
        'id',
        'authorId',
        'name',
        'createdDate',
        'version',
        'type',
        'contentType',
        'size',
        'taskId',
        'folderId',
        'commentId',
        'currentAttachmentId',
        'previewUrl',
        'url',
        'reviewIds',
    ];
}
