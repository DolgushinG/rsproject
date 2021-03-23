@extends('layout')
@section('content')
<link href="https://cdn.jsdelivr.net/npm/suggestions-jquery@20.3.0/dist/css/suggestions.min.css" rel="stylesheet"/>
<script src="https://cdn.jsdelivr.net/npm/suggestions-jquery@20.3.0/dist/js/jquery.suggestions.min.js"></script>
<section id="profile" class="profile">
    <div class="container light-style flex-grow-1 container-p-y">
        <h4 class="font-weight-bold py-3 mb-4">
          Личный кабинет
        </h4>
        <div class="card overflow-hidden" style="background-color: #8080800a">
          <div class="row no-gutters row-bordered row-border-light">
           @include('profile.sidebar')
            <div class="col-md-9">
              <div id="tabContent" class="tab-content">
              </div>
            </div>
          </div>
        </div>
    </div>
</section>

<script type="text/javascript" src="{{ asset('js/profile.js') }}"></script>
@endsection

