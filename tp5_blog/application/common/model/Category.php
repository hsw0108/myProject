<?php

namespace app\common\model;

use think\Model;
use tree\Tree;

class Category extends Model
{
    protected $pk = 'cate_id';
    protected $table = 'blog_cate';

    /**
     * 获取分类数据【树状结构】
     * @param mixed|string $data
     * @return array
     */
    public function getAll(){
        $data = db('cate')->order('cate_sort desc,cate_id')->select();
        $tree = new Tree();
        return $tree->tree($data,'cate_name',$fieldPri='cate_id',$fieldPid='cate_pid');
    }
    public function add($data){
        /*执行验证*/
        $result = $this->validate(true)->save($data);
        if(false === $result){
            // 验证失败 返回错误信息
            return ['valid'=>0,'msg'=>$this->getError()];
        }else{
            return ['valid'=>1,'msg'=>'添加成功'];
        }
    }
    /**
     * 编辑栏目
     */
    public function edit($data){
        $result = $this->validate(true)->save($data,[$this->pk=>$data['cate_id']]);
        if($result){
            return ['valid'=>1,'msg'=>'编辑成功'];
        }else{
            return ['valid'=>0,'msg'=>$this->getError()];
        }
    }
    /**
     * 处理所属分类
     */
    public function getCateDate($cate_id){
        //首先找到$cate_id子集
        $this->getSon(db('cate')->select(),$cate_id);
        /*将自己追加进去*/
        $cate_ids[] = $cate_id;
        /*找到除了他们之外的数据,并且变成树状结构*/
        $field = db('cate')->whereNotIn('cate_id',$cate_ids)->select();
        $tree = new Tree();
        return $tree->tree($field,'cate_name','cate_id','cate_pid');

    }
    /**
     * 删除栏目
     */
    public function del($cate_id){
        $cate_pid = $this->where('cate_id',$cate_id)->value('cate_pid');
        /*修改当前要删除的$cate_id的子集数据的pid修改成$cate_pid*/
        $this->where('cate_pid',$cate_id)->update(['cate_pid'=>$cate_pid]);

        //执行当前数据删除
        if(Category::destroy($cate_id)){
            return ['valid'=>1,'msg'=>'删除成功'];
        }else{
            return ['valid'=>0,'msg'=>'删除失败'];
        }

    }
    /**
     * 找子集
     */
    public function getSon($data,$cate_id){
        static $temp = [];
        foreach ($data as $k=>$v){
            if($cate_id==$v['cate_pid']){
                $temp[] = $v['cate_id'];
                $this->getSon($data,$v['cate_id']);
            }
        }
    return $temp;
    }
}
