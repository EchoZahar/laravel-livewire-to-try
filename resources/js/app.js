require('./bootstrap');

window.livewire.on('contactStore', () => { $('#createModal').modal('toggle') });
