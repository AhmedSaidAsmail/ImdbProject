@extends('Web.Layouts.Master')
@section('container')
    <div class="container">
        <div class="row">
            <div class="col-md-2">Logo</div>
            <div class="col-md-8 search-holder">
                <form method="get" action="{{route('web.search')}}">
                    <div class="form-group">
                        <input class="form-control" id="search" type="text" name="search" placeholder="Find Movies, TV Shows, Celebrities and more ...." autocomplete="off">
                    </div>
                </form>
                <div class="search-result">
                    {{-- Search Result --}}
                </div>
            </div>
        </div>
    </div>
@endsection
@section('javaScript')
    <script>
        $(function () {
            $("#search").keyup(function () {
                var searchResult = $('.search-result');
                var form = $(this).closest('form');
                var url = form.attr('action');
                var formData = form.serialize();
                $.ajax({
                    type: "get",
                    url: url,
                    async: false,
                    data: formData,
                    success: function (response) {
                        searchResult.show();
                        searchResult.html(response);
                    },
                    error: function(XMLHttpRequest, textStatus, errorThrown) {
                        searchResult.hide();
                    }
                });

            });
        });
    </script>
@endsection