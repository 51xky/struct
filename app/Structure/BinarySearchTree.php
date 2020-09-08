<?php
declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: xky
 * Date: 2020/9/2
 * Time: 22:23
 */

namespace App\Structure;


use Symfony\Component\String\Exception\InvalidArgumentException;

class BinarySearchTree extends AbstractStruct
{
    public $root;
    private $size;

    // 元素的数量
    function size() :int
    {
        return $this->size;
    }

    // 是否为空
    function isEmpty() :bool {
        return $this->size == 0;
    }

    // 清空所有元素
    function clear() {
        $this->size = 0;
    }

    // 添加元素
    function add($element)
    {
        $this->elementNotNullCheck($element);

        // 如果是第一个节点
        if($this->isEmpty()){
            $this->root = new TreeNode($element,null);
            $this->size++;
            return ;
        }

        // 找到父节点
        $parent = $node = $this->root;
        $cmp = 0;
        while ($node != null){
            $cmp = $this->compare($element,$node->element);
            $parent = $node;
            if($cmp > 0){
                $node = $node->right;
            }elseif($cmp < 0){
                $node = $node->left;
            }else{
                return;
            }
        }

        // 判断左还是右
        $newNode = new TreeNode($element,$parent);
        if($cmp > 0){
            $parent->right = $newNode;
        }else{
            $parent->left = $newNode;
        }

        // 数量+1
        $this->size++;
    }

    function compare($e1,$e2)
    {
        return $e1 - $e2;
    }

    // 删除元素
    function remove($element)
    {

    }

    // 是否包含某元素
    function contains()
    {

    }

    // 节点检测
    function elementNotNullCheck($element)
    {
        if(is_null($element)){
            throw new InvalidArgumentException('节点元素不能为空');
        }
    }

    // 层序遍历
    function printFromTopToBottom($node)
    {
        $queueVal = array();
        $queueNode = array();
        if($node == NULL)
            return $queueVal;
        array_push($queueNode, $node);
        while(!empty($queueNode)){
            $node = array_shift($queueNode);
            if($node->left != NULL)
                array_push($queueNode,$node->left);
            if($node->right != NULL)
                array_push($queueNode,$node->right);
            array_push($queueVal,$node->element);
        }
        return $queueVal;
    }

    // 前序遍历，接口实现打印方法
    function preOrderTraversal($node,Visitor $visitor)
    {
        if(is_null($node)) return;

        $visitor->visit($node->element);
        $this->preOrderTraversal($node->left,$visitor);
        $this->preOrderTraversal($node->right,$visitor);
    }

    // 中序遍历，抽象类实现，任意停止
    function inOrderTraversal($node,VisitorClass $visitor)
    {
        // 用于停止遍历
        if(is_null($node) || $visitor->stop) return;

        $this->inOrderTraversal($node->left,$visitor);

        // 用于停止打印
        if($visitor->stop) return;
        $visitor->stop =  $visitor->visit($node->element);

        $this->inOrderTraversal($node->right,$visitor);
    }

    // 后序遍历
    function postOrderTraversal($node)
    {
        if(is_null($node)) return;

        $this->postOrderTraversal($node->left);
        $this->postOrderTraversal($node->right);
        var_dump($node->element);
    }

}