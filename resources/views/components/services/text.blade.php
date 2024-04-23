@props(['title' => ''])

<div class="page-services__text-block">
    <h2 class="page-services__text-block-title">{{ $title }}</h2>
    <p class="page-services__text-block-text" >{{$slot}}</p>
</div>
