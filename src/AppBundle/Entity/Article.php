<?php


namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Article
 *
 * @ORM\Table(name="articles")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ArticleRepository")
 */
class Article
{
    /**
     * @var int
     *
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var int
     *
     * @ORM\Column(type="integer")
     */
    private $userId;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=100)
     */
    private $name;

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
    private $updatedAt;

    /**
     * @var bool
     *
     * @ORM\Column(type="boolean")
     */
    private $isDeleted;

    /**
     * @var bool
     *
     * @ORM\Column(type="boolean")
     */
    private $isActive;

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
     * Set userId
     *
     * @param int $userId
     */
    public function setUserId($userId): void
    {
        $this->userId = $userId;
    }

    /**
     * Get userId
     *
     * @return int
     */
    public function getUserId(): ?int
    {
        return $this->userId;
    }

    /**
     * Set name
     *
     * @param string $name
     */
    public function setName($name): void
    {
        $this->name = $name;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * Set text
     *
     * @param string $text
     */
    public function setText($text): void
    {
        $this->text = $text;
    }

    /**
     * Get text
     *
     * @return string
     */
    public function getText(): ?string
    {
        return $this->text;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     */
    public function setCreatedAt($createdAt): void
    {
        $this->createdAt = $createdAt;
    }

    /**
     * Get createdAt
     *
     * @return \DateTime
     */
    public function getCreatedAt(): ?\DateTime
    {
        return $this->createdAt;
    }

    /**
     * Set updatedAt
     *
     * @param \DateTime $updatedAt
     */
    public function setUpdatedAt($updatedAt): void
    {
        $this->updatedAt = $updatedAt;
    }

    /**
     * Get updatedAt
     *
     * @return \DateTime
     */
    public function getUpdatedAt(): ?\DateTime
    {
        return $this->updatedAt;
    }

    /**
     * Set deleted
     *
     * @param bool $isDeleted
     */
    public function setIsDeleted($isDeleted): void
    {
        $this->isDeleted = $isDeleted;
    }

    /**
     * Get deleted
     *
     * @return bool
     */
    public function getIsDeleted(): ?bool
    {
        return $this->isDeleted;
    }

    /**
     * Set isActive
     *
     * @param bool $isActive
     */
    public function setIsActive($isActive): void
    {
        $this->isActive = $isActive;
    }

    /**
     * Get isActive
     *
     * @return bool
     */
    public function getIsActive(): ?bool
    {
        return $this->isActive;
    }
}