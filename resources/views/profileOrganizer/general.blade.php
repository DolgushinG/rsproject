<div class="col-md-9">
    <div class="tab-content">
        <div class="tab-pane fade active show" id="account-general-organizer">
            <div class="card-body media align-items-center">
                <form id="generalOrganizerForm" enctype="multipart/form-data">
                @csrf
                    <div class="card-body">
                        <div class="form-group"> <label class="form-label">Имя и Фамилия</label>
                            <input type="text" id="name" name="name" class="form-control mb-1" value="{{$user->name}}">
                        </div>
                        <div class="form-group"> <label class="form-label">E-mail</label>
                            <input type="text" disabled id="email" name="email" class="form-control mb-1" value="{{$user->email}}">
                        </div>
                        <div class="form-group"> <label class="form-label" for="city">Город</label>
                            <input type="text" name="city_name" id="city" class="form-control" value="{{$user->city_name}}" required>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="text-right mt-4 ml-4 mb-4">
    <button id="saveChangesGeneralOrganizer" type="button" class="btn btn-primary" style="color: white!important;">Сохранить</button>
</div>



