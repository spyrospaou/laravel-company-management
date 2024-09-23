<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Str;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;

class CompanyController extends Controller
{
    use AuthorizesRequests, ValidatesRequests;
    
    public function index(): View
    {
        $companies = auth()->user()->companies;
        return view('companies.index', compact('companies'));
    }

    public function create(): View
    {
        return view('companies.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => 'required|max:255|min:3',
            'address' => 'required|max:255|min:3',
            'website' => 'required',
            'email' => 'required|email',
        ]);

        if (!Str::startsWith($validated['website'], ['http://', 'https://'])) {
            $validated['website'] = 'http://' . $validated['website'];
        }
        auth()->user()->companies()->create($validated);
        return redirect()->route('companies.index')->with('success', 'Company created successfully.');
    }

    public function show(Company $company): View
    {
        $this->authorize('view', $company);
        return view('companies.show', compact('company'));
    }

    public function edit(Company $company): View
    {
        $this->authorize('update', $company);
        return view('companies.edit', compact('company'));
    }

    public function update(Request $request, Company $company): RedirectResponse
    {
        $this->authorize('update', $company);

        $validated = $request->validate([
            'name' => 'required|max:255|min:3',
            'address' => 'required|max:255|min:3',
            'website' => 'required',
            'email' => 'required|email',
        ]);

        if (!Str::startsWith($validated['website'], ['http://', 'https://'])) {
        $validated['website'] = 'http://' . $validated['website'];
        }

        $company->update($validated);
        return redirect()->route('companies.index')->with('success', 'Company updated successfully.');
    }

    public function destroy(Company $company): RedirectResponse
    {
        $this->authorize('delete', $company);
        $company->delete();
        return redirect()->route('companies.index')->with('success', 'Company deleted successfully.');
    }
}