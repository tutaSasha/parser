@extends('index')
@section('css')
    <!-- Sweet Alert -->
    <link href="{{ asset('/plugins/jquery-toastr/jquery.toast.min.css') }}" rel="stylesheet"/>
    <link href="{{ asset('/assets/css/main.css') }}" rel="stylesheet" />
@endsection
@section('content')
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="page-title-box">
                        <h4 class="page-title"></h4>
                        <ol class="breadcrumb p-0 m-0">
                            <li class="active">Result Parse</li>
                        </ol>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
            <!-- end row -->
            <div class="row">
                <div class="col-sm-12">
                    <div class="card-box table-responsive">
                        {{--<h4 class="m-t-0 header-title"><b>Result Parse</b></h4>--}}
                        <p class="text-muted font-14 m-b-30">
                            <button type="button" class="login-modal btn btn-default waves-effect waves-light">Start new parse</button>
                        </p>
                        <table id="datatable" class="table table-bordered toggle-circle">
                            <thead>
                            <tr>
                                <th title="Time" class="sorting_enabled">
                                    <span><input type="text" name="time" class="form-control search" placeholder="Time"></span>
                                    <div class="sorter-block sorting js-table-filter sorting_asc" data-ajax-val="data_parse_urls.time">
                                        <i class="fa fa-caret-up active" aria-hidden="true"></i>
                                        <i class="fa fa-caret-down " aria-hidden="true"></i>
                                    </div>
                                </th>
                                <th title="Count Img" class="sorting_enabled ">
                                    <span><input type="text" name="searchCountImg" class="form-control search" placeholder="Count Img"></span>
                                    <div class="sorter-block sorting js-table-filter " data-ajax-val="data_parse_urls.searchCountImg">
                                        <i class="fa fa-caret-up" aria-hidden="true"></i>
                                        <i class="fa fa-caret-down " aria-hidden="true"></i>
                                    </div>
                                </th>
                                <th title="Url" class="sorting_enabled"><span><input type="text" name="url" class="form-control search"
                                                                                       placeholder="Url"></span>
                                    <div class="sorter-block sorting js-table-filter " data-ajax-val="data_parse_urls.url">
                                        <i class="fa fa-caret-up" aria-hidden="true"></i>
                                        <i class="fa fa-caret-down " aria-hidden="true"></i>
                                    </div>
                                </th>
                            </tr>
                            </thead>

                            <tbody id="tbody"></tbody>
                        </table>
                        <div class="row">
                            <div class="col-sm-3">
                                <div class="dataTables_length" id="datatable-editable_length"><label>Показывать
                                        <select name="table_results" aria-controls="datatable-editable" class="form-control input-sm">
                                            <option value="10">10</option>
                                            <option value="25">25</option>
                                            <option value="50">50</option>
                                            <option value="100">100</option>
                                            <option value="500">500</option>
                                            <option value="1000">1000</option>
                                        </select>записей</label></div>
                            </div>
                            <div class="col-sm-9">
                                <div id="pagination" class="dataTables_paginate paging_simple_numbers"></div>
                            </div>
                            <div class="col-sm-12"><div class="dataTables_info" id="datatable-keytable_info" role="status" aria-live="polite"></div></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="login-modal" class="modal fade" role="dialog" aria-labelledby="custom-width-modalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>

                <div class="modal-body p-t-0">
                    <h4 class=" text-center m-b-30">
                        <a href="#" class="text-success">
                            <span id="span">Start Parse</span>
                        </a>
                    </h4>
                    <form class="form-horizontal" action="" method="post">
                        {{ csrf_field() }}
                        <div class="form-group m-b-25">
                            <div class="col-xs-12">
                                <label for="emailaddress1">Url*</label>
                                <input class="form-control" type="url" required aria-required="true" pattern="^(https?://)?([a-zA-Z0-9]([a-zA-ZäöüÄÖÜ0-9\-]{0,61}[a-zA-Z0-9])?\.)+[a-zA-Z]{2,6}$" name="url" placeholder="https://example.com">
                            </div>
                        </div>
                        <div class="form-group m-b-25">
                            <div class="col-xs-12">
                                <label for="emailaddress1">Max Depth</label>
                                <input class="form-control" type="text" name="depth" placeholder="Max Depth">
                            </div>
                        </div>


                        <div class="form-group m-b-25">
                            <div class="col-xs-12">
                                <label for="emailaddress1">Max Count Page</label>
                                <input class="form-control" type="text" name="MaxCountPage" placeholder="Max Count Page">
                            </div>
                        </div>

                        <div class="form-group account-btn text-center m-t-10 m-b-0">
                            <div class="col-xs-12">
                                <button class="add-btn .btn-sm btn btn-icon waves-effect waves-light   btn-custom waves-effect waves-light" type="submit">Add
                                </button>
                                <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                            </div>

                        </div>
                    </form>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div>
