<?php

namespace App\Admin\Controllers;

use App\Admin\Repositories\User;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Show;
use Dcat\Admin\Http\Controllers\AdminController;

class UserController extends AdminController
{
    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Grid::make(new User(), function (Grid $grid) {
            $grid->disableCreateButton();
            $grid->column('id')->sortable();
            $grid->column('name',"用户名");
            $grid->column('email',"邮箱");
            $grid->column('profile_photo_path',"头像路径");
            $grid->column("status","状态");
            $grid->column('created_at');
            $grid->column('updated_at')->sortable();
        
            $grid->filter(function (Grid\Filter $filter) {
                $filter->equal('id');
        
            });
        });
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     *
     * @return Show
     */
    protected function detail($id)
    {
        return Show::make($id, new User(), function (Show $show) {
            $show->field('id');
            $show->field('name',"用户名");
            $show->field('email',"邮箱");
            $show->field("status","状态");
            $show->field('profile_photo_path');
            $show->field('created_at');
            $show->field('updated_at');
        });
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        return Form::make(new User(), function (Form $form) {
            $form->display('id');
            $form->text('name',"用户名");
            $form->text('email',"邮箱");
            $form->select("status","状态")->options([
                "正常" => "正常",
                "封禁" => "封禁"
            ]);
            $form->display('created_at');
            $form->display('updated_at');
        });
    }
}
