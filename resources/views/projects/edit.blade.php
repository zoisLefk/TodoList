<div class="container">
    <button command="show-modal" commandfor="edit-dialog-{{ $project->id }}" class="shadow-inner shadow-black p-4 rounded-lg bg-white/10 hover:bg-white/5">
        @include('components.edit-button')
    </button>
    <dialog id="edit-dialog-{{ $project->id }}" aria-labelledby="dialog-title" class="fixed inset-0 size-auto max-h-none max-w-none overflow-y-auto bg-transparent backdrop:bg-transparent">
        <el-dialog-backdrop class="fixed inset-0 bg-gray-900/50 transition-opacity data-closed:opacity-0 data-enter:duration-300 data-enter:ease-out data-leave:duration-200 data-leave:ease-in"></el-dialog-backdrop>

        <form action="{{ route('projects.update', $project->id) }}" method="POST">
            @csrf
            @method("PUT")
            <div tabindex="0" class="flex min-h-full items-end justify-center p-4 text-center focus:outline-none sm:items-center sm:p-0">
                <el-dialog-panel class="relative transform overflow-hidden rounded-lg bg-gray-800 text-left shadow-xl outline -outline-offset-1 outline-white/10 transition-all data-closed:translate-y-4 data-closed:opacity-0 data-enter:duration-300 data-enter:ease-out data-leave:duration-200 data-leave:ease-in sm:my-8 sm:w-full sm:max-w-lg data-closed:sm:translate-y-0 data-closed:sm:scale-95">
                    <div class="bg-gray-800 px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                    <div class="sm:flex sm:items-start">
                        <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                        <h3 id="dialog-title" class="text-base font-semibold text-white">Edit Project</h3>
                            <input type="hidden" name="project_id" value="{{ $project->id }}">

                            <div class="mb-3">
                                <label for="title" class="form-label text-white">Title</label>
                                <input id="title" name="title" value="{{ $project->title }}" style="color: black" class="form-control text-black" required>
                            </div>

                            <div class="mb-3">
                                <label for="description" class="form-label text-white">Description</label>
                                <textarea id="description" name="description" class="form-control" style="color: black;">{{ $project->description }}</textarea>
                            </div>
                    </div>
                    </div>
                    <div class="bg-gray-700/25 px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6">
                        <button type="submit" command="close" commandfor="edit-dialog-{{ $project->id }}" class="inline-flex w-full justify-center rounded-md bg-blue-500 px-3 py-2 text-sm font-semibold text-white hover:bg-blue-400 sm:ml-3 sm:w-auto">Update</button>
                        <button type="button" command="close" commandfor="edit-dialog-{{ $project->id }}" class="mt-3 inline-flex w-full justify-center rounded-md bg-white/10 px-3 py-2 text-sm font-semibold text-white inset-ring inset-ring-white/5 hover:bg-white/20 sm:mt-0 sm:w-auto">Cancel</button>
                    </div>
                </el-dialog-panel>
            </div>
        </form>
    </dialog>
</div>