<div class="container">
    <h1>Create Project</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('projects.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input id="title" name="title" value="{{ old('title') }}" style="color: black" class="form-control text-black" required>
        </div>

        <button class="btn btn-primary bg-blue-600">Create</button>
    </form>
</div>