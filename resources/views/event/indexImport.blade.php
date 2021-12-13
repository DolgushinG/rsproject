@extends('layout')
@section('content')
    <section id="contact" class="contact">
        <div class="container">
            <div class="row">
                <section class="section header-center">
                    import international competition
                </section>
                <form METHOD="POST" id="form-import-url">
                    @csrf
                    <label>
                        <p>
                            https://components.ifsc-climbing.org/results-api.php?api=season_leagues_calendar&league=395 (GAMES 2021)
                        </p>
                        <p>
                            https://components.ifsc-climbing.org/results-api.php?api=season_leagues_calendar&league=388 (WC WC 2021)
                        </p>
                        <p>
                            https://components.ifsc-climbing.org/results-api.php?api=season_leagues_calendar&league=389 (YOUTH)
                        </p>
                        <p>
                            https://components.ifsc-climbing.org/results-api.php?api=season_leagues_calendar&league=393 (EU ADULT)
                        </p>
                        <p>
                            https://components.ifsc-climbing.org/results-api.php?api=season_leagues_calendar&league=397 (MASTER)
                        </p>
                    </label>
                    <div class="form-group">
                        <div class="col-md-4">
                            <label for="url">URL</label>
                            <input type="text" name="url" id="url" class="form-control" placeholder="url .. ">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-4">
                            <label for="file_json">Events local russia</label>
                            <input type="checkbox" name="file_json" id="file_json" placeholder="file_json .. ">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-4">
                            <button class="btn btn-outline-primary" id="btnImport" type="button">IMPORT</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <script>
        $(document).ready(function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $(document).on('click', '#btnImport', function (e) {
                document.querySelector("#btnImport").innerHTML = 'Импорт начался';
                $('#btnImport').removeClass('btnImportDone');
                $('#btnImport').addClass('btnImportProcess');

                let data = $('#form-import-url').serialize();
                e.preventDefault();
                $("#form-import-url")[0].reset();
                $.ajax({
                    type: 'POST',
                    url: 'importEvent',
                    data: data,
                    success: function (data) {
                        document.querySelector("#btnImport").innerHTML = 'Импорт закочился';
                        $('#btnImport').removeClass('btnImportProcess');
                        $('#btnImport').addClass('btnImportDone');
                    },
                });
            });
        });
    </script>
    <style>
        .btnImportDone{
            background-color: green;
        }
        .btnImportProcess{
            background-color: grey;
        }
    </style>
@endsection
