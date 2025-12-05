<div>
    <h1>Projects</h1>

    @include('projects.create')

    <ul role="list" class="divide-y divide-white/5">
        <li class="flex justify-between gap-x-6 py-5">
            <p>Title</p>
            <p>Description</p>
            <p></p>
        </li>
        @foreach ($projects as $project)
        <li class="flex justify-between gap-x-6" style="padding: 10px;">
            <div class="flex min-w-0 gap-x-4">
                <p class="text-sm/6 font-semibold text-white">{{ $project->title }}</p>
            </div>
            <div>
                <p class="text-sm/6 font-semibold text-white">{{ $project->description }}</p>
            </div>
            <a href="{{ route('projects.show', $project->id) }}" class="btn btn-outline-primary btn-sm">
                View Project
            </a>
        </li>
        @endforeach
    </ul>

</div>