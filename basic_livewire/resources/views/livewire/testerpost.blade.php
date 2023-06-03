<div>
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>

                            @if (count($posts) > 0)
                                @foreach ($posts as $rs)
                                    <tr>
                                        <td>
                                            {{ $rs->id }}
                                        </td>
                                        <td>
                                            {{ $rs->name }}
                                        </td>
                                        <td>
                                            {{ $rs->description }}
                                        </td>
                                        <td>

                                            <button wire:click="edit({{ $rs->id }})"
                                                class="btn btn-primary btn-sm">Edit</button>
                                            <button onclick="deletePost({{$rs->id}})" class="btn btn-danger btn-sm">Delete</button>
                                     
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="3" align="center">
                                        No post Found derjar!!!!!
                                    </td>
                                </tr>

                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script>
        function deletePost(id){
            if(confirm("Are you nea jai var ja lop"))
            window.livewire.emit('deletePost',id);
        }
    </script>

</div>