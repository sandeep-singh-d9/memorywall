<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Model\Issue;
use App\Model\Order;
use Auth;
use DB;
use Illuminate\Http\Request;

class IssueController extends Controller
{
    public function sendIssue(Request $request)
    {
        try {
            $image = $request->file('myFile');
            $path = '';
            $name = '';
            $order = Order::whereId($request->get('order_id'))->first();
            if ($request->has('myFile') && $request->get('myFile') != null) {
                $name = time() . '.' . $image->getClientOriginalExtension();
                $path = '/uploads/issues/';
                $image->move(public_path($path), $name);
            }

            DB::beginTransaction();
            Issue::create([
                'user_id' => Auth::id(),
                'order_id' => $request->get('order_id'),
                'issue_no' => rand(),
                'order_no' => $order->order_no,
                'subject' => $request->get('subject'),
                'message' => $request->get('message'),
                'status' => 'Requested',
                'imagePath' => $path . $name,
            ]);
            DB::commit();
            $issue = Issue::where('order_id', $request->get('order_id'))->get();
            return response()->json([
                'message' => 'issue send successfully',
                'success' => true,
                'issue' => $issue,
            ]);

        } catch (\Throwable $th) {
            DB::rollBack();
            dd($th);
        }
    }
    public function getIssues($id)
    {
        try {
            $issue = Issue::where('order_id', $id)->get();
            return response()->json([
                'message' => 'get',
                'success' => true,
                'issue' => $issue,
            ]);

        } catch (\Throwable $th) {
            return response()->json([
                'message' => $th->getMessage(),
                'success' => false,
                'issue' => $issue,
            ]);

        }
    }
}
