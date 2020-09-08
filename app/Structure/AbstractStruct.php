<?php
declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: xky
 * Date: 2020/9/2
 * Time: 22:23
 */

namespace App\Structure;


abstract class AbstractStruct
{
    function size() :int {}// 元素的数量

    function isEmpty() :bool {}// 是否为空

    function clear() {}// 清空所有元素

function remove($element) {}// 删除元素

    function contains() {}// 是否包含某元素
}