@props(['title' => '', 'footerLinks' => ''])

<x-base-layout :$title>
    
    @section('title', 'Car selling')
    <x-layouts.header />

    {{ $slot }}

</x-base-layout>



    
