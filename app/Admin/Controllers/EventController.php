<?php

namespace App\Admin\Controllers;
use App\Models\Event;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Facades\Admin;
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
            ->header(trans('admin.events'))
            ->description(trans('events.description'))
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
        $grid->event_title('event_title')->editable();;
        $states = [
            'on' => ['value' => 1, 'text' => 'on', 'color' => 'primary'],
            'off' => ['value' => 0, 'text' => 'off', 'color' => 'default'],
        ];
        if (Admin::user()->can('active_status')) {
            $grid->column('active_status')->switch($states);
        }
        $grid->event_start_date('event_start_date')->sortable();
        $grid->event_end_date('event_end_date')->sortable();
        $grid->event_start_time('event_start_time');
        $grid->event_end_time('event_end_time');
        $grid->event_city('event_city')->editable();;
        $grid->event_url('event_url')->editable();;
        $grid->event_description('event_description')->editable();;
        $grid->created_at(trans('admin.created_at'))->sortable();
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
        $show->active_status('active_status');
        $show->event_start_date('event_start_date');
        $show->event_end_date('event_end_date');
        $show->event_start_time('event_start_time');
        $show->event_end_time('event_end_time');
        $show->event_city('event_city');
        $show->event_url('event_url');
        $show->event_description('event_description');
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


        $states = [
            'on'  => ['value' => 1, 'text' => 'on', 'color' => 'success'],
            'off' => ['value' => 0, 'text' => 'off', 'color' => 'danger'],
        ];

        $form->switch('active_status', 'active_status')->states($states);
        $form->text('event_title', 'event_title');

        $form->dateRange('event_start_date', 'event_end_date','Установить даты');
        $form->time('event_start_time', 'Время старта');
        $form->time('event_end_time', 'Время окончания');
        $form->text('event_city', 'event_city');
        $form->text('event_url', 'event_url');
        $form->summernote('event_description', 'Положение');
        $form->image('event_image', 'event_image');
        return $form;
    }
}
