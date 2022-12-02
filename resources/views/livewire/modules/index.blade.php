<div>
    <section class="section">
        <div class="section-header">
            <h2 class="section-title">Access Management</h2>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{route('dashboard')}}">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="javascript:;">Access Management</a></div>
                <div class="breadcrumb-item">Modules</div>
            </div>
        </div>

        <div class="section-body">
            {{-- <h2 class="section-title">User Registry</h2>
            <p class="section-lead">Example of some Bootstrap table components.</p> --}}

            <div class="row">
                <div class="col-12 col-md-12 col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Modules</h4>
                            <div class="ml-auto">
                            <a class="btn btn-primary" href="{{route('create_module')}}">New</a>
                            </div>
                        </div>
                        <div class="card-body p-3">
                            <div class="table-responsive">
                                <table class="table table-bordered table-md v_center">
                                <tr>
                                    <th>Action</th>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Status</th>
                                    <th>Created At</th>
                                </tr>
                                @if($modules->count() > 0)
                                @foreach ($modules as $module)
                                <tr>
                                    <td>
                                        <a data-toggle="tooltip" data-placement="top" title="Edit Module" href="{{route('create_module', $module->id)}}" class="text-info"><i class="fa fa-pencil"></i></a>
                                        <a data-toggle="tooltip" data-placement="top" title="Delete Module" href="javascript:;" wire:click='delete({{$module->id}})' class="text-danger"><i class="fa fa-trash-can ml-2"></i></a>
                                    </td>
                                    <td>{{$module->id}}</td>
                                    <td>{{$module->name}}</td>
                                    <td>@if ($module->active)
                                        <div class="badge badge-success">Active</div> 
                                    @else
                                    <div class="badge badge-danger">Inactive</div> 

                                @endif</td>
                                    <td>{{$module->created_at->format('Y-m-d H:i:s a')}}</td>
                                </tr>
                                @endforeach
                                @else
                                <tr><td colspan="5" class="text-center">Empty</td></tr>
                                @endif
                              
                                </table>
                            </div>
                        </div> 
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
    @push('scripts')

    <script>
  
        window.addEventListener('swal:modal', event => { 
            swal({
              title: event.detail.message,
              text: event.detail.text,
              icon: event.detail.type,
            });
        });
          
        window.addEventListener('swal:confirm', event => { 
    
            swal({
              title: event.detail.message,
              text: event.detail.text,
              icon: event.detail.type,
              buttons: true,
              dangerMode: true,
            })
            .then((willDelete) => {
              if (willDelete) {
                window.livewire.emit('remove', event.detail.id);
              }
            });
        });
         </script>
         
@endpush
</div>