@endsection
@section('jQuery')
    <!-- jQuery  -->
    <script src="{{ asset('/assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('/assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('/assets/js/metisMenu.min.js') }}"></script>
    <script src="{{ asset('/assets/js/waves.js') }}"></script>
    <script src="{{ asset('/assets/js/jquery.slimscroll.js') }}"></script>


    <script src="{{ asset('/plugins/jquery-toastr/jquery.toast.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('/assets/pages/jquery.toastr.js') }}" type="text/javascript"></script>

    <script src="{{ asset('/assets/js/jquery.core.js') }}"></script>
    <script src="{{ asset('/assets/js/jquery.app.js') }}"></script>

    <script type="text/javascript">
        $(document).ready(function () {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            //сортировка
            $(document).on('click', '.js-table-filter', function () {
                if ($(this).hasClass('sorting')) {
                    console.log('sorting');
                    if ($(this).hasClass('sorting_asc')) {
                        $(this).removeClass('sorting_asc').addClass('sorting_desc');
                        $(this).find('.fa-caret-up').removeClass('active');
                        $(this).find('.fa-caret-down').addClass('active');
                    } else if ($(this).hasClass('sorting_desc')) {
                        $(this).removeClass('sorting_desc').addClass('sorting_asc');
                        $(this).find('.fa-caret-down').removeClass('active');
                        $(this).find('.fa-caret-up').addClass('active');
                    } else {
                        $('.sorting').removeClass('sorting_asc').removeClass('sorting_desc');
                        $('.sorting').find('.fa-caret-down').removeClass('active');
                        $('.sorting').find('.fa-caret-up').removeClass('active');
                        $(this).addClass('sorting_desc');
                        $(this).find('.fa-caret-down').addClass('active');
                    }
                    search();

                }
            });
            $(document).on('click', '.pagination li', function (event) {
                event.preventDefault();
                $(".pagination li").removeClass('active');
                $(".active-page").removeClass('active');
                $(".active-page").removeClass('active-page');
                $(this).addClass('active-page');
                $(this).addClass('active');
                search();

                //  console.log($(this).find('a').addClass('active-page'));
            });
            $(document).on('click', 'select[name=table_results]', function () {
                search();
            });
            function search() {
                if ($('.js-table-filter').hasClass('sorting_asc')) {
                    $('.js-table-filter').hasClass('sorting_asc')
                    var sorting = 'asc';
                    var table_sort = $('.js-table-filter.sorting_asc').attr('data-ajax-val');
                }
                if ($('.js-table-filter').hasClass('sorting_desc')) {
                    var sorting = 'desc';
                    var table_sort = $('.js-table-filter.sorting_desc').attr('data-ajax-val');
                }
                var status = $('.active-icon-check')
                var searchCountImg = $('input[name=searchCountImg]').val();
                var time = $('input[name=time]').val();
                var url = $('input[name=url]').val();

                var page = $('.active-page').find('a').attr('data-page');
                var table_results = $('select[name=table_results] option:selected').val();
                $.ajax({
                    async: true,
                    url: '{{ url('/result-data') }}',
                    type: 'GET',
                    data: {
                        "time": time,
                        "searchCountImg": searchCountImg,
                        "url": url,
                        "page": page,
                        "sorting": sorting,
                        "table_sort": table_sort,
                        "table_results": table_results,
                    },
                    success: function (res) {
                        // document.location.reload();
                    },
                    complete: function (res) {
                        if (res != undefined && res.responseJSON != undefined) {
                            var my_data = res.responseJSON.data;
                            var my_data_pagination = res.responseJSON;
                            var my_table = '';
                            var my_pagination = '';
                            var my_url = "{{url('/get-offer-products/')}}";
                            for (var i  in my_data) {
                                my_table += '<tr id="' + my_data[i]['id'] + '">';
                                my_table += '<td>'+ my_data[i]['time'] +'</td>';
                                my_table += '<td>' + my_data[i]['searchCountImg'] + '</td>';
                                my_table += '<td>' + my_data[i]['url'] + '</td>';
                            }
                            $('#tbody').html(my_table);
                            pagination(my_data_pagination.per_page, my_data_pagination.last_page, my_data_pagination.current_page);
                            $('#datatable-keytable_info').html('Показано с '+my_data_pagination.from+' по '+my_data_pagination.to+' из '+my_data_pagination.total+' записей');
                        }
                    },
                    error: function (request, status, error) {
                    }
                });
            }
            function pagination(per_page, last_page, current_page) {
                var previous, next, start, end;
                var next = last_page;
                var table_page = current_page;
                var lastPage = current_page;
                previous = current_page-1;
                if(previous==0){
                    previous = 1;
                }
                var next = current_page+1;
                if(next>last_page){
                    next = last_page;
                }
                var count_pages = last_page;
                var active = current_page;
                var count_show_pages = 8;
                var pg = '';
                if (last_page > 1) {
                    var left = active - 1;
                    var right = count_pages - active;
                    if (left < (count_show_pages / 2)) {
                        start = 1
                    } else {
                        start = active - (count_show_pages / 2);
                    }
                    end = start + count_show_pages - 1;
                    if (last_page < 8) {
                        end = last_page;
                    }
                    if (start < 1) start = 1;
                    var return_html = '';
                    return_html += '<ul class="pagination">';

                    if (active != 1) {
                        return_html += '<li class="footable-page-arrow "><a data-page="1" href="#first">«</a></li>';
                        return_html += '<li class="footable-page-arrow "><a data-page="' + previous + '" href="#prev">‹</a></li>';
                    }
                    if (last_page < 8) {
                        end = last_page;
                    }
                    for (var i = start; i <= end; i++) {
                        if (i == active) {
                            return_html += '<li class="active active-page"><a data-page="' + i + '" href="">' + i + '</a><li>';
                        } else {
                            if (i <= last_page) {
                                return_html += '<li><a data-page="' + i + '" href="">' + i + '</a><li>';
                            }else{
                            }
                        }
                    }
                    if (active != count_pages) {
                        return_html += '<li class="footable-page-arrow"><a data-page="' + next + '" href="#next">›</a></li>';
                        return_html += '<li class="footable-page-arrow"><a data-page="' + last_page + '" href="#last">»</a></li>';
                    }
                    return_html += '</ul>';
                    $('#pagination').html(return_html);
                } else {
                    $('#pagination').html('');
                }
            }
            //запуск
            search();

            $(document).on('click', '.login-modal', function (event) {
                event.preventDefault();
                $("#login-modal").modal();
                //$(".select2").select2();
            });
            $('.form-horizontal').on('submit', function (event) {
                event.preventDefault();
                var data = $(this).serialize();
                $('.form-horizontal')[0].reset();
                $.ajax({
                    url: '{{ url('/set-new-parse') }}',
                    type: 'POST',
                    data: data,
                    success: function (res) {
                        if (res!=undefined && res.success!=undefined  && res.success==true) {
                            $("#login-modal").modal('hide');
                            $.toast({
                                heading: 'Success',
                                text: 'New parser add',
                                position: 'top-right',
                                loaderBg: '#5ba035',
                                icon: 'success',
                                hideAfter: 2500,
                                stack: 1
                            });
                            search();
                        }else{
                            $.toast({
                                heading: 'Error',
                                text: 'Some proplem',
                                position: 'top-right',
                                loaderBg: '#5ba035',
                                icon: 'error',
                                hideAfter: 2500,
                                stack: 1
                            });
                        }
                        //   $("#login-modal").modal('hide');
                        // document.location.reload();
                    },
                    complete: function () {
                    },
                    error: function (request, status, error) {
                    }
                });
            });
        });
    </script>

@endsection


