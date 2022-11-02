<x-app-layout>

    @section('title', 'Contact ' . config('app.name'))

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
                <div class="p-6">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        <div>
                            <div class="p-0">
                                <div class="flex items-center">

                                    <div class="text-xl pb-6 font-bold">Send a Message</div>
                                </div>
                                <div class="ml-0">
                                    @livewire('contact-us-form')
                                </div>
                            </div>
                        </div>
                        @if (App\Services\Settings::contactNumber() or App\Services\Settings::showContactEmail())
                            <div>
                                <div class="p-0">
                                    <div class="flex items-center">
                                        <div class="text-xl pb-6 font-bold">Get in touch</div>
                                    </div>
                                    <div class="ml-0">
                                        <ul class="pt-4">
                                            @if (App\Services\Settings::contactNumber())
                                                <li class="pb-4"><a
                                                        href="tel:{{ App\Services\Settings::contactNumber() }}">{{ App\Services\Settings::contactNumber() }}</a>
                                                </li>
                                            @endif
                                            @if (App\Services\Settings::showContactEmail())
                                                <li class="pb-4">{{ App\Services\Settings::contactEmailObfuscated() }}
                                                </li>
                                            @endif
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('layouts.seo')
</x-app-layout>
