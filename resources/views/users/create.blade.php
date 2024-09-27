<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
<div class="col-sm-12 col-xl-12">
    <div class="bg-light rounded h-100 p-4">
        <h6 class="mb-4">Add User</h6>
        <form>
            <div class="mb-3">
                <label for="Name" class="form-label">Name</label>
                <input type="text" class="form-control" wire:model="name" id="name" value="{{old('name')}}">
                @error('name')
                    <div class="form-text text-danger">{{$message}}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="Email" class="form-label">Email </label>
                <input type="text" class="form-control" wire:model="email" id="email" value="{{old('email')}}">
                @error('email')
                    <div class="form-text text-danger">{{$message}}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control"  wire:model="password" id="password" value="{{old('password')}}">
                @error('password')
                    <div class="form-text text-danger">{{$message}}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="role" class ="form-lebel">Role</label>
                <select id="role" class="form-select" wire:model="role" >
                    <option value="">==choose==</option>
                    <option value="admin">admin</option>
                    <option value="customer">customer</option>
                </select>
                @error('role')
                    <div class="form-text text-danger">{{$message}}</div>
                @enderror
            </div>
            
            <button type="button"  wire:click="store" class="btn btn-primary">Save</button>
        </form>
    </div>
</div>
</div>
</div>