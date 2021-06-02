<?php


namespace Livres\Models;


class Book
{

    private $id_book;
    private $id_author;
    private $name_author;
    private $first_name_author;
    private $title;
    private $date_disponibilite;
    private $num_pages;
    private $nombreLivre;


    /**
     * @return Int
     */
    public function getIdBook()
    {
        return $this->id_book;
    }

    /**
     * @return Int
     */
    public function getIdAuthor()
    {
        return $this->id_author;
    }

    /**
     * @return string
     */
    public function getFirstNameAuthor()
    {
        return $this->first_name_author;
    }

    /**
     * @return string
     */
    public function getNameAuthor()
    {
        return $this->name_author;
    }

    /**
     * @return String
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @return String
     */
    public function getDateDisponibilite()
    {
        return $this->date_disponibilite;
    }

    /**
     * @return int
     */
    public function getNumPages()
    {
        return $this->num_pages;
    }

    /**
     * @return mixed
     */public function getNombreLivre()
{
    return $this->nombreLivre;
}

    /**
     * @param Int $id_book
     */
    public function setIdBook($id_book)
    {
        $this->id_book = $id_book;
    }

    /**
     * @param int $id_author
     */
    public function setIdAuthor($id_author)
    {
        $this->id_author = $id_author;
    }

    /**
     * @param string $first_name_author
     */
    public function setFirstNameAuthor($first_name_author)
    {
        $this->first_name_author = $first_name_author;
    }

    /**
     * @param string $name_author
     */
    public function setNameAuthor($name_author)
    {
        $this->name_author = $name_author;
    }

    /**
     * @param string $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @param String $date_diponibilite
     */
    public function setDateDisponibilite($date_disponibilite)
    {
        $this->date_disponibilite = $date_disponibilite;
    }

    /**
     * @param int $num_pages
     */
    public function setNumPages($num_pages)
    {
        $this->num_pages = $num_pages;
    }

    /**
     * @param mixed $nombreLivre
     */public function setNombreLivre($nombreLivre): void
{
    $this->nombreLivre = $nombreLivre;
}
}