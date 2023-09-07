<?php

namespace App\Http\Livewire;

use App\Models\Module;
use Livewire\Component;
use Spatie\Permission\Models\Role;

class GivePermissionsToRoleComponent extends Component
{
    public $roles;
    public $modules;
    public $checkAll;
    public $SelectedPermissions;

    public function mount()
    {
        $this->roles = Role::all();
        $this->modules = Module::all();
    }

    public function UpdatedSelectedPermissions($value): void
    {
        if ($value) {
            $this->checkAll = 'checked';
        } else {
            $this->checkAll = '';
        }
    }
    public function render()
    {
        return view('livewire.give-permissions-to-role-component');
    }
}
