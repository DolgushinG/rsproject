<form action="{{ route('editChagesNotifications') }}" method="POST" id="notificationsForm">
  @csrf
<div class="tab-pane fade active show" id="account-notifications">
    <div class="card-body pb-2">
      <div class="form-group">
          <div class="checkbox">
            @if(!$user->active_status)
            <input class="custom-checkbox" type="checkbox" id="color-1" name="active" unchecked value="1">
            @else 
            <input class="custom-checkbox" type="checkbox" id="color-1" name="active" checked value="0">
            @endif
            <label for="color-1">Скрыть мое резюме</label>
          </div>
      </div>
    </div>
    </div>
  </div>
  <div class="text-right mt-4 ml-4 mb-4">
    <button id="saveChangesNotifications" type="button" class="btn btn-primary">Save changes</button>
  </div>
</form>