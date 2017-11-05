<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Laravel</title>

        <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}" >
    </head>
    <body>
        <nav class="navbar navbar-inverse navbar-fixed-top">
            <div class="container">
                <div class="navbar-header">
                    <a class="navbar-brand" href="#">Laravel-vue-api-test-task</a>
                </div>
            </div>
        </nav>

        <div class="container">
            <div class="col-xs-12">
                <div id="app">
                    <search-form></search-form>
                    <search-table></search-table>
                </div>
            </div>
        </div>

        <script src="{{ asset('/js/app.js') }}"></script>
    </body>
</html>
