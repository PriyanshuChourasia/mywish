<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ env('APP_NAME') }}</title>
    {{-- <link rel="stylesheet" href="{{ asset('css/front.css') }}"> --}}
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;900&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.2.0/css/fontawesome.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="{{asset('css/wish.css')}}">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,600;1,700;1,900&display=swap" rel="stylesheet">


    {{-- <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet" /> --}}



</head>

<body>
    <div class="main-container">
        @include('layouts.section.navbar')
        @include('layouts.section.welcome')
        @include('layouts.section.courses')
        @include('layouts.section.classes')
        @include('layouts.section.feedback')
        @include('layouts.section.events')
        @include('layouts.section.contact_us')
        @include('layouts.section.footer')
    </div>

    <div class="modal fade" id="modal-popup" data-bs-backdrop="static" role="dialog"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">

</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
    <script type="text/javascript">
        $(function() {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $(document).on("click", ".load-popup", function(e) {

                e.preventDefault();
                var param = $(this).data('param');
                var url = $(this).data('url');
                var size = $(this).data('size');

                $.ajax({
                    url: url,
                    type: "get",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    contentType: "application/json; charset=utf-8",
                    dataType: "json",
                    data: {
                        "param": param,
                        "size": size,
                    },
                    success: function(data) {
                        $("#modal-popup").html(data['html']);
                        $("#modal-popup").modal('show');
                        // console.log('Hello');
                        // console.log(data);
                    }
                });
            });
        });
    </script>

</body>

</html>
