<?php

namespace App\Livewire;
use App\Models\Rental;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithoutUrlPagination;
use Livewire\Attributes\On;
class ViewRental extends Component
{
    use WithPagination,WithoutUrlPagination;
    #[On('view-transaction')]
    public function render()
    {

        $data['rental']=Rental::paginate(10);
        return view('livewire.view-rental',$data);
    }
}
