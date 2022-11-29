
    <div>
        <section class="section">
            <div class="section-header">
                <h2 class="section-title">Access Management</h2>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="#">Access Management</a></div>
                    <div class="breadcrumb-item">Create New User</div>
                </div>
            </div>

            <div class="section-body">
                
                
                {{-- <h2 class="section-title">User Registry</h2>
            <p class="section-lead">Example of some Bootstrap table components.</p> --}}

                <div class="row">
                    <div class="col-12 col-md-12 col-lg-12">
                        
                        <div class="card">
                            <form wire:submit.prevent="saveUser">
                            <div class="card-header">
                                <h4>Create New User</h4>
                                <div class="ml-auto">
                                    <button type="submit" class="btn btn-success">Save</button>
                                </div>
                            </div>
                            
                            <div class="card-body p-3">
                                    <div class="form-row">
                                        <div class="form-group col-md-4">
                                            <label for="inputEmail4">Email</label>
                                            <input type="email" id="email" class="form-control" wire:model='email'  placeholder="Email Address">
                                            @error('email') <span class="error">{{ $message }}</span> @enderror
                                        </div>

                                        <div class="form-group ml-5 pl-5 col-md-4">
                                            <label for="inputPassword4">User Name</label>
                                            <input type="text" class="form-control" id="username"  wire:model='username' 
                                                placeholder="User Name">
                                                @error('username') <span class="error">{{ $message }}</span> @enderror
                                        </div>
                                      
                                        
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-4">
                                            <label for="inputEmail4">Password</label>
                                            <input type="password" class="form-control" wire:model='password' 
                                                placeholder="Password">
                                                @error('password') <span class="error">{{ $message }}</span> @enderror
                                        </div>
                                        <div class="form-group ml-5 pl-5  col-md-4">
                                            <label for="inputPassword4">Confirm Password</label>
                                            <input type="password" class="form-control" wire:model='confirm_password' 
                                                placeholder="Confirm Password">
                                                @error('confirm_password') <span class="error">{{ $message }}</span> @enderror
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-4">
                                            <label for="inputEmail4">Role</label>
                                            <select wire:model='role' class="form-control">
                                                <option value="" selected>Select...</option>
                                                @foreach ($roles as $role)
                                                <option value="{{$role->id}}">{{$role->name}}</option>
                                                @endforeach
                                            </select>
                                            @error('role') <span class="error">{{ $message }}</span> @enderror

                                        </div>
                                        
                                    </div>
                                   
                                    {{-- <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                        <label class="form-check-label" for="exampleCheck1">Check me out</label>
                                      </div> --}}
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
