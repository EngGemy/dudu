@extends('dashboard.layouts.app')
@section('style')
    <style>
        .dataTables_wrapper .dataTables_filter input {
            width: 250px ;
            margin-right:10px;
            height: 30px;
            margin-bottom: 12px;
        }
        .dataTables_wrapper .dataTables_paginate .paginate_button {
            border-radius: 50%;
        }
        .dataTables_wrapper .dataTables_paginate .paginate_button:hover{
            background:  #4839EB ;
            border-color:#4839EB ;
            color: whitesmoke !important;
        }
        .dataTables_wrapper .dataTables_paginate .paginate_button.current {
            border-radius: 50%;
        }
        .dataTables_wrapper .dataTables_paginate .paginate_button.current:hover{
            background:  #4839EB ;
            border-color:#4839EB ;
            color: whitesmoke !important;
        }
    </style>
@endsection
@section('content')
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-9 col-12 mb-2">
                    <div class="row breadcrumbs-top">

                    </div>
                </div>
                <div class="content-header-right text-md-right col-md-3 col-12 d-md-block d-none">
                    <div class="form-group breadcrum-right">
                        <div class="dropdown">
                            <a href="{{route('blogs.create')}}" class="btn btn-primary mb-2 waves-effect waves-light"><i class="feather icon-plus"></i>&nbsp; Add</a>

                        </div>
                    </div>
                </div>
            </div>


            <div class="content-body">

                <section id="basic-datatable">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Blogs</h4>
                                </div>
                                <div class="card-content">
                                    <div class="card-body card-dashboard">
                                        <div class="table-responsive">
                                            <table class="table zero-configuration">
                                                <thead>
                                                <tr>
                                                    <th data-breakpoints="lg">#</th>
                                                    <th>Title</th>
{{--                                                    <th>Description</th>--}}
                                                    <th>image</th>
                                                    <th>Translations</th>
                                                    <th>Blog Pragraph</th>

{{--                                                    <th>Sub Head</th>--}}
{{--                                                    <th>Gallery</th>--}}
                                                    <th>Comments</th>
                                                    <th class="text-right" width="15%">Options</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @php
                                                    $i = 1;
                                                @endphp
                                                @foreach($blogs as $blog)
                                                    <tr>
                                                        <td>{{ $i }}</td>
                                                        <td>{{ $blog->translate(app()->getLocale(), true)->title ?? '' }}</td>
{{--                                                        <td>{!! implode(' ', array_slice(str_word_count(get_lang($blog,'description'), 1), 0, 15)) !!}</td>--}}

                                                        <td><img style="width: 75px; height: 75px;" src="{{ $blog->image_url }}"></td>

                                                        <td>
                                                            @include('dashboard._partials.translation-badge', [
                                                                'translations' => $blog->translations,
                                                                'field' => 'title',
                                                            ])
                                                        </td>

                                                        <td><a class="btn btn-primary " href="{{route('blog.pragraph.create',$blog->id)}}" title="Edit">
                                                                Blog Pragraph
                                                            </a></td>

{{--                                                        <td><a class="btn btn-primary " href="{{route('blog.sub_head.create',$blog->id)}}" title="Edit">--}}
{{--                                                                Sub Head--}}
{{--                                                            </a></td>--}}

{{--                                                        <td><a class="btn btn-primary " href="{{route('gallary_blog.index',$blog->id)}}" title="Edit">--}}
{{--                                                                Gallery--}}
{{--                                                            </a></td>--}}

                                                        <td><a class="btn btn-primary " href="{{route('blog.comments.create',$blog->id)}}" title="Edit">
                                                                Comments
                                                            </a></td>


                                                        <td class="text-right">
                                                            <a class="btn btn-primary btn-icon btn-circle btn-sm" href="{{route('blogs.edit',$blog->id)}}" title="Edit">
                                                                <i class="fas fa-edit"></i>
                                                            </a>
                                                            <a class="btn btn-primary btn-icon btn-circle btn-sm" href="{{route('blogs.delete',$blog->id)}}" onclick="return confirm('Are you sure you want to delete?');" title="Delete">
                                                                <i class="fas fa-trash"></i>
                                                            </a>



                                                        </td>
                                                    </tr>
                                                    @php
                                                        $i++;
                                                    @endphp
                                                @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

            </div>
        </div>
    </div>

@endsection


@section('scripts')
    <script
        src="https://code.jquery.com/jquery-3.6.1.min.js"
        integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ="
        crossorigin="anonymous"></script>
    <script
        src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>

    <script>

        $(document).ready(function(){

            $("#myTable").dataTable({
                "bStateSave": true,
                "fnStateSave": function (oSettings, oData) {
                    localStorage.setItem('dataTable2', JSON.stringify(oData));
                },
                "fnStateLoad": function (oSettings) {
                    return JSON.parse(localStorage.getItem('dataTable2'));
                },
                @if(app()->getLocale()=='ar')
                language: {
                    paginate: {

                        "previous": "السابق",
                        "next": "التالي",

                    },
                    search: 'بحث',
                    info: "إظهار _START_ إلى _END_ من أصل _TOTAL_ مدخل",
                    lengthMenu: "أظهر _MENU_ مدخلات",
                    infoEmpty: "يعرض 0 إلى 0 من أصل 0 مُدخل",
                    loadingRecords: "جارٍ التحميل...",
                    zeroRecords: "لم يعثر على أية سجلات",
                    countFiltered: "عدد المفلتر",
                    emptyTable: "لا يوجد بيانات متاحة في الجدول",
                    infoFiltered: "(مرشحة من مجموع _MAX_ مُدخل)",


                },
                @endif

            });

        });
    </script>


@endsection
