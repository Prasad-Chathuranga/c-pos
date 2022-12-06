<div>
    <section class="section">
        <div class="section-header">
            <h2 class="section-title">Access Management</h2>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="javascript:;">Access Management</a></div>
                <div class="breadcrumb-item">Role Permissions</div>
            </div>
        </div>

        <div class="section-body">
            {{-- <h2 class="section-title">User Registry</h2>
            <p class="section-lead">Example of some Bootstrap table components.</p> --}}

            <div class="row">
                <div class="col-12 col-md-12 col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Role Permissions</h4>
                            <div class="ml-auto">
                                <a class="btn btn-light text-white" style="pointer-events: none" href="javscript:;">Save</a>
                            </div>
                        </div>
                        <div class="card-body p-3">
                            <div class="col-md-3">
                            <div class="form-group">
                                <label>Role</label>
                                <select wire:change='getRolePermissions' wire:model='role_id' class="form-control form-control-sm">
                                    <option value="" id="" selected disabled>Select Role...</option>
                                    @foreach ($roles as $role)
                                    <option id="{{$role->id}}" value="{{$role->id}}">{{$role->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            </div>
                           
                            @if(isset($modules))
                            <div class="row mt-2">
                                <div class='col-md-12'>
                                    <table ng-if="modules" class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th style="width:20%">Module</th>
                                                <th>Permissions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($modules as $module)
                                            {{-- @foreach ($role_permissions as $rp)
                                                {{$rp}}
                                            @endforeach --}}
                                            <tr>
                                                <td>
                                                    {{$module->name}}
                                                </td>
                                                <td>
                                                    <div class="row pt-2 pb-2">
                                                        @foreach ($module->activePermissions as $ap)

                                                            <div class="col-md-3">
                                                                <div class="custom-control custom-checkbox">
                                                                    <input type="checkbox" name="ap_{{$ap->id}}" wire:click='updateRolePermissions({{$ap}})' id="ap_{{$ap->id}}" @if($ap->activerm) checked='checked' @endif class="custom-control-input"/>
                                                                    <label class="custom-control-label" for="ap_{{$ap->id}}">{{$ap->name}}</label>
                                                                </div>
                                                            </div>
                                                        
                                                            
                                                            @endforeach
                                                    </div>
                                                </td>
                                            </tr>
                                            @endforeach

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            @endif
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
                $('#permission_' + event.detail.id).prop("disabled", false);
                $('#editIcon').prop("disabled", true);
            });

           
        </script>
    @endpush
</div>
