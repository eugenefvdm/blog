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
                        <div>
                            <div class="p-0">
                                <div class="flex items-center">
                                    <div class="text-xl pb-6 font-bold">Get in touch</div>
                                </div>
                                <div class="ml-0">
                                    <ul class="pt-4">
                                        <li class="pb-4"><a href="tel:+27823096710">+27 82 309-6710</a></li>
                                        <li class="pb-4">eugene (at) fintechsystems.net</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('layouts.seo')
</x-app-layout>
