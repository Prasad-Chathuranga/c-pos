<div>
             <!-- Modal -->
<div wire:ignore.self class="modal animate__animated animate__zoomIn" id="permissionModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Permissions</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      
        <div class="modal-body">
            <form wire:submit.prevent="createPermission">
            <div class="form-row">
                <div class="form-group col-md-10">
                    <label for="inputEmail4">Permission Name</label>
                    <input type="text" class="form-control form-control-sm" wire:model.defer='name' placeholder="Permission">
                    @error('name') <span class="error">{{ $message }}</span> @enderror
                </div>
                <div class="form-group mt-4 col-md-2">
                    <button type="submit" class="btn btn-primary">Add</button>
                </div>
            </div>
          
        </div>
        <div class="container">
        <table class="table-bordered table">
            <th>Name</th>
            <th class="text-center">Active</th>
            <th>Actions</th>
        <tbody>
        @if(isset($permissions) && $permissions->count() > 0)
        @foreach ($updated_permissions as $key=> $permission)
       
            <tr>
                <td><input type="text" id="permission_{{$permission->id}}" class="form-control" disabled wire:model='{{$permission[$key].name}}'  value="{{$permission->name}}"/></td>
                <td class="text-center">
                    <div class="form-check">
                        <input class="form-check-input" @if($permission->active)checked='checked'@endif wire:model='{{$permission[$key].active}}' type="checkbox" id="defaultCheck1">
                        <label class="form-check-label" for="defaultCheck1"></label>
                    </div>
                </td>
                <td> <a data-toggle="tooltip" data-placement="top" title="Edit Permission" id="editIcon" href="javascript:;" wire:click="enableThisPermission({{$permission->id}})" class="text-info"><i class="fa fa-pencil"></i></a>
                    <a data-toggle="tooltip" data-placement="top" title="Delete Permission" href="javascript:;" wire:click='delete({{$permission->id}})' class="text-danger"><i class="fa fa-trash-can ml-2"></i></a></td>
            </tr>
       
        @endforeach
        @endif
    </tbody>
        </table>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" wire:click='updatePermissions' class="btn btn-success">Save</button>
        </div>
    </form>
      </div>
    </div>
  </div>
    <section class="section">
        <div class="section-header">
            <h2 class="section-title">Access Management</h2>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{route('dashboard')}}">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="javascript:;">Access Management</a></div>
                <div class="breadcrumb-item">Permissions</div>
            </div>
        </div>

        <div class="section-body">
            {{-- <h2 class="section-title">User Registry</h2>
            <p class="section-lead">Example of some Bootstrap table components.</p> --}}

            <div class="row">
                <div class="col-12 col-md-12 col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Permissions</h4>
                            <div class="ml-auto">
                            <a class="btn btn-primary" href="{{route('create_role')}}">New</a>
                            </div>
                        </div>
                        <div class="card-body p-3">
                            <div class="row">
                            @if($modules->count() > 0)
                            @foreach ($modules as $module)
                            <div class="col-md-3 mt-2 ml-3 card shadow-sm border-primary">
                                <div class="card-body">
                                <a class="d-block text-center" href="javascript:;" style="text-decoration: none"
                                wire:click='getPermissionsForModule({{$module->id}})'>
                                    <span>{{$module->name}}</span>
                                </a>
                                </div>
                            </div>
                            @endforeach
                            @else
                                <span class="text-center font-weight-bold">Empty</span>
                            @endif
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

        window.addEventListener('openPermissionModal', event => {
      $("#permissionModal").modal('show');
  });

  window.addEventListener('enableTextField', event => {
    $('#permission_'+event.detail.id).prop("disabled", false);
    $('#editIcon').prop("disabled", true);

  });

//   window.addEventListener('closePermissionModal', event => {
//       $("#permissionModal").modal('hide');
//   })
         </script>
         
@endpush
</div>

