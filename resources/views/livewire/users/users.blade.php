
<div>
    
    <section class="section">
        <div class="section-header">
            <h2 class="section-title">Access Management</h2>
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
                            <div class="ml-auto">
                            <a class="btn btn-primary" href="{{route('create_user')}}">New</a>
                            </div>
                        </div>
                        <div class="card-body p-3">
                            <div class="table-responsive">
                                <table class="table table-bordered table-md v_center">
                                <tr>
                                    <th>Action</th>
                                    <th>#</th>
                                    <th>User Name</th>
                                    <th>Email Address</th>
                                    <th>Role</th>
                                    <th>Status</th>
                                    <th>Created At</th>
                                </tr>
                                @foreach ($users as $user)
                                <tr>
                                    <td>
                                        <a data-toggle="tooltip" data-placement="top" title="Edit User" href="{{route('create_user', $user->id)}}" class="text-info"><i class="fa fa-pencil"></i></a>
                                        <a data-toggle="tooltip" data-placement="top" title="Delete User" href="javascript:;" wire:click='delete({{$user->id}})' class="text-danger"><i class="fa fa-trash-can ml-2"></i></a>
                                    </td>
                                    <td>{{$user->id}}</td>
                                    <td>{{$user->username}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>{{$user->role->name}}</td>
                                    <td>@if ($user->active)
                                        <div class="badge badge-success">Active</div> 
                                    @else
                                    <div class="badge badge-danger">Inactive</div> 

                                @endif</td>
                                    <td>{{$user->created_at->format('Y-m-d H:i:s a')}}</td>
                                </tr>
                                @endforeach
                              
                                </table>
                            </div>
                        </div> {{ $users->links() }}
                        {{-- @include('livewire.users.create') --}}
                        <div class="card-footer text-right">
                           
                            {{-- <nav class="d-inline-block">
                                <ul class="pagination mb-0">
                                    <li class="page-item disabled"><a class="page-link" href="#" tabindex="-1"><i class="fas fa-chevron-left"></i></a></li>
                                    <li class="page-item active"><a class="page-link" href="#">1 <span class="sr-only">(current)</span></a></li>
                                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                                    <li class="page-item"><a class="page-link" href="#"><i class="fas fa-chevron-right"></i></a></li>
                                </ul>
                            </nav> --}}
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </section>
</div>

