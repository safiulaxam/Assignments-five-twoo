<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
<div class="col-sm-12 col-xl-12">
    <div class="bg-light rounded h-100 p-4">
        <h6 class="mb-4">Add Car</h6>
        <form>
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" wire:model="name" id="name" value="{{old('name')}}">
                @error('name')
                    <div class="form-text text-danger">{{$message}}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="brand" class="form-label">Brand</label>
                <input type="text" class="form-control" wire:model="brand" id="brand" value="{{old('brand')}}">
                @error('brand')
                    <div class="form-text text-danger">{{$message}}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="model" class="form-label">Model</label>
                <input type="text" class="form-control" wire:model="model" id="model" value="{{old('model')}}">
                @error('model')
                    <div class="form-text text-danger">{{$message}}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="year" class="form-label">Year</label>
                <input type="text" class="form-control" wire:model="year" id="year" value="{{old('year')}}">
                @error('year')
                    <div class="form-text text-danger">{{$message}}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="car_type" class="form-label">Car Type</label>
                <select name="car_type" class="form-select" wire:model="car_type" id="car_type">
                    <option value="">==choose==</option>
                    <option value="sedan">Sedan</option>
                    <option value="mpv">MPV</option>
                    <option value="suv">SUV</option>

                </select>
                @error('car_type')
                    <div class="form-text text-danger">{{$message}}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="daily_rent_price" class="form-label">Daily Rent Price</label>
                <input type="text" class="form-control" wire:model="daily_rent_price" id="daily_rent_price" value="{{old('daily_rent_price')}}">
                @error('daily_rent_price')
                    <div class="form-text text-danger">{{$message}}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Photo</label>
                <input type="file" class="form-control" wire:model="image" id="image" value="{{old('image')}}">
                @error('image')
                    <div class="form-text text-danger">{{$message}}</div>
                @enderror
            </div>
            {{ $image }}
            <button type="button"  wire:click="store" class="btn btn-primary">Save</button>
        </form>
    </div>
</div>
</div>
</div>