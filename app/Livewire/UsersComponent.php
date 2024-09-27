<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Livewire\Features\SupportPagination\WithoutUrlPagination;
use Livewire\WithPagination;

class UsersComponent extends Component
{ use WithPagination,WithoutUrlPagination;

    protected $paginationTheme = 'bootstrap';
    public $addPage,$editPage=false;
    public $name,$email,$password,$role,$id;
    public function render()
    {   
        $data['user']=User::paginate(2);
        return view('livewire.users-component',$data);
    }
    public function create(){
        $this->reset();
        $this->addPage=true;
    }

    public function store(){
        $this->validate([
            'name'=>'required',
            'email'=>'required|email',
            'password'=>'required',
            'role'=>'required'
        ],[
            'name.required'=> 'Name Cannot Be Empty',
            'email.required'=> 'Email Cannot Be Empty',
            'email.email'=> 'Email Must Be Valid',
            'password.required'=> 'Password Cannot Be Empty',
            'role.required'=> 'Role Cannot Be Empty'
        ]);

        User::create([
            'name'=>$this->name,
            'email'=>$this->email,
            'password'=>Hash::make($this->password),
            'role'=>$this->role
        ]);
        session()->flash('success', 'User Created Successfully');
        $this->reset();
    }

    public function destroy($id){
        $user=User::find($id);
        $user->delete();
        session()->flash('success', 'User Deleted Successfully');
    }

    public function edit($id){
        $this->reset();
        $user=User::find($id);
        $this->name=$user->name;
        $this->email=$user->email;
        $this->role=$user->role;
        $this->id=$user->id;
        $this->editPage=true;
    }

    public function update(){
        $user=User::find($this->id);
       if($this->password==''){
        $user->update([
            'name'=>$this->name,
            'email'=>$this->email,
            'role'=>$this->role
        ]);
       }else{
        $user->update([
            'name'=>$this->name,
            'email'=>$this->email,
            'password'=>Hash::make($this->password),
            'role'=>$this->role
        ]);
       }
        
       
        session()->flash('success', 'User Updated Successfully');
        $this->reset();
    }
}
