<form action="{{ route('editChagesSocialLinks') }}" method="POST" id="socialLinksForm">
  @csrf
<div class="tab-pane fade active show" id="account-social-links">
    <div class="card-body pb-2">

      <div class="form-group">
        <label class="form-label">Telegram</label>
        <input type="text" class="form-control" value="https://twitter.com/user">
      </div>
      <div class="form-group">
        <label class="form-label">Instagram</label>
        <input type="text" class="form-control" value="https://www.facebook.com/user">
      </div>
    </div>
  </div>
  <div class="text-right mt-4 ml-4 mb-4">
    <button id="saveChangesSocialLinks" type="button" class="btn btn-primary">Save changes</button>
  </div>
</form>