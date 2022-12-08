
    <div>
        <section class="section">
            <div class="section-header">
                <h2 class="section-title">Billing Management</h2>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="#">Billing Management</a></div>
                    <div class="breadcrumb-item"><a href="{{route('invoices')}}">Invoices</a></div>
                    <div class="breadcrumb-item">Create New Invoice</div>
                </div>
            </div>

            <div class="section-body">
            
                
                {{-- <h2 class="section-title">User Registry</h2>
            <p class="section-lead">Example of some Bootstrap table components.</p> --}}

                <div class="row">
                    <div class="col-12 col-md-12 col-lg-12">
                        
                        <div class="card">
                            <form wire:submit.prevent="saveInvoice">
                            <div class="card-header">
                                <h4>Create New Invoice</h4>
                                
                                <div class="ml-auto">
                                    <button type="submit" class="btn btn-success">Save</button>
                                </div>
                            </div>
                            
                            <div class="card-body p-3">
                   
                                        <div class="form-group col-md-4">
                                            <label >Customer</label>
                                        
                                                <select wire:model='customer_id' class="form-control select2">
                                                   @foreach ($customers as $customer)
                                                       <option value="{{$customer->id}}" id="{{$customer->id}}">{{$customer->first_name}} {{$customer->last_name}}</option>
                                                   @endforeach
                                                </select>
                                            
                                            @error('name') <span class="error">{{ $message }}</span> @enderror
                                        </div>

                                        <div class="form-group col-md-4">
                                            <label for="inputPassword4">Description</label>
                                            <textarea type="text" rows="6" class="form-control" id="description" wire:model='description' 
                                                placeholder="Category Description"></textarea>
                                                @error('description') <span class="error">{{ $message }}</span> @enderror
                                        </div>
                                      
                                        
                               
                                    
                                    <div class="form-group col-md-4">
                                        <div class="form-check">
                                            <input class="form-check-input" wire:model='active'  value="1" type="checkbox" id="defaultCheck1">
                                            <label class="form-check-label" for="defaultCheck1">Active</label>
                                        </div>
                                        @error('active') <span class="error">{{ $message }}</span> @enderror
                                    </div>
                                    
                                </form>
                       
                       
                            

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

            </div>
        </section>
    </div>

@push('scripts')

<script>
    $(document).ready(function(){
        $(".select2").select2();
        $(".select2").on('change', function (e) {
            var customer_id = $(".select2").val();
            @this.set('customer_id', customer_id);
            window.livewire.emit('getCustomer');
        });
    })
</script>
    
@endpush

