<?php

namespace App\Http\Controllers\clients;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\clienrs\Tour;
use App\Models\clienrs\Booking;
use App\Models\clienrs\Account;
use App\Models\clienrs\CheckOut;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    private $tourDetail;
    private $booking;
    private $user;
    private $checkout;

    public function __construct()
    {
        $this->tourDetail = new Tour();
        $this->booking = new Booking();
        $this->user = new Account();
        $this->checkout = new CheckOut();
    }

    public function index($id)
    {
        if (!session()->has('email') ) {
            toastr()->error('Vui lòng đăng nhập trước khi đặt tour.');
            return redirect()->route('loginn');
        }

        $tour = $this->tourDetail->getTourDetail($id);
        // dd($tour);
        return view('client.checkout', compact('tour'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function booking(Request $request, $id)
    {
        if (!session()->has('email') ) {
            toastr()->error('Vui lòng đăng nhập trước khi đặt tour.');
            return redirect()->route('loginn');
        }

        // echo "office";die;
        $request->validate([
            'fullName' => 'required|max:255',
            'email' => 'required|email|max:255',
            'phoneNumber' => 'required|max:20',
            'address' => 'required|max:255',
            'numAdult' => 'required',
            'numChild' => 'nullable',
            'payment' => 'required',
            'total_price' => 'nullable',
        ], [
            'fullName.required' => 'Tên Không Được Để Trống',
            'email.required' => 'Email Không Được Để Trống',
            'email.email' => 'Email Không Đúng Format',
            'phoneNumber.required' => 'Số điện Thoại Không Được Để Trống',
            'phoneNumber.max' => 'Số điện Thoại Tối Đa 20 Ký Tự',
            'address.required' => 'Địa Chỉ Không Được Để Trống',
            'address.max' => 'Địa Chỉ Tối Đa 255 Ký Tự',
            'numAdult.required' => 'Số Người lớn Không Được Để Trống',
            'payment.required' => 'Phương Thức Thanh Toán Không Được Để Trống',
        ]);
        $email = session()->get('email');
        $user_id = $this->user->getUserId($email);
        $data_booking = [
            'tour_id' => $id,
            'user_id' => $user_id,
            'num_adult' => $request->numAdult,
            'num_child' => $request->numChild,
            'total_price' => $request->total_price,
            'fullName' => $request->fullName,
            'email' => $request->email,
            'address' => $request->address,
            'phoneNumber' => $request->phoneNumber,
        ];

        $bookingId =  $this->booking->createBooking($data_booking);
        $dataCheckout = [
            'booking_id' => $bookingId,
            'payment_method' => $request->payment,
            'amount' => $request->total_price,
            'payment_status' => 'n',
        ];
        // thanh toán vnpay
        if ($request->payment === "vnpay_payment") {
            return $this->vnpay_payment($dataCheckout);
        }

        // thanh toán momo
        if ($request->payment === "momo_payment") {
            return $this->momo_payment($dataCheckout);
        }

        // thanh toán tại văn phòng

        $checkout =  $this->checkout->createCheckOut($dataCheckout);

        if (empty($bookingId)) {
            toastr()->error('Có lỗi khi đặt tour');
            return redirect()->back();
        }
        // upadte số lượng tour
        $tour = $this->tourDetail->getTourDetail($id);
        $dataUpdate = [
            'quantity' => $tour->quantity - ($request->numAdult + $request->numChild)
        ];

        $updateQuantity = $this->tourDetail->updateTour($id, $dataUpdate);

        toastr()->success('Cập Nhập Thành Công');
        return redirect()->route('home');
    }


    // thanh toán vnpay
    public function vnpay_payment($data)
    {
        $vnp_TmnCode = config('services.vnpay.tmn_code');
        $vnp_HashSecret = config('services.vnpay.hash_secret');
        $vnp_Url = config('services.vnpay.url');
        $vnp_Returnurl = "http://127.0.0.1:8000/tour-booked/{$data['booking_id']}";
        $vnp_TxnRef = 'HL-' . time();
        $vnp_OrderInfo = "Thanh toán đặt tour";
        $vnp_Amount = (int)($data['amount'] * 100);
        $vnp_Locale = "vn";
        $vnp_BankCode = "NCB";
        $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];

        $inputData = array(
            "vnp_Version" => "2.1.0",
            "vnp_TmnCode" => $vnp_TmnCode,
            "vnp_Amount" => $vnp_Amount,
            "vnp_Command" => "pay",
            "vnp_CreateDate" => date('YmdHis'),
            "vnp_CurrCode" => "VND",
            "vnp_IpAddr" => $vnp_IpAddr,
            "vnp_Locale" => $vnp_Locale,
            "vnp_OrderInfo" => $vnp_OrderInfo,
            "vnp_ReturnUrl" => $vnp_Returnurl,
            "vnp_TxnRef" => $vnp_TxnRef,
            "vnp_OrderType" => "other", // Thêm nếu cần
        );

        ksort($inputData);

        $query = http_build_query($inputData);
        $hashdata = $query;

        $vnpSecureHash = hash_hmac('sha512', $hashdata, $vnp_HashSecret);
        $vnp_Url = $vnp_Url . "?" . $query . "&vnp_SecureHash=" . $vnpSecureHash;

        $dataVnpay = [
            'booking_id' => $data['booking_id'],
            'payment_method' => $data['payment_method'],
            'amount' => $data['amount'],
            'payment_status' => 'Y',
            'transaction_id' => $vnp_TxnRef,
        ];
        $checkout =  $this->checkout->createCheckOut($dataVnpay);

        return redirect($vnp_Url);
    }

    // phương thức helpper momo
    public function execPostRequest($url, $data)
    {
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt(
            $ch,
            CURLOPT_HTTPHEADER,
            array(
                'Content-Type: application/json',
                'Content-Length: ' . strlen($data)
            )
        );
        curl_setopt($ch, CURLOPT_TIMEOUT, 5);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
        //execute post
        $result = curl_exec($ch);
        //close connection
        curl_close($ch);
        return $result;
    }

    // thanh toán momo
    public function momo_payment($datamomo)
    {
        // dd($datamomo['amount']);
        $endpoint = "https://test-payment.momo.vn/v2/gateway/api/create";


        $partnerCode = "MOMOBKUN20180529";
        $accessKey = "klm05TvNBzhg7h7j";
        $secretKey = "at67qH6mk8w5Y1nAyMoYKMWACiEi2bsa";
        $orderInfo = "Thanh toán qua MoMo";
        $amount = $datamomo['amount'];
        $orderId = 'HL-' . time() . "";
        $redirectUrl = "http://127.0.0.1:8000/tour-booked/{$datamomo['booking_id']}";
        $ipnUrl = "http://127.0.0.1:8000/tour-booked/{$datamomo['booking_id']}";
        $extraData = "";
        $requestId = time() . "";
        $requestType = "payWithATM";
        //before sign HMAC SHA256 signature
        $rawHash = "accessKey=" . $accessKey . "&amount=" . $amount . "&extraData=" . $extraData . "&ipnUrl=" . $ipnUrl . "&orderId=" . $orderId . "&orderInfo=" . $orderInfo . "&partnerCode=" . $partnerCode . "&redirectUrl=" . $redirectUrl . "&requestId=" . $requestId . "&requestType=" . $requestType;
        $signature = hash_hmac("sha256", $rawHash, $secretKey);
        // dd($signature);
        $data = array(
            'partnerCode' => $partnerCode,
            'partnerName' => "Test",
            "storeId" => "MomoTestStore",
            'requestId' => $requestId,
            'amount' => $amount,
            'orderId' => $orderId,
            'orderInfo' => $orderInfo,
            'redirectUrl' => $redirectUrl,
            'ipnUrl' => $ipnUrl,
            'lang' => 'vi',
            'extraData' => $extraData,
            'requestType' => $requestType,
            'signature' => $signature
        );
        $result = $this->execPostRequest($endpoint, json_encode($data));
        // dd($result);
        $jsonResult = json_decode($result, true);  // decode json
        $dataMomo = [
            'booking_id' => $datamomo['booking_id'],
            'payment_method' => $datamomo['payment_method'],
            'amount' => $datamomo['amount'],
            'payment_status' => 'Y',
            'transaction_id' => $orderId,
        ];
        $checkout =  $this->checkout->createCheckOut($dataMomo);
        return redirect()->to($jsonResult['payUrl']);
    }







    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
