<?php

namespace App\Http\Livewire\Users;

use App\Models\Contact;
use Livewire\Component;

class ContactsList extends Component
{
    public $contact, $value, $contact_id;

    public $isModalOpen = 0;

    public function render()
    {
        return view('livewire.users.contacts-list', [
            'contacts' => auth()->user()->contacts,
            'types' => Contact::$contactType,
            'trashedContact' => auth()->user()->contacts()->onlyTrashed()->get()
        ]);
    }

    public function openModalPopover()
    {
        $this->isModalOpen = true;
    }

    public function closeModalPopover()
    {
        $this->isModalOpen = false;
    }

    private function resetCreateForm(){
        $this->contact = '';
        $this->value = '';
    }

    public function create()
    {
        $this->resetCreateForm();
        $this->openModalPopover();
    }

    public function store()
    {
        $this->validate([
            'contact' => 'required',
            'value' => 'required',
        ]);

        $contact = Contact::create([
            'contact' => $this->contact,
            'value' => $this->value,
        ]);

        auth()->user()->contacts()->attach($contact);

        session()->flash('success', 'new contact created successfully.');
        $this->resetCreateForm();
//        $this->closeModalPopover();
        $this->emit('#createModal');
    }

    public function edit($id)
    {
        $contact = Contact::findOrFail($id);

        $this->contact_id = $id;
        $this->contact = $contact->contact;
        $this->value = $contact->value;

        $this->openModalPopover();
    }

    public function update($id)
    {
        $this->validate([
            'contact' => 'required',
            'value' => 'required',
        ]);

        $contact = Contact::find($id);
        $contact->update([
            'contact' => $this->contact,
            'value' => $this->value,
        ]);

        auth()->user()->contacts()->detach($contact);
        auth()->user()->contacts()->attach($contact);

        session()->flash('message', 'contact updated successfully.');

        $this->resetCreateForm();
        $this->closeModalPopover();
    }

    public function delete($id)
    {
        $contact = Contact::find($id);
//        auth()->user()->contacts()->detach($contact);
        $contact->delete();

        session()->flash('message', 'contact deleted.');
    }
}
