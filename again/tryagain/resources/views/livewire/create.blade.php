<div>

    @if (session()->has('success'))
        <div class="alert alert-success" role="alert">
            {{ session()->get('success') }}
        </div>
    @endif

    <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input type="text" class="form-control" id="name" wire:model="name" placeholder="Enter your Name">
        @error('name')
            <span class="error text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div class="mb-3">
        <label for="surname" class="form-label">Surname</label>
        <input type="text" class="form-control" id="surname" wire:model="surname" placeholder="Enter your surname">
        @error('surname')
            <span class="error text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div class="mb-3">
        <label for="phone" class="form-label">Phone</label>
        <input type="text" class="form-control" id="phone" wire:model="phone" placeholder="Enter your Phone">
        @error('phone')
            <span class="error text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div class="d-grid gap-2">
        <button wire:click.prevent="store()" type="button" class="btn btn-success">Save</button>
    </div>
</div>
