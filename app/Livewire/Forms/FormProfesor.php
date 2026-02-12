<?php

namespace App\Livewire\Forms;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Attributes\Validate;
use Livewire\Form;
use Illuminate\Validation\Rules;
use Symfony\Contracts\Service\Attribute\Required;

class FormProfesor extends Form
{
    #[Required]
    public $name;

    #[Required]
    public $email;

    #[Required]
    public $password;

    #[Required]
    public $dni; 

    #[Required]
    public $telefono;

    protected $rol;
    
    public function rules():array{
        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', Rules\Password::defaults()],
            'dni' => ['required', 'digits:8', 'string', 'unique:users,dni'],
            'telefono' => ['required', 'starts_with:9', 'digits:9', 'unique:users,telefono']
        ];
    }

    public function save(){
        $this->validate();
        $this->rol = 'profesor';
        $this->password = Hash::make($this->password);
        User::create($this->pull());        
    }

}
