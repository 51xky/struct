<?php
declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: xky
 * Date: 2020/9/2
 * Time: 22:00
 */

namespace App\Service;


use Swoole\Server\Task;

class TimeCalculatorService
{
    function test(string $title,\Closure $closure)
    {
        $begin_time = time();

        // 执行闭包
        call_user_func($closure);

        $end_time = time();

        var_dump('执行时长：'.($end_time - $begin_time).'秒');
    }
}