@props(['disabled' => false])
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<div class="relative">
    <input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 pr-10', 'type' => 'password', 'oninput' => 'toggleIconVisibility(this)']) !!}>
    <i class="fa fa-eye-slash" onclick="togglePasswordVisibility(this)" style="display: none; position: absolute; right: 10px; top: 50%; transform: translateY(-50%); cursor: pointer;"></i>
</div>

<script>
    function toggleIconVisibility(input) {
        var icon = input.nextElementSibling; // Get the icon next to the input field
        if (input.value.trim() !== "") {
            icon.style.display = "inline-block"; // Show the icon if input is not empty
        } else {
            icon.style.display = "none"; // Hide the icon if input is empty
        }
    }

    function togglePasswordVisibility(button) {
        var input = button.previousElementSibling;
        if (input.type === "password") {
            input.type = "text";
            button.classList.remove("fa-eye-slash");
            button.classList.add("fa-eye");
        } else {
            input.type = "password";
            button.classList.remove("fa-eye");
            button.classList.add("fa-eye-slash");
        }
    }
</script>
