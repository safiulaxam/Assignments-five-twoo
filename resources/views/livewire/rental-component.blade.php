<div>
    <div class="col-sm-12 col-xl-12">
        <div class="bg-light rounded h-100 p-4">

            @if(session()->has('success'))
            <div class="alert alert-success" role="alert">
                {{session('success')}}
            </div>
            @endif
                @if(session()->has('error'))
                    <div class="alert alert-danger" role="alert">
                        {{session('error')}}
                    </div>
                @endif
            <h6 class="mb-4">Cars Data</h6>
            @foreach ($cars as $data )
            <div class="card" style="width: 18rem;">
                <img src="{{asset('storage/cars/'.$data->image)}}"  style="height: 200px" class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title">{{ $data->brand}}</h5>

                </div>
                <ul class="list-group list-group-flush">
                  <li class="list-group-item">Car Type: {{ $data->car_type}}</li>
                  <li class="list-group-item">Daily Rent Price: {{ $data->daily_rent_price}}</li>
                 
                </ul>
                <div class="card-body">
                  <button wire:click="create({{$data->id}},{{$data->daily_rent_price}})" class="btn btn-outline-success card-link">Add</button>

                </div>
              </div>
            @endforeach
            {{ $cars->links() }}


        </div>
    </div>
    @if ($addPage)
                @include('rental.create')
            @endif


</div>
