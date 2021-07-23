@extends('layout')
@section('content')
<link href="https://cdn.jsdelivr.net/npm/suggestions-jquery@20.3.0/dist/css/suggestions.min.css" rel="stylesheet"/>
<script src="https://cdn.jsdelivr.net/npm/suggestions-jquery@20.3.0/dist/js/jquery.suggestions.min.js"></script>
<section id="profile" class="profile">
  <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-footer">
                <h5 class="modal-title" id="modalLabel">Выберите область для аватара
                </h5>
                <div class="row">
                    <div class="col">
                        <button type="button" class="btn btn-primary showbuttonsave" id="crop">Сохранить</button>
                    </div>
                </div>
            </div>
            <div class="modal-body">
                <div class="img-container">
                    <div class="row">
                        <div class="col-md-8">
                            <img id="image" src="https://avatars0.githubusercontent.com/u/3456749">
                        </div>
                        <div class="col-md-4">
                            <div class="preview"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" id="modalclose" data-dismiss="modal">Отмена</button>
            </div>
        </div>
    </div>
</div>
    <div class="container light-style flex-grow-1 container-p-y">
        <h4 class="font-weight-bold py-3 mb-4">
          Личный кабинет
        </h4>
        <div class="card overflow-hidden" style="background-color: #8080800a">
          <div class="row no-gutters row-bordered row-border-light">
           @include('profile.sidebar')
            <div class="col-md-9">
              <div id="tabContent" class="tab-content">
                  @include('profile.general')
              <script type="text/javascript" src="{{ asset('js/ddata.js') }}"></script>
              </div>
                @include('message.message')
            </div>
          </div>
        </div>
    </div>
</section>

<script type="text/javascript" src="{{ asset('js/profile.js') }}"></script>
@endsection

