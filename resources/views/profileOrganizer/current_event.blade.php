<form action="{{ route('editChangesCurrentEvent') }}" method="POST" id="currentEventForm">
  @csrf
  <div class="tab-pane fade active show" id="account-current-event" style="padding: 14px;
    padding-bottom: 45px;">
    <div class="card-body mt-2 pb-3">
        <h1>Current Event</h1>
    </div>
  </div>
  <div class="text-right mt-4 ml-4 mb-4">
    <button id="saveChangesCurrentEvent" type="button" class="btn btn-primary" style="color: white!important;">Сохранить</button>
  </div>
</form>
