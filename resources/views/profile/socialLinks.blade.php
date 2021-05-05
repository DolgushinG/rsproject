<form action="{{ route('editChagesSocialLinks') }}" id="socialLinksForm">
  @csrf
<div class="tab-pane fade active show" id="account-social-links">
    <div class="card-body pb-2">

      <div class="form-group">
        <label class="form-label">Telegram</label>
        <input type="text" name="telegram" class="form-control" value="{{$user->telegram}}">
      </div>
      <div class="form-group">
        <label class="form-label">Instagram</label>
        <input type="text" name="instagram" class="form-control" value="{{$user->instagram}}">
      </div>
      <div class="form-group">
        <label class="form-label">Контакты</label>
        <input type="text" name="contact" class="form-control" value="{{$user->contact}}">
      </div>
    </div>
  </div>
  <div class="text-right mt-4 ml-4 mb-4">
    <button id="saveChangesSocialLinks" type="button" class="btn btn-primary">Сохранить</button>
  </div>
</form>
