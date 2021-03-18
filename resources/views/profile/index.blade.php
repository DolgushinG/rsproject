@extends('layout')
@section('content')
<section id="profile" class="profile">
    <div class="container light-style flex-grow-1 container-p-y">
        <h4 class="font-weight-bold py-3 mb-4">
          Account settings
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
        <div class="text-right mt-3">
          <button id="BtnContent" type="button" class="btn btn-primary">Save changes</button>&nbsp;
          <button type="button" class="btn btn-default">Cancel</button>
        </div>
    </div>
</section>
<script type="text/javascript" src="{{ asset('js/profile.js') }}"></script>
@endsection

