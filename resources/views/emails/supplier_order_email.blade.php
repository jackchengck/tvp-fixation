<div>
    <div>
        Dear {{$supplierOrder->supplier->name}}:
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
    <div>
        Thank you.
    </div>
    <br>
    <div>
        Regards,
    </div>
    <div style="font-weight: bold">
        {{$supplierOrder->user->name}}
    </div>
    <div>
        {{$supplierOrder->business->title}}
    </div>
</div>

<?php>

