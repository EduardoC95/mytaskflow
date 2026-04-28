<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\Entity;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;
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
        $query = Entity::query()
            ->with('country')
            ->latest();

        if ($type === 'client') {
            $query->where('is_client', true);
        }

        if ($type === 'supplier') {
            $query->where('is_supplier', true);
        }

        return Inertia::render('Entities/Index', [
            'entities' => $query->paginate(10)->withQueryString(),
            'type' => $type,
        ]);
    }

    public function create(Request $request)
    {
        return Inertia::render('Entities/Create', [
            'countries' => Country::where('is_active', true)
                ->orderBy('name')
                ->get(),
            'type' => $request->query('type'),
        ]);
    }

    public function store(Request $request)
    {
        $validated = $this->validateEntity($request);

        $validated['number'] = (Entity::max('number') ?? 0) + 1;

        Entity::create($validated);

        return $this->redirectAfterSave($validated)
            ->with('success', 'Entidade criada com sucesso.');
    }

    public function edit(Entity $entity)
    {
        return Inertia::render('Entities/Edit', [
            'entity' => $entity,
            'countries' => Country::where('is_active', true)
                ->orderBy('name')
                ->get(),
        ]);
    }

    public function update(Request $request, Entity $entity)
    {
        $validated = $this->validateEntity($request, $entity);

        $entity->update($validated);

        return $this->redirectAfterSave($validated)
            ->with('success', 'Entidade atualizada com sucesso.');
    }

    public function destroy(Entity $entity)
    {
        $isClient = $entity->is_client;
        $isSupplier = $entity->is_supplier;

        $entity->delete();

        if ($isClient && ! $isSupplier) {
            return redirect()
                ->route('clients.index')
                ->with('success', 'Cliente removido com sucesso.');
        }

        if ($isSupplier && ! $isClient) {
            return redirect()
                ->route('suppliers.index')
                ->with('success', 'Fornecedor removido com sucesso.');
        }

        return redirect()
            ->route('entities.index')
            ->with('success', 'Entidade removida com sucesso.');
    }

    private function validateEntity(Request $request, ?Entity $entity = null): array
    {
        $validated = $request->validate([
            'is_client' => ['nullable', 'boolean'],
            'is_supplier' => ['nullable', 'boolean'],

            'nif' => [
                'required',
                'string',
                'max:20',
                Rule::unique('entities', 'nif')->ignore($entity?->id),
            ],

            'name' => ['required', 'string', 'max:255'],
            'address' => ['nullable', 'string', 'max:255'],
            'postal_code' => ['nullable', 'regex:/^\d{4}-\d{3}$/'],
            'city' => ['nullable', 'string', 'max:255'],
            'country_id' => ['nullable', 'exists:countries,id'],

            'phone' => ['nullable', 'string', 'max:50'],
            'mobile' => ['nullable', 'string', 'max:50'],
            'website' => ['nullable', 'string', 'max:255'],
            'email' => ['nullable', 'email', 'max:255'],

            'gdpr_consent' => ['nullable', 'boolean'],
            'notes' => ['nullable', 'string'],
            'is_active' => ['nullable', 'boolean'],
        ]);

        $validated['is_client'] = (bool) ($validated['is_client'] ?? false);
        $validated['is_supplier'] = (bool) ($validated['is_supplier'] ?? false);
        $validated['gdpr_consent'] = (bool) ($validated['gdpr_consent'] ?? false);
        $validated['is_active'] = (bool) ($validated['is_active'] ?? true);

        if (! $validated['is_client'] && ! $validated['is_supplier']) {
            throw ValidationException::withMessages([
                'type' => 'A entidade tem de ser Cliente, Fornecedor ou ambos.',
            ]);
        }

        return $validated;
    }

    private function redirectAfterSave(array $data)
    {
        if ($data['is_client'] && ! $data['is_supplier']) {
            return redirect()->route('clients.index');
        }

        if ($data['is_supplier'] && ! $data['is_client']) {
            return redirect()->route('suppliers.index');
        }

        return redirect()->route('entities.index');
    }
}
