<?php

namespace App\Http\Livewire\Admin\Students;

use App\Models\Students;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
class ListStudents extends Component
{
    use WithFileUploads;
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $searchTerm = null;
    public $photo;
    public $gender = null;
    public $state = [];
    public $StudentBeingRemoved = null;
    public $updateStu = false;
    public function addNew()
    {
        $this->dispatchBrowserEvent('show-form');
    }

    public function createStudent()
    {
       $val =  Validator::make($this->state , [
            'firstName' => 'required',
            'lastName' => 'required',
            'middleName' => 'required',
            'gender' => 'required',
            'nationality' => 'required',
            'phone' => 'required',
            'birthday' => 'required',

        ])->validate();
        if($this->photo){
            $val['image'] = $this->photo->store('/' , 'img_uploads');

        }
        Students::create($val);
        $this->close();

        session()->flash('message','تمت الاضافة بنجاح');


    }

    public function studentRemoval($studentId)
    {
        $stu= Students::findOrFail($studentId);
        $stu->delete();
    }
    public function studentDelete()
    {
        $stu= Students::findOrFail($this->StudentBeingRemoved);
        dd($stu);
    }

    public function edit(Students $stuData){
        $this->updateStu = true;
        $this->stuData = $stuData;
        $this->state = $stuData->toArray();
    }


    public function close(){
        $this->updateStu = false;
        $this->state =[];
        $this->photo= null;

    }

    public function updateStudent()
    {
       $val =  Validator::make($this->state , [
            'firstName' => 'required',
            'lastName' => 'required',
            'middleName' => 'required',
            'gender' => 'required',
            'nationality' => 'required',
            'phone' => 'required',
            'birthday' => 'required',

       ],['middleName.required'=>'هذا الحقل مطلوب  !!'])->validate();

        $this->stuData->update($val);
        $this->close();
    }

    public function filterGender($gender = null)
    {
        $this->gender=$gender;
    }
    public function searchT()
    {
        return $this->searchTerm;
    }

    public function render()
    {

        // when($this->gender , function($query,$gender){
        //     return $query->where('gender' , $gender);
        // })->where('firstName','LIKE', $searchTerm)->orwhere('lastName','LIKE', $searchTerm)->orderBy('firstName','ASC')->

        // $searchTerm = trim('%'.$this->searchTerm.'%');
        if($this->searchTerm == null){
        $students = Students::latest()->when($this->gender , function($query,$gender){
            return $query->where('gender' , $gender);
              })->paginate(15);
              }
              else{
                $students = Students::latest()->where('gender',$this->gender)->where('firstName','LIKE', '%'.$this->searchTerm.'%')->orwhere('lastName','LIKE','%'.$this->searchTerm.'%')->orderBy('firstName','ASC')->paginate(15);
               }
        return view('livewire.admin.students.list-students',[
            'students' => $students
        ]);
    }
}
