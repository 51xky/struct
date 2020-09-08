<?php
declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: xky
 * Date: 2020/9/2
 * Time: 22:51
 */

namespace App\Structure;


class TreeNode
{
    public $element;
    public $parent;
    public $left;
    public $right;

    function __construct($element,$parent)
    {
        $this->element = $element;
        $this->parent = $parent;
    }
}