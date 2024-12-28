<x-layout>
    <x-slot:heading>
        Jobs
    </x-slot:heading>
    <div class="space-y-4">
        @foreach ($jobs as $job)
            <a href="/jobs/{{$job['id']}}" class="block px-4 py-6 border-2 border-gray-400 rounded-lg hover:border-gray-600">
                <div class="text-blue-500 font-bold text-sm">
                    {{$job->employer->name}}
                </div>
                <div> 
                    <strong>{{ $job['title'] }}:</strong> Pays {{ $job['salary']}} per year.
                </div>
            </a>
        @endforeach
    </div>
</x-layout>