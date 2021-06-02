<?php

namespace App\Admin\Controllers;

use App\Admin\Repositories\NullRepository;
use App\Models\AdminSetting;
use Dcat\Admin\Form;
use Dcat\Admin\Layout\Content;
use Dcat\Admin\Http\Controllers\AdminController;

class ApiSettingController extends AdminController
{
    /**
     * Create interface.
     *
     * @param Content $content
     *
     * @return Content
     */
    public function create(Content $content): Content
    {
        return $content
            ->translation($this->translation())
            ->title($this->title())
            ->description($this->description()['create'] ?? trans('admin.create'))
            ->body($this->form());
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form(): Form
    {
        return Form::make(new NullRepository(), function (Form $form) {
            $form->disableListButton();
            $form->action('setting/setting');
            $form->tab('V1', function (Form $form) {
                // tab 可以和 column 布局结合
                $form->text('api-v1-qqhook-url', 'BotPro - SendApi链接')->value(get_options("api-v1-qqhook-url"));
                $form->text('api-v1-qqhook-token', 'BotPro - SendApi连接Token')->value(get_options("api-v1-qqhook-token"));
                $form->text('api-v1-qqhook-view', 'QQHOOK内容浏览地址')->value(get_options("api-v1-qqhook-view"));
            });
        });
    }

    public function store()
    {
        foreach (request()->input() as $key => $value) {
            if ($key != "_token") {
                if (get_options_count($key)) {
                    // 更新
                    AdminSetting::where("name", $key)->update([
                        "value" => $value
                    ]);
                } else {
                    // 新增
                    if ($value) {
                        AdminSetting::insert([
                            "name" => $key,
                            "value" => $value,
                            "created_at" => date("Y-m-d H:i:s")
                        ]);
                    }
                }
            }
        }
        return [
            'status' => true,
            'data' => [
                'message' => "保存成功!",
                'type' => 'success'
            ]
        ];
    }
}
