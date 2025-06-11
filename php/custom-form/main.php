<?php
function hy_multi_form() { 
?>

<div class="bg-white rounded-3xl py-8 px-7 max-w-md mx-auto shadow-lg relative">
    <div class="flex justify-between items-center mb-4">
        <h3 class="text-black text-2xl font-semibold">Get Cash Offer</h3>
        <button type="button" class="text-gray-400 hover:text-gray-600" onclick="closeForm()">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
            </svg>
        </button>
    </div>

    <!-- Progress Bar -->
    <div class="flex gap-1 mb-7">
        <div class="h-1.5 w-1/4 hy-form-step done bg-green-500 rounded-full transition-all duration-300"></div>
        <div class="h-1.5 w-1/4 hy-form-step bg-gray-200 rounded-full transition-all duration-300"></div>
        <div class="h-1.5 w-1/4 hy-form-step bg-gray-200 rounded-full transition-all duration-300"></div>
        <div class="h-1.5 w-1/4 hy-form-step bg-gray-200 rounded-full transition-all duration-300"></div>
    </div>

    <style>
    .hy-form-step.done {
        opacity: 0.8;
        transform: scale(1.05);
    }
    .hy-form-step {
        transition: all 0.3s ease;
    }
    </style>

    <!-- Step Header -->
    <div class="flex justify-between items-center mb-7">
        <h5 class="hy-form-title text-lg font-semibold text-gray-900">What's your property address</h5>
        <p class="text-gray-400 font-medium">Step <span class="hy-current-step">1</span> of 4</p>
    </div>

    <form id="hy-multi-step-form" class="hy-form-container">
        
        <!-- Step 1: Property Address -->
        <div class="hy-form-step-content active" data-step="1">
            <div class="mb-6">
                <input 
                    type="text" 
                    id="property_address" 
                    name="property_address" 
                    placeholder="Enter Your Complete Address" 
                    class="w-full px-4 py-4 border-2 border-gray-200 rounded-xl focus:border-green-500 focus:outline-none transition-colors text-gray-900 placeholder-gray-400"
                    required
                >
            </div>
            <button 
                type="button" 
                class="hy-next-btn w-full bg-green-500 hover:bg-green-600 text-white font-semibold py-4 px-6 rounded-xl transition-all duration-300 transform hover:scale-105"
            >
                Next
            </button>
        </div>

        <!-- Step 2: Property Confirmation -->
        <div class="hy-form-step-content hidden" data-step="2">
            <div class="mb-6">
                <div id="hy-google-map" class="bg-gray-100 rounded-xl mb-4 h-48 overflow-hidden relative">
                    <div id="hy-map-loading" class="absolute inset-0 flex items-center justify-center bg-gray-100 z-10">
                        <div class="text-center">
                            <div class="animate-spin rounded-full h-8 w-8 border-b-2 border-green-500 mx-auto mb-2"></div>
                            <div class="text-gray-600">Loading map...</div>
                        </div>
                    </div>
                    <div id="hy-map-error" class="absolute inset-0 flex items-center justify-center bg-red-50 z-10 hidden">
                        <div class="text-center text-red-600">
                            <div class="text-4xl mb-2">📍</div>
                            <div class="text-sm">Unable to load map</div>
                        </div>
                    </div>
                </div>
                <div class="bg-gray-50 rounded-xl p-4 text-center">
                    <span class="hy-display-address text-gray-800 font-medium"></span>
                </div>
            </div>
            <div class="flex gap-4">
                <button 
                    type="button" 
                    class="hy-prev-btn flex-1 bg-gray-100 hover:bg-gray-200 text-gray-700 font-semibold py-4 px-6 rounded-xl transition-all duration-300"
                >
                    No
                </button>
                <button 
                    type="button" 
                    class="hy-next-btn flex-1 bg-green-500 hover:bg-green-600 text-white font-semibold py-4 px-6 rounded-xl transition-all duration-300"
                >
                    Next
                </button>
            </div>
        </div>

        <!-- Step 3: Owner Information -->
        <div class="hy-form-step-content hidden" data-step="3">
            <div class="space-y-4 mb-6">
                <div class="grid grid-cols-2 gap-4">
                    <input 
                        type="text" 
                        name="first_name" 
                        placeholder="First Name" 
                        class="w-full px-4 py-4 border-2 border-gray-200 rounded-xl focus:border-green-500 focus:outline-none transition-colors text-gray-900 placeholder-gray-400"
                        required
                    >
                    <input 
                        type="text" 
                        name="last_name" 
                        placeholder="Last Name" 
                        class="w-full px-4 py-4 border-2 border-gray-200 rounded-xl focus:border-green-500 focus:outline-none transition-colors text-gray-900 placeholder-gray-400"
                        required
                    >
                </div>
                <input 
                    type="tel" 
                    name="phone_number" 
                    placeholder="Phone Number" 
                    class="w-full px-4 py-4 border-2 border-gray-200 rounded-xl focus:border-green-500 focus:outline-none transition-colors text-gray-900 placeholder-gray-400"
                    required
                >
                <input 
                    type="email" 
                    name="email_address" 
                    placeholder="Email Address" 
                    class="w-full px-4 py-4 border-2 border-gray-200 rounded-xl focus:border-green-500 focus:outline-none transition-colors text-gray-900 placeholder-gray-400"
                    required
                >
            </div>
            <div class="flex gap-4">
                <button 
                    type="button" 
                    class="hy-prev-btn flex-1 bg-gray-100 hover:bg-gray-200 text-gray-700 font-semibold py-4 px-6 rounded-xl transition-all duration-300"
                >
                    Previous
                </button>
                <button 
                    type="button" 
                    class="hy-next-btn flex-1 bg-green-500 hover:bg-green-600 text-white font-semibold py-4 px-6 rounded-xl transition-all duration-300"
                >
                    Next
                </button>
            </div>
        </div>

        <!-- Step 4: Property Information -->
        <div class="hy-form-step-content hidden" data-step="4">
            <div class="space-y-3 mb-6">
                
                <!-- Question 1: How fast do you want to sell? -->
                <div class="hy-question-card border border-gray-200 rounded-lg cursor-pointer hover:border-green-500 hover:bg-gray-50 transition-colors" data-question="sell_speed">
                    <div class="p-4">
                        <div class="flex justify-between items-center mb-2">
                            <span class="text-gray-700 font-medium">How fast do you want to sell?</span>
                            <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                            </svg>
                        </div>
                        <div class="hy-question-value text-green-600 text-sm font-medium"></div>
                    </div>
                </div>

                <!-- Question 2: How long have you owned it? -->
                <div class="hy-question-card border border-gray-200 rounded-lg cursor-pointer hover:border-green-500 hover:bg-gray-50 transition-colors" data-question="ownership_duration">
                    <div class="p-4">
                        <div class="flex justify-between items-center mb-2">
                            <span class="text-gray-700 font-medium">How long have you owned it?</span>
                            <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                            </svg>
                        </div>
                        <div class="hy-question-value text-green-600 text-sm font-medium"></div>
                    </div>
                </div>

                <!-- Question 3: What kind of Repairs/Maintenance does the property need? -->
                <div class="hy-question-card border border-gray-200 rounded-lg cursor-pointer hover:border-green-500 hover:bg-gray-50 transition-colors" data-question="repairs_needed">
                    <div class="p-4">
                        <div class="flex justify-between items-center mb-2">
                            <span class="text-gray-700 font-medium">What kind of Repairs/Maintenance does the property need?</span>
                            <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                            </svg>
                        </div>
                        <div class="hy-question-value text-green-600 text-sm font-medium"></div>
                    </div>
                </div>

                <!-- Question 4: Additional Notes -->
                <div class="hy-question-card border border-gray-200 rounded-lg cursor-pointer hover:border-green-500 hover:bg-gray-50 transition-colors" data-question="additional_notes">
                    <div class="p-4">
                        <div class="flex justify-between items-center mb-2">
                            <span class="text-gray-700 font-medium">Additional Notes</span>
                            <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                            </svg>
                        </div>
                        <div class="hy-question-value text-green-600 text-sm font-medium"></div>
                    </div>
                </div>

            </div>

            <div class="flex gap-4">
                <button 
                    type="button" 
                    class="hy-prev-btn flex-1 bg-gray-100 hover:bg-gray-200 text-gray-700 font-semibold py-4 px-6 rounded-xl transition-all duration-300"
                >
                    Previous
                </button>
                <button 
                    type="submit" 
                    id="hy-submit-btn"
                    class="flex-1 bg-green-500 hover:bg-green-600 text-white font-semibold py-4 px-6 rounded-xl transition-all duration-300 transform hover:scale-105"
                >
                    Submit
                </button>
            </div>
        </div>

        <!-- Off-canvas Panel for Question Options -->
        <div id="hy-off-canvas" class="absolute inset-0 z-50 hidden rounded-3xl overflow-hidden">
            <!-- Panel -->
            <div class="hy-off-canvas-panel absolute right-0 top-0 h-full w-full bg-white shadow-xl transform translate-x-full transition-transform duration-300 ease-in-out rounded-3xl">
                <div class="flex flex-col h-full">
                    <!-- Header -->
                    <div class="flex justify-between items-center p-6 border-b border-gray-200">
                        <h3 class="hy-off-canvas-title text-lg font-semibold text-gray-900"></h3>
                        <button type="button" onclick="closeOffCanvas()" class="text-gray-400 hover:text-gray-600">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                        </button>
                    </div>
                    
                    <!-- Content -->
                    <div class="flex-1 overflow-y-auto p-6">
                        <div id="hy-off-canvas-content">
                            <!-- Dynamic content will be inserted here -->
                        </div>
                    </div>
                    
                    <!-- Footer -->
                    <div class="p-6 border-t border-gray-200">
                        <button 
                            type="button" 
                            onclick="closeOffCanvas()"
                            class="w-full bg-green-500 hover:bg-green-600 text-white font-semibold py-3 px-6 rounded-lg transition-all duration-300"
                        >
                            Save
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Hidden form inputs for storing values -->
        <input type="hidden" name="sell_speed" id="sell_speed_input" required>
        <input type="hidden" name="ownership_duration" id="ownership_duration_input" required>
        <input type="hidden" name="repairs_needed" id="repairs_needed_input" required>
        <input type="hidden" name="selling_reason" id="selling_reason_input" required>
        <textarea name="additional_notes" id="additional_notes_input" class="hidden"></textarea>

        <!-- Success Message -->
        <div class="hy-form-step-content hidden" id="hy-success-message">
            <div class="text-center py-8">
                <div class="w-16 h-16 mx-auto bg-green-100 rounded-full flex items-center justify-center mb-6">
                    <svg class="w-8 h-8 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                    </svg>
                </div>
                <h3 class="text-2xl font-semibold text-gray-900 mb-4">Thank You!</h3>
                <p class="text-gray-600 mb-6">Your cash offer request has been submitted successfully. We'll contact you within 24 hours with your personalized cash offer.</p>
                <div class="text-center">
                    <p class="text-gray-500 text-sm mb-2">Form will reset in:</p>
                    <div class="inline-flex items-center justify-center w-12 h-12 bg-gray-100 rounded-full">
                        <span id="hy-countdown-timer" class="text-lg font-bold text-gray-700">5</span>
                    </div>
                </div>
            </div>
        </div>

    </form>
</div>

<script>
// Google Maps variables
let map;
let geocoder;
let marker;

// Load Google Maps API
function loadGoogleMapsAPI() {
    if (!hy_ajax_object.google_api_key || hy_ajax_object.google_api_key === 'YOUR_GOOGLE_MAPS_API_KEY') {
        console.warn('Google Maps API key not configured. Please add your API key in WordPress Admin > Settings > Cash Offer Form');
        document.getElementById('hy-map-loading').innerHTML = '<div class="text-center text-yellow-600"><div class="text-4xl mb-2">⚠️</div><div class="text-sm">API key not configured</div></div>';
        return;
    }
    
    const script = document.createElement('script');
    script.src = `https://maps.googleapis.com/maps/api/js?key=${hy_ajax_object.google_api_key}&libraries=places&callback=initGoogleMaps`;
    script.async = true;
    script.defer = true;
    document.head.appendChild(script);
}

// Initialize Google Maps
function initGoogleMaps() {
    geocoder = new google.maps.Geocoder();
    console.log('Google Maps API loaded successfully');
}

// Make function globally available for callback
window.initGoogleMaps = initGoogleMaps;

function closeForm() {
    // Add your close form logic here
    console.log('Form closed');
}

document.addEventListener('DOMContentLoaded', function() {
    let currentStep = 1;
    const totalSteps = 4; // Changed to 4 (property address, map confirmation, owner info, property info)
    
    const stepTitles = [
        "What's your property address",
        "Did we find your property?", 
        "Owner Info",
        "Property Info"
    ];

    // Load Google Maps API
    loadGoogleMapsAPI();

    // Initialize form
    updateStepDisplay();

    // Handle next buttons
    document.addEventListener('click', function(e) {
        if (e.target.classList.contains('hy-next-btn')) {
            e.preventDefault();
            if (validateCurrentStep()) {
                if (currentStep < totalSteps) {
                    nextStep();
                }
            }
        }
    });

    // Handle previous buttons  
    document.addEventListener('click', function(e) {
        if (e.target.classList.contains('hy-prev-btn')) {
            e.preventDefault();
            if (currentStep > 1) {
                prevStep();
            }
        }
    });

    // Handle expandable question clicks
    document.addEventListener('click', function(e) {
        const questionCard = e.target.closest('.hy-question-card');
        if (questionCard) {
            const questionType = questionCard.getAttribute('data-question');
            openOffCanvas(questionType);
        }
    });

    // Handle radio option selection
    document.addEventListener('click', function(e) {
        const radioOption = e.target.closest('.hy-off-canvas-radio-option');
        if (radioOption) {
            const radio = radioOption.querySelector('input[type="radio"]');
            const container = radioOption.querySelector('div');
            const questionType = radio.name.replace('_temp', '');
            
            // Clear previous selections in this group
            const groupName = radio.name;
            document.querySelectorAll(`input[name="${groupName}"]`).forEach(input => {
                const parentDiv = input.closest('.hy-off-canvas-radio-option').querySelector('div');
                parentDiv.classList.remove('border-green-500', 'bg-green-50');
                parentDiv.classList.add('border-gray-200');
                input.closest('.hy-off-canvas-radio-option').querySelector('span').classList.remove('text-green-600', 'font-semibold');
                input.closest('.hy-off-canvas-radio-option').querySelector('span').classList.add('text-gray-700');
            });
            
            // Select current option
            radio.checked = true;
            container.classList.remove('border-gray-200');
            container.classList.add('border-green-500', 'bg-green-50');
            radioOption.querySelector('span').classList.remove('text-gray-700');
            radioOption.querySelector('span').classList.add('text-green-600', 'font-semibold');
        }
    });

    // Handle save notes button
    document.addEventListener('click', function(e) {
        if (e.target.classList.contains('hy-save-notes')) {
            e.preventDefault();
            const textarea = e.target.previousElementSibling;
            if (textarea.value.trim()) {
                e.target.textContent = 'Saved!';
                e.target.classList.remove('bg-green-500', 'hover:bg-green-600');
                e.target.classList.add('bg-green-600');
                setTimeout(() => {
                    e.target.textContent = 'Save';
                    e.target.classList.remove('bg-green-600');
                    e.target.classList.add('bg-green-500', 'hover:bg-green-600');
                }, 1500);
            }
        }
    });

    // Handle form submission
    document.getElementById('hy-multi-step-form').addEventListener('submit', function(e) {
        e.preventDefault();
        
        if (!validateCurrentStep()) {
            return;
        }

        // Show loading state
        const submitBtn = e.target.querySelector('button[type="submit"]');
        const originalText = submitBtn.textContent;
        submitBtn.textContent = 'Submitting...';
        submitBtn.disabled = true;

        // Collect form data
        const formData = new FormData();
        formData.append('action', 'hy_submit_cash_offer');
        formData.append('nonce', hy_ajax_object.nonce);
        
        // Get all form values
        const inputs = document.querySelectorAll('#hy-multi-step-form input:not([name$="_temp"]), #hy-multi-step-form textarea');
        inputs.forEach(input => {
            if (input.type === 'radio' && input.checked) {
                formData.append(input.name, input.value);
            } else if (input.type === 'hidden' && input.value) {
                formData.append(input.name.replace('_input', ''), input.value);
            } else if (input.type !== 'radio' && input.type !== 'hidden' && input.value) {
                formData.append(input.name, input.value);
            }
        });

        // Submit via AJAX
        fetch(hy_ajax_object.ajax_url, {
            method: 'POST',
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                showSuccess();
            } else {
                alert('There was an error submitting your form. Please try again.');
                submitBtn.textContent = originalText;
                submitBtn.disabled = false;
            }
        })
        .catch(error => {
            alert('There was an error submitting your form. Please try again.');
            submitBtn.textContent = originalText;
            submitBtn.disabled = false;
        });
    });

    function nextStep() {
        currentStep++;
        updateStepDisplay();
        
        // Special handling for step 2 (property confirmation with map)
        if (currentStep === 2) {
            const address = document.getElementById('property_address').value;
            document.querySelector('.hy-display-address').textContent = address;
            loadMapForAddress(address);
        }
        
        // Keep successful validation border colors when moving forward
        const previousStepElement = document.querySelector(`[data-step="${currentStep - 1}"]`);
        if (previousStepElement) {
            const validInputs = previousStepElement.querySelectorAll('input[required]:not(.border-red-500), textarea[required]:not(.border-red-500)');
            validInputs.forEach(input => {
                if (input.value.trim()) {
                    input.classList.remove('border-gray-200');
                    input.classList.add('border-green-500');
                }
            });
        }
    }

    function prevStep() {
        currentStep--;
        updateStepDisplay();
    }

    function updateStepDisplay() {
        // Update step content visibility
        document.querySelectorAll('.hy-form-step-content').forEach(step => {
            step.classList.add('hidden');
            step.classList.remove('active');
        });
        
        const currentStepElement = document.querySelector(`[data-step="${currentStep}"]`);
        if (currentStepElement) {
            currentStepElement.classList.remove('hidden');
            currentStepElement.classList.add('active');
        }

        // Update progress bar (4 visual steps)
        document.querySelectorAll('.hy-form-step').forEach((step, index) => {
            if (index === 0) {
                // First step is always done and green
                step.classList.remove('bg-gray-200');
                step.classList.add('bg-green-500', 'done');
            } else if (index < currentStep - 1) {
                // Completed steps (excluding first which is always done)
                step.classList.remove('bg-gray-200');
                step.classList.add('bg-green-500', 'done');
            } else if (index === currentStep - 1) {
                // Current step
                step.classList.remove('bg-gray-200', 'done');
                step.classList.add('bg-green-500');
            } else {
                // Future steps
                step.classList.remove('bg-green-500', 'done');
                step.classList.add('bg-gray-200');
            }
        });

        // Update step counter and title
        document.querySelector('.hy-current-step').textContent = currentStep;
        document.querySelector('.hy-form-title').textContent = stepTitles[currentStep - 1];
    }

    function validateCurrentStep() {
        const currentStepElement = document.querySelector(`[data-step="${currentStep}"]`);
        let isValid = true;

        // Validate required inputs
        const requiredInputs = currentStepElement.querySelectorAll('input[required], textarea[required]');
        requiredInputs.forEach(input => {
            if (!input.value.trim()) {
                input.classList.add('border-red-500');
                input.classList.remove('border-gray-200', 'border-green-500');
                isValid = false;
                
                // Reset red border after 1 second
                setTimeout(() => {
                    input.classList.remove('border-red-500');
                    input.classList.add('border-gray-200');
                }, 1000);
            } else {
                input.classList.remove('border-red-500', 'border-gray-200');
                input.classList.add('border-green-500');
            }
        });

        // Validate radio button groups in step 4
        if (currentStep === 4) {
            const requiredQuestions = ['sell_speed', 'ownership_duration', 'repairs_needed'];
            requiredQuestions.forEach(questionType => {
                const hiddenInput = document.getElementById(questionType + '_input');
                if (!hiddenInput.value) {
                    isValid = false;
                    // Highlight the question that needs attention
                    const questionCard = document.querySelector(`[data-question="${questionType}"]`);
                    if (questionCard) {
                        questionCard.classList.add('border-red-500');
                        questionCard.classList.remove('border-gray-200');
                        
                        // Reset red border after 1 second
                        setTimeout(() => {
                            questionCard.classList.remove('border-red-500');
                            questionCard.classList.add('border-gray-200');
                        }, 1000);
                    }
                }
            });
        }

        if (!isValid) {
            // Add shake animation
            currentStepElement.classList.add('animate-pulse');
            setTimeout(() => {
                currentStepElement.classList.remove('animate-pulse');
            }, 500);
        }

        return isValid;
    }

    function openOffCanvas(questionType) {
        const offCanvas = document.getElementById('hy-off-canvas');
        const panel = document.querySelector('.hy-off-canvas-panel');
        const title = document.querySelector('.hy-off-canvas-title');
        const content = document.getElementById('hy-off-canvas-content');
        
        // Set title and content based on question type
        const questionData = getQuestionData(questionType);
        title.textContent = questionData.title;
        content.innerHTML = questionData.content;
        
        // Show off-canvas
        offCanvas.classList.remove('hidden');
        
        // Trigger slide-in animation
        setTimeout(() => {
            panel.classList.remove('translate-x-full');
            panel.classList.add('translate-x-0');
        }, 10);
        
        // Set current question type for saving
        offCanvas.setAttribute('data-current-question', questionType);
        
        // Pre-select current value if exists
        const currentValue = document.getElementById(questionType + '_input').value;
        if (currentValue) {
            const radio = content.querySelector(`input[value="${currentValue}"]`);
            if (radio) {
                radio.checked = true;
                const container = radio.closest('.hy-off-canvas-radio-option').querySelector('div');
                container.classList.remove('border-gray-200');
                container.classList.add('border-green-500', 'bg-green-50');
                radio.closest('.hy-off-canvas-radio-option').querySelector('span').classList.remove('text-gray-700');
                radio.closest('.hy-off-canvas-radio-option').querySelector('span').classList.add('text-green-600', 'font-semibold');
            }
        }
        
        // For textarea, set current value
        const textarea = content.querySelector('textarea');
        if (textarea && currentValue) {
            textarea.value = currentValue;
        }
    }

    function closeOffCanvas() {
        const offCanvas = document.getElementById('hy-off-canvas');
        const panel = document.querySelector('.hy-off-canvas-panel');
        const questionType = offCanvas.getAttribute('data-current-question');
        
        // Save the selection before closing
        saveOffCanvasSelection(questionType);
        
        // Trigger slide-out animation
        panel.classList.remove('translate-x-0');
        panel.classList.add('translate-x-full');
        
        // Hide after animation
        setTimeout(() => {
            offCanvas.classList.add('hidden');
        }, 300);
    }

    function saveOffCanvasSelection(questionType) {
        const content = document.getElementById('hy-off-canvas-content');
        const hiddenInput = document.getElementById(questionType + '_input');
        const questionCard = document.querySelector(`[data-question="${questionType}"]`);
        const questionValue = questionCard.querySelector('.hy-question-value');
        
        if (questionType === 'additional_notes') {
            // Handle textarea
            const textarea = content.querySelector('textarea');
            if (textarea) {
                hiddenInput.value = textarea.value;
                questionValue.textContent = textarea.value ? 'Added' : '';
            }
        } else {
            // Handle radio buttons
            const selectedRadio = content.querySelector('input[type="radio"]:checked');
            if (selectedRadio) {
                hiddenInput.value = selectedRadio.value;
                const selectedText = selectedRadio.closest('.hy-off-canvas-radio-option').querySelector('span').textContent;
                questionValue.textContent = selectedText;
            }
        }
    }

    function getQuestionData(questionType) {
        const questionData = {
            sell_speed: {
                title: 'How fast do you want to sell?',
                content: `
                    <div class="space-y-3">
                        <label class="hy-off-canvas-radio-option block">
                            <input type="radio" name="sell_speed_temp" value="asap" class="hidden">
                            <div class="border border-gray-200 rounded-lg p-4 cursor-pointer hover:border-green-500 hover:bg-green-50 transition-colors">
                                <span class="text-gray-700 font-medium">ASAP</span>
                            </div>
                        </label>
                        <label class="hy-off-canvas-radio-option block">
                            <input type="radio" name="sell_speed_temp" value="1-2_months" class="hidden">
                            <div class="border border-gray-200 rounded-lg p-4 cursor-pointer hover:border-green-500 hover:bg-green-50 transition-colors">
                                <span class="text-gray-700 font-medium">1-2 Months</span>
                            </div>
                        </label>
                        <label class="hy-off-canvas-radio-option block">
                            <input type="radio" name="sell_speed_temp" value="3-6_months" class="hidden">
                            <div class="border border-gray-200 rounded-lg p-4 cursor-pointer hover:border-green-500 hover:bg-green-50 transition-colors">
                                <span class="text-gray-700 font-medium">3-6 Months</span>
                            </div>
                        </label>
                        <label class="hy-off-canvas-radio-option block">
                            <input type="radio" name="sell_speed_temp" value="6_plus_months" class="hidden">
                            <div class="border border-gray-200 rounded-lg p-4 cursor-pointer hover:border-green-500 hover:bg-green-50 transition-colors">
                                <span class="text-gray-700 font-medium">6+ Months</span>
                            </div>
                        </label>
                    </div>
                `
            },
            ownership_duration: {
                title: 'How long have you owned it?',
                content: `
                    <div class="space-y-3">
                        <label class="hy-off-canvas-radio-option block">
                            <input type="radio" name="ownership_duration_temp" value="0-5_years" class="hidden">
                            <div class="border border-gray-200 rounded-lg p-4 cursor-pointer hover:border-green-500 hover:bg-green-50 transition-colors">
                                <span class="text-gray-700 font-medium">0 - 5 Years</span>
                            </div>
                        </label>
                        <label class="hy-off-canvas-radio-option block">
                            <input type="radio" name="ownership_duration_temp" value="5-15_years" class="hidden">
                            <div class="border border-gray-200 rounded-lg p-4 cursor-pointer hover:border-green-500 hover:bg-green-50 transition-colors">
                                <span class="text-gray-700 font-medium">5 - 15 Years</span>
                            </div>
                        </label>
                    </div>
                `
            },
            repairs_needed: {
                title: 'What kind of Repairs/Maintenance does the property need?',
                content: `
                    <div class="space-y-3">
                        <label class="hy-off-canvas-radio-option block">
                            <input type="radio" name="repairs_needed_temp" value="full_gut" class="hidden">
                            <div class="border border-gray-200 rounded-lg p-4 cursor-pointer hover:border-green-500 hover:bg-green-50 transition-colors">
                                <span class="text-gray-700 font-medium">$$ | Full Gut - Everything</span>
                            </div>
                        </label>
                        <label class="hy-off-canvas-radio-option block">
                            <input type="radio" name="repairs_needed_temp" value="remodel" class="hidden">
                            <div class="border border-gray-200 rounded-lg p-4 cursor-pointer hover:border-green-500 hover:bg-green-50 transition-colors">
                                <span class="text-gray-700 font-medium">$$ | Remodel - Kitchen, Bathrooms, Roof</span>
                            </div>
                        </label>
                        <label class="hy-off-canvas-radio-option block">
                            <input type="radio" name="repairs_needed_temp" value="flooring_paint" class="hidden">
                            <div class="border border-gray-200 rounded-lg p-4 cursor-pointer hover:border-green-500 hover:bg-green-50 transition-colors">
                                <span class="text-gray-700 font-medium">$ | Flooring & Paint</span>
                            </div>
                        </label>
                        <label class="hy-off-canvas-radio-option block">
                            <input type="radio" name="repairs_needed_temp" value="tv_ready" class="hidden">
                            <div class="border border-gray-200 rounded-lg p-4 cursor-pointer hover:border-green-500 hover:bg-green-50 transition-colors">
                                <span class="text-gray-700 font-medium">$ | None - TV Commercial Ready</span>
                            </div>
                        </label>
                    </div>
                `
            },
            additional_notes: {
                title: 'Additional Notes',
                content: `
                    <div>
                        <textarea 
                            placeholder="Tell us more about your property..."
                            class="w-full h-64 px-4 py-3 border border-gray-200 rounded-lg focus:border-green-500 focus:outline-none transition-colors text-gray-900 placeholder-gray-400 resize-none"
                        ></textarea>
                    </div>
                `
            }
        };
        
        return questionData[questionType] || { title: '', content: '' };
    }

    // Make functions globally available
    window.closeOffCanvas = closeOffCanvas;
    window.resetFormToInitial = resetFormToInitial;

    function loadMapForAddress(address) {
        const mapContainer = document.getElementById('hy-google-map');
        const loadingDiv = document.getElementById('hy-map-loading');
        const errorDiv = document.getElementById('hy-map-error');
        
        // Show loading state
        loadingDiv.classList.remove('hidden');
        errorDiv.classList.add('hidden');

        // Check if geocoder is available
        if (!geocoder) {
            setTimeout(() => loadMapForAddress(address), 500);
            return;
        }

        geocoder.geocode({ address: address }, function(results, status) {
            if (status === 'OK') {
                // Hide loading
                loadingDiv.classList.add('hidden');
                
                // Initialize map
                const location = results[0].geometry.location;
                map = new google.maps.Map(mapContainer, {
                    zoom: 16,
                    center: location,
                    mapTypeControl: false,
                    streetViewControl: false,
                    fullscreenControl: false,
                    styles: [
                        {
                            featureType: 'poi',
                            elementType: 'labels',
                            stylers: [{ visibility: 'off' }]
                        }
                    ]
                });

                // Add marker
                marker = new google.maps.Marker({
                    position: location,
                    map: map,
                    title: address,
                    icon: {
                        url: 'data:image/svg+xml;charset=UTF-8,' + encodeURIComponent(`
                            <svg width="32" height="32" viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg">
                                <circle cx="16" cy="16" r="12" fill="#22c55e" stroke="#ffffff" stroke-width="3"/>
                                <circle cx="16" cy="16" r="6" fill="#ffffff"/>
                            </svg>
                        `),
                        scaledSize: new google.maps.Size(32, 32),
                        anchor: new google.maps.Point(16, 16)
                    }
                });

                // Add info window
                const infoWindow = new google.maps.InfoWindow({
                    content: `<div style="padding: 8px; font-family: system-ui;"><strong>${address}</strong></div>`
                });

                marker.addListener('click', function() {
                    infoWindow.open(map, marker);
                });
            } else {
                // Show error state
                loadingDiv.classList.add('hidden');
                errorDiv.classList.remove('hidden');
                console.error('Geocoding failed: ' + status);
            }
        });
    }

    function showSuccess() {
        document.querySelectorAll('.hy-form-step-content').forEach(step => {
            step.classList.add('hidden');
        });
        document.getElementById('hy-success-message').classList.remove('hidden');
        
        // Update header
        document.querySelector('.hy-form-title').textContent = 'Form Submitted';
        document.querySelector('.hy-current-step').textContent = '✓';
        
        // Complete all progress steps
        document.querySelectorAll('.hy-form-step').forEach((step, index) => {
            step.classList.remove('bg-gray-200');
            step.classList.add('bg-green-500');
            if (index === 0) {
                step.classList.add('done'); // First step always done
            } else {
                step.classList.add('done'); // All steps done on success
            }
        });
        
        // Start 5-second countdown timer
        startCountdownTimer();
    }

    let countdownInterval;

    function startCountdownTimer() {
        let countdown = 5;
        const timerElement = document.getElementById('hy-countdown-timer');
        
        // Clear any existing timer
        if (countdownInterval) {
            clearInterval(countdownInterval);
        }
        
        countdownInterval = setInterval(() => {
            countdown--;
            timerElement.textContent = countdown;
            
            if (countdown <= 0) {
                clearInterval(countdownInterval);
                resetFormToInitial();
            }
        }, 1000);
    }

    function resetFormToInitial() {
        // Clear countdown timer if running
        if (countdownInterval) {
            clearInterval(countdownInterval);
        }
        
        // Reset to step 1
        currentStep = 1;
        
        // Clear all form inputs
        document.getElementById('hy-multi-step-form').reset();
        
        // Clear hidden inputs
        document.querySelectorAll('input[id$="_input"]').forEach(input => {
            input.value = '';
        });
        
        // Clear question values
        document.querySelectorAll('.hy-question-value').forEach(el => {
            el.textContent = '';
        });
        
        // Reset all input border colors to default
        document.querySelectorAll('input, textarea').forEach(input => {
            input.classList.remove('border-red-500', 'border-green-500');
            input.classList.add('border-gray-200');
        });
        
        // Reset question card border colors
        document.querySelectorAll('.hy-question-card').forEach(card => {
            card.classList.remove('border-red-500', 'border-green-500');
            card.classList.add('border-gray-200');
        });
        
        // Reset progress bar - first step always done, others reset
        document.querySelectorAll('.hy-form-step').forEach((step, index) => {
            if (index === 0) {
                // First step is always done and green
                step.classList.remove('bg-gray-200');
                step.classList.add('bg-green-500', 'done');
            } else {
                // Reset other steps
                step.classList.remove('bg-green-500', 'done');
                step.classList.add('bg-gray-200');
            }
        });
        
        // Reset submit button
        const submitBtn = document.getElementById('hy-submit-btn');
        if (submitBtn) {
            submitBtn.textContent = 'Submit';
            submitBtn.disabled = false;
        }
        
        // Reset form display
        updateStepDisplay();
        
        // Reset countdown timer display
        document.getElementById('hy-countdown-timer').textContent = '5';
    }
});
</script>

