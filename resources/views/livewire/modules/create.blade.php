
    <div>
        <section class="section">
            <div class="section-header">
                <h2 class="section-title">Access Management</h2>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{route('dashboard')}}">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="javascript:;">Access Management</a></div>
                    <div class="breadcrumb-item"><a href="{{route('modules')}}">Modules</a></div>
                    <div class="breadcrumb-item">Create New Module</div>
                </div>
            </div>

            <div class="section-body">
            
                
                {{-- <h2 class="section-title">User Registry</h2>
            <p class="section-lead">Example of some Bootstrap table components.</p> --}}

                <div class="row">
                    <div class="col-12 col-md-12 col-lg-12">
                        
                        <div class="card">
                            <form @if($module_id)wire:submit.prevent="updateModule"@else wire:submit.prevent="saveModule"@endif>
                            <div class="card-header">
                                <h4>{{$module_id ? 'Edit':'Create New'}} Module</h4>
                                
                                <div class="ml-auto">
                                    <button type="submit" class="btn btn-success">Save</button>
                                </div>
                            </div>
                            
                            <div class="card-body p-3">
                                    <div class="form-row">
                                        <div class="form-group col-md-4">
                                            <label for="inputEmail4">Name</label>
                                            <input type="text" id="email" class="form-control" wire:model='name'  placeholder="Module Name">
                                            @error('name') <span class="error">{{ $message }}</span> @enderror
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <div class="form-check">
                                            <input class="form-check-input" wire:model='active'  value="1" type="checkbox" id="defaultCheck1">
                                            <label class="form-check-label" for="defaultCheck1">Active</label>
                                        </div>
                                        @error('active') <span class="error">{{ $message }}</span> @enderror
                                    </div>
                                    
                                </form>
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
    </div>
{{-- @endsection --}}
