<?php

namespace App\Http\Livewire;
use App\Models\User;
use Livewire\Component;


class UserProfile extends Component
{
	public $userId;
    public $firstName;
    public $lastName;
    public $description;
    public $photo;
    public $email;

    public function mount(){
    	$this->userId = auth()->user()->id;
        $model = User::find($this->userId);
        $this->firstName = $model->firstName;
        $this->lastName = $model->lastName;
        $this->description = $model->description;
        $this->photo = $model->photo;
        $this->email = $model->email;
    }

    public function save()
    {
        $data = [];

        $data = array_merge($data, ['firstName' => $this->firstName]);
		$data = array_merge($data, ['lastName' => $this->lastName]);
		$data = array_merge($data, ['description' => $this->description]);
        $data = array_merge($data, ['photo' => $this->photo]);
        $data = array_merge($data, ['email' => $this->email]);
         
        if(count($data)) {
            User::find($this->userId)->update($data);
            return redirect()->to('/profile');
        }
    }

    public function render()
    {
        return view('livewire.user-profile');
    }
}
