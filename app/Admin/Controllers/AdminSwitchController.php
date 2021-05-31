<?php

namespace App\Admin\Controllers;

use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Show;
use Dcat\Admin\Layout\Content;
use App\Admin\Repositories\AdminSwitch;
use App\Models\AdminSwitch as ModelsAdminSwitch;
use Dcat\Admin\Http\Controllers\AdminController;

class AdminSwitchController
{

    /**
     * Index interface.
     *
     * @param Content $content
     *
     * @return Content
     */
    public function index(Content $content)
    {
        return $content
            ->title($this->title())
            ->description($this->description()['index'] ?? trans('admin.list'))
            ->body($this->grid());
    }

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return new Grid(null, function (Grid $grid) {
            $grid->column('id', '标识')->explode()->label();
            $grid->column('name', '名称')->explode('\\')->label();
            $grid->column('status', '状态')->switch();
            $grid->disableRowSelector();
            //$grid->disableCreateButton();
            $grid->disableActions();
            $grid->disableCreateButton();
            $grid->disableBatchDelete();
            $grid->disablePagination();
            $grid->model()->setData($this->generate());
        });
    }

    /**
     * 获取所有插件
     *
     * @return array
     */
    public function generate()
    {
        $data = include app_path("lib/admin/switch.php");
        return $data;
    }


    
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title="功能开关";

    /**
     * Set description for following 4 action pages.
     *
     * @var array
     */
    protected $description = [
        //        'index'  => 'Index',
        //        'show'   => 'Show',
        //        'edit'   => 'Edit',
        //        'create' => 'Create',
    ];

    /**
     * Get content title.
     *
     * @return string
     */
    protected function title()
    {
        return $this->title ?: admin_trans_label();
    }

    /**
     * Get description for following 4 action pages.
     *
     * @return array
     */
    protected function description()
    {
        return $this->description;
    }


    /**
     * Update the specified resource in storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update($name, Form $form)
    {
        if (get_switch($name)) {
            // 存在
            ModelsAdminSwitch::where('name', $name)->delete();
            $ev = "禁用";
        } else {
            // 不存在
            ModelsAdminSwitch::insert([
                'name' => $name,
                'status' => 1,
                'created_at' => date("Y-m-d H:i:s")
            ]);
            $ev = "启用";
        }
        return [
            'status' => true,
            'data' => [
                'message' => "标识为:" . $name . "的功能" .$ev . '成功!',
                'type' => 'success'
            ]
        ];
    }

}
