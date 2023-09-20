{{--<li>--}}
{{--@if(session('success_cart'))--}}
{{--  <a><i class="fa fa-check"></i></a>--}}
{{--@else--}}
{{--<a wire:click="handle"><i class="fa fa-shopping-cart"></i></a>--}}
{{--    @endif--}}
{{--</li>--}}


<div>


<div class="product__details__quantity">
    <div class="quantity">
        <div class="pro-qty">
            <input type="number" wire:model="quantity">
        </div>
    </div>
</div>
        <button wire:click="handle" class="primary-btn">ADD TO CART</button>
</div>




