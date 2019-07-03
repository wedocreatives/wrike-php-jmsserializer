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
use wedocreatives\WrikePhpJmsserializer\Model\Account\AccountResponseModel;
use wedocreatives\WrikePhpJmsserializer\Model\Attachment\AttachmentResourceModel;
use wedocreatives\WrikePhpJmsserializer\Model\Attachment\AttachmentResponseModel;
use wedocreatives\WrikePhpJmsserializer\Model\Color\ColorResourceModel;
use wedocreatives\WrikePhpJmsserializer\Model\Color\ColorResponseModel;
use wedocreatives\WrikePhpJmsserializer\Model\Comment\CommentResourceModel;
use wedocreatives\WrikePhpJmsserializer\Model\Comment\CommentResponseModel;
use wedocreatives\WrikePhpJmsserializer\Model\Contact\ContactResourceModel;
use wedocreatives\WrikePhpJmsserializer\Model\Contact\ContactResponseModel;
use wedocreatives\WrikePhpJmsserializer\Model\CustomField\CustomFieldResourceModel;
use wedocreatives\WrikePhpJmsserializer\Model\CustomField\CustomFieldResponseModel;
use wedocreatives\WrikePhpJmsserializer\Model\Dependency\DependencyResourceModel;
use wedocreatives\WrikePhpJmsserializer\Model\Dependency\DependencyResponseModel;
use wedocreatives\WrikePhpJmsserializer\Model\Folder\FolderResourceModel;
use wedocreatives\WrikePhpJmsserializer\Model\Folder\FolderResponseModel;
use wedocreatives\WrikePhpJmsserializer\Model\Group\GroupResourceModel;
use wedocreatives\WrikePhpJmsserializer\Model\Group\GroupResponseModel;
use wedocreatives\WrikePhpJmsserializer\Model\Id\IdResourceModel;
use wedocreatives\WrikePhpJmsserializer\Model\Id\IdResponseModel;
use wedocreatives\WrikePhpJmsserializer\Model\Invitation\InvitationResourceModel;
use wedocreatives\WrikePhpJmsserializer\Model\Invitation\InvitationResponseModel;
use wedocreatives\WrikePhpJmsserializer\Model\ResponseModelInterface;
use wedocreatives\WrikePhpJmsserializer\Model\Task\TaskResourceModel;
use wedocreatives\WrikePhpJmsserializer\Model\Task\TaskResponseModel;
use wedocreatives\WrikePhpJmsserializer\Model\Timelog\TimelogResourceModel;
use wedocreatives\WrikePhpJmsserializer\Model\Timelog\TimelogResponseModel;
use wedocreatives\WrikePhpJmsserializer\Model\User\UserResourceModel;
use wedocreatives\WrikePhpJmsserializer\Model\User\UserResponseModel;
use wedocreatives\WrikePhpJmsserializer\Model\Version\VersionResourceModel;
use wedocreatives\WrikePhpJmsserializer\Model\Version\VersionResponseModel;
use wedocreatives\WrikePhpJmsserializer\Model\Workflow\WorkflowResourceModel;
use wedocreatives\WrikePhpJmsserializer\Model\Workflow\WorkflowResponseModel;
use wedocreatives\WrikePhpJmsserializer\SerializerFactory;
use wedocreatives\WrikePhpJmsserializer\Transformer\Response\ResponseModelTransformer;
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
 * Response Model Transformer Test.
 */
class ResponseModelTransformerTest extends ResponseTransformerTestCase
{
    const VALID_ID = 'valid_id';

    public function setUp()
    {
        $serializer = SerializerFactory::create();
        $this->object = new ResponseModelTransformer($serializer);
    }

    /**
     * @return array
     */
    public function normalizeInstancesProvider()
    {
        return [
            // [resourceClass, responseModelClass, resourceModelClass]
            [AccountResource::class, AccountResponseModel::class, AccountResourceModel::class],
            [AttachmentResource::class, AttachmentResponseModel::class, AttachmentResourceModel::class],
            [ColorResource::class, ColorResponseModel::class, ColorResourceModel::class],
            [CommentResource::class, CommentResponseModel::class, CommentResourceModel::class],
            [ContactResource::class, ContactResponseModel::class, ContactResourceModel::class],
            [CustomFieldResource::class, CustomFieldResponseModel::class, CustomFieldResourceModel::class],
            [DependencyResource::class, DependencyResponseModel::class, DependencyResourceModel::class],
            [FolderResource::class, FolderResponseModel::class, FolderResourceModel::class],
            [GroupResource::class, GroupResponseModel::class, GroupResourceModel::class],
            [IdResource::class, IdResponseModel::class, IdResourceModel::class],
            [InvitationResource::class, InvitationResponseModel::class, InvitationResourceModel::class],
            [TaskResource::class, TaskResponseModel::class, TaskResourceModel::class],
            [TimelogResource::class, TimelogResponseModel::class, TimelogResourceModel::class],
            [UserResource::class, UserResponseModel::class, UserResourceModel::class],
            [VersionResource::class, VersionResponseModel::class, VersionResourceModel::class],
            [WorkflowResource::class, WorkflowResponseModel::class, WorkflowResourceModel::class],
        ];
    }

    /**
     * @param mixed $resourceClass
     * @param mixed $responseModelClass
     * @param mixed $resourceModelClass
     *
     * @dataProvider normalizeInstancesProvider
     */
    public function test_normalize($resourceClass, $responseModelClass, $resourceModelClass)
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
        /** @var ResponseModelInterface $returnedResponse */
        $returnedResponse = $this->object->transform($responseMock, $resourceClass);

        self::assertInstanceOf($responseModelClass, $returnedResponse);

        foreach ($returnedResponse->getData() as $resourceModel) {
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
