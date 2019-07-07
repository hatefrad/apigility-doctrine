<?php
declare(strict_types = 1);

namespace Bookstore\V1\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Books
 *
 * @ORM\Table(name="books", indexes={@ORM\Index(name="author_id", columns={"author_id"})})
 * @ORM\Entity
 */
class Books
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", precision=0, scale=0, nullable=false, unique=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=45, precision=0, scale=0, nullable=false, unique=false)
     */
    private $name;

    /**
     * @var \Bookstore\V1\Entity\Authors
     *
     * @ORM\ManyToOne(targetEntity="Bookstore\V1\Entity\Authors")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="author_id", referencedColumnName="id", nullable=false)
     * })
     */
    private $author;

    /**
     * Get id.
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name.
     *
     * @param string $name
     *
     * @return Books
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name.
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set author.
     *
     * @param \Bookstore\V1\Entity\Authors|null $author
     *
     * @return Books
     */
    public function setAuthor(\Bookstore\V1\Entity\Authors $author = null)
    {
        $this->author = $author;

        return $this;
    }

    /**
     * Get author.
     *
     * @return \Bookstore\V1\Entity\Authors|null
     */
    public function getAuthor()
    {
        return $this->author;
    }
}
