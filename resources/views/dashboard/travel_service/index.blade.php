@extends('dashboard.layouts.app')
@section('style')
    <style>
        .dataTables_wrapper .dataTables_filter input {
            width: 250px;
            margin-right: 10px;
            height: 30px;
            margin-bottom: 12px;
        }
        .dataTables_wrapper .dataTables_paginate .paginate_button { border-radius: 50%; }
        .dataTables_wrapper .dataTables_paginate .paginate_button:hover {
            background: #4839EB; border-color: #4839EB; color: whitesmoke !important;
        }
        .dataTables_wrapper .dataTables_paginate .paginate_button.current { border-radius: 50%; }
        .dataTables_wrapper .dataTables_paginate .paginate_button.current:hover {
            background: #4839EB; border-color: #4839EB; color: whitesmoke !important;
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
                    <div class="row breadcrumbs-top"></div>
                </div>
                <div class="content-header-right text-md-right col-md-3 col-12 d-md-block d-none">
                    <div class="form-group breadcrum-right">
                        <div class="dropdown">
                            <a href="{{ route('travel_service.create') }}"
                               class="btn btn-primary mb-2 waves-effect waves-light">
                                <i class="feather icon-plus"></i>&nbsp; Add Or Update
                            </a>
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
                                    <h4 class="card-title">Travel Service</h4>
                                </div>
                                <div class="card-content">
                                    <div class="card-body card-dashboard">
                                        <div class="table-responsive">
                                            <table class="table zero-configuration">
                                                <thead>
                                                    <tr>
                                                        <th data-breakpoints="lg">#</th>
                                                        <th>Status</th>
                                                        <th>Title</th>
                                                        <th>Locales</th>
                                                        <th>Main Image</th>
                                                        <th>Icon</th>
                                                        <th class="text-right" width="15%">Options</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @php $i = 1; @endphp
                                                    @foreach($travel_services as $travel_service)
                                                        <tr>
                                                            <td>{{ $i }}</td>
                                                            <td>
                                                                @if($travel_service->status == 0) Accommodation
                                                                @elseif($travel_service->status == 1) Transportation
                                                                @elseif($travel_service->status == 2) Flight Reservation
                                                                @elseif($travel_service->status == 3) Visa Formalities
                                                                @elseif($travel_service->status == 4) Tour Guidance
                                                                @else Unknown
                                                                @endif
                                                            </td>
                                                            <td>{{ $travel_service->translate(app()->getLocale(), true)->title ?? '—' }}</td>
                                                            <td>
                                                                @include('dashboard._partials.translation-badge', [
                                                                    'translations' => $travel_service->translations,
                                                                    'field'        => 'title',
                                                                ])
                                                            </td>
                                                            <td><img style="width: 75px; height: 75px;" src="{{ $travel_service->image_url }}"></td>
                                                            <td><img style="width: 75px; height: 75px;" src="{{ $travel_service->icon_url }}"></td>
                                                            <td class="text-right">
                                                                <a class="btn btn-primary btn-icon btn-circle btn-sm"
                                                                   href="{{ route('travel_service.edit', $travel_service->id) }}" title="Edit">
                                                                    <i class="fas fa-edit"></i>
                                                                </a>
                                                                <a class="btn btn-primary btn-icon btn-circle btn-sm"
                                                                   href="{{ route('travel_service.delete', $travel_service->id) }}"
                                                                   onclick="return confirm('Are you sure you want to delete?');" title="Delete">
                                                                    <i class="fas fa-trash"></i>
                                                                </a>
                                                            </td>
                                                        </tr>
                                                        @php $i++; @endphp
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
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"
            integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ="
            crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function () {
            $(".zero-configuration").dataTable({
                "bStateSave": true,
                "fnStateSave": function (oSettings, oData) {
                    localStorage.setItem('dataTable_travel_services', JSON.stringify(oData));
                },
                "fnStateLoad": function (oSettings) {
                    return JSON.parse(localStorage.getItem('dataTable_travel_services'));
                },
            });
        });
    </script>
@endsection
