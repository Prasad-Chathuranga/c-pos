
<div>
    
    <section class="section">
        <div class="section-header">
            <h2 class="section-title">Stock Management</h2>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="#">Stock Management</a></div>
                <div class="breadcrumb-item">Product Categories</div>
            </div>
        </div>

        <div class="section-body">
            {{-- <h2 class="section-title">category Registry</h2>
            <p class="section-lead">Example of some Bootstrap table components.</p> --}}

            <div class="row">
                <div class="col-12 col-md-12 col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Product Categories</h4>
                            <div class="ml-auto">
                            <a class="btn btn-primary" href="{{route('create_product_category')}}">New</a>
                            </div>
                        </div>
                        <div class="card-body p-3">
                            <div class="table-responsive">
                                <table class="table table-bordered table-md v_center">
                                <tr>
                                    <th>Action</th>
                                    <th>#</th>
                                    <th>Category Name</th>
                                    <th>Description</th>
                                    <th>Status</th>
                                    <th>Created At</th>
                                </tr>
                                @if($categories->count() > 0)
                                @foreach ($categories as $category)
                                <tr>
                                    <td>
                                        <a data-toggle="tooltip" data-placement="top" title="Edit Category" href="{{route('create_product_category', $category->id)}}" class="text-info"><i class="fa fa-pencil"></i></a>
                                        <a data-toggle="tooltip" data-placement="top" title="Delete Category" href="javascript:;" wire:click='delete({{$category->id}})' class="text-danger"><i class="fa fa-trash-can ml-2"></i></a>
                                    </td>
                                    <td>{{$category->id}}</td>
                                    <td>{{$category->name}}</td>
                                    <td>{{$category->description}}</td>
                                    <td>@if ($category->active)
                                        <div class="badge badge-success">Active</div> 
                                    @else
                                    <div class="badge badge-danger">Inactive</div> 

                                @endif</td>
                                    <td>{{$category->created_at->format('Y-m-d H:i:s a')}}</td>
                                </tr>
                                @endforeach
                                @else
                                <tr><td colspan="6" class="text-center">Empty</td></tr>
                                @endif
                              
                                </table>
                            </div>
                        </div> 
                       
                        {{-- @include('livewire.categories.create') --}}
                        <div class="card-footer ml-auto">
                            {{ $categories->links() }}
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

