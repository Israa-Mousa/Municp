<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Services;
use App\Models\Tenders;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class TendersController extends Controller
{
    public function index(): View
    {
        return view('dashboard.tenders.index', [
            'tenders' => Tenders::query()->latest()->paginate(10)->withQueryString(),
        ]);
    }

    public function create(): View
    {
        return view('dashboard.tenders.form', [
            'tender' => new Tenders(),
            'services' => Services::query()->orderBy('name')->get(),
            'statuses' => $this->statuses(),
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $request->validate($this->rules());
        $data['created_userID'] = $request->user()->id;
        Tenders::create($data);

        return redirect()->route('dashboard.tenders.index')->with('success', __('Tender created successfully.'));
    }

    public function show(Tenders $tender): View
    {
        return view('dashboard.tenders.show', compact('tender'));
    }

    public function edit(Tenders $tender): View
    {
        return view('dashboard.tenders.form', [
            'tender' => $tender,
            'services' => Services::query()->orderBy('name')->get(),
            'statuses' => $this->statuses(),
        ]);
    }

    public function update(Request $request, Tenders $tender): RedirectResponse
    {
        $tender->update($request->validate($this->rules($tender)));

        return redirect()->route('dashboard.tenders.index')->with('success', __('Tender updated successfully.'));
    }

    public function destroy(Tenders $tender): RedirectResponse
    {
        $tender->delete();

        return redirect()->route('dashboard.tenders.index')->with('success', __('Tender deleted successfully.'));
    }

    private function rules(?Tenders $tender = null): array
    {
        $numberRule = Rule::unique('tenders', 'number_tenders');
        if ($tender !== null) {
            $numberRule->ignore($tender->id);
        }

        return [
            'name' => ['required', 'string', 'max:255'],
            'name_ar' => ['required', 'string', 'max:255'],
            'name_buyer' => ['required', 'string', 'max:255'],
            'name_buyer_ar' => ['required', 'string', 'max:255'],
            'number_tenders' => ['required', 'string', 'max:255', $numberRule],
            'description' => ['required', 'string'],
            'description_ar' => ['required', 'string'],
            'status' => ['required', 'integer', Rule::in([0, 1, 2])],
            'signature' => ['required', 'string', 'max:255'],
            'parentID' => ['nullable', 'integer', 'exists:services,id'],
        ];
    }

    private function statuses(): array
    {
        return [
            0 => __('Pending'),
            1 => __('Open'),
            2 => __('Closed'),
        ];
    }
}
