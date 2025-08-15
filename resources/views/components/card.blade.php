{{-- @props(['color', 'bgColor' => 'white']) --}}

<div {{ $attributes->class("card card-text-$color card-bg-$bgColor") }}>
    {{ $color }}
    <div {{ $title->attributes->class('card-header') }}>Card</div>
    @if($slot->isEmpty())
        <p>Please provide content</p>
    @else
        {{ $slot }}
    @endif
   <div class="card-footer"> {{ $footer }} </div>
</div>