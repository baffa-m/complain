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
        <h2 class="text-2xl font-semibold text-gray-900 mb-2 i">Please Specify</h2>
        <input type="text" name="title" id="title" value="{{ old('title', $complaint->title ?? '') }}" placeholder="Complaint Title" class="w-full rounded-lg p-2 bg-gray-50 focus:outline-none text-lg text-gray-700 border-gray-200 placeholder:text-gray-400">
    </div>

    <h2 class="text-xl font-semibold text-gray-900 mb-1 i">Session</h2>
    <select name="session" class="w-full mb-2 rounded-lg p-2 bg-gray-50 focus:outline-none text-lg text-gray-700 border-gray-200 placeholder:text-gray-400">
        <option value="">Select Session</option>
        <option value="2013/2014">2013/2014</option>
        <option value="2014/2015">2014/2015</option>
        <option value="2015/2016">2015/2016</option>
        <option value="2016/2017">2016/2017</option>
        <option value="2017/2018">2017/2018</option>
        <option value="2018/2019">2018/2019</option>
        <option value="2019/2020">2019/2020</option>
        <option value="2020/2021">2020/2021</option>
        <option value="2021/2022">2021/2022</option>
        <option value="2022/2023">2022/2023</option>
        <option value="2023/2024">2023/2024</option>
    </select>

    <div id="courseCode">
        <h2 class="text-2xl font-semibold text-gray-900 mb-2 i">Course Code</h2>
        <select name="course" id="course" class="w-full rounded-lg p-2 bg-gray-50 focus:outline-none text-lg text-gray-700 border-gray-200 placeholder:text-gray-400">
            <option value="">Select a course</option>
            <option value="CMP101">CMP101</option>
            <option value="CMP102">CMP102</option>
            <option value="CMP104">CMP105</option>
            <option value="CMP105">CMP106</option>
            <option value="CMP106">CMP108</option>
            <option value="CMP108">CMP121</option>
            <option value="CMP201">CMP201</option>
            <option value="CMP202">CMP202</option>
            <option value="CMP203">CMP203</option>
            <option value="CMP206">CMP206</option>
            <option value="CMP212">CMP212</option>
            <option value="CMP254">CMP254</option>
            <option value="CMP301">CMP301</option>
            <option value="CMP302">CMP302</option>
            <option value="CMP303">CMP303</option>
            <option value="CMP304">CMP304</option>
            <option value="CMP305">CMP305</option>
            <option value="CMP404">CMP404</option>
        </select>
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
    // Event listener for form submission
    $('form').on('submit', function() {
        // Toggle visibility before submitting the form
        toggleTitleAndCourseInput();

        var selectedOption = $('#complaintTitle').val();
        var titleInputValue;

        if (selectedOption === 'Others') {
            // Set the title input value as the selected value for submission
            titleInputValue = $('#title').val();
        } else {
            // Set the title input value as the selected option for submission
            titleInputValue = selectedOption;
        }

        // Set the title input value for submission
        $('#complaintTitle').val(titleInputValue);

        // The form will be submitted with the updated complaintTitle value
    });

    // Initial check on page load
    toggleTitleAndCourseInput();

    // Event listener for changes in the select dropdown
    $('#complaintTitle').on('change', function() {
        // Toggle visibility when the dropdown changes
        toggleTitleAndCourseInput();
    });

    // Function to toggle the visibility of the title and course inputs based on the selected option
    function toggleTitleAndCourseInput() {
        var selectedOption = $('#complaintTitle').val();
        var titleInput = $('#titleDiv');
        var title = $('#title');
        var courseTitleInput = $('#courseCode');
        var descriptionBox = $('#descriptionBox');

        if (selectedOption === 'Others') {
            titleInput.show();
            descriptionBox.show();
        } else {
            titleInput.hide();
            courseTitleInput.show();
            descriptionBox.hide();
        }
    }
});

</script>

@endpush
