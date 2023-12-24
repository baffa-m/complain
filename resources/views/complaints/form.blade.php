<h1 class="text-4xl font-bold text-left text-gray-800">
    New Complaint
</h1>
<div class="mt-8 flex justify-between flex-col">
    <h2 class="text-2xl font-semibold text-gray-900 mb-2 i">Title</h2>
    <input type="text" name="title" value="{{ old('title', $complaint->title ?? '') }}" placeholder="Title" class="w-full rounded-lg p-2 bg-gray-50 focus:outline-none text-lg text-gray-700 border-gray-200 placeholder:text-gray-400">
    @error('title')
        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
    @enderror
</div>

<div class="comments-box border-t border-gray-100 pt-10">
    <h2 class="text-2xl font-semibold text-gray-900 mb-2">Description</h2>
    <textarea name="description"
        class="w-full rounded-lg p-4 bg-gray-50 focus:outline-none text-sm text-gray-700 border-gray-200 placeholder:text-gray-400"
        cols="30" rows="7">{{ old('description', $complaint->description ?? '') }}</textarea>
    @error('description')
        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
    @enderror
    <button
        class="mt-3 inline-flex items-center justify-center h-10 px-4 font-medium tracking-wide text-white transition duration-200 bg-gray-900 rounded-lg hover:bg-gray-800 focus:shadow-outline focus:outline-none">
        Submit
    </button>
</div>
