<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Car;
use Livewire\WithFileUploads;
use Livewire\WithoutUrlPagination;
use Livewire\WithPagination;

class CarsComponent extends Component
{
    use WithPagination, WithoutUrlPagination, WithFileUploads;
    
    protected $paginationTheme = 'bootstrap';
    public $addPage = false, $editPage = false;
    public $name, $brand, $model, $year, $car_type, $daily_rent_price, $image, $carId;
    
    public function render()
    {
        $data['cars'] = Car::paginate(10);
        return view('livewire.cars-component', $data);
    }

    public function create()
    {
        $this->addPage = true;
    }

    public function store()
    {
        $this->validate([
            'name' => 'required',
            'brand' => 'required',
            'model' => 'required',
            'year' => 'required',
            'car_type' => 'required',
            'daily_rent_price' => 'required',
            'image' => 'required|image'
        ], [
            'name.required' => 'Name is required',
            'brand.required' => 'Brand is required',
            'model.required' => 'Model is required',
            'year.required' => 'Year is required',
            'car_type.required' => 'Car type is required',
            'daily_rent_price.required' => 'Daily Rent Price is required',
            'image.required' => 'Image is required',
            'image.image' => 'File must be an image'
        ]);

        $this->image->storeAs('public/cars', $this->image->hashName());
        
        Car::create([
            'name' => $this->name,
            'brand' => $this->brand,
            'model' => $this->model,
            'year' => $this->year,
            'car_type' => $this->car_type,
            'daily_rent_price' => $this->daily_rent_price,
            // 'photo' => $this->image->hashName()
            'image' => $this->image->hashName()
        ]);

        session()->flash('success', 'Car Data Created Successfully');
        $this->reset();
    }

    public function edit($id)
    {
        $this->editPage = true;
        $this->carId = $id;
        $car = Car::find($id);

        $this->name = $car->name;
        $this->brand = $car->brand;
        $this->model = $car->model;
        $this->year = $car->year;
        $this->car_type = $car->car_type;
        $this->daily_rent_price = $car->daily_rent_price;
    }

    public function update()
    {
        $car = Car::find($this->carId);

        if (empty($this->image)) {
            $car->update([
                'name' => $this->name,
                'brand' => $this->brand,
                'model' => $this->model,
                'year' => $this->year,
                'car_type' => $this->car_type,
                'daily_rent_price' => $this->daily_rent_price
            ]);
        } else {
            if (file_exists(public_path('storage/cars/' . $car->photo))) {
                unlink(public_path('storage/cars/' . $car->photo));
            }

            $this->image->storeAs('public/cars', $this->image->hashName());
            $car->update([
                'name' => $this->name,
                'brand' => $this->brand,
                'model' => $this->model,
                'year' => $this->year,
                'car_type' => $this->car_type,
                'daily_rent_price' => $this->daily_rent_price,
                // 'photo' => $this->image->hashName()
                'image' => $this->image->hashName()
            ]);
        }
        
        session()->flash('success', 'Car Data Updated Successfully');
        $this->reset();
    }

    public function destroy($id)
{
    $car = Car::find($id);

    // Check if the photo exists and the car has a valid photo file name
    if ($car && !empty($car->photo) && file_exists(public_path('storage/cars/' . $car->photo))) {

        // Check if it's a file and not a directory
        if (is_file(public_path('storage/cars/' . $car->photo))) {
            unlink(public_path('storage/cars/' . $car->photo));
        }
    }

    // Delete the car record from the database
    $car->delete();

    session()->flash('success', 'Car Data Deleted Successfully');
    $this->reset();
}

}
