<div>
    <div class="content-wrapper" style="min-height: 2080.32px; margin-left: 0%;">

        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Country Master</h1>
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
                                                        <th scope="col">First Name</th>
                                                        <th scope="col">Last Name</th>
                                                        <th scope="col">Email</th>
                                                        <th scope="col">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($partners as $partner)
                                                        <tr>
                                                            <th scope="row">{{ $loop->iteration }}</th>
                                                            <td>{{ $partner->first_name }}</td>
                                                            <td>{{ $partner->last_name }}</td>
                                                            <td>{{ $partner->email }}</td>
                                                            <td>
                                                                <button type="button" class="btn btn-info">View</button>
                                                                <button type="button" class="btn btn-success">Approve</button>
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
