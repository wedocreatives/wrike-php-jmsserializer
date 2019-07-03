<?php

/*
 * This file is part of the wedocreatives/wrike-php-jmsserializer package.
 *
 * (c) Zbigniew Ślązak
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace wedocreatives\WrikePhpJmsserializer\Model\Group;

use JMS\Serializer\Annotation as SA;
use wedocreatives\WrikePhpJmsserializer\Model\AbstractModel;
use wedocreatives\WrikePhpJmsserializer\Model\Common\MetadataModel;
use wedocreatives\WrikePhpJmsserializer\Model\ResourceModelInterface;

/**
 * Group Resource Model.
 */
class GroupResourceModel extends AbstractModel implements ResourceModelInterface
{
    /**
     * Contact ID.
     *
     * Comment: Contact ID
     *
     * @SA\Type("string")
     * @SA\SerializedName("id")
     *
     * @var string|null
     */
    protected $id;

    /**
     * Account ID.
     *
     * Comment: Account ID
     *
     * @SA\Type("string")
     * @SA\SerializedName("accountId")
     *
     * @var string|null
     */
    protected $accountId;

    /**
     * Group Title.
     *
     * @SA\Type("string")
     * @SA\SerializedName("title")
     *
     * @var string|null
     */
    protected $title;

    /**
     * List of group members user IDs.
     *
     * Comment: Contact ID list
     *
     * @SA\Type("array<string>")
     * @SA\SerializedName("memberIds")
     *
     * @var array|string[]|null
     */
    protected $memberIds;

    /**
     * List of child group IDs.
     *
     * Comment: Contact ID list
     *
     * @SA\Type("array<string>")
     * @SA\SerializedName("childIds")
     *
     * @var array|string[]|null
     */
    protected $childIds;

    /**
     * List of parent group IDs.
     *
     * Comment: Contact ID list
     *
     * @SA\Type("array<string>")
     * @SA\SerializedName("parentIds")
     *
     * @var array|string[]|null
     */
    protected $parentIds;

    /**
     * Avatar URL.
     *
     * @SA\Type("string")
     * @SA\SerializedName("avatarUrl")
     *
     * @var string|null
     */
    protected $avatarUrl;

    /**
     * Field is present and set to true for My Team (default) group
     * Optional.
     *
     * Comment: Optional
     *
     * @SA\Type("boolean")
     * @SA\SerializedName("myTeam")
     *
     * @var bool|null
     */
    protected $myTeam;

    /**
     * List of group metadata entries
     * Metadata entry key-value pair
     * Metadata entries are isolated on per-client (application) basis
     * Optional.
     *
     * Comment: Optional
     *
     * @SA\Type("array<wedocreatives\WrikePhpJmsserializer\Model\Common\MetadataModel>")
     * @SA\SerializedName("metadata")
     *
     * @var array|MetadataModel[]|null
     */
    protected $metadata;

    /**
     * @return null|string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param null|string $id
     *
     * @return $this
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getAccountId()
    {
        return $this->accountId;
    }

    /**
     * @param null|string $accountId
     *
     * @return $this
     */
    public function setAccountId($accountId)
    {
        $this->accountId = $accountId;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param null|string $title
     *
     * @return $this
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * @return array|null|\string[]
     */
    public function getMemberIds()
    {
        return $this->memberIds;
    }

    /**
     * @param array|null|\string[] $memberIds
     *
     * @return $this
     */
    public function setMemberIds($memberIds)
    {
        $this->memberIds = $memberIds;

        return $this;
    }

    /**
     * @return array|null|\string[]
     */
    public function getChildIds()
    {
        return $this->childIds;
    }

    /**
     * @param array|null|\string[] $childIds
     *
     * @return $this
     */
    public function setChildIds($childIds)
    {
        $this->childIds = $childIds;

        return $this;
    }

    /**
     * @return array|null|\string[]
     */
    public function getParentIds()
    {
        return $this->parentIds;
    }

    /**
     * @param array|null|\string[] $parentIds
     *
     * @return $this
     */
    public function setParentIds($parentIds)
    {
        $this->parentIds = $parentIds;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getAvatarUrl()
    {
        return $this->avatarUrl;
    }

    /**
     * @param null|string $avatarUrl
     *
     * @return $this
     */
    public function setAvatarUrl($avatarUrl)
    {
        $this->avatarUrl = $avatarUrl;

        return $this;
    }

    /**
     * @return bool|null
     */
    public function getMyTeam()
    {
        return $this->myTeam;
    }

    /**
     * @param bool|null $myTeam
     *
     * @return $this
     */
    public function setMyTeam($myTeam)
    {
        $this->myTeam = $myTeam;

        return $this;
    }

    /**
     * @return array|null|MetadataModel[]
     */
    public function getMetadata()
    {
        return $this->metadata;
    }

    /**
     * @param array|null|MetadataModel[] $metadata
     *
     * @return $this
     */
    public function setMetadata($metadata)
    {
        $this->metadata = $metadata;

        return $this;
    }
}
