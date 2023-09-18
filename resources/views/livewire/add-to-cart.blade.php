<li>
@if(session('success'))
  <a><i class="fa fa-check"></i></a>
@else
<a wire:click="handle"><i class="fa fa-shopping-cart"></i></a>
    @endif
</li>
