<div> 
    <div class="col-sm-12 col-xl-12">
        <div class="bg-light rounded h-100 p-4">

            @if(session()->has('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
            @endif

            <h6 class="mb-4">Data Cars</h6>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Brand</th>
                        <th scope="col">Model</th>
                        <th scope="col">Year</th>
                        <th scope="col">Car Type</th>
                        <th scope="col">Daily Rent Price</th>
                        <th scope="col">Photo</th>
                        <th scope="col">Process</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($cars as $data)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $data->name }}</td>
                        <td>{{ $data->brand }}</td>
                        <td>{{ $data->model }}</td>
                        <td>{{ $data->year }}</td>
                        <td>{{ $data->car_type }}</td>
                        <td>{{ $data->daily_rent_price }}</td>
                        <td><img src="{{ asset('storage/cars/'.$data->image) }}" style="width: 100px" alt="{{ $data->brand }}"></td>
                        <td>
                            <button class="btn btn-info" wire:click="edit({{ $data->id }})">Edit</button>
                            <button class="btn btn-danger" wire:click="destroy({{ $data->id }})">Delete</button>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="9">Car data not available yet</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>

            {{ $cars->links() }}

            <button wire:click="create" class="btn btn-primary">Add</button>
        </div>
    </div>

    @if ($addPage)
        @include('cars.create')
    @endif

    @if ($editPage)
        @include('cars.edit')
    @endif
</div>
