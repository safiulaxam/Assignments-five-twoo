<div>
    <div class="col-sm-12 col-xl-12">
        <div class="bg-light rounded h-100 p-4">

            @if(session()->has('success'))
            <div class="alert alert-success" role="alert">
                {{session('success')}}
            </div>
                
            @endif
            <h6 class="mb-4">Data Users</h6>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Role</th>
                        <th>
                            process
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($user as $data)
                    <tr>
                        <th scope="row">{{$loop->iteration}}</th>
                        <td>{{$data->name}}</td>
                        <td>{{$data->email}}e</td>
                        <td>{{$data->role}}</td>
                        <td>
                            <button class="btn btn-info" wire:click="edit({{$data->id}})">Edit</button>
                            <button class="btn btn-danger" 
                            wire:click="destroy({{$data->id}})">Delete</button>
                        </td>
                    </tr>
                    @endforeach    
                </tbody>
            </table>
            {{ $user->links() }}
            <button wire:click="create" class="btn btn-primary">Add</button>
            
        </div>
    </div>
    @if ($addPage == true)
                @include('users.create')
            @endif

            @if ($editPage == true)
            @include('users.edit')
        @endif
</div>
