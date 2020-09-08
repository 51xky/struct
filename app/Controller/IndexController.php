<?php

declare(strict_types=1);
/**
 * This file is part of Hyperf.
 *
 * @link     https://www.hyperf.io
 * @document https://doc.hyperf.io
 * @contact  group@hyperf.io
 * @license  https://github.com/hyperf/hyperf/blob/master/LICENSE
 */
namespace App\Controller;

use App\Service\TimeCalculatorService;
use App\Structure\BinarySearchTree;
use App\Structure\Visitor;
use App\Structure\VisitorClass;
use Hyperf\Di\Annotation\Inject;
use Hyperf\HttpServer\Annotation\AutoController;

/**
 * @AutoController(prefix="index")
 * Class IndexController
 * @package App\Controller
 */
class IndexController extends AbstractController
{

    /**
     * @Inject()
     * @var TimeCalculatorService
     */
    protected $time_calculator_service;

    public function index()
    {
        $user = $this->request->input('user', 'Hyperf');
        $method = $this->request->getMethod();

        return [
            'method' => $method,
            'message' => "Hello {$user}.",
        ];
    }

    public function test()
    {
        $this->time_calculator_service->test('test',function (){
            sleep(random_int(0,4));
        });
        return 1;
    }

    function bst()
    {
        $bst = new BinarySearchTree();
        $arr = [10,30,25,14,87,99,22,11,3,5,8,123];
//        $arr = [10,30,25];
        foreach($arr as $item){
            $bst->add($item);
        }
        return $bst->printFromTopToBottom($bst->root);
    }

    function preOrder()
    {
        $bst = new BinarySearchTree();
        $arr = [7,4,2,1,3,5,9,8,11,10,12];
        foreach($arr as $item){
            $bst->add($item);
        }
        // 匿名类使用
        $bst->preOrderTraversal($bst->root,new class implements Visitor{

            function visit($element)
            {
                echo '**'.$element.'**';
            }
        });
        return 1;
    }

    function inOrder()
    {
        $bst = new BinarySearchTree();
        $arr = [7,4,2,1,3,5,9,8,11,10,12];
        foreach($arr as $item){
            $bst->add($item);
        }
        $bst->inOrderTraversal($bst->root,new class extends VisitorClass{

            function visit($element): bool
            {
                // TODO: Implement visit() method.
                echo '-'.$element.'-';
                return $element == 9;
            }
        });
        return 1;
    }

    function postOrder()
    {
        $bst = new BinarySearchTree();
        $arr = [7,4,2,1,3,5,9,8,11,10,12];
        foreach($arr as $item){
            $bst->add($item);
        }
        $bst->postOrderTraversal($bst->root);
        return 1;
    }


}
