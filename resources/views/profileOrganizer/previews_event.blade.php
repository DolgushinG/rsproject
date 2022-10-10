<form action="{{ route('editChangesCurrentEvent') }}" id="previewsEventForm">
  @csrf
<div class="tab-pane fade active show" id="account-previews-event" style="padding: 14px;
    padding-bottom: 45px;">
    <div class="card-body pb-2">
        <h1>Previews Event</h1>
    </div>
</div>
<div class="text-right mt-4 ml-4 mb-4">
    <button id="saveChangesPreviewsEvent" type="button" class="btn btn-primary" style="color: white!important;">Сохранить</button>
</div>

</form>
