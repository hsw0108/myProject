<?php

namespace app\admin\controller;

use think\Controller;

class Article extends Base
{
    protected $db;
    protected $pk;
    public function _initialize()
    {
        parent::_initialize(); // TODO: Change the autogenerated stub
        $this->db = new \app\common\model\Article();
    }
    public function index(){
        $field = $this->db->getAll(2);
        $this->assign('field',$field);
        return $this->fetch();
    }
    public function add(){
        if(request()->isPost()){
            $res = $this->db->add(input('post.'));
            if($res['valid']){
                $this->success($res['msg'],'index');
            }else{
                $this->error($res['msg']);exit;
            }
        }
        /*获取分类数据*/
        $cate = new \app\common\model\Category();
        $cateData = $cate->getAll();
        $this->assign('cateData',$cateData);
        /*获取标签数据*/
        $tagData = db('tag')->select();
        $this->assign('tagData',$tagData);
        return $this->fetch();
    }
    /**
     * 文章排序修改
     */
    public function edit(){
        if(request()->isPost()){
            $res = $this->db->edit(input('post.'));
            if($res['valid']){
                $this->success($res['msg'],'index');
            }else{
                $this->error($res['msg']);
            }
        }
        $arc_id = input('param.arc_id');
        /*获取分类数据*/
        $cate = new \app\common\model\Category();
        $cateData = $cate->getAll();
        $this->assign('cateData',$cateData);
        /*获取标签数据*/
        $tagData = db('tag')->select();
        $this->assign('tagData',$tagData);
        /*获取旧数据*/
        $oldData = db('article')->find($arc_id);
        $this->assign('oldData',$oldData);
        /*获取当前文章所有标签id*/
        $tag_ids = db('arc_tag')->where('arc_id',$arc_id)->column('tag_id');
        $this->assign('tag_ids',$tag_ids);
        return $this->fetch();
    }
    /**
     * 操作回收站数据
     * @is_recycle为 1 删除到回收站
     * @is_recycle为 2 从回收站恢复数据
     */
    public function ToRecycle(){
        $arc_id = input('param.arc_id');
        $is_recycle = input('param.is_recycle');
        $res = $this->db->save(['is_recycle'=>$is_recycle],['arc_id'=>$arc_id]);
        if($res){
            $this->success('操作成功','index');exit;
        }else{
            $this->error('操作失败');exit;
        }
    }

    /**
     *文章排序
     */
    public function changeSort(){
        if($this->request->isAjax()){
            $res = $this->db->changeSort(input('post.'));
            if($res['valid']){
                $this->success($res['msg'],'index');
            }else{
                $this->error($res['msg']);exit;
            }
        }

    }
    /**
     * 回收站管理
     */
    public function recycle(){
        $field = $this->db->getAll(1);
        $this->assign('field',$field);
        return $this->fetch();
    }
    /**
     * 删除文章
     */
    public function del(){
        $arc_id = input('get.arc_id');
        $res = $this->db->del($arc_id);
        if($res['valid']){
            $this->success($res['msg'],'index');
        }else{
            $this->error($res['msg']);exit;
        }
    }

}