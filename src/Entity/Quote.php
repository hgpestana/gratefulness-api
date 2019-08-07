<?php

namespace Gratefulness\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
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
     * @ORM\GeneratedValue(strategy="UUID")
     * @ORM\Column(name="id", type="guid")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="sentence", type="text", unique=true, nullable=false)
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
     * @ORM\Column(name="language", type="string", length=5)
     */
    private $language;

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
}