<?php
}
add_shortcode( 'hy_multi_form', 'hy_multi_form' );

// Enqueue scripts
function hy_multi_form_scripts() {
    wp_enqueue_script('jquery');
    wp_localize_script('jquery', 'hy_ajax_object', array(
        'ajax_url' => admin_url('admin-ajax.php'),
        'nonce' => wp_create_nonce('hy_cash_offer_nonce'),
        'google_api_key' => get_option('hy_google_maps_api_key', 'YOUR_GOOGLE_MAPS_API_KEY') // Add your API key in WordPress options or replace directly
    ));
}
add_action('wp_enqueue_scripts', 'hy_multi_form_scripts');

// Handle AJAX form submission
function hy_handle_cash_offer_submission() {
    // Verify nonce
    if (!wp_verify_nonce($_POST['nonce'], 'hy_cash_offer_nonce')) {
        wp_send_json_error('Security check failed');
    }
    
    // Sanitize form data
    $data = array(
        'property_address' => sanitize_text_field($_POST['property_address']),
        'first_name' => sanitize_text_field($_POST['first_name']),
        'last_name' => sanitize_text_field($_POST['last_name']),
        'phone_number' => sanitize_text_field($_POST['phone_number']),
        'email_address' => sanitize_email($_POST['email_address']),
        'sell_speed' => sanitize_text_field($_POST['sell_speed']),
        'ownership_duration' => sanitize_text_field($_POST['ownership_duration']),
        'repairs_needed' => sanitize_text_field($_POST['repairs_needed']),
        'additional_notes' => sanitize_textarea_field($_POST['additional_notes']),
        'submission_date' => current_time('mysql'),
        'ip_address' => $_SERVER['REMOTE_ADDR']
    );

    // Send notification email (optional)
    $subject = 'New Cash Offer Request from ' . $data['first_name'] . ' ' . $data['last_name'];
    $message = "New cash offer request received:\n\n";
    foreach ($data as $key => $value) {
        if ($key !== 'ip_address' && !empty($value)) {
            $message .= ucfirst(str_replace('_', ' ', $key)) . ": " . $value . "\n";
        }
    }
    
    // Send email notification
    wp_mail(get_option('admin_email'), $subject, $message);
    
    // Here you can add your CRM integration
    // Example integrations:
    
    // 1. Send to webhook/API endpoint:
    // $response = wp_remote_post('https://your-crm.com/api/leads', array(
    //     'headers' => array('Content-Type' => 'application/json'),
    //     'body' => json_encode($data)
    // ));
    
    // 2. Send to Zapier webhook:
    // wp_remote_post('https://hooks.zapier.com/hooks/catch/YOUR_WEBHOOK_ID/', array(
    //     'body' => $data
    // ));
    
    // 3. Integration with specific CRM (example for LeadConnector/GoHighLevel):
    // hy_send_to_gohighlevel($data);
    
    // 4. Store in a different database or send via email to specific address
    
    // Log the submission for debugging (optional)
    error_log('Cash Offer Form Submission: ' . print_r($data, true));
    
    wp_send_json_success('Form submitted successfully');
}
add_action('wp_ajax_hy_submit_cash_offer', 'hy_handle_cash_offer_submission');
add_action('wp_ajax_nopriv_hy_submit_cash_offer', 'hy_handle_cash_offer_submission');

