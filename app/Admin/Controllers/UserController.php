<?php

namespace App\Admin\Controllers;

use App\Models\User;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;

class UserController extends Controller
{
    use HasResourceActions;

    /**
     * Index interface.
     *
     * @param Content $content
     * @return Content
     */
    public function index(Content $content)
    {
        return $content
            ->header(trans('admin.index'))
            ->description(trans('admin.description'))
            ->body($this->grid());
    }

    /**
     * Show interface.
     *
     * @param mixed $id
     * @param Content $content
     * @return Content
     */
    public function show($id, Content $content)
    {
        return $content
            ->header(trans('admin.detail'))
            ->description(trans('admin.description'))
            ->body($this->detail($id));
    }

    /**
     * Edit interface.
     *
     * @param mixed $id
     * @param Content $content
     * @return Content
     */
    public function edit($id, Content $content)
    {
        return $content
            ->header(trans('admin.edit'))
            ->description(trans('admin.description'))
            ->body($this->form()->edit($id));
    }

    /**
     * Create interface.
     *
     * @param Content $content
     * @return Content
     */
    public function create(Content $content)
    {
        return $content
            ->header(trans('admin.create'))
            ->description(trans('admin.description'))
            ->body($this->form());
    }

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new User);

        $grid->id('id');
        $grid->name('name');
        $grid->email('email');
        $grid->slary('slary');
        $grid->exp_level('exp_level');
        $grid->description('description');
        $grid->skills('skills');
        $grid->responsibilities('responsibilities');
        $grid->city_name('city_name');
        $grid->gender('gender');
        $grid->address('address');
        $grid->phone('phone');
        $grid->photo('photo');
        $grid->user_type('user_type');
        $grid->company('company');
        $grid->premium_jobs_balance('premium_jobs_balance');
        $grid->active_status('active_status');
        $grid->created_at(trans('admin.created_at'));
        $grid->updated_at(trans('admin.updated_at'));

        return $grid;
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show(User::findOrFail($id));

        $show->id('id');
        $show->name('name');
        $show->email('email');
        $show->slary('slary');
        $show->exp_level('exp_level');
        $show->description('description');
        $show->skills('skills');
        $show->responsibilities('responsibilities');
        $show->city_name('city_name');
        $show->gender('gender');
        $show->address('address');
        $show->phone('phone');
        $show->photo('photo');
        $show->user_type('user_type');
        $show->company('company');
        $show->premium_jobs_balance('premium_jobs_balance');
        $show->active_status('active_status');
        $show->created_at(trans('admin.created_at'));
        $show->updated_at(trans('admin.updated_at'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new User);

        $form->text('id', 'id');
        $form->text('name', 'name');
        $form->text('email', 'email');
        $form->text('slary', 'slary');
        $form->text('exp_level', 'exp_level');
        $form->text('description', 'description');
        $form->text('skills', 'skills');
        $form->text('responsibilities', 'responsibilities');
        $form->text('city_name', 'city_name');
        $form->text('gender', 'gender');
        $form->text('address', 'address');
        $form->text('phone', 'phone');
        $form->text('photo', 'photo');
        $form->text('user_type', 'user_type');
        $form->text('company', 'company');
        $form->text('premium_jobs_balance', 'premium_jobs_balance');
        $form->text('active_status', 'active_status');
        $form->display(trans('admin.created_at'));
        $form->display(trans('admin.updated_at'));

        return $form;
    }
}
