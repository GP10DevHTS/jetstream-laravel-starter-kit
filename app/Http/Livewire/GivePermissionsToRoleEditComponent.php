<?php

namespace App\Http\Livewire;

use App\Models\Module;
use Livewire\Component;
use Spatie\Permission\Models\Role;

class GivePermissionsToRoleEditComponent extends Component
{
    public $roles;
    public $modules;

    public function mount()
    {
        $this->roles = Role::all();
        $this->modules = Module::all();
    }

    public function render()
    {
        return view('livewire.give-permissions-to-role-edit-component');
    }
}
