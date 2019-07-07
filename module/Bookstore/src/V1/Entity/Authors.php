<?php
declare(strict_types = 1);

namespace Bookstore\V1\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Authors
 *
 * @ORM\Table(name="authors")
 * @ORM\Entity
 */
class Authors
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
     * @var string|null
     *
     * @ORM\Column(name="name", type="string", length=45, precision=0, scale=0, nullable=true, unique=false)
     */
    private $name;

    /**
     * @var \Bookstore\V1\Entity\Books
     *
     * @ORM\OneToMany(targetEntity="Bookstore\V1\Entity\Books", mappedBy="author")
     */
    private $books;

    public function __construct() {
        $this->books = new ArrayCollection();
    }

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
     * @param string|null $name
     *
     * @return Authors
     */
    public function setName($name = null)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name.
     *
     * @return string|null
     */
    public function getName()
    {
        return $this->name;
    }

    public function addBookToAuthor(\Bookstore\V1\Entity\Books $book = null)
    {
        $this->books[] = $book;
    }

    public function getBooks()
    {
        foreach ($this->books as $book) {
            $this->bookNames[] = $book->getName();
        }

        return $this->bookNames;
    }
}
