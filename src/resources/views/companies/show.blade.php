<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Company Details') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="text-lg font-semibold mb-2">{{ $company->name }}</h3>
                    <p><strong>Address:</strong> {{ $company->address }}</p>
                    <p><strong>Website:</strong> <a href="{{ $company->website }}" target="_blank" class="text-blue-500 hover:text-blue-700">{{ $company->website }}</a></p>
                    <p><strong>Email:</strong> {{ $company->email }}</p>
                    
                    <div class="mt-4">
                        <a href="{{ route('companies.edit', $company) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Edit</a>
                        
                        <form action="{{ route('companies.destroy', $company) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded ml-2" onclick="return confirm('Are you sure you want to delete this company?')">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>