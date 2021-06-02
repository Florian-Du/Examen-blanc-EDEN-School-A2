<?php

namespace Tests;

use Livres\Models\MainManager;
use PHPUnit\Framework\TestCase;

class BookTest extends TestCase
{
    public function testNombreBook() {
        define('HOST', '127.0.0.1');
        define('DATABASE', 'eval-tech');
        define('USER', 'root');
        define('PASSWORD', '');

        $book = new MainManager();
        $nombrLivre = $book->getNombreLivre();
        $this->assertSame('28',$nombrLivre[0]->getNombreLivre());
    }
}