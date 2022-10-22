<div class="mt-4">
    <form method="POST" action="{{ route('contact-confirmation') }}">
        @csrf

        <div>
            <label class="inline-block w-32 font-bold">Name<sup>*</sup></label>
            <x-jet-input class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus
                placeholder="Your name"
                autocomplete="address" />
        </div>

        <div class="mt-4">
            <label class="inline-block w-32 font-bold">Email<sup>*</sup></label>
            <x-jet-input class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                placeholder="Your email address"
                required />
        </div>

        <div class="mt-4">
            <label class="inline-block w-32 font-bold">Message<sup>*</sup></label>
            <textarea class="form-textarea mt-1 block w-full" name="message" rows="3"
                placeholder="Message"></textarea>
        </div>

        <div class="mt-4">
            <label class="inline-block w-32 font-bold">Contact Number</label>
            <x-jet-input class="block mt-1 w-full" type="text" name="contact_number"
            type="tel" name="contact_number"            
            />
        </div>
        
        <div class="flex items-center justify-end mt-4">
            <x-jet-button class="ml-4">
                {{ __('Send!') }}
            </x-jet-button>
        </div>
    </form>
</div>