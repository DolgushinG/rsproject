<div class="col-md-9">
    <div class="tab-content">
    <div class="tab-pane fade active show" id="account-general">
        <div class="card-body media align-items-center"> 
            @if ($user->photo === null)
            <img src="https://eu.ui-avatars.com/api/?name={{ Auth::user()->name }}&background=a73737&color=050202&font-size=0.33&size=150" class="d-block ui-w-80" alt="{{$user->name}}">
        @else
            <img src="storage/{{$user->photo}}" alt="" class="d-block ui-w-80">
        @endif
        <div class="media-body ml-4"> <label class="btn btn-outline-primary"> Загрузить новое фото 
            <input type="file" name="image" class="image">
            <div class="text-light small mt-1">Allowed JPG, GIF or PNG. Max size of 800K</div>
        </div>
        <form id="generalForm" enctype="multipart/form-data">
            @csrf
        </div>
        <hr class="border-light m-0">
        <div class="card-body">
            <div class="form-group"> <label class="form-label">Имя и Фамилия</label> 
                <input type="text" id="name" name="name" class="form-control mb-1" value="{{$user->name}}"></div>
            <div class="form-group"> <label class="form-label">E-mail</label> 
                <input type="text" disabled id="email" name="email" class="form-control mb-1" value="{{$user->email}}">
            </div>
            <div class="form-group"> <label class="form-label">Город</label>
                <input type="text" name="city_name" id="city" class="form-control" value="{{$user->city_name}}">
            </div>
            </div>
        </div>
        </form>
    </div>
</div>
<div class="text-right mt-4 ml-4 mb-4">
    <button id="saveChangesGeneral" type="button" class="btn btn-primary">Save changes</button>
</div>



