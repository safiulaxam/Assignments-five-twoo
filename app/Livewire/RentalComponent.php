<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Car;
use App\Models\Rental;
use Livewire\WithPagination;
use Livewire\WithoutUrlPagination;

class RentalComponent extends Component
{
    use WithPagination, WithoutUrlPagination;

    public $addPage = false;
    public $start_date, $end_date, $total_cost, $user_id, $car_id;

    public function render()
    {   
        $data['cars'] = Car::paginate(5);
        return view('livewire.rental-component', $data);
    }

    public function create($id)
    {
        $this->user_id = auth()->user()->id;
        $this->car_id = $id;

        $this->addPage = true;
    }

    public function store()
    {
        $this->validate([
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'total_cost' => 'required|numeric',
        ], [
            'start_date.required' => 'Start date is required',
            'end_date.required' => 'End date is required',
            'total_cost.required' => 'Total cost is required',
            'total_cost.numeric' => 'Total cost must be a number',
        ]);

        // Check for overlapping rentals without considering 'status'
        $overlappingRentalExists = Rental::where('car_id', $this->car_id)
            ->where(function($query) {
                $query->whereBetween('start_date', [$this->start_date, $this->end_date])
                      ->orWhereBetween('end_date', [$this->start_date, $this->end_date]);
            })
            ->exists();

        if ($overlappingRentalExists) {
            session()->flash('error', 'The car has already been rented during this period.');
        } else {
            Rental::create([
                'user_id' => $this->user_id,
                'car_id' => $this->car_id,
                'start_date' => $this->start_date,
                'end_date' => $this->end_date,
                'total_cost' => $this->total_cost,
            ]);

            session()->flash('success', 'Car rental created successfully.');
        }

        $this->dispatch('view-rental');
        $this->reset();
    }
}
