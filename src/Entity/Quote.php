<?php

namespace Gratefulness\Entity;

use ApiPlatform\Core\Annotation\ApiProperty;
use ApiPlatform\Core\Annotation\ApiResource;
use DateTime;
use Doctrine\ORM\Mapping as ORM;

/**
 * @author Hélder Pestana <hgpestana@gmail.com>
 *
 * @ApiResource()
 * @ORM\Entity(repositoryClass="Gratefulness\Repository\QuoteRepository")
 */
class Quote
{

    /**
     * @var string
     *
     * @ORM\Id()
     * @ORM\Column(name="id", type="uuid")
     * @ORM\GeneratedValue(strategy="CUSTOM")
     * @ORM\CustomIdGenerator(class="Ramsey\Uuid\Doctrine\UuidGenerator")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="sentence", type="text", nullable=false)
     */
    private $sentence;

    /**
     * @var string
     *
     * @ORM\Column(name="author", type="string", length=255, nullable=false)
     */
    private $author;

    /**
     * @var string
     *
     * @ORM\Column(name="language", type="string", length=5, nullable=false)
     */
    private $language;

    /**
     * @var bool
     *
     * @ORM\Column(name="approved", type="boolean", nullable=false)
     */
    private $approved;

    /**
     * @var DateTime
     *
     * @ORM\Column(name="created_at", type="datetime", nullable=false)
     */
    private $createdAt;


    public function __construct()
    {
        $this->approved = false;
        $this->createdAt = new DateTime('now');
    }

    /**
     * @return string|null
     */
    public function getId() : ?string
    {
        return $this->id;
    }

    /**
     * @return string|null
     */
    public function getSentence() : ?string
    {
        return $this->sentence;
    }

    /**
     * @param string $sentence
     *
     * @return Quote
     */
    public function setSentence(string $sentence) : self
    {
        $this->sentence = $sentence;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getAuthor() : ?string
    {
        return $this->author;
    }

    /**
     * @param string $author
     *
     * @return Quote
     */
    public function setAuthor(string $author) : self
    {
        $this->author = $author;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getLanguage() : ?string
    {
        return $this->language;
    }

    /**
     * @param string $language
     *
     * @return Quote
     */
    public function setLanguage(string $language) : self
    {
        $this->language = $language;

        return $this;
    }

    /**
     * @return bool
     */
    public function isApproved() : bool
    {
        return $this->approved;
    }

    /**
     * @return DateTime
     */
    public function getCreatedAt() : DateTime
    {
        return $this->createdAt;
    }
}
