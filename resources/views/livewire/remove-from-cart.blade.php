<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="shoping__cart__table">
                <table>
                    <thead>
                    <tr>
                        <th class="shoping__product">Products</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($items as $item)
                        <tr>
                            <td class="shoping__cart__item">
                                <img  width="75" height="75"  src="{{asset('storage/' . $item->images[0]->filename)}}" alt="">
                                <h5>{{$item->name}}</h5>
                            </td>
                            <td class="shoping__cart__price">
                                {{$item->price}} RON
                            </td>
                            <td class="shoping__cart__quantity">
                                       <div>{{$cartItems[$item->id]['quantity']}}</div>
                            </td>
                            <td class="shoping__cart__item__close">
                                <i wire:click="removeItem({{$item->id}})" class="fa fa-close" style="font-size:24px;cursor:pointer;"></i>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6">
        </div>
        <div class="col-lg-6">
            <div class="shoping__checkout">
                <h5></h5>
                <ul>
                    <li>Total<span>{{$total}} RON</span></li>
                </ul>
                <a href="{{route('checkout')}}" class="primary-btn">PROCEED TO CHECKOUT</a>
            </div>
        </div>
    </div>
</div>