// Add settings page for Google Maps API key
function hy_cash_offer_settings_menu() {
    add_options_page(
        'Cash Offer Form Settings',
        'Cash Offer Form',
        'manage_options',
        'hy-cash-offer-settings',
        'hy_cash_offer_settings_page'
    );
}
add_action('admin_menu', 'hy_cash_offer_settings_menu');

function hy_cash_offer_settings_page() {
    if (isset($_POST['submit'])) {
        update_option('hy_google_maps_api_key', sanitize_text_field($_POST['google_api_key']));
        echo '<div class="notice notice-success"><p>Settings saved!</p></div>';
    }
    
    $api_key = get_option('hy_google_maps_api_key', '');
    ?>
    <div class="wrap">
        <h1>Cash Offer Form Settings</h1>
        <form method="post" action="">
            <table class="form-table">
                <tr>
                    <th scope="row">Google Maps API Key</th>
                    <td>
                        <input type="text" name="google_api_key" value="<?php echo esc_attr($api_key); ?>" class="regular-text" />
                        <p class="description">
                            Get your API key from <a href="https://developers.google.com/maps/documentation/javascript/get-api-key" target="_blank">Google Cloud Console</a>.<br>
                            Make sure to enable "Maps JavaScript API" and "Geocoding API".
                        </p>
                    </td>
                </tr>
            </table>
            <?php submit_button(); ?>
        </form>
        
        <div class="card" style="max-width: 600px; margin-top: 20px;">
            <h2>Setup Instructions</h2>
            <ol>
                <li>Go to <a href="https://console.cloud.google.com/" target="_blank">Google Cloud Console</a></li>
                <li>Create a new project or select an existing one</li>
                <li>Enable the following APIs:
                    <ul>
                        <li>Maps JavaScript API</li>
                        <li>Geocoding API</li>
                        <li>Places API (optional, for autocomplete)</li>
                    </ul>
                </li>
                <li>Create credentials (API Key)</li>
                <li>Restrict the API key to your domain for security</li>
                <li>Copy the API key and paste it above</li>
            </ol>
        </div>
    </div>
    <?php
}

