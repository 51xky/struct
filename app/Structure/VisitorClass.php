<?php
declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: xky
 * Date: 2020/9/6
 * Time: 18:58
 */

namespace App\Structure;

/**
 * 区分于接口，有成员变量
 * Class VisitorClass
 * @package App\Structure
 */
abstract class VisitorClass
{
    public $stop = false;

    abstract function visit($element) : bool ;

}