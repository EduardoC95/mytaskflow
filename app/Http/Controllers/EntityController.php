<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\Entity;
use Illuminate\Http\Request;
use Inertia\Inertia;

class EntityController extends Controller
{
    public function clients()
    {
        return $this->index('client');
    }

    public function suppliers()
    {
        return $this->index('supplier');
    }

    public function index(?string $type = null)
    {
        $query = Entity::query()->with('country')->latest();

        if ($type === 'client') {
            $query->where('is_client', true);
        }

        if ($type === 'supplier') {
            $query->where('is_supplier', true);
        }

        return Inertia::render('Entities/Index', [
            'entities' => $query->paginate(10),
            'type' => $type,
        ]);
    }

    public function create(Request $request)
    {
        return Inertia::render('Entities/Create', [
            'countries' => Country::where('is_active', true)->orderBy('name')->get(),
            'type' => $request->query('type'),
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'is_client' => ['boolean'],
            'is_supplier' => ['boolean'],
            'nif' => ['required', 'string', 'max:20', 'unique:entities,nif'],
            'name' => ['required', 'string', 'max:255'],
            'address' => ['nullable', 'string', 'max:255'],
            'postal_code' => ['nullable', 'regex:/^\d{4}-\d{3}$/'],
            'city' => ['nullable', 'string', 'max:255'],
            'country_id' => ['nullable', 'exists:countries,id'],
            'phone' => ['nullable', 'string', 'max:50'],
            'mobile' => ['nullable', 'string', 'max:50'],
            'website' => ['nullable', 'string', 'max:255'],
            'email' => ['nullable', 'email', 'max:255'],
            'gdpr_consent' => ['boolean'],
            'notes' => ['nullable', 'string'],
            'is_active' => ['boolean'],
        ]);

        $validated['number'] = (Entity::max('number') ?? 0) + 1;

        Entity::create($validated);

        return redirect()->route('entities.index');
    }

    public function edit(Entity $entity)
    {
        return Inertia::render('Entities/Edit', [
            'entity' => $entity,
            'countries' => Country::where('is_active', true)->orderBy('name')->get(),
        ]);
    }

    public function update(Request $request, Entity $entity)
    {
        $validated = $request->validate([
            'is_client' => ['boolean'],
            'is_supplier' => ['boolean'],
            'nif' => ['required', 'string', 'max:20', 'unique:entities,nif,' . $entity->id],
            'name' => ['required', 'string', 'max:255'],
            'address' => ['nullable', 'string', 'max:255'],
            'postal_code' => ['nullable', 'regex:/^\d{4}-\d{3}$/'],
            'city' => ['nullable', 'string', 'max:255'],
            'country_id' => ['nullable', 'exists:countries,id'],
            'phone' => ['nullable', 'string', 'max:50'],
            'mobile' => ['nullable', 'string', 'max:50'],
            'website' => ['nullable', 'string', 'max:255'],
            'email' => ['nullable', 'email', 'max:255'],
            'gdpr_consent' => ['boolean'],
            'notes' => ['nullable', 'string'],
            'is_active' => ['boolean'],
        ]);

        $entity->update($validated);

        return redirect()->route('entities.index');
    }

    public function destroy(Entity $entity)
    {
        $entity->delete();

        return redirect()->route('entities.index');
    }
}
