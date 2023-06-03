

    <div>
        <div class="col-md-12 mb-2">
            <div class="card">
                <div class="card-body">
                    <h4> <span style="color: red"> ສະບາຍດີຈ້າວ</span> </h4>

                    @if (session()->has('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session()->get('success') }}
                        </div>
                    @endif

                    @if (session()->has('error'))
                        <div class="alert alert-danger" role="alert">
                            {{ session()->get('error') }}
                        </div>
                    @endif


                    @if($updatePost)  
                        @include('livewire.update')
                    @else
                        @include('livewire.create')
                    @endif

                </div>
            </div>
        </div>
    </div>




