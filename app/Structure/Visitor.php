<?php
declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: xky
 * Date: 2020/9/6
 * Time: 18:22
 */

namespace App\Structure;


interface Visitor
{
    function visit($element);
}