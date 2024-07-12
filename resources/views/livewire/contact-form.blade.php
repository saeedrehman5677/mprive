<form wire:submit.prevent="submit" class="contact-form">
    @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif

    <div class="ip-group">
        <label for="fullname">Full Name:</label>
        <input type="text" wire:model="fullname" placeholder="Your Name" class="form-control">
        @error('fullname') <span class="error">{{ $message }}</span> @enderror
    </div>

    <div class="ip-group">
        <label for="phone">Phone Number:</label>
        <input type="text" wire:model="phone" placeholder="Phone number" class="form-control">
        @error('phone') <span class="error">{{ $message }}</span> @enderror
    </div>
  @if( $this->propertyId)
    <div class="d-flex flex-row">
        <div class="ip-group me-md-2 col-6">
            <label for="viewingDate">Viewing Date:</label>
            <input type="date" wire:model="viewingDate" class="form-control">
            @error('viewingDate') <span class="error">{{ $message }}</span> @enderror
        </div>

        <div class="ip-group col-6">
            <label for="viewingTime">Viewing Time:</label>
            <input type="time" wire:model="viewingTime" class="form-control">
            @error('viewingTime') <span class="error">{{ $message }}</span> @enderror
        </div>
    </div>
    @endif
    <div class="ip-group">
        <label for="email">Email Address:</label>
        <input type="text" wire:model="email" placeholder="Your Email Address" class="form-control">
        @error('email') <span class="error">{{ $message }}</span> @enderror
    </div>

    <div class="ip-group">
        <label for="message">Your Message:</label>
        <textarea wire:model="message" rows="4" placeholder="Message" aria-required="true" class="form-control"></textarea>
        @error('message') <span class="error">{{ $message }}</span> @enderror
    </div>
        <div class="ip-group">
        <button   type="submit" class="tf-btn primary w-100 mt-md-5 mt-2"  wire:loading.remove >Send Message</button>
        <div wire:loading>
            <div class="spinner-border" role="status"></div>
        </div>
        </div>
</form>
