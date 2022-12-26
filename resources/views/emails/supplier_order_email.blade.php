<div>
    <div>
        Dear {{$supplierOrder->supplier->name}} of {{$supplierOrder->business->title}}:
    </div>
    <br>
    <div>
        This is an order from {{$supplierOrder->business->title}}
    </div>
    <br>
    @foreach($supplierOrder->supplierOrderItems as $item)
        <div>
            {{$item->product->title}} : {{$item->quantity}}
        </div>
        <br>
    @endforeach
    <br>
    <div>
        Thank you.
    </div>
</div>

<?php>

