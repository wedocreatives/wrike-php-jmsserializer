<?php

/*
 * This file is part of the wedocreatives/wrike-php-jmsserializer package.
 *
 * (c) Zbigniew Ślązak
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace wedocreatives\WrikePhpJmsserializer\Tests\Transformer\Response;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\StreamInterface;
use wedocreatives\WrikePhpJmsserializer\Model\Account\AccountResourceModel;
use wedocreatives\WrikePhpJmsserializer\Model\Attachment\AttachmentResourceModel;
use wedocreatives\WrikePhpJmsserializer\Model\Color\ColorResourceModel;
use wedocreatives\WrikePhpJmsserializer\Model\Comment\CommentResourceModel;
use wedocreatives\WrikePhpJmsserializer\Model\Contact\ContactResourceModel;
use wedocreatives\WrikePhpJmsserializer\Model\CustomField\CustomFieldResourceModel;
use wedocreatives\WrikePhpJmsserializer\Model\Dependency\DependencyResourceModel;
use wedocreatives\WrikePhpJmsserializer\Model\Folder\FolderResourceModel;
use wedocreatives\WrikePhpJmsserializer\Model\Group\GroupResourceModel;
use wedocreatives\WrikePhpJmsserializer\Model\Id\IdResourceModel;
use wedocreatives\WrikePhpJmsserializer\Model\Invitation\InvitationResourceModel;
use wedocreatives\WrikePhpJmsserializer\Model\Task\TaskResourceModel;
use wedocreatives\WrikePhpJmsserializer\Model\Timelog\TimelogResourceModel;
use wedocreatives\WrikePhpJmsserializer\Model\User\UserResourceModel;
use wedocreatives\WrikePhpJmsserializer\Model\Version\VersionResourceModel;
use wedocreatives\WrikePhpJmsserializer\Model\Workflow\WorkflowResourceModel;
use wedocreatives\WrikePhpJmsserializer\SerializerFactory;
use wedocreatives\WrikePhpJmsserializer\Transformer\Response\ResourceModelTransformer;
use wedocreatives\WrikePhpLibrary\Api;
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

/**
 * Resource Model Transformer Test.
 */
class ResourceModelTransformerTest extends ResponseTransformerTestCase
{
    const VALID_ID = 'valid_id';

    public function setUp()
    {
        $serializer = SerializerFactory::create();
        $this->object = new ResourceModelTransformer($serializer);
    }

    /**
     * @return array
     */
    public function normalizeInstancesProvider()
    {
        return [
            // [resourceClass, resourceModelClass]
            [AccountResource::class, AccountResourceModel::class],
            [AttachmentResource::class, AttachmentResourceModel::class],
            [ColorResource::class, ColorResourceModel::class],
            [CommentResource::class, CommentResourceModel::class],
            [ContactResource::class, ContactResourceModel::class],
            [CustomFieldResource::class, CustomFieldResourceModel::class],
            [DependencyResource::class, DependencyResourceModel::class],
            [FolderResource::class, FolderResourceModel::class],
            [GroupResource::class, GroupResourceModel::class],
            [IdResource::class, IdResourceModel::class],
            [InvitationResource::class, InvitationResourceModel::class],
            [TaskResource::class, TaskResourceModel::class],
            [TimelogResource::class, TimelogResourceModel::class],
            [UserResource::class, UserResourceModel::class],
            [VersionResource::class, VersionResourceModel::class],
            [WorkflowResource::class, WorkflowResourceModel::class],
        ];
    }

    /**
     * @dataProvider normalizeInstancesProvider
     *
     * @param mixed $resourceClass
     * @param mixed $resourceModelClass
     */
    public function test_normalize($resourceClass, $resourceModelClass)
    {
        $responseString = sprintf('{"data":[{"id":"%s"}]}', self::VALID_ID);

        $bodyMock = $this->getMockForAbstractClass(StreamInterface::class);
        $bodyMock->expects(self::any())
            ->method('getContents')
            ->willReturn($responseString);
        $responseMock = $this->getMockForAbstractClass(ResponseInterface::class);
        $responseMock->expects(self::any())
            ->method('getBody')
            ->willReturn($bodyMock);
        /** @var array $returnedResponse */
        $returnedResponse = $this->object->transform($responseMock, $resourceClass);

        self::assertInternalType('array', $returnedResponse);

        foreach ($returnedResponse as $resourceModel) {
            self::assertInstanceOf($resourceModelClass, $resourceModel);
        }
    }

    public function test_testNormalizeInstancesProviderCoverAllMethods()
    {
        $class = new \ReflectionClass(Api::class);
        $expectedMethodNames = $class->getMethods(\ReflectionMethod::IS_PUBLIC);

        $normalizeInstancesProviderArray = $this->normalizeInstancesProvider();
        $coveredMethodNames = [];
        foreach ($normalizeInstancesProviderArray as $normalizeInstancesProviderRow) {
            $coveredClass = $normalizeInstancesProviderRow[0];
            $coveredClassNameArray = explode('\\', $coveredClass);
            $coveredClassName = end($coveredClassNameArray);
            $coveredMethodName = sprintf('get%s', $coveredClassName);
            $coveredMethodNames[$coveredMethodName] = $coveredMethodName;
        }

        $excludedMethods = [
            '__construct',
            'recreateForNewAccessToken',
            'recreateForNewApiExceptionTransformer',
            'recreateForNewResponseTransformer',
            'normalizeParams',
        ];

        foreach ($expectedMethodNames as $expectedMethodName) {
            if (in_array($expectedMethodName->getName(), $excludedMethods, true)) {
                continue;
            }
            self::assertArrayHasKey(
                $expectedMethodName->getName(),
                $coveredMethodNames,
                sprintf('%s not covered by tests', $expectedMethodName->getName())
            );
        }
    }
}
