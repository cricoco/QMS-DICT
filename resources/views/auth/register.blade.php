<x-guest-layout> <!-- Meaning, get guest.blade.php -->
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-passwd-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-passwd-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <!-- Designation -->
        <div>
            <x-input-label for="designation" :value="__('Designation')" />
            <x-text-input id="designation" class="block mt-1 w-full" type="text" name="designation" :value="old('designation')" required autofocus autocomplete="designation" />
            <x-input-error :messages="$errors->get('designation')" class="mt-2" />
        </div>

        <!-- Division -->
        <div>
            <x-input-label for="division" :value="__('Division')" />
            <!-- <x-text-input id="division" class="block mt-1 w-full" type="text" name="division" :value="old('division')" required autofocus autocomplete="division" /> -->
            <x-select-input id="division" class="block mt-1 w-full" name="division" :options="[
                'N/A' => 'N/A',
                'AFD' => 'AFD',
                'ORD' => 'ORD',
                'TOD' => 'TOD',
            ]" :value="old('division')" required autofocus autocomplete="division" />
            <x-input-error :messages="$errors->get('division')" class="mt-2" />
        </div>

        <!-- Project/Unit -->
        <div>
            <x-input-label for="unit" :value="__('Project/Unit')" />
            <x-select-input id="unit" class="block mt-1 w-full" name="unit" :value="old('unit')" required autofocus autocomplete="unit">
                <option value="N/A">N/A</option>
                <!-- Load options here from JS -->
            </x-select-input>
            <x-input-error :messages="$errors->get('unit')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>

    <!-- Privacy Pop-up -->
    <div id="privacy-popup" class="popup">
        <div class="popup-content">
            <h2><strong>Data Privacy Statement</strong></h2>
            <p>I agree that the personal data and other sensitive data entrusted to the DICT shall be used with due diligence and prudence, for the sole purpose of the Quality Management System Portal. I acknowledge and agree that the information may be used and disclosed by the DICT in accordance with any legal and regulatory standards and in compliance with the “Data Privacy Act of 2012”.</p>
            <label>
                <input type="checkbox" id="agree-checkbox"> I agree
            </label>
            <button id="agree-button" class="btn btn-secondary" type="button" disabled>Submit</button>
        </div>
    </div>

    <style>
        .popup {
            display: none;
            /* Initially hidden */
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            justify-content: center;
            align-items: center;
        }

        .popup-content {
            background: white;
            padding: 20px;
            margin-left: 50px;
            margin-right: 50px;
            border-radius: 10px;
            text-align: center;
        }

        label {
            display: block;
            margin: 20px 0;
        }
    </style>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var popup = document.getElementById('privacy-popup');
            var checkbox = document.getElementById('agree-checkbox');
            var button = document.getElementById('agree-button');

            // Show the popup when the page loads
            popup.style.display = 'flex';

            // Enable the submit button when the checkbox is checked
            checkbox.addEventListener('change', function() {
                button.disabled = !checkbox.checked;
            });

            // Hide the popup when the button is clicked
            button.addEventListener('click', function() {
                if (checkbox.checked) {
                    popup.style.display = 'none';
                }
            });
        });

        document.addEventListener('DOMContentLoaded', function() {
            const divisionSelect = document.getElementById('division');
            const unitSelect = document.getElementById('unit');
            
            const units = {
                'N/A': ['N/A'],
                'ORD': ['COMMS', 'QMR'],
                'AFD': ['HR', 'Finance', 'Supply', 'General Services'],
                'TOD': ['eLGU/eGOV', 'GovNet', 'FW4A', 'ILCD', 'IID', 'PNPKI', 'DRRM']
            };

            divisionSelect.addEventListener('change', function() {
                const selectedDivision = this.value;

                // Clear previous options
                unitSelect.innerHTML = '';

                // Add new options
                if (units[selectedDivision]) {
                    units[selectedDivision].forEach(function(unit) {
                        const option = document.createElement('option');
                        option.value = unit;
                        option.text = unit;
                        unitSelect.appendChild(option);
                    });
                }
            });

            // Trigger change event to set initial state based on old value
            divisionSelect.dispatchEvent(new Event('change'));
        });
    </script>
</x-guest-layout>