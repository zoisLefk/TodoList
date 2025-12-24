<div>
    <div class='flex space-x-12'>
        <h1 class='text-3xl'>Projects</h1>
    
        @include('projects.create')
    </div>

    <ul role="list" class="divide-y divide-white/5">
        <li class="flex justify-between gap-x-6 py-5 my-5">
            <p class="basis-1/4">Title</p>
            <p class="basis-1/4">Description</p>
            <p></p>
            <p></p>
            <p></p>
        </li>
        @foreach ($projects as $project)
        <li class="flex justify-between gap-x-6 bg-white/5 my-5 p-5 rounded-xl items-center shadow-[10px_10px_5px_rgba(0,0,0,0.25)]">
            <div class="basis-1/4">
                <p class="text-sm/6 font-semibold text-white">{{ $project->title }}</p>
            </div>
            <div class="basis-1/4">
                <p class="text-sm/6 font-semibold text-white">{{ $project->description }}</p>
            </div>
            <a href="{{ route('projects.show', $project->id) }}" class="inline-flex items-center space-x-1 font-medium underline underline-offset-4 text-[#f53003] dark:text-[#FF4433] ml-1 bg-white/10 p-5 rounded-2xl shadow-[0_10px_10px_rgba(0,0,0,0.25)] hover:text-white">
                <span>View Project</span>
                <svg
                    width="10"
                    height="11"
                    viewBox="0 0 10 11"
                    fill="none"
                    xmlns="http://www.w3.org/2000/svg"
                    class="w-2.5 h-2.5"
                >
                    <path
                        d="M7.70833 6.95834V2.79167H3.54167M2.5 8L7.5 3.00001"
                        stroke="currentColor"
                        stroke-linecap="square"
                    />
                </svg>
            </a>
            <div>
                @include('projects.edit')
            </div>
            <div>
                @include('projects.delete')
            </div>
        </li>
        @endforeach
    </ul>

</div>