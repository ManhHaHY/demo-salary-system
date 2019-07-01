<?php

namespace App;

use Core\Fluent\Sql;
use \PHPUnit\Framework\TestCase;

class FluentTest Extends TestCase {
    public function testBuildSQL()
    {
        $query = (new Sql())
                ->select(['foo', 'bar'])
                ->from('foobar', 'f')
                ->where('f.bar = ?');

        $this->assertEquals('SELECT foo, bar FROM foobar AS f WHERE f.bar = ?', (string) $query);
    }
}