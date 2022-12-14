<div>
    <section class="section">
        <div class="section-header">
            <h2 class="section-title">Billing Management</h2>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="#">Billing Management</a></div>
                <div class="breadcrumb-item"><a href="{{ route('invoices') }}">Invoices</a></div>
                <div class="breadcrumb-item">Create New Invoice</div>
            </div>
        </div>

        <div x-data="init()" class="section-body">


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
                                <div x-cloak x-show='loading' :class="{'d-none' : !loading}">
                                    @include('components.loading')
                                </div>
                                {{-- <div  class="form-group col-md-4">
                                    <label>Customer</label>

                                    <select wire:model='customer_id' wire:change='getCustomer' id="customer"
                                        name="customer" class="form-control select2">
                                    </select>

                                    @error('name')
                                        <span class="error">{{ $message }}</span>
                                    @enderror
                                </div> --}}
                                <div class="row pl-3">

                                    <div class="form-group col-md-4">
                                        <label>Category</label>

                                       

                                        <select id="category"
                                            name="category" class="">
                                           @foreach ($categories as $category)
                                            <option id="{{$category->id}}" value="{{$category->id}}">{{$category->name}}</option>
                                        @endforeach 
                                        </select>

                                        @error('name')
                                            <span class="error">{{ $message }}</span>
                                        @enderror 
                                    </div>

                                    <div class="form-group col-md-4">
                                        <label>Product</label>
                                        <select 
                                            id="product" name="product" class="">
                                            @if(isset($products) && $products->count() > 0)
                                            @foreach ($products as $product)
                                                <option id="{{$product->id}}" value="{{$product->id}}">{{$product->name}} {{number_format($product->price,2)}}</option>
                                            @endforeach
                                            @endif
                                        </select>

                                        @error('name')
                                            <span class="error">{{ $message }}</span>
                                        @enderror
                                    </div>

                                </div>

                                <div class="col-md-8">
                                    <table class="table table-bordered table-inverse table-responsive">
                                        <thead class="thead-inverse">
                                            <tr>
                                                <th>Category</th>
                                                <th>Item</th>
                                                <th>Quantity</th>
                                                <th>Price</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                                @if(count($productsArray) > 0)
                                                    @foreach ($productsArray as $product)
                                                        <tr>
                                                            <td>{{$product}}</td>
                                                        </tr>
                                                    @endforeach     
                                                @endif
                                                
                                            </tbody>
                                    </table>
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
<script src="{{url('js/alpine/invoice/invoice.js')}}"></script>

    <script>
      $(function() {
        new SlimSelect({
        select: '#category',
        events: {
    afterChange: (newVal) => {
        console.log('{{ route("get-products", '+newVal[0].id+') }}');
        new SlimSelect({
        select: '#product',
        ajax: function (search, callback) {
           
                    // Check search value. If you dont like it callback(false) or callback('Message String')
                    if (search.length < 3) {
                        callback('Need 3 characters')
                        return
                    }

                    // Perform your own ajax request here
                    //fetch('https://jsonplaceholder.typicode.com/users')
                    fetch("{{ route('get-products') }}")
                    .then(function (response) {
                        console.log(response);
                        return response.json()
                    })
                    .then(function (json) {
                        let data = []
                        for (let i = 0; i < json.length; i++) {
                            console.log(json[i].Name)
                            data.push({text: json[i].Name})
                        }

                        // Upon successful fetch send data to callback function.
                        // Be sure to send data back in the proper format.
                        // Refer to the method setData for examples of proper format.
                        callback(data)
                    })
                    .catch(function(error) {
                        // If any erros happened send false back through the callback
                        callback(false)
                    })
                },
        events: {
    afterChange: (newVal) => {
    //   window.livewire.emit('getProducts',newVal[0].id);
    }
  }
})
    //   window.livewire.emit('getProducts',newVal[0].id);
    }
  }
})
        //     $("#customer").select2({
        //         ajax: {
        //             url: "{{ route('get-customer') }}",
        //             data: function(params) {
        //                 var query = {
        //                     search: params.term,
        //                 }

        //                 // Query parameters will be ?search=[term]&type=public
        //                 return query;
        //             },
        //             dataType: 'json',
        //         },
        //         minimumInputLength: 3,
        //         placeholder: "Search for a Customer...",


        //     }).on('change', function(event) {
        //         window.livewire.emit('getCustomerInfo', $(this).val());
        //     });

           
        //     //     $("#product").select2(
        //     //         {
        //     //     ajax: {
        //     //         ,
        //     //         data: function(params) {
        //     //             var query = {
        //     //                 search: params.term,
        //     //             }

        //     //             // Query parameters will be ?search=[term]&type=public
        //     //             return query;
        //     //         },
        //     //         dataType: 'json',
        //     //     },
        //     //     minimumInputLength: 3,
        //     //     placeholder: "Search for a Product...",


        //     // }).on('change', function(event) {
        //     //     window.livewire.emit('getProductInfo', $(this).val());
        //     // }
        //     // );

        //     window.initSelectCompanyDrop=()=>{

        //         $('#product').select2();

        //             // $('#product').select2({
        //             // placeholder: 'Select a Product',
        //             // allowClear: true});
        //     }

        //     // $('#product').select2({
        //     //         placeholder: 'Select a Company',
        //     //         allowClear: true});

        //     initSelectCompanyDrop();
        //     $('#category').on('change', function (e) {
        //         // console.log(e.target.value);
        //         livewire.emit('selectedCompanyItem', e.target.value)
        //     });

            
        //     window.livewire.on('select2',()=>{
        //         initSelectCompanyDrop();
        //     });
        

        // //     $("#category").select2({
        // //         ajax: {
        // //             url: "{{ route('get-category') }}",
        // //             data: function(params) {
        // //                 var query = {
        // //                     search: params.term
        // //                 }

        // //                 // Query parameters will be ?search=[term]&type=public
        // //                 return query;
        // //             },
        // //             dataType: 'json',
        // //         },
        // //         minimumInputLength: 3,
        // //         placeholder: "Search for a Category...",


        // //     }).on('change', function(event) {
                
               
        // //         window.livewire.emit('getProducts', $(this).val());
                

           
        })
    </script>

@endpush
