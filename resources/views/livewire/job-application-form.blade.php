<div>
    @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif

    <form wire:submit.prevent="submit" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" wire:model="name" class="form-control">
            @error('name') <span class="error">{{ $message }}</span> @enderror
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" wire:model="email" class="form-control">
            @error('email') <span class="error">{{ $message }}</span> @enderror
        </div>
        <div class="form-group">
            <label for="cv">CV</label>
            <input type="file" wire:model="cv" class="form-control">
            @error('cv') <span class="error">{{ $message }}</span> @enderror
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

</div>

