<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Laravel Autocomplete Search Using Typeahead JS - w3alert.com</title>

    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">

    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.1/bootstrap3-typeahead.min.js">
    </script>

</head>



<body>

    <div class="container mt-5">
        <div class="row">
            <div class="col-12 text-center">
                <h2>Laravel Autocomplete Search Using Typeahead JS - w3alert.com</h2>
            </div>
            <div class="col-12 text-center">
                <div id="custom-search-input">
                    <div class="input-group">
                        <input id="search" name="search" type="text" class="form-control" placeholder="Search" />
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        var route = "{{ url('autocomplete1') }}";
        $('#search').typeahead({
            source: function (term, process) {
                return $.get(route, {
                    term: term
                }, function (data) {
                    return process(data);
                });
            }
        });

    </script>
</body>



</html>
