<?php

/*
 * This file is part of the wedocreatives/wrike-php-jmsserializer package.
 *
 * (c) Zbigniew Ślązak
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace wedocreatives\WrikePhpJmsserializer\Transformer\Response;

use JMS\Serializer\SerializerInterface;
use wedocreatives\WrikePhpJmsserializer\Model\Account\AccountResponseModel;
use wedocreatives\WrikePhpJmsserializer\Model\Attachment\AttachmentResponseModel;
use wedocreatives\WrikePhpJmsserializer\Model\Color\ColorResponseModel;
use wedocreatives\WrikePhpJmsserializer\Model\Comment\CommentResponseModel;
use wedocreatives\WrikePhpJmsserializer\Model\Contact\ContactResponseModel;
use wedocreatives\WrikePhpJmsserializer\Model\CustomField\CustomFieldResponseModel;
use wedocreatives\WrikePhpJmsserializer\Model\Dependency\DependencyResponseModel;
use wedocreatives\WrikePhpJmsserializer\Model\Folder\FolderResponseModel;
use wedocreatives\WrikePhpJmsserializer\Model\Group\GroupResponseModel;
use wedocreatives\WrikePhpJmsserializer\Model\Id\IdResponseModel;
use wedocreatives\WrikePhpJmsserializer\Model\Invitation\InvitationResponseModel;
use wedocreatives\WrikePhpJmsserializer\Model\Task\TaskResponseModel;
use wedocreatives\WrikePhpJmsserializer\Model\Timelog\TimelogResponseModel;
use wedocreatives\WrikePhpJmsserializer\Model\User\UserResponseModel;
use wedocreatives\WrikePhpJmsserializer\Model\Version\VersionResponseModel;
use wedocreatives\WrikePhpJmsserializer\Model\Workflow\WorkflowResponseModel;
use wedocreatives\WrikePhpLibrary\Resource\AccountResource;
use wedocreatives\WrikePhpLibrary\Resource\AttachmentResource;
use wedocreatives\WrikePhpLibrary\Resource\ColorResource;
use wedocreatives\WrikePhpLibrary\Resource\CommentResource;
use wedocreatives\WrikePhpLibrary\Resource\ContactResource;
use wedocreatives\WrikePhpLibrary\Resource\CustomFieldResource;
use wedocreatives\WrikePhpLibrary\Resource\DependencyResource;
use wedocreatives\WrikePhpLibrary\Resource\FolderResource;
use wedocreatives\WrikePhpLibrary\Resource\GroupResource;
use wedocreatives\WrikePhpLibrary\Resource\IdResource;
use wedocreatives\WrikePhpLibrary\Resource\InvitationResource;
use wedocreatives\WrikePhpLibrary\Resource\TaskResource;
use wedocreatives\WrikePhpLibrary\Resource\TimelogResource;
use wedocreatives\WrikePhpLibrary\Resource\UserResource;
use wedocreatives\WrikePhpLibrary\Resource\VersionResource;
use wedocreatives\WrikePhpLibrary\Resource\WorkflowResource;
use wedocreatives\WrikePhpLibrary\Transformer\Response\Psr\AbstractPsrResponseTransformer as BaseAbstractResponseTransformer;

/**
 * Response Transformer Abstract.
 *
 * @SuppressWarnings(PHPMD.CouplingBetweenObjects)
 */
abstract class AbstractResponseTransformer extends BaseAbstractResponseTransformer
{
    /**
     * @var SerializerInterface
     */
    protected $serializer;

    /**
     * AbstractResponseTransformer constructor.
     *
     * @param SerializerInterface $serializer
     */
    public function __construct(SerializerInterface $serializer)
    {
        $this->serializer = $serializer;
    }

    /**
     * @return array
     */
    protected function getModelClasses()
    {
        return [
            AccountResource::class => AccountResponseModel::class,
            AttachmentResource::class => AttachmentResponseModel::class,
            ColorResource::class => ColorResponseModel::class,
            CommentResource::class => CommentResponseModel::class,
            ContactResource::class => ContactResponseModel::class,
            CustomFieldResource::class => CustomFieldResponseModel::class,
            DependencyResource::class => DependencyResponseModel::class,
            FolderResource::class => FolderResponseModel::class,
            GroupResource::class => GroupResponseModel::class,
            IdResource::class => IdResponseModel::class,
            InvitationResource::class => InvitationResponseModel::class,
            TaskResource::class => TaskResponseModel::class,
            TimelogResource::class => TimelogResponseModel::class,
            UserResource::class => UserResponseModel::class,
            VersionResource::class => VersionResponseModel::class,
            WorkflowResource::class => WorkflowResponseModel::class,
        ];
    }

    /**
     * @param string $resourceClass
     *
     * @throws \InvalidArgumentException
     *
     * @return string
     */
    protected function getModelClassForResource($resourceClass)
    {
        if (false === array_key_exists($resourceClass, $this->getModelClasses())) {
            throw new \InvalidArgumentException(sprintf('"%s" class not supported', $resourceClass));
        }

        return $this->getModelClasses()[$resourceClass];
    }
}
