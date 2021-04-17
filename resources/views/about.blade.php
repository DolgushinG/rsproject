<!DOCTYPE html>
<html>
  <head>
    <title>Datatables AJAX pagination with Search and Sort - Laravel 7</title>

    <!-- Meta -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
   
    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="{{asset('DataTables/datatables.min.css')}}">

    <!-- Script -->
    <script src="{{asset('jquery-3.4.1.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('DataTables/datatables.min.js')}}" type="text/javascript"></script>


    <!-- Datatables CSS CDN -->
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css"> -->

    <!-- jQuery CDN -->
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->

    <!-- Datatables JS CDN -->
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script> -->

  </head>
  <body>

    <table id='empTable' width='100%' border="1" style='border-collapse: collapse;'>
      <thead>
        <tr>
          <td>S.no</td>
          <td>Average_rating</td>
          <td>Name</td>
          <td>Email</td>
        </tr>
      </thead>
    </table>

    <!-- Script -->
    <script type="text/javascript">
    $(document).ready(function(){
        $.ajaxSetup({
        headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
      // DataTable
      $('#empTable').DataTable({
         processing: true,
         serverSide: true,
         "ajax": {
            "url": "getEmployees",
            "type": "POST"
        },
         columns: [
            { data: 'id' },
            { data: 'average_rating' },
            { data: 'name' },
            { data: 'email' },
         ]
      });

    });
    </script>
  </body>
</html>