<div>

    
                    @if($updatePost)  
                        @include('livewire.update')
                    @else
                        @include('livewire.create')
                    @endif


                    

    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                @if (session()->has('message'))
                    <div class="alert alert-success" role="alert">
                        {{ session()->get('message') }}
                    </div>
                @endif

                <div class="table-responsive">
                    <table class="table table-info table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Surnam</th>
                                <th>Phone</th>
                                <th>Acction</th>
                            </tr>
                        </thead>

                    </table>

                    <table class="table table-striped">
                        <tbody>

                            @foreach ($poststt as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->surname }}</td>
                                    <td>{{ $item->phone }}</td>
                                    <td>
                                        <button wire:click="edit({{$item->id}})" type="button" class="btn btn-warning btn-sm">Edit</button>
                                        <button wire:click="deleteData({{$item->id}})" type="button" class="btn btn-danger btn-sm">Delete</button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
