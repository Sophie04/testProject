<?php

namespace App\Http\Livewire;
use App\Models\User;
use Livewire\Component;
use Livewire\WithFileUploads;
use Storage;
use File;

class UserProfile extends Component
{
    use WithFileUploads;
	public $userId;
    public $firstName;
    public $lastName;
    public $description;
    public $photo;
    public $email;
    public $oldPhoto;

    public function mount(){
    	$this->userId = auth()->user()->id;
        $model = User::find($this->userId);
        $this->firstName = $model->firstName;
        $this->lastName = $model->lastName;
        $this->description = $model->description;
        $this->photo = $model->photo;
        $this->email = $model->email;
        $this->oldPhoto = $model->photo;
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
            $filename = $this->photo->store('photos');
            $data = array_merge($data, ['photo' => $filename]);
            User::find($this->userId)->update($data);
            $file = storage_path('app/public/'.$filename);
            $destination = public_path('uploads/'.$filename);
            if(File::copy($file,$destination))
            {
                if($this->oldPhoto != "photos/user.jpg")
                {
                    File::delete(public_path('uploads/'.$this->oldPhoto));
                    File::delete(storage_path('app/public/'.$this->oldPhoto));
                }
            };
            
            return redirect()->to('/profile');
        }
    }

    public function render()
    {
        return view('livewire.user-profile');
    }
}
