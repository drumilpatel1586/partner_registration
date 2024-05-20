<div>
    <div class="content-wrapper" style="min-height: 2080.32px; margin-left: 0%;">

        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1></h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('NSHhome') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Country Master</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">

                            <div class="card-body">
                                <div id="example2_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                    <div class="row">
                                        <div class="col-sm-12 col-md-6"></div>
                                        <div class="col-sm-12 col-md-6"></div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-12">

                                            <div class="row mb-3">
                                                <div class="col-md-11">
                                                    <input type="text" class="form-control" id="searchInput"
                                                        placeholder="Search...">
                                                </div>
                                                <div class="col-md-1">
                                                    <button class="btn btn-primary" id="searchButton">Search</button>
                                                </div>
                                            </div>

                                            <table class="table table-striped table-hover text-center">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">No.</th>
                                                        <th scope="col">Country</th>
                                                        <th scope="col">Short Name</th>
                                                        <th scope="col">Phone Code</th>
                                                        <th scope="col">Active Status</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($countries as $country)
                                                        <tr>
                                                            <th scope="row">{{ $loop->iteration }}</th>
                                                            <td class="country">{{ $country->name }}</td>
                                                            <td>{{ $country->shortname }}</td>
                                                            <td>{{ $country->phonecode }}</td>
                                                            <td style="cursor: pointer;">
                                                                <a href="country/{{ $country->id }}">
                                                                    @if ($country->is_active)
                                                                        <!-- Green tick -->
                                                                        <i class="fa fa-check-circle text-success"></i>
                                                                    @else
                                                                        <!-- Red cross -->
                                                                        <i class="fa fa-times-circle text-danger"></i>
                                                                    @endif
                                                                </a>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>

                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </section>

    </div>
</div>
