<?php


namespace Livres\Models;


class CategoryRel
{
    private $id_book;
    private $id_cat;
    private $name_cat;

    /**
     * @return int
     */
    public function getIdBook()
    {
        return $this->id_book;
    }

    /**
     * @return int
     */
    public function getIdCat()
    {
        return $this->id_cat;
    }

    /**
     * @return string
     */
    public function getNameCat()
    {
        return $this->name_cat;
    }

    /**
     * @param int $id_book
     */
    public function setIdBook($id_book)
    {
        $this->id_book = $id_book;
    }

    /**
     * @param int $id_cat
     */
    public function setIdCat($id_cat)
    {
        $this->id_cat = $id_cat;
    }

    /**
     * @param string $name_cat
     */
    public function setNameCat($name_cat)
    {
        $this->name_cat = $name_cat;
    }
}