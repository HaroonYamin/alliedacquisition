<?php
function hy_multi_form($atts) { 
    // Extract shortcode attributes
    $atts = shortcode_atts(array(
        'id' => 'default'
    ), $atts);
    
    // Generate unique form ID and class prefix
    $form_id = 'hy_form_' . sanitize_key($atts['id']);
    $form_num = rand(1000, 9999); // Add random number for extra uniqueness
    $unique_id = $form_id . '_' . $form_num;
    
    ob_start();
?>

<div class="bg-white rounded-3xl py-8 px-7 max-w-md mx-auto shadow-lg relative" id="<?php echo $unique_id; ?>_container">
    <div class="flex justify-between items-center mb-4">
        <h3 class="text-black text-2xl font-semibold">Get Cash Offer</h3>
        <button type="button" class="text-gray-400 hover:text-gray-600" onclick="closeForm('<?php echo $unique_id; ?>')">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
            </svg>
        </button>
    </div>

    <!-- Progress Bar -->
    <div class="flex gap-1 mb-7">
        <div class="h-1.5 w-1/4 <?php echo $unique_id; ?>_form_step done bg-light-green rounded-full transition-all duration-300"></div>
        <div class="h-1.5 w-1/4 <?php echo $unique_id; ?>_form_step bg-gray-200 rounded-full transition-all duration-300"></div>
        <div class="h-1.5 w-1/4 <?php echo $unique_id; ?>_form_step bg-gray-200 rounded-full transition-all duration-300"></div>
        <div class="h-1.5 w-1/4 <?php echo $unique_id; ?>_form_step bg-gray-200 rounded-full transition-all duration-300"></div>
    </div>

    <style>
    .<?php echo $unique_id; ?>_form_step.done {
        opacity: 0.8;
    }
    .<?php echo $unique_id; ?>_form_step {
        transition: all 0.3s ease;
    }
    .<?php echo $unique_id; ?>_question_card.completed {
        border-color: #22c55e !important;
        background-color: #f0fdf4 !important;
    }
    </style>

    <!-- Step Header -->
    <div class="flex justify-between items-center mb-7">
        <h5 class="<?php echo $unique_id; ?>_form_title text-lg font-semibold text-gray-900">What's your property address</h5>
        <p class="text-gray-400 font-medium">Step <span class="<?php echo $unique_id; ?>_current_step">1</span> of 4</p>
    </div>

    <form id="<?php echo $unique_id; ?>" class="<?php echo $unique_id; ?>_form_container" data-form-id="<?php echo $atts['id']; ?>" data-unique-id="<?php echo $unique_id; ?>">
        
        <!-- Step 1: Property Address -->
        <div class="<?php echo $unique_id; ?>_form_step_content active" data-step="1">
            <div class="mb-6">
                <input 
                    type="text" 
                    id="<?php echo $unique_id; ?>_property_address" 
                    name="property_address" 
                    placeholder="Enter Your Complete Address" 
                    class="w-full px-4 py-4 border-2 border-gray-200 rounded-xl focus:border-green-500 focus:outline-none transition-colors text-gray-900 placeholder-gray-400"
                    required
                >
            </div>
            <button 
                type="button" 
                class="<?php echo $unique_id; ?>_next_btn w-full bg-light-green hover:bg-lime-500 text-white font-semibold py-4 px-6 rounded-xl transition-all duration-300 transform cursor-pointer">
                Next
            </button>
        </div>

        <!-- Step 2: Property Confirmation -->
        <div class="<?php echo $unique_id; ?>_form_step_content hidden" data-step="2">
            <div class="mb-6">
                <div id="<?php echo $unique_id; ?>_google_map" class="bg-gray-100 rounded-xl mb-4 h-48 overflow-hidden relative">
                    <div id="<?php echo $unique_id; ?>_map_loading" class="absolute inset-0 flex items-center justify-center bg-gray-100 z-10">
                        <div class="text-center">
                            <div class="animate-spin rounded-full h-8 w-8 border-b-2 border-green-500 mx-auto mb-2"></div>
                            <div class="text-gray-600">Loading map...</div>
                        </div>
                    </div>
                    <div id="<?php echo $unique_id; ?>_map_error" class="absolute inset-0 items-center justify-center bg-red-50 z-10 hidden">
                        <div class="text-center text-red-600">
                            <div class="text-4xl mb-2">📍</div>
                            <div class="text-sm">Unable to load map</div>
                        </div>
                    </div>
                </div>
                <div class="bg-gray-50 rounded-xl p-4 text-center">
                    <span class="<?php echo $unique_id; ?>_display_address text-gray-800 font-medium"></span>
                </div>
            </div>
            <div class="flex gap-4">
                <button 
                    type="button" 
                    class="<?php echo $unique_id; ?>_prev_btn flex-1 bg-gray-100 hover:bg-gray-200 text-gray-700 font-semibold py-4 px-6 rounded-xl transition-all duration-300 cursor-pointer">
                    No
                </button>
                <button 
                    type="button" 
                    class="<?php echo $unique_id; ?>_next_btn flex-1 bg-light-green hover:bg-lime-500 text-white font-semibold py-4 px-6 rounded-xl transition-all duration-300 cursor-pointer">
                    Next
                </button>
            </div>
        </div>

        <!-- Step 3: Owner Information -->
        <div class="<?php echo $unique_id; ?>_form_step_content hidden" data-step="3">
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
                    class="<?php echo $unique_id; ?>_prev_btn flex-1 bg-gray-100 hover:bg-gray-200 text-gray-700 font-semibold py-4 px-6 rounded-xl transition-all duration-300 cursor-pointer">
                    Previous
                </button>
                <button 
                    type="button" 
                    class="<?php echo $unique_id; ?>_next_btn flex-1 bg-light-green hover:bg-lime-500 text-white font-semibold py-4 px-6 rounded-xl transition-all duration-300 cursor-pointer">
                    Next
                </button>
            </div>
        </div>

        <!-- Step 4: Property Information -->
        <div class="<?php echo $unique_id; ?>_form_step_content hidden" data-step="4">
            <div class="space-y-3 mb-6">
                
                <!-- Question 1: How fast do you want to sell? -->
                <div class="<?php echo $unique_id; ?>_question_card border border-gray-200 rounded-lg cursor-pointer hover:border-green-500 hover:bg-gray-50 transition-colors" data-question="sell_speed">
                    <div class="p-4">
                        <div class="flex justify-between items-center mb-2">
                            <span class="text-gray-700 font-medium">How fast do you want to sell?</span>
                            <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                            </svg>
                        </div>
                        <div class="<?php echo $unique_id; ?>_question_value text-green-600 text-sm font-medium"></div>
                    </div>
                </div>

                <!-- Question 2: How long have you owned it? -->
                <div class="<?php echo $unique_id; ?>_question_card border border-gray-200 rounded-lg cursor-pointer hover:border-green-500 hover:bg-gray-50 transition-colors" data-question="ownership_duration">
                    <div class="p-4">
                        <div class="flex justify-between items-center mb-2">
                            <span class="text-gray-700 font-medium">How long have you owned it?</span>
                            <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                            </svg>
                        </div>
                        <div class="<?php echo $unique_id; ?>_question_value text-green-600 text-sm font-medium"></div>
                    </div>
                </div>

                <!-- Question 3: What kind of Repairs/Maintenance does the property need? -->
                <div class="<?php echo $unique_id; ?>_question_card border border-gray-200 rounded-lg cursor-pointer hover:border-green-500 hover:bg-gray-50 transition-colors" data-question="repairs_needed">
                    <div class="p-4">
                        <div class="flex justify-between items-center mb-2">
                            <span class="text-gray-700 font-medium">What kind of Repairs/Maintenance does the property need?</span>
                            <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                            </svg>
                        </div>
                        <div class="<?php echo $unique_id; ?>_question_value text-green-600 text-sm font-medium"></div>
                    </div>
                </div>

                <!-- Question 4: Additional Notes -->
                <div class="<?php echo $unique_id; ?>_question_card border border-gray-200 rounded-lg cursor-pointer hover:border-green-500 hover:bg-gray-50 transition-colors" data-question="additional_notes">
                    <div class="p-4">
                        <div class="flex justify-between items-center mb-2">
                            <span class="text-gray-700 font-medium">Additional Notes</span>
                            <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                            </svg>
                        </div>
                        <div class="<?php echo $unique_id; ?>_question_value text-green-600 text-sm font-medium"></div>
                    </div>
                </div>

            </div>

            <div class="flex gap-4">
                <button 
                    type="button" 
                    class="<?php echo $unique_id; ?>_prev_btn flex-1 bg-gray-100 hover:bg-gray-200 text-gray-700 font-semibold py-4 px-6 rounded-xl transition-all duration-300 cursor-pointer">
                    Previous
                </button>
                <button 
                    type="submit" 
                    id="<?php echo $unique_id; ?>_submit_btn"
                    class="flex-1 bg-light-green hover:bg-lime-500 text-white font-semibold py-4 px-6 rounded-xl transition-all duration-300 cursor-pointer transform">
                    Submit
                </button>
            </div>
        </div>

        <!-- Off-canvas Panel for Question Options -->
        <div id="<?php echo $unique_id; ?>_off_canvas" class="absolute inset-0 z-50 hidden rounded-3xl overflow-hidden">
            <!-- Panel -->
            <div class="<?php echo $unique_id; ?>_off_canvas_panel absolute right-0 top-0 h-full w-full bg-white shadow-xl transform translate-x-full transition-transform duration-300 ease-in-out rounded-3xl">
                <div class="flex flex-col h-full">
                    <!-- Header -->
                    <div class="flex justify-between items-center p-6 border-b border-gray-200">
                        <h3 class="<?php echo $unique_id; ?>_off_canvas_title text-lg font-semibold text-gray-900"></h3>
                        <button type="button" onclick="closeOffCanvas('<?php echo $unique_id; ?>')" class="text-gray-400 hover:text-gray-600">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                        </button>
                    </div>
                    
                    <!-- Content -->
                    <div class="flex-1 overflow-y-auto p-6">
                        <div id="<?php echo $unique_id; ?>_off_canvas_content">
                            <!-- Dynamic content will be inserted here -->
                        </div>
                    </div>
                    

                </div>
            </div>
        </div>

        <!-- Hidden form inputs for storing values -->
        <input type="hidden" name="sell_speed" id="<?php echo $unique_id; ?>_sell_speed_input" required>
        <input type="hidden" name="ownership_duration" id="<?php echo $unique_id; ?>_ownership_duration_input" required>
        <input type="hidden" name="repairs_needed" id="<?php echo $unique_id; ?>_repairs_needed_input" required>
        <input type="hidden" name="selling_reason" id="<?php echo $unique_id; ?>_selling_reason_input">
        <textarea name="additional_notes" id="<?php echo $unique_id; ?>_additional_notes_input" class="hidden"></textarea>

        <!-- Success Message -->
        <div class="<?php echo $unique_id; ?>_form_step_content hidden" id="<?php echo $unique_id; ?>_success_message">
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
                        <span id="<?php echo $unique_id; ?>_countdown_timer" class="text-lg font-bold text-gray-700">5</span>
                    </div>
                </div>
            </div>
        </div>

    </form>
</div>

<script>
// Create form instance class
class HyMultiForm {
    constructor(uniqueId, shortcodeId) {
        this.uniqueId = uniqueId;
        this.shortcodeId = shortcodeId;
        this.currentStep = 1;
        this.totalSteps = 4;
        this.map = null;
        this.geocoder = null;
        this.marker = null;
        this.countdownInterval = null;
        
        this.stepTitles = [
            "What's your property address",
            "Did we find your property?", 
            "Owner Info",
            "Property Info"
        ];
        
        console.log('Creating form instance:', this.uniqueId);
        this.init();
    }
    
    init() {
        console.log('Initializing form:', this.uniqueId);
        
        // Check if form element exists
        const formElement = document.getElementById(this.uniqueId);
        if (!formElement) {
            console.error('Form element not found:', this.uniqueId);
            // Retry after a short delay
            setTimeout(() => this.init(), 100);
            return;
        }
        
        console.log('Form element found, proceeding with initialization:', this.uniqueId);
        this.loadGoogleMapsAPI();
        this.updateStepDisplay();
        this.attachEventListeners();
        
        console.log('Form initialization complete:', this.uniqueId);
    }
    
    loadGoogleMapsAPI() {
        console.log('Loading Google Maps API for form:', this.uniqueId);
        
        if (!hy_ajax_object.google_api_key || hy_ajax_object.google_api_key === 'YOUR_GOOGLE_MAPS_API_KEY') {
            console.warn('Google Maps API key not configured for form: ' + this.uniqueId);
            const loadingDiv = document.getElementById(this.uniqueId + '_map_loading');
            if (loadingDiv) {
                loadingDiv.innerHTML = '<div class="text-center text-yellow-600"><div class="text-4xl mb-2">⚠️</div><div class="text-sm">API key not configured</div></div>';
            }
            return;
        }
        
        // Check if Google Maps is already loaded
        if (typeof google !== 'undefined' && google.maps && google.maps.Geocoder) {
            console.log('Google Maps already loaded, initializing for form:', this.uniqueId);
            this.initGoogleMaps();
            return;
        }
        
        // Load Google Maps API if not already loaded
        if (!window.googleMapsLoading) {
            console.log('Loading Google Maps API script...');
            window.googleMapsLoading = true;
            const script = document.createElement('script');
            script.src = `https://maps.googleapis.com/maps/api/js?key=${hy_ajax_object.google_api_key}&libraries=places&callback=initAllGoogleMaps`;
            script.async = true;
            script.defer = true;
            script.onerror = function() {
                console.error('Failed to load Google Maps API');
                window.googleMapsLoading = false;
            };
            document.head.appendChild(script);
        }
        
        // Wait for Google Maps to load
        const checkGoogleMaps = () => {
            if (typeof google !== 'undefined' && google.maps && google.maps.Geocoder) {
                console.log('Google Maps API loaded, initializing for form:', this.uniqueId);
                this.initGoogleMaps();
            } else {
                setTimeout(checkGoogleMaps, 200);
            }
        };
        checkGoogleMaps();
    }
    
    initGoogleMaps() {
        try {
            this.geocoder = new google.maps.Geocoder();
            console.log('Google Maps Geocoder initialized for form: ' + this.uniqueId);
        } catch (error) {
            console.error('Error initializing Google Maps for form:', this.uniqueId, error);
        }
    }
    
    attachEventListeners() {
        const form = document.getElementById(this.uniqueId);
        
        if (!form) {
            console.error('Form not found:', this.uniqueId);
            return;
        }

        // Handle next buttons
        form.addEventListener('click', (e) => {
            if (e.target.classList.contains(this.uniqueId + '_next_btn')) {
                e.preventDefault();
                console.log('Next button clicked for form:', this.uniqueId);
                if (this.validateCurrentStep()) {
                    if (this.currentStep < this.totalSteps) {
                        this.nextStep();
                    }
                }
            }
        });

        // Handle previous buttons  
        form.addEventListener('click', (e) => {
            if (e.target.classList.contains(this.uniqueId + '_prev_btn')) {
                e.preventDefault();
                console.log('Previous button clicked for form:', this.uniqueId);
                if (this.currentStep > 1) {
                    this.prevStep();
                }
            }
        });

        // Handle expandable question clicks
        form.addEventListener('click', (e) => {
            const questionCard = e.target.closest('.' + this.uniqueId + '_question_card');
            if (questionCard) {
                e.preventDefault();
                const questionType = questionCard.getAttribute('data-question');
                console.log('Question card clicked for form:', this.uniqueId, 'question:', questionType);
                this.openOffCanvas(questionType);
            }
        });

        // Handle radio option selection in off-canvas
        form.addEventListener('click', (e) => {
            const radioOption = e.target.closest('.' + this.uniqueId + '_off_canvas_radio_option');
            if (radioOption) {
                e.preventDefault();
                const radio = radioOption.querySelector('input[type="radio"]');
                if (radio) {
                    const container = radioOption.querySelector('div');
                    
                    console.log('Radio option selected for form:', this.uniqueId);
                    
                    // Clear previous selections in this group
                    const groupName = radio.name;
                    const allOptionsInGroup = form.querySelectorAll(`input[name="${groupName}"]`);
                    allOptionsInGroup.forEach(input => {
                        const parentOption = input.closest('.' + this.uniqueId + '_off_canvas_radio_option');
                        if (parentOption) {
                            const parentDiv = parentOption.querySelector('div');
                            const span = parentOption.querySelector('span');
                            if (parentDiv) {
                                parentDiv.classList.remove('border-green-500', 'bg-green-50');
                                parentDiv.classList.add('border-gray-200');
                            }
                            if (span) {
                                span.classList.remove('text-green-600', 'font-semibold');
                                span.classList.add('text-gray-700');
                            }
                            input.checked = false;
                        }
                    });
                    
                    // Select current option
                    radio.checked = true;
                    if (container) {
                        container.classList.remove('border-gray-200');
                        container.classList.add('border-green-500', 'bg-green-50');
                    }
                    const span = radioOption.querySelector('span');
                    if (span) {
                        span.classList.remove('text-gray-700');
                        span.classList.add('text-green-600', 'font-semibold');
                    }
                    
                    // Auto-save the selection and close after a short delay
                    setTimeout(() => {
                        this.saveOffCanvasSelection();
                        this.closeOffCanvas();
                    }, 500);
                }
            }
        });

        // Handle save notes button
        form.addEventListener('click', (e) => {
            if (e.target.classList.contains(this.uniqueId + '_save_notes')) {
                e.preventDefault();
                const textarea = e.target.previousElementSibling;
                if (textarea) {
                    // Save the notes
                    this.saveOffCanvasSelection();
                    
                    // Show saved feedback
                    e.target.textContent = 'Saved!';
                    e.target.classList.remove('bg-light-green', 'hover:bg-lime-500');
                    e.target.classList.add('bg-green-600');
                    
                    setTimeout(() => {
                        this.closeOffCanvas();
                        // Reset button text for next time
                        setTimeout(() => {
                            e.target.textContent = 'Save Notes';
                            e.target.classList.remove('bg-green-600');
                            e.target.classList.add('bg-light-green', 'hover:bg-lime-500');
                        }, 300);
                    }, 800);
                }
            }
        });

        // Handle form submission
        form.addEventListener('submit', (e) => {
            e.preventDefault();
            console.log('Form submitted:', this.uniqueId);
            this.handleSubmit(e);
        });
        
        console.log('Event listeners attached for form:', this.uniqueId);
    }
    
    nextStep() {
        this.currentStep++;
        this.updateStepDisplay();
        
        // Special handling for step 2 (property confirmation with map)
        if (this.currentStep === 2) {
            const address = document.getElementById(this.uniqueId + '_property_address').value;
            const displayAddress = document.querySelector('.' + this.uniqueId + '_display_address');
            if (displayAddress) {
                displayAddress.textContent = address;
            }
            this.loadMapForAddress(address);
        }
        
        // Keep successful validation border colors when moving forward
        const previousStepElement = document.querySelector('.' + this.uniqueId + '_form_step_content[data-step="' + (this.currentStep - 1) + '"]');
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

    prevStep() {
        this.currentStep--;
        this.updateStepDisplay();
    }

    updateStepDisplay() {
        // Update step content visibility
        document.querySelectorAll('.' + this.uniqueId + '_form_step_content').forEach(step => {
            step.classList.add('hidden');
            step.classList.remove('active');
        });
        
        const currentStepElement = document.querySelector('.' + this.uniqueId + '_form_step_content[data-step="' + this.currentStep + '"]');
        if (currentStepElement) {
            currentStepElement.classList.remove('hidden');
            currentStepElement.classList.add('active');
        }

        // Update progress bar (4 visual steps)
        document.querySelectorAll('.' + this.uniqueId + '_form_step').forEach((step, index) => {
            if (index === 0) {
                // First step is always done and green
                step.classList.remove('bg-gray-200');
                step.classList.add('bg-light-green', 'done');
            } else if (index < this.currentStep - 1) {
                // Completed steps (excluding first which is always done)
                step.classList.remove('bg-gray-200');
                step.classList.add('bg-light-green', 'done');
            } else if (index === this.currentStep - 1) {
                // Current step
                step.classList.remove('bg-gray-200', 'done');
                step.classList.add('bg-light-green');
            } else {
                // Future steps
                step.classList.remove('bg-light-green', 'done');
                step.classList.add('bg-gray-200');
            }
        });

        // Update step counter and title
        const currentStepSpan = document.querySelector('.' + this.uniqueId + '_current_step');
        const titleElement = document.querySelector('.' + this.uniqueId + '_form_title');
        
        if (currentStepSpan) currentStepSpan.textContent = this.currentStep;
        if (titleElement) titleElement.textContent = this.stepTitles[this.currentStep - 1];
    }

    validateCurrentStep() {
        const currentStepElement = document.querySelector('.' + this.uniqueId + '_form_step_content[data-step="' + this.currentStep + '"]');
        
        if (!currentStepElement) {
            console.error('Current step element not found for form:', this.uniqueId, 'step:', this.currentStep);
            return false;
        }
        
        let isValid = true;
        console.log('Validating step', this.currentStep, 'for form:', this.uniqueId);

        // Validate required inputs
        const requiredInputs = currentStepElement.querySelectorAll('input[required], textarea[required]');
        console.log('Found required inputs:', requiredInputs.length);
        
        requiredInputs.forEach(input => {
            if (!input.value.trim()) {
                console.log('Empty required input found:', input.name);
                input.classList.add('border-red-500');
                input.classList.remove('border-gray-200', 'border-green-500');
                isValid = false;
                
                // Reset red border after 2 seconds
                setTimeout(() => {
                    input.classList.remove('border-red-500');
                    input.classList.add('border-gray-200');
                }, 2000);
            } else {
                console.log('Valid input:', input.name, '=', input.value);
                input.classList.remove('border-red-500', 'border-gray-200');
                input.classList.add('border-green-500');
            }
        });

        // Validate radio button groups in step 4
        if (this.currentStep === 4) {
            const requiredQuestions = ['sell_speed', 'ownership_duration', 'repairs_needed'];
            requiredQuestions.forEach(questionType => {
                const hiddenInput = document.getElementById(this.uniqueId + '_' + questionType + '_input');
                if (!hiddenInput || !hiddenInput.value) {
                    console.log('Missing required question:', questionType);
                    isValid = false;
                    // Highlight the question that needs attention
                    const questionCard = document.querySelector('.' + this.uniqueId + '_question_card[data-question="' + questionType + '"]');
                    if (questionCard) {
                        questionCard.classList.add('border-red-500');
                        questionCard.classList.remove('border-gray-200');
                        
                        // Reset red border after 2 seconds
                        setTimeout(() => {
                            questionCard.classList.remove('border-red-500');
                            questionCard.classList.add('border-gray-200');
                        }, 2000);
                    }
                } else {
                    console.log('Valid question:', questionType, '=', hiddenInput.value);
                }
            });
        }

        if (!isValid) {
            console.log('Validation failed for form:', this.uniqueId);
            // Add shake animation
            currentStepElement.classList.add('animate-pulse');
            setTimeout(() => {
                currentStepElement.classList.remove('animate-pulse');
            }, 500);
        } else {
            console.log('Validation passed for form:', this.uniqueId);
        }

        return isValid;
    }

    openOffCanvas(questionType) {
        const offCanvas = document.getElementById(this.uniqueId + '_off_canvas');
        const panel = offCanvas.querySelector('.' + this.uniqueId + '_off_canvas_panel');
        const title = offCanvas.querySelector('.' + this.uniqueId + '_off_canvas_title');
        const content = document.getElementById(this.uniqueId + '_off_canvas_content');
        
        // Set title and content based on question type
        const questionData = this.getQuestionData(questionType);
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
        const currentValue = document.getElementById(this.uniqueId + '_' + questionType + '_input').value;
        if (currentValue) {
            const radio = content.querySelector(`input[value="${currentValue}"]`);
            if (radio) {
                radio.checked = true;
                const radioOption = radio.closest('.' + this.uniqueId + '_off_canvas_radio_option');
                if (radioOption) {
                    const container = radioOption.querySelector('div');
                    const span = radioOption.querySelector('span');
                    if (container) {
                        container.classList.remove('border-gray-200');
                        container.classList.add('border-green-500', 'bg-green-50');
                    }
                    if (span) {
                        span.classList.remove('text-gray-700');
                        span.classList.add('text-green-600', 'font-semibold');
                    }
                }
            }
        }
        
        // For textarea, set current value
        if (questionType === 'additional_notes') {
            const textarea = content.querySelector('textarea');
            const currentNotesValue = document.getElementById(this.uniqueId + '_additional_notes_input').value;
            if (textarea && currentNotesValue) {
                textarea.value = currentNotesValue;
            }
        }
    }

    closeOffCanvas() {
        const offCanvas = document.getElementById(this.uniqueId + '_off_canvas');
        const panel = offCanvas.querySelector('.' + this.uniqueId + '_off_canvas_panel');
        
        // Trigger slide-out animation
        panel.classList.remove('translate-x-0');
        panel.classList.add('translate-x-full');
        
        // Hide after animation
        setTimeout(() => {
            offCanvas.classList.add('hidden');
        }, 300);
    }

    saveOffCanvasSelection() {
        const offCanvas = document.getElementById(this.uniqueId + '_off_canvas');
        const questionType = offCanvas.getAttribute('data-current-question');
        
        if (!questionType) {
            console.error('No current question type found');
            return;
        }
        
        const content = document.getElementById(this.uniqueId + '_off_canvas_content');
        const hiddenInput = document.getElementById(this.uniqueId + '_' + questionType + '_input');
        const questionCard = document.querySelector('.' + this.uniqueId + '_question_card[data-question="' + questionType + '"]');
        
        if (!content || !hiddenInput || !questionCard) {
            console.error('Missing elements for saving off-canvas selection:', {
                content: !!content,
                hiddenInput: !!hiddenInput,
                questionCard: !!questionCard,
                questionType: questionType
            });
            return;
        }
        
        const questionValue = questionCard.querySelector('.' + this.uniqueId + '_question_value');
        if (!questionValue) {
            console.error('Question value element not found');
            return;
        }
        
        console.log('Saving off-canvas selection for:', questionType, 'form:', this.uniqueId);
        
        if (questionType === 'additional_notes') {
            // Handle textarea
            const textarea = content.querySelector('textarea');
            if (textarea) {
                hiddenInput.value = textarea.value;
                questionValue.textContent = textarea.value.trim() ? 'Added' : '';
                console.log('Saved additional notes:', textarea.value);
            }
        } else {
            // Handle radio buttons
            const selectedRadio = content.querySelector('input[type="radio"]:checked');
            if (selectedRadio) {
                hiddenInput.value = selectedRadio.value;
                const selectedOption = selectedRadio.closest('.' + this.uniqueId + '_off_canvas_radio_option');
                const selectedText = selectedOption ? selectedOption.querySelector('span').textContent : selectedRadio.value;
                questionValue.textContent = selectedText;
                
                // Mark question card as completed
                questionCard.classList.remove('border-gray-200');
                questionCard.classList.add('border-green-500', 'bg-green-50', 'completed');
                
                console.log('Saved radio selection:', selectedRadio.value, 'text:', selectedText);
            }
        }
    }

    getQuestionData(questionType) {
        const uniqueClass = this.uniqueId + '_off_canvas_radio_option';
        
        const questionData = {
            sell_speed: {
                title: 'How fast do you want to sell?',
                content: `
                    <div class="space-y-3">
                        <label class="${uniqueClass} block">
                            <input type="radio" name="sell_speed_temp" value="asap" class="hidden">
                            <div class="border border-gray-200 rounded-lg p-4 cursor-pointer hover:border-green-500 hover:bg-green-50 transition-colors">
                                <span class="text-gray-700 font-medium">ASAP</span>
                            </div>
                        </label>
                        <label class="${uniqueClass} block">
                            <input type="radio" name="sell_speed_temp" value="1-2_months" class="hidden">
                            <div class="border border-gray-200 rounded-lg p-4 cursor-pointer hover:border-green-500 hover:bg-green-50 transition-colors">
                                <span class="text-gray-700 font-medium">1-2 Months</span>
                            </div>
                        </label>
                        <label class="${uniqueClass} block">
                            <input type="radio" name="sell_speed_temp" value="3-6_months" class="hidden">
                            <div class="border border-gray-200 rounded-lg p-4 cursor-pointer hover:border-green-500 hover:bg-green-50 transition-colors">
                                <span class="text-gray-700 font-medium">3-6 Months</span>
                            </div>
                        </label>
                        <label class="${uniqueClass} block">
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
                        <label class="${uniqueClass} block">
                            <input type="radio" name="ownership_duration_temp" value="0-5_years" class="hidden">
                            <div class="border border-gray-200 rounded-lg p-4 cursor-pointer hover:border-green-500 hover:bg-green-50 transition-colors">
                                <span class="text-gray-700 font-medium">0 - 5 Years</span>
                            </div>
                        </label>
                        <label class="${uniqueClass} block">
                            <input type="radio" name="ownership_duration_temp" value="5-15_years" class="hidden">
                            <div class="border border-gray-200 rounded-lg p-4 cursor-pointer hover:border-green-500 hover:bg-green-50 transition-colors">
                                <span class="text-gray-700 font-medium">5 - 15 Years</span>
                            </div>
                        </label>
                        <label class="${uniqueClass} block">
                            <input type="radio" name="ownership_duration_temp" value="15-25_years" class="hidden">
                            <div class="border border-gray-200 rounded-lg p-4 cursor-pointer hover:border-green-500 hover:bg-green-50 transition-colors">
                                <span class="text-gray-700 font-medium">15 - 25 Years</span>
                            </div>
                        </label>
                        <label class="${uniqueClass} block">
                            <input type="radio" name="ownership_duration_temp" value="25_plus_years" class="hidden">
                            <div class="border border-gray-200 rounded-lg p-4 cursor-pointer hover:border-green-500 hover:bg-green-50 transition-colors">
                                <span class="text-gray-700 font-medium">25+ Years</span>
                            </div>
                        </label>
                    </div>
                `
            },
            repairs_needed: {
                title: 'What kind of Repairs/Maintenance does the property need?',
                content: `
                    <div class="space-y-3">
                        <label class="${uniqueClass} block">
                            <input type="radio" name="repairs_needed_temp" value="full_gut" class="hidden">
                            <div class="border border-gray-200 rounded-lg p-4 cursor-pointer hover:border-green-500 hover:bg-green-50 transition-colors">
                                <span class="text-gray-700 font-medium">$$$ | Full Gut - Everything</span>
                            </div>
                        </label>
                        <label class="${uniqueClass} block">
                            <input type="radio" name="repairs_needed_temp" value="remodel" class="hidden">
                            <div class="border border-gray-200 rounded-lg p-4 cursor-pointer hover:border-green-500 hover:bg-green-50 transition-colors">
                                <span class="text-gray-700 font-medium">$$ | Remodel - Kitchen, Bathrooms, Roof</span>
                            </div>
                        </label>
                        <label class="${uniqueClass} block">
                            <input type="radio" name="repairs_needed_temp" value="flooring_paint" class="hidden">
                            <div class="border border-gray-200 rounded-lg p-4 cursor-pointer hover:border-green-500 hover:bg-green-50 transition-colors">
                                <span class="text-gray-700 font-medium">$ | Flooring & Paint</span>
                            </div>
                        </label>
                        <label class="${uniqueClass} block">
                            <input type="radio" name="repairs_needed_temp" value="tv_ready" class="hidden">
                            <div class="border border-gray-200 rounded-lg p-4 cursor-pointer hover:border-green-500 hover:bg-green-50 transition-colors">
                                <span class="text-gray-700 font-medium">None - TV Commercial Ready</span>
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
                            id="${this.uniqueId}_notes_textarea"
                            placeholder="Tell us more about your property, timeline, or any specific requirements..."
                            class="w-full h-64 px-4 py-3 border border-gray-200 rounded-lg focus:border-green-500 focus:outline-none transition-colors text-gray-900 placeholder-gray-400 resize-none"
                        ></textarea>
                        <button 
                            type="button" 
                            class="${this.uniqueId}_save_notes w-full mt-4 bg-light-green hover:bg-lime-500 text-white font-semibold py-3 px-6 rounded-lg transition-all duration-300"
                        >
                            Save Notes
                        </button>
                    </div>
                `
            }
        };
        
        return questionData[questionType] || { title: '', content: '' };
    }

    loadMapForAddress(address) {
        const mapContainer = document.getElementById(this.uniqueId + '_google_map');
        const loadingDiv = document.getElementById(this.uniqueId + '_map_loading');
        const errorDiv = document.getElementById(this.uniqueId + '_map_error');
        
        // Show loading state
        loadingDiv.classList.remove('hidden');
        errorDiv.classList.add('hidden');

        // Check if geocoder is available
        if (!this.geocoder) {
            setTimeout(() => this.loadMapForAddress(address), 500);
            return;
        }

        this.geocoder.geocode({ address: address }, (results, status) => {
            if (status === 'OK') {
                // Hide loading
                loadingDiv.classList.add('hidden');
                
                // Initialize map
                const location = results[0].geometry.location;
                this.map = new google.maps.Map(mapContainer, {
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
                this.marker = new google.maps.Marker({
                    position: location,
                    map: this.map,
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

                this.marker.addListener('click', () => {
                    infoWindow.open(this.map, this.marker);
                });
            } else {
                // Show error state
                loadingDiv.classList.add('hidden');
                errorDiv.classList.remove('hidden');
                console.error('Geocoding failed: ' + status);
            }
        });
    }

    handleSubmit(e) {
        if (!this.validateCurrentStep()) {
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
        formData.append('form_id', this.shortcodeId);
        
        // Get all form values
        const inputs = document.querySelectorAll(`#${this.uniqueId} input:not([name$="_temp"]), #${this.uniqueId} textarea`);
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
                this.showSuccess();
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
    }

    showSuccess() {
        document.querySelectorAll('.' + this.uniqueId + '_form_step_content').forEach(step => {
            step.classList.add('hidden');
        });
        document.getElementById(this.uniqueId + '_success_message').classList.remove('hidden');
        
        // Update header
        const titleElement = document.querySelector('.' + this.uniqueId + '_form_title');
        const currentStepSpan = document.querySelector('.' + this.uniqueId + '_current_step');
        
        if (titleElement) titleElement.textContent = 'Form Submitted';
        if (currentStepSpan) currentStepSpan.textContent = '✓';
        
        // Complete all progress steps
        document.querySelectorAll('.' + this.uniqueId + '_form_step').forEach((step, index) => {
            step.classList.remove('bg-gray-200');
            step.classList.add('bg-light-green');
            if (index === 0) {
                step.classList.add('done'); // First step always done
            } else {
                step.classList.add('done'); // All steps done on success
            }
        });
        
        // Start 5-second countdown timer
        this.startCountdownTimer();
    }

    startCountdownTimer() {
        let countdown = 5;
        const timerElement = document.getElementById(this.uniqueId + '_countdown_timer');
        
        // Clear any existing timer
        if (this.countdownInterval) {
            clearInterval(this.countdownInterval);
        }
        
        this.countdownInterval = setInterval(() => {
            countdown--;
            if (timerElement) timerElement.textContent = countdown;
            
            if (countdown <= 0) {
                clearInterval(this.countdownInterval);
                this.resetFormToInitial();
            }
        }, 1000);
    }

    resetFormToInitial() {
        // Clear countdown timer if running
        if (this.countdownInterval) {
            clearInterval(this.countdownInterval);
        }
        
        // Reset to step 1
        this.currentStep = 1;
        
        // Clear all form inputs
        document.getElementById(this.uniqueId).reset();
        
        // Clear hidden inputs
        document.querySelectorAll(`#${this.uniqueId} input[id$="_input"]`).forEach(input => {
            input.value = '';
        });
        
        // Clear question values
        document.querySelectorAll(`#${this.uniqueId} .${this.uniqueId}_question_value`).forEach(el => {
            el.textContent = '';
        });
        
        // Reset all input border colors to default
        document.querySelectorAll(`#${this.uniqueId} input, #${this.uniqueId} textarea`).forEach(input => {
            input.classList.remove('border-red-500', 'border-green-500');
            input.classList.add('border-gray-200');
        });
        
        // Reset question card border colors
        document.querySelectorAll(`#${this.uniqueId} .${this.uniqueId}_question_card`).forEach(card => {
            card.classList.remove('border-red-500', 'border-green-500', 'bg-green-50', 'completed');
            card.classList.add('border-gray-200');
        });
        
        // Reset progress bar - first step always done, others reset
        document.querySelectorAll('.' + this.uniqueId + '_form_step').forEach((step, index) => {
            if (index === 0) {
                // First step is always done and green
                step.classList.remove('bg-gray-200');
                step.classList.add('bg-light-green', 'done');
            } else {
                // Reset other steps
                step.classList.remove('bg-light-green', 'done');
                step.classList.add('bg-gray-200');
            }
        });
        
        // Reset submit button
        const submitBtn = document.getElementById(this.uniqueId + '_submit_btn');
        if (submitBtn) {
            submitBtn.textContent = 'Submit';
            submitBtn.disabled = false;
        }
        
        // Reset form display
        this.updateStepDisplay();
        
        // Reset countdown timer display
        const timerElement = document.getElementById(this.uniqueId + '_countdown_timer');
        if (timerElement) timerElement.textContent = '5';
    }
}

// Store form instances globally
if (!window.hyFormInstances) {
    window.hyFormInstances = {};
}

// Store form data for initialization
if (!window.hyFormData) {
    window.hyFormData = {};
}

// Store this form's data for later initialization
window.hyFormData['<?php echo $unique_id; ?>'] = {
    uniqueId: '<?php echo $unique_id; ?>',
    shortcodeId: '<?php echo $atts['id']; ?>'
};

// Initialize all forms when DOM is ready
if (!window.hyFormsInitialized) {
    window.hyFormsInitialized = false;
    
    document.addEventListener('DOMContentLoaded', function() {
        // Wait a bit to ensure all shortcodes are processed
        setTimeout(function() {
            Object.values(window.hyFormData).forEach(formData => {
                if (!window.hyFormInstances[formData.uniqueId]) {
                    window.hyFormInstances[formData.uniqueId] = new HyMultiForm(formData.uniqueId, formData.shortcodeId);
                    console.log('Initialized form:', formData.uniqueId);
                }
            });
            window.hyFormsInitialized = true;
        }, 100);
    });
}

// Global callback for Google Maps API
window.initAllGoogleMaps = function() {
    console.log('Initializing Google Maps for all forms');
    Object.values(window.hyFormInstances).forEach(instance => {
        instance.initGoogleMaps();
    });
};

// Global functions for onclick handlers
window.closeForm = function(uniqueId) {
    console.log('Form closed: ' + uniqueId);
    // Add your close form logic here
    const container = document.getElementById(uniqueId + '_container');
    if (container) {
        container.style.display = 'none';
    }
};

window.closeOffCanvas = function(uniqueId) {
    if (window.hyFormInstances[uniqueId]) {
        window.hyFormInstances[uniqueId].closeOffCanvas();
    }
};
</script>

<?php
    return ob_get_clean();
}
add_shortcode( 'hy_multi_form', 'hy_multi_form' );

// Enqueue scripts
function hy_multi_form_scripts() {
    wp_enqueue_script('jquery');
    wp_localize_script('jquery', 'hy_ajax_object', array(
        'ajax_url' => admin_url('admin-ajax.php'),
        'nonce' => wp_create_nonce('hy_cash_offer_nonce'),
        'google_api_key' => get_option('hy_google_maps_api_key', 'YOUR_GOOGLE_MAPS_API_KEY')
    ));
}
add_action('wp_enqueue_scripts', 'hy_multi_form_scripts');

// Handle AJAX form submission
function hy_handle_cash_offer_submission() {
    // Verify nonce
    if (!wp_verify_nonce($_POST['nonce'], 'hy_cash_offer_nonce')) {
        wp_send_json_error('Security check failed');
    }
    
    // Get form ID for tracking multiple forms
    $form_id = isset($_POST['form_id']) ? sanitize_text_field($_POST['form_id']) : 'unknown';
    
    // Sanitize form data
    $data = array(
        'form_id' => $form_id,
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
    $subject = 'New Cash Offer Request from ' . $data['first_name'] . ' ' . $data['last_name'] . ' (Form: ' . $form_id . ')';
    $message = "New cash offer request received:\n\n";
    foreach ($data as $key => $value) {
        if ($key !== 'ip_address' && !empty($value)) {
            $message .= ucfirst(str_replace('_', ' ', $key)) . ": " . $value . "\n";
        }
    }
    
    // Send email notification
    wp_mail(get_option('admin_email'), $subject, $message);
    
    // Log the submission for debugging (optional)
    error_log('Cash Offer Form Submission (' . $form_id . '): ' . print_r($data, true));
    
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
            
            <h3>How to Use</h3>
            <p>Use the shortcode <code>[hy_multi_form id="unique_form_id"]</code> to display the form on any page or post.</p>
            <p>Examples:</p>
            <ul>
                <li><code>[hy_multi_form id="homepage"]</code></li>
                <li><code>[hy_multi_form id="sidebar"]</code></li>
                <li><code>[hy_multi_form id="contact_page"]</code></li>
            </ul>
        </div>
    </div>
    <?php
}
?>