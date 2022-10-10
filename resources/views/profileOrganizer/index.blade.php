@extends('layout')
@section('content')
    <div class="main">
        <link href="https://cdn.jsdelivr.net/npm/suggestions-jquery@20.3.0/dist/css/suggestions.min.css"
              rel="stylesheet"/>
        <script src="https://cdn.jsdelivr.net/npm/suggestions-jquery@20.3.0/dist/js/jquery.suggestions.min.js"></script>
        <section id="profile" class="profile">
            <div class="container light-style flex-grow-1 container-p-y">
                <header class="section-header">
                    <h1>Личный кабинет организатора</h1>
                </header>
                <div class="card overflow-hidden" style="background-color: #8080800a">
                    <div class="row no-gutters row-bordered row-border-light">
                        @include('profileOrganizer.sidebar')
                        <div class="col-md-9">
                            <div id="tabContent" class="tab-content">
                                @include('profileOrganizer.general')
                                <script type="text/javascript" src="{{ asset('js/ddata.js') }}"></script>
                            </div>
                            @include('message.message')
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    </section>

    <script type="text/javascript" src="{{ asset('js/profileOrganizer.js') }}"></script>
@endsection

