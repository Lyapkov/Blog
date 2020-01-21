<?php


namespace AppBundle\Entity;


/**
 * Comment
 *
 * @ORM\Table(type="comments")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\CommentRepository")
 */
class Comment
{
    /**
     * @var int
     *
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GenerateValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var int
     *
     * @ORM\Column(type="integer")
     */
    private $userId;

    /**
     * @var int
     *
     * @ORM\Column(type="integer")
     */
    private $articleId;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=1000)
     */
    private $text;

    /**
     * @var \DateTime
     *
     * @ORM\Column(type="datetime")
     */
    private $createdAt;

    /**
     * @var \DateTime
     *
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $updateAt;

    /**
     * @var bool
     *
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $isDelete;

    /**
     * @var bool
     *
     *@ORM\Column(type="boolean", nullable=true)
     */
    private $isTop;

    /**
     * Get id
     *
     * @return int
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @param int $userId
     */
    public function setUserId(int $userId): void
    {
        $this->userId = $userId;
    }

    /**
     * @return int
     */
    public function getUserId(): int
    {
        return $this->userId;
    }

    /**
     * @param int $articleId
     */
    public function setArticleId(int $articleId): void
    {
        $this->articleId = $articleId;
    }

    /**
     * @return int
     */
    public function getArticleId(): int
    {
        return $this->articleId;
    }

    /**
     * @param string $text
     */
    public function setText(string $text): void
    {
        $this->text = $text;
    }

    /**
     * @return string
     */
    public function getText(): string
    {
        return $this->text;
    }

    /**
     * @param \DateTime $createdAt
     */
    public function setCreatedAt(\DateTime $createdAt): void
    {
        $this->createdAt = $createdAt;
    }

    /**
     * @return \DateTime
     */
    public function getCreatedAt(): \DateTime
    {
        return $this->createdAt;
    }

    /**
     * @param \DateTime $updateAt
     */
    public function setUpdateAt(\DateTime $updateAt): void
    {
        $this->updateAt = $updateAt;
    }

    /**
     * @return \DateTime
     */
    public function getUpdateAt(): \DateTime
    {
        return $this->updateAt;
    }

    /**
     * @param bool $isDelete
     */
    public function setIsDelete(bool $isDelete): void
    {
        $this->isDelete = $isDelete;
    }

    /**
     * @return bool
     */
    public function isDelete(): bool
    {
        return $this->isDelete;
    }

    /**
     * @param bool $isTop
     */
    public function setIsTop(bool $isTop): void
    {
        $this->isTop = $isTop;
    }

    /**
     * @return bool
     */
    public function isTop(): bool
    {
        return $this->isTop;
    }
}