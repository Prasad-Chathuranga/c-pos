@section('component')
<div>

    <section class="section">
        <div class="section-header">
            {{-- <h1>User Registry</h1> --}}
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="#">Access Management</a></div>
                <div class="breadcrumb-item">User Registry</div>
            </div>
        </div>

        <div class="section-body">
            {{-- <h2 class="section-title">User Registry</h2>
            <p class="section-lead">Example of some Bootstrap table components.</p> --}}

            <div class="row">
                <div class="col-12 col-md-12 col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>User Registry</h4>
                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table table-striped table-md v_center">
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Created At</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                                <tr>
                                    <td>1</td>
                                    <td>Marshall Nichols</td>
                                    <td>2017-01-09</td>
                                    <td><div class="badge badge-success">Active</div></td>
                                    <td><a href="#" class="btn btn-secondary">Detail</a></td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>Susie Willis</td>
                                    <td>2017-01-09</td>
                                    <td><div class="badge badge-success">Active</div></td>
                                    <td><a href="#" class="btn btn-secondary">Detail</a></td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>Kusnadi</td>
                                    <td>2017-01-11</td>
                                    <td><div class="badge badge-danger">Not Active</div></td>
                                    <td><a href="#" class="btn btn-secondary">Detail</a></td>
                                </tr>
                                <tr>
                                    <td>4</td>
                                    <td>Debra Stewart</td>
                                    <td>2017-01-11</td>
                                    <td><div class="badge badge-success">Active</div></td>
                                    <td><a href="#" class="btn btn-secondary">Detail</a></td>
                                </tr>
                                <tr>
                                    <td>5</td>
                                    <td>Isnap Kiswandi</td>
                                    <td>2017-01-17</td>
                                    <td><div class="badge badge-success">Active</div></td>
                                    <td><a href="#" class="btn btn-secondary">Detail</a></td>
                                </tr>
                                </table>
                            </div>
                        </div>
                        <div class="card-footer text-right">
                            <nav class="d-inline-block">
                                <ul class="pagination mb-0">
                                    <li class="page-item disabled"><a class="page-link" href="#" tabindex="-1"><i class="fas fa-chevron-left"></i></a></li>
                                    <li class="page-item active"><a class="page-link" href="#">1 <span class="sr-only">(current)</span></a></li>
                                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                                    <li class="page-item"><a class="page-link" href="#"><i class="fas fa-chevron-right"></i></a></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </section>

</div>
@endsection
