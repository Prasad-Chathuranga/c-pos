
<div>
    <section class="section">
        <div class="section-header">
            <h2 class="section-title">Dashboard</h2>
        </div>

        <div class="section-body">
            {{-- <h2 class="section-title">category Registry</h2>
            <p class="section-lead">Example of some Bootstrap table components.</p> --}}

            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-primary">
                            <i class="fa-2x text-white fa-solid fa-users"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Users</h4>
                            </div>
                            <div class="card-body">
                               {{$users}}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-danger">
                            <i class="fa-2x text-white fa-solid fa-cubes"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Categories</h4>
                            </div>
                            <div class="card-body">
                                {{$categories}}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-warning">
                            <i class="far fa-file"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Reports</h4>
                            </div>
                            <div class="card-body">
                                1,201
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-success">
                            <i class="fas fa-circle"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Online Users</h4>
                            </div>
                            <div class="card-body">
                                47
                            </div>
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

