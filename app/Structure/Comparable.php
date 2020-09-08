<?php
declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: xky
 * Date: 2020/9/4
 * Time: 19:48
 */

namespace App\Structure;


interface Comparable
{
    function compare($left, $right);
    
}