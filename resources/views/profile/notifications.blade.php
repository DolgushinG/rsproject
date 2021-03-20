<form action="{{ route('editChagesNotifications') }}" method="POST" id="notificationsForm">
  @csrf
<div class="tab-pane fade active show" id="account-notifications">
    <div class="card-body pb-2">
      <div class="form-group">
        <label class="switcher">
          <input type="checkbox" class="switcher-input" checked>
          <span class="switcher-indicator">
            <span class="switcher-yes"></span>
            <span class="switcher-no"></span>
          </span>
          <span class="switcher-label">Скрыть мое резюме </span>
        </label>
      </div>
    </div>
    </div>
  </div>
  <div class="text-right mt-3">
    <button id="saveChangesNotifications" type="button" class="btn btn-primary">Save changes</button>
  </div>
</form>