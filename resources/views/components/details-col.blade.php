@php
    /**
     * @var string $titulo
     * @var string $data
     * @var boolean $small
     */
    
@endphp
<div class="flex flex-col gap-3">
    <p class=" {{$small ? 'text-3xl' : 'text-4xl'}} text-cortvRojoBasico">
        {{ $titulo }}
    </p>
    <p class="ml-4 text-2xl text-gray-600">
        {{ $data}}
    </p>
    
</div>