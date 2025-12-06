<?php

namespace App\Http\Controllers;

use App\Models\Emergency;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class EmergencyController extends Controller
{
    public function create()
    {
    $uniqueId = "LRH-" . date('Ymd') . '-' . strtoupper(Str::random(5));

        return view('emergency.step1',[
            'uniqueId' => $uniqueId
        ]);

    }

public function store(Request $request)
{
    $data = $request->validate([
'name' => 'required|min:3|max:100',
        'email' => 'required|email',
        'phone' => 'required',
        'nationality' => 'nullable',
        'location' => 'required',
        'urgency' => 'required',
        'language' => 'required',
        'assistance_type' => 'required',
        'description' => 'required',
        'people_count' => 'nullable|integer|min:1',
    ], [
        'name.required' => 'Name is required.',
        'email.required' => 'Email is required.',
        'email.email' => 'Invalid email format.',
        'phone.required' => 'Phone number is required.',
        'location.required' => 'Location is required.',
        'urgency.required' => 'Please select the urgency level.',
        'language.required' => 'Language selection is required.',
        'assistance_type.required' => 'Please choose at least one assistance type.',
        'description.required' => 'Description is required.',
        'people_count.integer' => 'People count must be a number.',
        'people_count.min' => 'Minimum people count is 1.',
    ]);


    $data['unique_id'] = $request->input('unique_id');

    // Simpan data
    $emergency = Emergency::create($data);

    // Redirect ke step 2
    return redirect()
        ->route('emergency.step2', $emergency->id)
        ->with('success', 'Emergency request created successfully!');
}




// step 2

    public function showStep2($id)
    {
        $emergency = Emergency::findOrFail($id);

    // Jika sudah array, biarkan. Jika string JSON, baru decode.
    if (is_string($emergency->assistance_type)) {
        $emergency->assistance_type = json_decode($emergency->assistance_type, true);
    }
        return view('emergency.step2', compact('emergency'));
    }


    public function submitPayment(Request $request, $id)
{
$request->validate([
    'payment_proof' => 'required|file|mimes:jpg,jpeg,png,pdf|max:5120',
    'total_payment' => 'required|numeric'
], [
    'payment_proof.required' => 'Please upload your payment proof.',
    'payment_proof.file' => 'The uploaded file is not valid.',
    'payment_proof.mimes' => 'The payment proof must be a JPG, JPEG, PNG, or PDF file.',
    'payment_proof.max' => 'The maximum file size allowed is 5MB.',

    'total_payment.required' => 'Total payment is required.',
    'total_payment.numeric' => 'Total payment must be a numeric value.'
]);

   $emergency = Emergency::findOrFail($id);

     // Upload file
    $filePath = $request->file('payment_proof')->store('payment_proofs', 'public');

    $emergency->payment_proof = $filePath;
$emergency->total_payment = $request->total_payment;
$emergency->save();

return redirect()->route('emergency.step3', $id)
    ->with('success', 'Payment proof submitted successfully!');


}



// step 3
public function step3($id)
{
    $emergency = Emergency::findOrFail($id);
    return view('emergency.step3', compact('emergency'));
}

}
