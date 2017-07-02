<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\VATSIM\VATUSA;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransferController extends Controller
{
    private $vatusa;
    public function __construct(VATUSA $vatusa)
    {
        $this->vatusa = $vatusa;
        parent::__construct();
    }

    public function index()
    {
        return view('admin.transfers.index');
    }

    public function load()
    {
        $transfers = [];
        $vatusatransfers = $this->vatusa->getTransfers();
        if(isset($vatusatransfers->transfers)) {
            foreach($vatusatransfers->transfers as $transfer) {
                $transfers[] = [
                    'id' => $transfer->id,
                    'cid' => $transfer->cid,
                    'name' => $transfer->fname.' '.$transfer->lname,
                    'rating' => $transfer->rating_short,
                    'from_facility' => $transfer->from_facility,
                    'reason' => $transfer->reason
                ];
            }
        }
        return response()->json(['count' => count($transfers), 'transfers' => $transfers]);
    }

    public function accept(Request $request)
    {
        $id  = $request->get('transfer_id');
        $data = [
            'form_params' => [
                'action' => 'accept',
                'by' => Auth::id()
            ]
        ];
        $this->vatusa->processTransfer($id, $data);
    }

    public function reject(Request $request)
    {
        $id  = $request->get('transfer_id');
        $data = [
            'form_params' => [
                'action' => 'reject',
                'by' => Auth::id(),
                'reason' => $request->get('reason')
            ]
        ];
        $this->vatusa->processTransfer($id, $data);
    }
}