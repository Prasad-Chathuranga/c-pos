
    <div>
        <section class="section">
            <div class="section-header">
                <h2 class="section-title">Stock Management</h2>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="#">Stock Management</a></div>
                    <div class="breadcrumb-item"><a href="{{route('product-categories')}}">Categories</a></div>
                    <div class="breadcrumb-item">Create New Category</div>
                </div>
            </div>

            <div class="section-body">
            
                
                {{-- <h2 class="section-title">User Registry</h2>
            <p class="section-lead">Example of some Bootstrap table components.</p> --}}

                <div class="row">
                    <div class="col-12 col-md-12 col-lg-12">
                        
                        <div class="card">
                            <form @if($category_id)wire:submit.prevent="updateCategory"@else wire:submit.prevent="saveCategory"@endif>
                            <div class="card-header">
                                <h4>{{$category_id ? 'Edit':'Create New'}} Category</h4>
                                
                                <div class="ml-auto">
                                    <button type="submit" class="btn btn-success">Save</button>
                                </div>
                            </div>
                            
                            <div class="card-body p-3">
                                    {{-- <div class="form-row"> --}}
                                        <div class="form-group col-md-4">
                                            <label for="inputEmail4">Category Name</label>
                                            <input type="text" id="name" class="form-control" wire:model='name'  placeholder="Category Name">
                                            @error('name') <span class="error">{{ $message }}</span> @enderror
                                        </div>

                                        <div class="form-group col-md-4">
                                            <label for="inputPassword4">Description</label>
                                            <textarea type="text" rows="6" class="form-control" id="description" wire:model='description' 
                                                placeholder="Category Description"></textarea>
                                                @error('description') <span class="error">{{ $message }}</span> @enderror
                                        </div>
                                      
                                        
                                    {{-- </div> --}}
                                    
                                    <div class="form-group col-md-4">
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
