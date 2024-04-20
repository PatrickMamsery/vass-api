<?php

namespace App\Http\Livewire\Centre;

use App\Models\VetCenter;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class Centres extends Component
{
    use WithFileUploads, WithPagination;

    protected $paginationTheme = 'bootstrap';

    // form variables
    public $selected_id = 0;
    public $name;
    public $location;
    public $centre;
    public $action = 'Create';

    // rules
    protected $rules = [
        'name' => 'required'
    ];

    // messages
    protected $messages = [
        'name.required' => 'Name is required'
    ];

    // event listeners
    protected $listeners = [
        'deleteConfirmed' => 'delete',
        'closeModal' => 'closeModal',
    ];

    // create or update vetCenter Details
    public function createOrUpdate()
    {
        $this->validate();

        VetCenter::updateOrCreate(
            [
                'id' => $this->selected_id,
            ],
            [
                'name' => $this->name,
                'location' => $this->location
            ]
        );

        $this->resetForm();

        //close modal
        $this->dispatchBrowserEvent('closeModal');
    }

    // set form data
    public function setFormData($id)
    {
        $record = VetCenter::find($id);
        $this->name = $record->name;
        $this->location = $record->location;
        $this->action = 'Update';
        $this->selected_id = $id;
    }

    // reset form
    public function resetForm()
    {
        $this->reset([
            'name',
            'location'
        ]);
        $this->action = 'Create';
    }

    // delete vet centre
    public function delete()
    {
        VetCenter::destroy($this->selected_id);
    }

    public function render()
    {
        $centres = VetCenter::paginate(12);
        return view('livewire.centre.centres', compact('centres'));
    }
}
