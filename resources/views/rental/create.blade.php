<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
<div class="col-sm-12 col-xl-12">
    <div class="bg-light rounded h-100 p-4">
        <h6 class="mb-4">Add Rental</h6>
        <form>
            <div class="mb-3">
                <label for="start_date	" class="form-label">Start Date</label>
                <input type="date" class="form-control" wire:model="start_date" id="start_date" value="{{old('start_date')}}">
                @error('start_date')
                    <div class="form-text text-danger">{{$message}}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="end_date" class="form-label">End Date</label>
                <input type="date" class="form-control" wire:model="end_date" id="end_date" value="{{old('end_date')}}">
                @error('end_date')
                    <div class="form-text text-danger">{{$message}}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="total_cost" class="form-label">Total Cost</label>
                <input type="text" class="form-control" wire:model="total_cost" id="total_cost" value="{{old('total_cost')}}">
                @error('total_cost	')
                    <div class="form-text text-danger">{{$message}}</div>
                @enderror
            </div>
            <div class="mb-3">
                Total:{{$total_cost}}
            </div>

            <button type="button"  wire:click="store" class="btn btn-primary">Save</button>
        </form>
    </div>
</div>
</div>
</div>
