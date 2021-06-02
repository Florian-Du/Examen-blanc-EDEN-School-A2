<?php


namespace Livres\Models;


class Auteur
{
    private int $id_author;
    private string $name_author;
    private string $first_name_author;

    /**
     * @return int
     */
    public function getIdAuthor()
    {
        return $this->id_author;
    }

    /**
     * @return string
     */
    public function getNameAuthor()
    {
        return $this->name_author;
    }

    /**
     * @return string
     */
    public function getFirstNameAuthor()
    {
        return $this->first_name_author;
    }

    /**
     * @param int $id_author
     */
    public function setIdAuthor($id_author)
    {
        $this->id_author = $id_author;
    }

    /**
     * @param string $name_author
     */
    public function setNameAuthor($name_author)
    {
        $this->name_author = $name_author;
    }

    /**
     * @param string $first_name_author
     */
    public function setFirstNameAuthor($first_name_author)
    {
        $this->first_name_author = $first_name_author;
    }
}