/*
Installation Notes:

1. Google Maps API Setup:
   - Go to Google Cloud Console
   - Enable Maps JavaScript API and Geocoding API
   - Create an API key
   - Add the API key in WordPress Admin > Settings > Cash Offer Form

2. CRM Integration:
   - Form data is collected and sanitized in the hy_handle_cash_offer_submission() function
   - Add your CRM integration code in that function
   - Data is available in the $data array with all form fields
   - Example: send_to_crm($data); or make API calls to your CRM

3. Form Data Structure:
   $data array contains:
   - property_address
   - first_name, last_name
   - phone_number, email_address
   - sell_speed, ownership_duration
   - repairs_needed
   - additional_notes
   - submission_date, ip_address

4. Usage:
   Add [hy_multi_form] shortcode to any page or post

5. Email Notifications:
   - Currently sends email to admin_email
   - Modify the wp_mail() call to change recipient or format
   - Remove if not needed

6. Debugging:
   - Form submissions are logged to error_log for debugging
   - Check your WordPress error logs to see submitted data

Example CRM Integration Functions:

// Example function for webhook integration
function hy_send_to_webhook($data) {
    $webhook_url = 'https://your-crm.com/api/webhook';
    
    $response = wp_remote_post($webhook_url, array(
        'headers' => array(
            'Content-Type' => 'application/json',
            'Authorization' => 'Bearer YOUR_API_KEY'
        ),
        'body' => json_encode($data),
        'timeout' => 30
    ));
    
    if (is_wp_error($response)) {
        error_log('CRM Integration Error: ' . $response->get_error_message());
        return false;
    }
    
    return true;
}

// Example function for GoHighLevel integration
function hy_send_to_gohighlevel($data) {
    $api_url = 'https://rest.gohighlevel.com/v1/contacts/';
    $api_key = 'YOUR_GHL_API_KEY';
    
    $contact_data = array(
        'firstName' => $data['first_name'],
        'lastName' => $data['last_name'], 
        'email' => $data['email_address'],
        'phone' => $data['phone_number'],
        'address1' => $data['property_address'],
        'customFields' => array(
            array('key' => 'sell_speed', 'value' => $data['sell_speed']),
            array('key' => 'ownership_duration', 'value' => $data['ownership_duration']),
            array('key' => 'repairs_needed', 'value' => $data['repairs_needed']),
            array('key' => 'additional_notes', 'value' => $data['additional_notes'])
        )
    );
    
    $response = wp_remote_post($api_url, array(
        'headers' => array(
            'Content-Type' => 'application/json',
            'Authorization' => 'Bearer ' . $api_key
        ),
        'body' => json_encode($contact_data)
    ));
    
    return $response;
}
*/
?>