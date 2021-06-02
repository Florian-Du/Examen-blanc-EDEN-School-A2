<?php


namespace Livres\Models;


class Category
{
    private $id_category;
    private $name_cat;

    /**
     * @return int
     */
    public function getIdCat()
    {
        return $this->id_category;
    }

    /**
     * @return string
     */
    public function getNameCat()
    {
        return $this->name_cat;
    }

    /**
     * @param int $id_cat
     */
    public function setIdCat($id_cat)
    {
        $this->id_category = $id_cat;
    }

    /**
     * @param string $name_cat
     */
    public function setNameCat($name_cat)
    {
        $this->name_cat = $name_cat;
    }
}