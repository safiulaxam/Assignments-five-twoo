<div>
    <div class="col-sm-12 col-xl-12">
        <div class="bg-light rounded h-100 p-4">

            @if(session()->has('success'))
                <div class="alert alert-success" role="alert">
                    {{session('success')}}
                </div>

            @endif
            <h6 class="mb-4">Data Rental</h6>
            <table class="table">
                <thead>
                <tr><th scope="col">No</th>
                    <th scope="col">Start Date</th>
                    <th scope="col">End Date</th>
                    <th scope="col">Total Cost</th>
                    
                </tr>
                </thead>
                <tbody>
                @forelse ($rental as $data)
                    <tr>
                        <th scope="row">{{$loop->iteration}}</th>
                        <td>{{$data->start_date}}</td>
                        <td>{{$data->end_date}}</td>
                        <td>{{$data->total_cost}}</td>
                    </tr>
                @empty
                
                <tr>
                    <td colspan="6">Car data not available yet</td>
                </tr>

                @endforelse 
                
                </tbody>
            </table>
            {{ $rental->links() }}


        </div>
    </div>
</div>

