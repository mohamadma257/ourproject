<?php

namespace App\Http\Livewire;

use App\Models\Students;
use Livewire\Component;

class ShowStudent extends Component
{

    public $lastName;
    public $firstName;
    public $middleName;
    public $gender;
    public $phone;
    public $nationality;
    public $birthday;
    public function mount($id){
        $this->retriveStudent($id);
    }

    public function retriveStudent($id)
    {

        $stu = Students::whereId($id)->first();
        $this->firstName = $stu->firstName;
        $this->lastName = $stu->lastName;
        $this->middleName = $stu->middleName;
        $this->gender = $stu->gender;
        $this->phone = $stu->phone;
        $this->nationality = $stu->nationality;
        $this->birthday = $stu->birthday;


    }
    public function render()
    {
        return view('livewire.show-student');
    }
}
