<?php

namespace App\Admin\Controllers;

use App\Models\Event;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;

class EventController extends Controller
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
        $grid = new Grid(new Event);

        $grid->id('ID');
        $grid->event_title('event_title');
        $grid->event_start_date('event_start_date');
        $grid->event_end_date('event_end_date');
        $grid->event_start_time('event_start_time');
        $grid->event_end_time('event_end_time');
        $grid->event_city('event_city');
        $grid->event_url('event_url');
        $grid->event_description('event_description');
        $grid->active_status('active_status');
        $grid->event_image('event_image');
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
        $show = new Show(Event::findOrFail($id));

        $show->id('ID');
        $show->event_title('event_title');
        $show->event_start_date('event_start_date');
        $show->event_end_date('event_end_date');
        $show->event_start_time('event_start_time');
        $show->event_end_time('event_end_time');
        $show->event_city('event_city');
        $show->event_url('event_url');
        $show->event_description('event_description');
        $show->active_status('active_status');
        $show->event_image('event_image');
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
        $form = new Form(new Event);

        $form->display('ID');
        $form->text('event_title', 'event_title');
        $form->text('event_start_date', 'event_start_date');
        $form->text('event_end_date', 'event_end_date');
        $form->text('event_start_time', 'event_start_time');
        $form->text('event_end_time', 'event_end_time');
        $form->text('event_city', 'event_city');
        $form->text('event_url', 'event_url');
        $form->text('event_description', 'event_description');
        $form->switch('active_status', 'active_status');
        $form->text('event_image', 'event_image');
        $form->display(trans('admin.created_at'));
        $form->display(trans('admin.updated_at'));

        return $form;
    }
}
