<div class="col-md-9">
    <div class="tab-content">
        <form id="createEventForm">
            @csrf
            <div class="tab-pane fade active show" id="account-create-event" style="padding: 14px;
    padding-bottom: 45px;">
                <div class="card-body">
                    <h1>Форма создания события</h1>
                </div>
            </div>
            <div class="text-right mt-4 ml-4 mb-4">
                <button id="saveChangesCreateEvent" type="button" class="btn btn-primary" style="color: white!important;">Сохранить</button>
                <div id="ajax-alert" class="alert" style="display:none"></div>
            </div>
        </form>
    </div>
</div>


<script>
    $('textarea').on('input', function () {
        $(this).outerHeight(38).outerHeight(this.scrollHeight);
    });
</script>
