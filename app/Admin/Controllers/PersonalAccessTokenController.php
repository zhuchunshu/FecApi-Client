<?php

namespace App\Admin\Controllers;

use App\Admin\Repositories\PersonalAccessToken;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Show;
use Dcat\Admin\Http\Controllers\AdminController;

class PersonalAccessTokenController extends AdminController
{
    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Grid::make(new PersonalAccessToken("user"), function (Grid $grid) {
            $grid->disableCreateButton();
            $grid->disableViewButton();
            $grid->disableEditButton();
            $grid->column('id')->sortable();
            $grid->column('user',"创建者")->display(function($user){
                $url = admin_url("users/".$user->id);
                return <<<HTML
                <a href="$url">$user->name</a>
HTML;
            });
            $grid->column('name',"名称");
            $grid->column('token');
            $grid->column('abilities')->explode(",")->label();
            $grid->column('last_used_at',"最后使用时间");
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
        return Show::make($id, new PersonalAccessToken(), function (Show $show) {
            $show->field('id');
            $show->field('tokenable_type');
            $show->field('tokenable_id');
            $show->field('name');
            $show->field('token');
            $show->field('abilities');
            $show->field('last_used_at');
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
        return Form::make(new PersonalAccessToken(), function (Form $form) {
            $form->display('id');
            $form->text('tokenable_type');
            $form->text('tokenable_id');
            $form->text('name');
            $form->text('token');
            $form->text('abilities');
            $form->text('last_used_at');
        
            $form->display('created_at');
            $form->display('updated_at');
        });
    }
}
