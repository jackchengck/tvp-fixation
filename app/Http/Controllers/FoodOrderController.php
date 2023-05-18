<?php

    namespace App\Http\Controllers;

    use App\Http\Requests\StoreFoodOrderRequest;
    use App\Http\Requests\UpdateFoodOrderRequest;
    use App\Models\FoodOrder;

    class FoodOrderController extends Controller
    {
        /**
         * Display a listing of the resource.
         *
         * @return \Illuminate\Http\Response
         */
        public function index()
        {
            //
        }

        /**
         * Show the form for creating a new resource.
         *
         * @return \Illuminate\Http\Response
         */
        public function create()
        {
            //
        }

        /**
         * Store a newly created resource in storage.
         *
         * @param \App\Http\Requests\StoreFoodOrderRequest $request
         * @return \Illuminate\Http\Response
         */
        public function store(StoreFoodOrderRequest $request)
        {
            //
        }

        /**
         * Display the specified resource.
         *
         * @param \App\Models\FoodOrder $foodOrder
         * @return \Illuminate\Http\Response
         */
        public function show(FoodOrder $foodOrder)
        {
            //
        }

        /**
         * Show the form for editing the specified resource.
         *
         * @param \App\Models\FoodOrder $foodOrder
         * @return \Illuminate\Http\Response
         */
        public function edit(FoodOrder $foodOrder)
        {
            //
        }

        /**
         * Update the specified resource in storage.
         *
         * @param \App\Http\Requests\UpdateFoodOrderRequest $request
         * @param \App\Models\FoodOrder $foodOrder
         * @return \Illuminate\Http\Response
         */
        public function update(UpdateFoodOrderRequest $request, FoodOrder $foodOrder)
        {
            //
        }

        /**
         * Remove the specified resource from storage.
         *
         * @param \App\Models\FoodOrder $foodOrder
         * @return \Illuminate\Http\Response
         */
        public function destroy(FoodOrder $foodOrder)
        {
            //
        }

        public function setDelivered($id)
        {

            $foodOrder = FoodOrder::findOrFail($id);
            $foodOrder->status = 'delivered';
            $foodOrder->save();

            return "Food Order #" . $id . " is set to Delivered";
        }


        public function setPaid($id)
        {

            $foodOrder = FoodOrder::findOrFail($id);
            $foodOrder->status = 'paid';
            $foodOrder->save();

            return view(
                'admin.paid_set', [
                'foodOrder' => $foodOrder
            ]
            );
//            return "Food Order #" . $id . " is set to Paid";
        }
    }
