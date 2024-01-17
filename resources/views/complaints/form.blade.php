<h1 class="text-4xl font-bold text-left text-gray-800">
    New Complaint
</h1>
<div class="mt-8 flex justify-between flex-col">
    <h2 class="text-2xl font-semibold text-gray-900 mb-2 i">Nature Of Complaint</h2>
    <select name="drop_title" id="complaintTitle" class="w-full mb-4 rounded-lg p-2 bg-gray-50 focus:outline-none text-lg text-gray-700 border-gray-200 placeholder:text-gray-400">
        <option value="Missing Grade" {{ old('title') == 'Missing Grade' ? 'selected' : '' }}>Missing Grade</option>
        <option value="Missing CA" {{ old('title') == 'Missing CA' ? 'selected' : '' }}>Missing CA</option>
        <option value="Remarking" {{ old('title') == 'Remarking' ? 'selected' : '' }}>Remarking</option>
        <option value="Others" {{ old('title') == 'Others' ? 'selected' : '' }}>Others</option>
    </select>

    <div id="titleDiv">
        <h2 class="text-2xl font-semibold text-gray-900 mb-2 i">Complaint Title</h2>
        <input type="text" name="title" id="title" value="{{ old('title', $complaint->title ?? '') }}" placeholder="Complaint Title" class="w-full rounded-lg p-2 bg-gray-50 focus:outline-none text-lg text-gray-700 border-gray-200 placeholder:text-gray-400">
    </div>

    <div id="courseCode">
        <h2 class="text-2xl font-semibold text-gray-900 mb-2 i">Course Code</h2>
        <input type="text" name="course" value="{{ old('course', $complaint->course ?? '') }}" placeholder="Course Title" class="w-full rounded-lg p-2 bg-gray-50 focus:outline-none text-lg text-gray-700 border-gray-200 placeholder:text-gray-400">
        @error('course')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>
</div>

<div class="comments-box border-t border-gray-100 pt-10">
    <div id="descriptionBox">
        <h2 class="text-2xl font-semibold text-gray-900 mb-2">Description</h2>
        <textarea name="description"
            class="w-full rounded-lg p-4 bg-gray-50 focus:outline-none text-sm text-gray-700 border-gray-200 placeholder:text-gray-400"
            cols="30" rows="7">{{ old('description', $complaint->description ?? '') }}</textarea>
        @error('description')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
        </div>
    <button
        class="mt-3 inline-flex items-center justify-center h-10 px-4 font-medium tracking-wide text-white transition duration-200 bg-gray-900 rounded-lg hover:bg-gray-800 focus:shadow-outline focus:outline-none">
        Submit
    </button>
</div>

@push('scripts')
<script>
    $(document).ready(function() {
        // Initial check on page load
        toggleTitleAndCourseInput();

        // Event listener for changes in the select dropdown
        $('#complaintTitle').on('change', function() {
            toggleTitleAndCourseInput();
        });

        // Function to toggle the visibility of the title and course inputs based on the selected option
        function toggleTitleAndCourseInput() {
            var selectedOption = $('#complaintTitle').val();
            var titleInput = $('#titleDiv');
            var title = $('#title')
            var courseTitleInput = $('#courseTitle');
            var descriptionBox = $('#descriptionBox');

            if (selectedOption === 'Others') {
                titleInput.show();
                courseTitleInput.hide();
                descriptionBox.show();
            } else {
                title.val = selectedOption;
                titleInput.hide();
                courseTitleInput.show();
                descriptionBox.hide();
            }
        }
    });
</script>
@endpush
