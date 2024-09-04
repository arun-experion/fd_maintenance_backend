<?php

namespace App\Http\Controllers\Api;

use Auth;
use App\Note;
use Validator;
use App\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\BaseController;

class NoteController extends BaseController
{

    /**
     * @group Products
     * Notes
     * Add notes to product.
     * @bodyParam product Integer required Product ID ( Table : "products" )
     * @bodyParam description String required Note (description)
     * @bodyParam user_name String required User name
     *  
     */
    public function store(Request $request)
    {
        try {

            $validator = \Validator::make($request->all(), [
                "product" => "required|integer|exists:products,id",
                "description" => "required|string|min:2",
                // "cross_ref" => "required|string|min:1",
                // "crossref_buy_price" =>"required|numeric|min:0",
                // "grades" => "required|string|min:1",
                // "delivery_time" => "required",
                // "add_to_range"=>"required|string|in:Yes,No", 
                // "hold_stock"=>"required|string|in:Yes,No", 
                // "target_buy_price"=>"required|numeric|min:0",

            ]);

            if ($validator->fails()) {
                return $this->sendError('Invalid input', $validator->errors()->all(), 401);
            }

            $note_array = [
                'user_id' => Auth::id(),
                'product_id' => $request->product,
                'description' => $request->description,
                // 'cross_ref' => $request->cross_ref,
                // 'crossref_buy_price' => $request->crossref_buy_price,
                // 'grades' => $request->grades,
                // 'delivery_time' => $request->delivery_time,
                // 'add_to_range' => $request->add_to_range,
                // 'hold_stock' => $request->hold_stock,
                // 'target_buy_price' => $request->target_buy_price,
            ];

            $save_note = Note::create($note_array);
            
            if($save_note->id) {
                $note =  Note::with(['user'])->find($save_note->id);
                return $this->sendResponse($note, "Note saved.");
            } else {
                return $this->sendError("Note save Failed", [], 401);
            }
             
        } catch (\Exception $e) {

            return $this->sendError($e->getMessage(), [], 401);
        }
    }
}
