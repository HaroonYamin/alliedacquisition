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

<div class="bg-white rounded-3xl sm:py-8 sm:px-7 py-5 px-4 max-w-md mx-auto shadow-lg relative" id="<?php echo $unique_id; ?>_container">
    <div class="flex justify-between items-center mb-4">
        <h3 class="text-black text-2xl font-semibold">Get Cash Offer</h3>
    </div>

    <div class="flex gap-1 mb-7">
        <div class="h-1.5 w-1/4 <?php echo $unique_id; ?>_form_step bg-light-green rounded-full transition-all duration-300"></div>
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
    /* Google Places Autocomplete Styling */
    .pac-container {
        border-radius: 12px;
        border: 1px solid #e5e7eb;
        box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
        margin-top: 4px;
        font-family: system-ui, -apple-system, sans-serif;
        z-index: 9999 !important; /* Ensure it appears above other elements */
    }
    .pac-item {
        padding: 12px 16px;
        border-bottom: 1px solid #f3f4f6;
        cursor: pointer;
        font-size: 14px;
    }
    .pac-item:hover {
        background-color: #f9fafb;
    }
    .pac-item-query {
        font-weight: 600;
        color: #111827;
    }
    .pac-matched {
        font-weight: 700;
        color: #059669;
    }
    .pac-icon {
        background-image: url('data:image/svg+xml;charset=UTF-8,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="%2359a97b" stroke-width="2"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg>') !important;
        background-size: contain;
        background-repeat: no-repeat;
        background-position: center center;
        width: 20px;
        height: 20px;
        margin-top: 2px;
        transform: translateY(2px);
    }
    </style>

    <div class="flex justify-between items-center mb-7">
        <h5 class="<?php echo $unique_id; ?>_form_title text-lg font-semibold text-gray-900">Your Address</h5>
        <p class="text-gray-400 font-medium">Step <span class="<?php echo $unique_id; ?>_current_step">1</span> of 4</p>
    </div>

    <form id="<?php echo $unique_id; ?>" class="<?php echo $unique_id; ?>_form_container" data-form-id="<?php echo esc_attr($atts['id']); ?>" data-unique-id="<?php echo esc_attr($unique_id); ?>" novalidate>
        
        <div class="<?php echo $unique_id; ?>_form_step_content active" data-step="1">
            <div class="mb-6 relative">
                <input 
                    type="text" 
                    id="<?php echo $unique_id; ?>_property_address" 
                    name="property_address" 
                    placeholder="Start typing your address..." 
                    class="w-full px-4 py-4 border-2 border-gray-200 rounded-xl focus:border-green-500 focus:outline-none transition-colors text-gray-900 placeholder-gray-400"
                    autocomplete="off"
                    required
                >
            </div>
            <button 
                type="button" 
                id="<?php echo $unique_id; ?>_next_step1"
                class="<?php echo $unique_id; ?>_next_btn w-full bg-light-green hover:bg-lime-500 text-white font-semibold py-4 px-6 rounded-xl transition-all duration-300 transform cursor-pointer opacity-50"
                disabled>
                Next
            </button>
        </div>

        <div class="<?php echo $unique_id; ?>_form_step_content hidden" data-step="2">
            <div class="mb-6">
                <div id="<?php echo $unique_id; ?>_google_map" class="bg-gray-100 rounded-xl mb-4 h-64 overflow-hidden relative">
                    <div id="<?php echo $unique_id; ?>_map_loading" class="absolute inset-0 flex items-center justify-center bg-gray-100 z-10">
                        <div class="text-center">
                            <div class="animate-spin rounded-full h-8 w-8 border-b-2 border-green-500 mx-auto mb-2"></div>
                            <div class="text-gray-600">Loading map...</div>
                        </div>
                    </div>
                </div>
                <div class="bg-gray-50 rounded-xl p-4">
                    <div class="flex items-start gap-3">
                        <div class="flex-shrink-0 w-6 h-6 bg-green-100 rounded-full flex items-center justify-center mt-1">
                            <svg class="w-3 h-3 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                            </svg>
                        </div>
                        <div>
                            <div class="text-sm text-gray-600 mb-1">Selected Property Address:</div>
                            <div class="<?php echo $unique_id; ?>_display_address text-gray-800 font-medium text-sm leading-relaxed"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex flex-col sm:flex-row gap-4">
                <button type="button" class="<?php echo $unique_id; ?>_prev_btn flex-1 bg-gray-100 hover:bg-gray-200 text-gray-700 font-semibold py-4 px-6 rounded-xl transition-all">
                    ← No, Go Back
                </button>
                <button type="button" class="<?php echo $unique_id; ?>_next_btn flex-1 bg-light-green hover:bg-lime-500 text-white font-semibold py-4 px-6 rounded-xl transition-all">
                    Yes, Continue →
                </button>
            </div>
        </div>

        <div class="<?php echo $unique_id; ?>_form_step_content hidden" data-step="3">
            <div class="space-y-4 mb-6">
                <div class="grid grid-cols-2 gap-4">
                    <input type="text" name="first_name" placeholder="First Name" class="w-full px-4 py-4 border-2 border-gray-200 rounded-xl focus:border-green-500 focus:outline-none" required>
                    <input type="text" name="last_name" placeholder="Last Name" class="w-full px-4 py-4 border-2 border-gray-200 rounded-xl focus:border-green-500 focus:outline-none" required>
                </div>
                <input type="tel" name="phone_number" placeholder="Phone Number" class="w-full px-4 py-4 border-2 border-gray-200 rounded-xl focus:border-green-500 focus:outline-none" required>
                <input type="email" name="email_address" placeholder="Email Address" class="w-full px-4 py-4 border-2 border-gray-200 rounded-xl focus:border-green-500 focus:outline-none" required>
            </div>
            <div class="flex flex-col sm:flex-row gap-4">
                <button type="button" class="<?php echo $unique_id; ?>_prev_btn flex-1 bg-gray-100 hover:bg-gray-200 text-gray-700 font-semibold py-4 px-6 rounded-xl">
                    ← Previous
                </button>
                <button type="button" class="<?php echo $unique_id; ?>_next_btn flex-1 bg-light-green hover:bg-lime-500 text-white font-semibold py-4 px-6 rounded-xl">
                    Next →
                </button>
            </div>
        </div>

        <div class="<?php echo $unique_id; ?>_form_step_content hidden" data-step="4">
            <div class="space-y-3 mb-6">
                <div class="<?php echo $unique_id; ?>_question_card border border-gray-200 rounded-lg cursor-pointer" data-question="sell_speed">
                    <div class="p-4"><div class="flex justify-between items-center mb-2"><span class="text-gray-700 font-medium">How fast do you want to sell?</span><svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg></div><div class="<?php echo $unique_id; ?>_question_value text-green-600 text-sm font-medium"></div></div>
                </div>
                <div class="<?php echo $unique_id; ?>_question_card border border-gray-200 rounded-lg cursor-pointer" data-question="ownership_duration">
                    <div class="p-4"><div class="flex justify-between items-center mb-2"><span class="text-gray-700 font-medium">How long have you owned it?</span><svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg></div><div class="<?php echo $unique_id; ?>_question_value text-green-600 text-sm font-medium"></div></div>
                </div>
                <div class="<?php echo $unique_id; ?>_question_card border border-gray-200 rounded-lg cursor-pointer" data-question="repairs_needed">
                     <div class="p-4"><div class="flex justify-between items-center mb-2"><span class="text-gray-700 font-medium">Repairs/Maintenance needed?</span><svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg></div><div class="<?php echo $unique_id; ?>_question_value text-green-600 text-sm font-medium"></div></div>
                </div>
                <div class="<?php echo $unique_id; ?>_question_card border border-gray-200 rounded-lg cursor-pointer" data-question="additional_notes">
                     <div class="p-4"><div class="flex justify-between items-center mb-2"><span class="text-gray-700 font-medium">Additional Notes</span><svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg></div><div class="<?php echo $unique_id; ?>_question_value text-green-600 text-sm font-medium"></div></div>
                </div>
            </div>
            <div class="flex flex-col sm:flex-row gap-4">
                <button type="button" class="<?php echo $unique_id; ?>_prev_btn flex-1 bg-gray-100 hover:bg-gray-200 text-gray-700 font-semibold py-4 px-6 rounded-xl">
                    ← Previous
                </button>
                <button type="submit" id="<?php echo $unique_id; ?>_submit_btn" class="flex-1 bg-light-green hover:bg-lime-500 text-white font-semibold py-4 px-6 rounded-xl">
                    Submit →
                </button>
            </div>
        </div>

        <div id="<?php echo $unique_id; ?>_off_canvas" class="absolute inset-0 z-50 hidden rounded-3xl overflow-hidden">
            <div class="<?php echo $unique_id; ?>_off_canvas_panel absolute right-0 top-0 h-full w-full bg-white shadow-xl transform translate-x-full transition-transform duration-300 ease-in-out rounded-3xl">
                <div class="flex flex-col h-full">
                    <div class="flex justify-between items-center p-6 border-b"><h3 class="<?php echo $unique_id; ?>_off_canvas_title text-lg font-semibold"></h3><button type="button" onclick="closeOffCanvas('<?php echo $unique_id; ?>')" class="text-gray-400 hover:text-gray-600"><svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg></button></div>
                    <div class="flex-1 overflow-y-auto p-6"><div id="<?php echo $unique_id; ?>_off_canvas_content"></div></div>
                </div>
            </div>
        </div>

        <input type="hidden" name="sell_speed" id="<?php echo $unique_id; ?>_sell_speed_input" required>
        <input type="hidden" name="ownership_duration" id="<?php echo $unique_id; ?>_ownership_duration_input" required>
        <input type="hidden" name="repairs_needed" id="<?php echo $unique_id; ?>_repairs_needed_input" required>
        <input type="hidden" name="formatted_address" id="<?php echo $unique_id; ?>_formatted_address_input">
        <input type="hidden" name="place_id" id="<?php echo $unique_id; ?>_place_id_input">
        <input type="hidden" name="coordinates" id="<?php echo $unique_id; ?>_coordinates_input">
        <textarea name="additional_notes" id="<?php echo $unique_id; ?>_additional_notes_input" class="hidden"></textarea>

        <div class="<?php echo $unique_id; ?>_form_step_content hidden" id="<?php echo $unique_id; ?>_success_message">
            <div class="text-center py-8">
                <div class="w-16 h-16 mx-auto bg-green-100 rounded-full flex items-center justify-center mb-6"><svg class="w-8 h-8 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg></div>
                <h3 class="text-2xl font-semibold text-gray-900 mb-4">Thank You!</h3>
                <p class="text-gray-600 mb-6">Your cash offer request has been submitted. We'll be in touch soon!</p>
                <div class="text-center"><p class="text-gray-500 text-sm mb-2">Form will reset in:</p><div class="inline-flex items-center justify-center w-12 h-12 bg-gray-100 rounded-full"><span id="<?php echo $unique_id; ?>_countdown_timer" class="text-lg font-bold text-gray-700">5</span></div></div>
            </div>
        </div>
    </form>
</div>

<?php
    // We only need to output the script logic once per page, not for every form.
    if (!did_action('hy_multi_form_script_printed')) {
        // Mark that we've printed the script
        do_action('hy_multi_form_script_printed');
?>
<script>
// Encapsulate all logic in a function to avoid polluting the global scope
(function() {
    'use strict';

    // Store all form instances in a single object
    if (!window.hyFormInstances) {
        window.hyFormInstances = {};
    }
    
    class HyMultiForm {
        constructor(uniqueId, shortcodeId) {
            this.uniqueId = uniqueId;
            this.shortcodeId = shortcodeId;
            
            // --- FIX START ---
            // Get both the outer container AND the form element
            this.container = document.getElementById(`${this.uniqueId}_container`);
            this.form = document.getElementById(this.uniqueId);
            
            if (!this.container || !this.form) {
                console.error('HyMultiForm Error: Form container or element not found for ID:', this.uniqueId);
                return;
            }
            // --- FIX END ---
            
            this.currentStep = 1;
            this.totalSteps = 4;
            this.map = null;
            this.marker = null;
            this.autocomplete = null;
            this.selectedPlace = null;
            this.countdownInterval = null;
            
            this.stepTitles = ["Your Address", "Confirm Property", "Owner Info", "Property Info"];
            
            this.init();
        }
        
        init() {
            this.loadGoogleMapsAPI();
            this.updateStepDisplay();
            this.attachEventListeners();
            console.log('HyMultiForm Initialized:', this.uniqueId);
        }
        
        loadGoogleMapsAPI() {
            if (!window.hy_ajax_object || !hy_ajax_object.google_api_key || hy_ajax_object.google_api_key.includes('YOUR_Maps_API_KEY')) {
                console.warn('Google Maps API key not configured for form: ' + this.uniqueId);
                const loadingDiv = document.getElementById(this.uniqueId + '_map_loading');
                if (loadingDiv) loadingDiv.innerHTML = '<div class="text-center text-yellow-600 p-4"><div class="text-4xl mb-2">⚠️</div><div class="text-sm">API key not configured</div></div>';
                return;
            }
            
            if (typeof google !== 'undefined' && google.maps) {
                this.initAutocomplete();
            } else if (!window.googleMapsLoading) {
                window.googleMapsLoading = true;
                const script = document.createElement('script');
                script.src = `https://maps.googleapis.com/maps/api/js?key=${hy_ajax_object.google_api_key}&libraries=places&callback=initAllGoogleMaps`;
                script.async = true;
                script.defer = true;
                script.onerror = () => console.error('Failed to load Google Maps API script.');
                document.head.appendChild(script);
            }
        }
        
        initAutocomplete() {
            const addressInput = document.getElementById(this.uniqueId + '_property_address');
            if (!addressInput) return;
            
            try {
                this.autocomplete = new google.maps.places.Autocomplete(addressInput, {
                    types: ['address'],
                    componentRestrictions: { country: 'us' },
                    fields: ['place_id', 'formatted_address', 'geometry']
                });
                
                this.autocomplete.addListener('place_changed', () => this.handlePlaceSelection());
                console.log('Autocomplete initialized for:', this.uniqueId);
            } catch (error) {
                console.error('Error initializing autocomplete for form:', this.uniqueId, error);
            }
        }
        
        handlePlaceSelection() {
            const place = this.autocomplete.getPlace();
            const nextBtn = document.getElementById(this.uniqueId + '_next_step1');
            
            if (!place || !place.geometry) {
                this.selectedPlace = null;
                if (nextBtn) {
                    nextBtn.disabled = true;
                    nextBtn.classList.add('opacity-50', 'cursor-not-allowed');
                }
                return;
            }
            
            this.selectedPlace = place;
            document.getElementById(this.uniqueId + '_formatted_address_input').value = place.formatted_address;
            document.getElementById(this.uniqueId + '_place_id_input').value = place.place_id;
            document.getElementById(this.uniqueId + '_coordinates_input').value = `${place.geometry.location.lat()},${place.geometry.location.lng()}`;
            
            if (nextBtn) {
                nextBtn.disabled = false;
                nextBtn.classList.remove('opacity-50', 'cursor-not-allowed');
            }
        }
        
        attachEventListeners() {
            const addressInput = document.getElementById(this.uniqueId + '_property_address');
            if (addressInput) {
                addressInput.addEventListener('input', () => {
                    const nextBtn = document.getElementById(this.uniqueId + '_next_step1');
                    if (this.selectedPlace && this.selectedPlace.formatted_address !== addressInput.value) {
                       this.selectedPlace = null;
                       if (nextBtn) {
                           nextBtn.disabled = true;
                           nextBtn.classList.add('opacity-50', 'cursor-not-allowed');
                       }
                    }
                });
            }

            this.form.addEventListener('click', (e) => {
                const target = e.target;
                if (target.closest(`.${this.uniqueId}_next_btn`)) {
                    if (this.validateCurrentStep()) this.nextStep();
                } else if (target.closest(`.${this.uniqueId}_prev_btn`)) {
                    this.prevStep();
                } else if (target.closest(`.${this.uniqueId}_question_card`)) {
                    this.openOffCanvas(target.closest(`.${this.uniqueId}_question_card`).dataset.question);
                } else if (target.closest(`.${this.uniqueId}_off_canvas_radio_option`)) {
                    this.handleRadioSelection(target.closest(`.${this.uniqueId}_off_canvas_radio_option`));
                } else if (target.closest(`.${this.uniqueId}_save_notes`)) {
                    this.handleSaveNotes(target.closest(`.${this.uniqueId}_save_notes`));
                }
            });

            this.form.addEventListener('submit', (e) => {
                e.preventDefault();
                this.handleSubmit();
            });
        }
        
        nextStep() {
            if (this.currentStep >= this.totalSteps) return;
            this.currentStep++;
            this.updateStepDisplay();
            
            if (this.currentStep === 2 && this.selectedPlace) {
                this.container.querySelector(`.${this.uniqueId}_display_address`).textContent = this.selectedPlace.formatted_address;
                this.loadMapForPlace(this.selectedPlace);
            }
        }

        prevStep() {
            if (this.currentStep <= 1) return;
            this.currentStep--;
            this.updateStepDisplay();
        }

        updateStepDisplay() {
            // These are inside the form, so this.form is correct
            this.form.querySelectorAll(`.${this.uniqueId}_form_step_content`).forEach(step => step.classList.add('hidden'));
            this.form.querySelector(`.${this.uniqueId}_form_step_content[data-step="${this.currentStep}"]`).classList.remove('hidden');

            // --- FIX START ---
            // These are OUTSIDE the form, so we must use this.container to find them
            this.container.querySelectorAll(`.${this.uniqueId}_form_step`).forEach((step, index) => {
                step.classList.toggle('bg-light-green', index < this.currentStep);
                step.classList.toggle('bg-gray-200', index >= this.currentStep);
                step.classList.toggle('done', index < this.currentStep - 1);
            });

            const currentStepSpan = this.container.querySelector(`.${this.uniqueId}_current_step`);
            const titleElement = this.container.querySelector(`.${this.uniqueId}_form_title`);

            if (currentStepSpan) currentStepSpan.textContent = this.currentStep;
            if (titleElement) titleElement.textContent = this.stepTitles[this.currentStep - 1];
            // --- FIX END ---
        }

        validateCurrentStep() {
            const currentStepElement = this.form.querySelector(`.${this.uniqueId}_form_step_content[data-step="${this.currentStep}"]`);
            let isValid = true;
            
            const requiredInputs = currentStepElement.querySelectorAll('input[required], textarea[required]');
            requiredInputs.forEach(input => {
                input.classList.remove('border-red-500');
                if (!input.value.trim() || (input.type === 'email' && !/^\S+@\S+\.\S+$/.test(input.value))) {
                    isValid = false;
                    input.classList.add('border-red-500');
                }
            });

            if (this.currentStep === 1 && !this.selectedPlace) isValid = false;
            
            if (this.currentStep === 4) {
                ['sell_speed', 'ownership_duration', 'repairs_needed'].forEach(type => {
                    const questionCard = this.form.querySelector(`.${this.uniqueId}_question_card[data-question="${type}"]`);
                    questionCard.classList.remove('border-red-500');
                    if (!this.form.querySelector(`#${this.uniqueId}_${type}_input`).value) {
                       isValid = false;
                       questionCard.classList.add('border-red-500');
                    }
                });
            }
            
            if (!isValid) {
                currentStepElement.classList.add('animate-pulse');
                setTimeout(() => currentStepElement.classList.remove('animate-pulse'), 500);
            }
            return isValid;
        }

        openOffCanvas(questionType) {
            const offCanvas = document.getElementById(`${this.uniqueId}_off_canvas`);
            const panel = offCanvas.querySelector(`.${this.uniqueId}_off_canvas_panel`);
            
            offCanvas.dataset.currentQuestion = questionType;
            offCanvas.querySelector(`.${this.uniqueId}_off_canvas_title`).textContent = this.getQuestionData(questionType).title;
            offCanvas.querySelector(`#${this.uniqueId}_off_canvas_content`).innerHTML = this.getQuestionData(questionType).content;
            
            offCanvas.classList.remove('hidden');
            setTimeout(() => panel.classList.remove('translate-x-full'), 10);
            
            this.prefillOffCanvas(questionType);
        }
        
        prefillOffCanvas(questionType) {
            if (questionType === 'additional_notes') {
                const textarea = document.getElementById(`${this.uniqueId}_notes_textarea`);
                if(textarea) textarea.value = document.getElementById(`${this.uniqueId}_additional_notes_input`).value;
            } else {
                const currentValue = document.getElementById(`${this.uniqueId}_${questionType}_input`).value;
                if (currentValue) {
                    const radio = this.form.querySelector(`input[name="${questionType}_temp"][value="${currentValue}"]`);
                    if (radio) {
                        radio.checked = true;
                        this.styleSelectedRadio(radio.closest(`.${this.uniqueId}_off_canvas_radio_option`));
                    }
                }
            }
        }
        
        closeOffCanvas() {
            const offCanvas = document.getElementById(`${this.uniqueId}_off_canvas`);
            const panel = offCanvas.querySelector(`.${this.uniqueId}_off_canvas_panel`);
            panel.classList.add('translate-x-full');
            setTimeout(() => offCanvas.classList.add('hidden'), 300);
        }

        handleRadioSelection(optionElement) {
            const radio = optionElement.querySelector('input[type="radio"]');
            if (radio) radio.checked = true;

            this.styleSelectedRadio(optionElement);

            setTimeout(() => {
                this.saveOffCanvasSelection();
                this.closeOffCanvas();
            }, 300);
        }

        styleSelectedRadio(selectedOption) {
            const groupName = selectedOption.querySelector('input[type="radio"]').name;
            this.form.querySelectorAll(`input[name="${groupName}"]`).forEach(input => {
                const parentDiv = input.closest(`.${this.uniqueId}_off_canvas_radio_option`).querySelector('div');
                parentDiv.classList.remove('border-green-500', 'bg-green-50');
                parentDiv.classList.add('border-gray-200');
            });
            const selectedDiv = selectedOption.querySelector('div');
            selectedDiv.classList.add('border-green-500', 'bg-green-50');
            selectedDiv.classList.remove('border-gray-200');
        }

        handleSaveNotes(button) {
            this.saveOffCanvasSelection();
            button.textContent = 'Saved!';
            button.classList.add('bg-green-600');
            setTimeout(() => this.closeOffCanvas(), 800);
        }
        
        saveOffCanvasSelection() {
            const offCanvas = this.form.querySelector(`#${this.uniqueId}_off_canvas`);
            const questionType = offCanvas.dataset.currentQuestion;
            if (!questionType) return;

            const questionCard = this.form.querySelector(`.${this.uniqueId}_question_card[data-question="${questionType}"]`);
            const valueDisplay = questionCard.querySelector(`.${this.uniqueId}_question_value`);
            const hiddenInput = document.getElementById(`${this.uniqueId}_${questionType}_input`);
            
            let displayValue = '';
            if (questionType === 'additional_notes') {
                const textarea = offCanvas.querySelector(`#${this.uniqueId}_notes_textarea`);
                hiddenInput.value = textarea.value;
                displayValue = textarea.value.trim() ? 'Notes added' : '';
            } else {
                const selectedRadio = offCanvas.querySelector(`input[name="${questionType}_temp"]:checked`);
                if (selectedRadio) {
                    hiddenInput.value = selectedRadio.value;
                    displayValue = selectedRadio.closest('label').querySelector('span').textContent;
                }
            }
            
            valueDisplay.textContent = displayValue;
            if(displayValue) questionCard.classList.add('completed');
            else questionCard.classList.remove('completed');
        }

        getQuestionData(questionType) {
            const uniqueClass = `${this.uniqueId}_off_canvas_radio_option`;
            const options = {
                sell_speed: { title: 'How fast do you want to sell?', choices: {'asap': 'ASAP', '1-2_months': '1-2 Months', '3-6_months': '3-6 Months', '6_plus_months': '6+ Months'} },
                ownership_duration: { title: 'How long have you owned it?', choices: {'0-5_years': '0 - 5 Years', '5-15_years': '5 - 15 Years', '15-25_years': '15 - 25 Years', '25_plus_years': '25+ Years'} },
                repairs_needed: { title: 'What kind of repairs are needed?', choices: {'full_gut': '$$ | Full Gut - Everything', 'remodel': '$ | Remodel - Kitchen, Bath, etc.', 'flooring_paint': '$ | Flooring & Paint', 'tv_ready': 'None - TV Commercial Ready'} }
            };

            if (options[questionType]) {
                let content = '<div class="space-y-3">';
                for (const [value, label] of Object.entries(options[questionType].choices)) {
                    content += `<label class="${uniqueClass} block"><input type="radio" name="${questionType}_temp" value="${value}" class="hidden"><div class="border border-gray-200 rounded-lg p-4 cursor-pointer hover:border-green-500"><span class="text-gray-700 font-medium">${label}</span></div></label>`;
                }
                content += '</div>';
                return { title: options[questionType].title, content: content };
            }

            if (questionType === 'additional_notes') {
                return {
                    title: 'Additional Notes',
                    content: `<div><textarea id="${this.uniqueId}_notes_textarea" placeholder="Tell us more about your property..." class="w-full h-64 p-3 border border-gray-200 rounded-lg focus:border-green-500"></textarea><button type="button" class="${this.uniqueId}_save_notes w-full mt-4 bg-light-green text-white font-semibold py-3 rounded-lg">Save Notes</button></div>`
                };
            }
            return { title: '', content: '' };
        }

        loadMapForPlace(place) {
            const mapContainer = document.getElementById(this.uniqueId + '_google_map');
            const loadingDiv = document.getElementById(this.uniqueId + '_map_loading');
            loadingDiv.classList.add('hidden');
            
            this.map = new google.maps.Map(mapContainer, {
                zoom: 18, center: place.geometry.location, mapTypeControl: false, streetViewControl: false,
            });
            this.marker = new google.maps.Marker({ position: place.geometry.location, map: this.map, title: place.formatted_address });
        }

        handleSubmit() {
            if (!this.validateCurrentStep()) return;

            const submitBtn = document.getElementById(this.uniqueId + '_submit_btn');
            submitBtn.textContent = 'Submitting...';
            submitBtn.disabled = true;

            const formData = new FormData(this.form);
            formData.append('action', 'hy_submit_cash_offer');
            formData.append('nonce', hy_ajax_object.nonce);
            formData.append('form_id', this.shortcodeId);
            
            fetch(hy_ajax_object.ajax_url, { method: 'POST', body: formData })
                .then(response => response.json())
                .then(data => data.success ? this.showSuccess() : this.showError(submitBtn))
                .catch(() => this.showError(submitBtn));
        }

        showSuccess() {
            this.currentStep = this.totalSteps + 1; // Go to a "success step"
            this.form.querySelectorAll(`.${this.uniqueId}_form_step_content`).forEach(step => step.classList.add('hidden'));
            this.form.querySelector(`#${this.uniqueId}_success_message`).classList.remove('hidden');
            
            // --- FIX START ---
            // Use this.container to find the header elements
            const titleElement = this.container.querySelector(`.${this.uniqueId}_form_title`);
            const currentStepSpan = this.container.querySelector(`.${this.uniqueId}_current_step`);
            if (titleElement) titleElement.textContent = 'Form Submitted';
            if (currentStepSpan) currentStepSpan.textContent = '✓';
            // --- FIX END ---
            
            this.startCountdownTimer();
        }

        showError(submitBtn) {
            alert('An error occurred. Please try again.');
            submitBtn.textContent = 'Submit →';
            submitBtn.disabled = false;
        }

        startCountdownTimer() {
            let countdown = 5;
            const timerElement = document.getElementById(this.uniqueId + '_countdown_timer');
            this.countdownInterval = setInterval(() => {
                countdown--;
                if(timerElement) timerElement.textContent = countdown;
                if (countdown <= 0) {
                    clearInterval(this.countdownInterval);
                    this.resetFormToInitial();
                }
            }, 1000);
        }

        resetFormToInitial() {
            this.currentStep = 1;
            this.selectedPlace = null;
            this.form.reset();
            this.form.querySelectorAll('input[type="hidden"], textarea.hidden').forEach(input => input.value = '');
            this.form.querySelectorAll(`.${this.uniqueId}_question_value`).forEach(el => el.textContent = '');
            this.form.querySelectorAll('.border-red-500, .border-green-500, .completed').forEach(el => {
                el.classList.remove('border-red-500', 'border-green-500', 'completed');
            });
            document.getElementById(this.uniqueId + '_next_step1').disabled = true;
            document.getElementById(this.uniqueId + '_next_step1').classList.add('opacity-50', 'cursor-not-allowed');
            const submitBtn = document.getElementById(this.uniqueId + '_submit_btn');
            if (submitBtn) {
                submitBtn.disabled = false;
                submitBtn.textContent = 'Submit →';
            }
            this.updateStepDisplay();
        }
    }

    // Global callback for Google Maps API
    window.initAllGoogleMaps = function() {
        console.log('Google Maps API loaded. Initializing all forms.');
        if (window.hyFormInstances) {
            Object.values(window.hyFormInstances).forEach(instance => {
                instance.initAutocomplete();
            });
        }
    };
    
    // Global function to close the off-canvas panel
    window.closeOffCanvas = function(uniqueId) {
        if (window.hyFormInstances && window.hyFormInstances[uniqueId]) {
            window.hyFormInstances[uniqueId].closeOffCanvas();
        }
    };

    // Initialize all forms on the page once the DOM is ready
    document.addEventListener('DOMContentLoaded', function() {
        setTimeout(function() {
            const formsToInit = document.querySelectorAll('form[data-unique-id]:not([data-initialized])');
            console.log(`Found ${formsToInit.length} uninitialized HyMultiForm(s).`);

            formsToInit.forEach(formElement => {
                const uniqueId = formElement.dataset.uniqueId;
                const shortcodeId = formElement.dataset.formId;
                if (uniqueId && !window.hyFormInstances[uniqueId]) {
                    window.hyFormInstances[uniqueId] = new HyMultiForm(uniqueId, shortcodeId);
                    formElement.dataset.initialized = 'true';
                }
            });

            if (typeof google !== 'undefined' && google.maps && window.initAllGoogleMaps) {
                window.initAllGoogleMaps();
            }
        }, 100);
    });

})();
</script>
<?php
    }
    return ob_get_clean();
}
add_shortcode( 'hy_multi_form', 'hy_multi_form' );
add_action('wp_footer', function() { do_action('hy_multi_form_script_printed'); }, -1);


// Enqueue scripts and localize data
function hy_multi_form_scripts() {
    // Only enqueue if the shortcode is present on the page
    if (has_shortcode(get_post()->post_content, 'hy_multi_form')) {
        wp_enqueue_script('jquery'); // Even if not used directly, good practice
        
        $api_key = get_option('hy_Maps_api_key', '');
        // Set a placeholder if the key is empty to avoid JS errors, the script will handle the warning.
        if (empty($api_key)) {
            $api_key = '';
        }
        
        wp_localize_script('jquery', 'hy_ajax_object', array(
            'ajax_url' => admin_url('admin-ajax.php'),
            'nonce' => wp_create_nonce('hy_cash_offer_nonce'),
            'google_api_key' => $api_key
        ));
    }
}
add_action('wp_enqueue_scripts', 'hy_multi_form_scripts');

// Handle AJAX form submission
function hy_handle_cash_offer_submission() {
    if (!wp_verify_nonce($_POST['nonce'], 'hy_cash_offer_nonce')) {
        wp_send_json_error('Security check failed');
    }
    
    $data = array(
        'form_id' => isset($_POST['form_id']) ? sanitize_text_field($_POST['form_id']) : 'unknown',
        'property_address' => isset($_POST['property_address']) ? sanitize_text_field($_POST['property_address']) : '',
        'formatted_address' => isset($_POST['formatted_address']) ? sanitize_text_field($_POST['formatted_address']) : '',
        'place_id' => isset($_POST['place_id']) ? sanitize_text_field($_POST['place_id']) : '',
        'coordinates' => isset($_POST['coordinates']) ? sanitize_text_field($_POST['coordinates']) : '',
        'first_name' => isset($_POST['first_name']) ? sanitize_text_field($_POST['first_name']) : '',
        'last_name' => isset($_POST['last_name']) ? sanitize_text_field($_POST['last_name']) : '',
        'phone_number' => isset($_POST['phone_number']) ? sanitize_text_field($_POST['phone_number']) : '',
        'email_address' => isset($_POST['email_address']) ? sanitize_email($_POST['email_address']) : '',
        'sell_speed' => isset($_POST['sell_speed']) ? sanitize_text_field($_POST['sell_speed']) : '',
        'ownership_duration' => isset($_POST['ownership_duration']) ? sanitize_text_field($_POST['ownership_duration']) : '',
        'repairs_needed' => isset($_POST['repairs_needed']) ? sanitize_text_field($_POST['repairs_needed']) : '',
        'additional_notes' => isset($_POST['additional_notes']) ? sanitize_textarea_field($_POST['additional_notes']) : '',
        'submission_date' => current_time('mysql'),
        'ip_address' => $_SERVER['REMOTE_ADDR']
    );

    $subject = 'New Cash Offer Request from ' . $data['first_name'] . ' ' . $data['last_name'];
    $message = "New cash offer request received (Form ID: {$data['form_id']}):\n\n";
    foreach ($data as $key => $value) {
        if (!empty($value)) {
            $formatted_key = ucwords(str_replace('_', ' ', $key));
            $message .= "{$formatted_key}: {$value}\n";
        }
    }
    
    // FIXED: Corrected Google Maps link generation
    if (!empty($data['coordinates'])) {
        $coords = explode(',', $data['coordinates']);
        if (count($coords) == 2 && is_numeric(trim($coords[0])) && is_numeric(trim($coords[1]))) {
            $lat = trim($coords[0]);
            $lng = trim($coords[1]);
            $message .= "\nView on Google Maps: https://www.google.com/maps?q={$lat},{$lng}\n";
        }
    }
    
    wp_mail(get_option('admin_email'), $subject, $message);
    
    wp_send_json_success('Form submitted successfully');
}
add_action('wp_ajax_hy_submit_cash_offer', 'hy_handle_cash_offer_submission');
add_action('wp_ajax_nopriv_hy_submit_cash_offer', 'hy_handle_cash_offer_submission');

// Add settings page for API key
function hy_cash_offer_settings_menu() {
    add_options_page('Cash Offer Form Settings', 'Cash Offer Form', 'manage_options', 'hy-cash-offer-settings', 'hy_cash_offer_settings_page');
}
add_action('admin_menu', 'hy_cash_offer_settings_menu');

function hy_cash_offer_settings_page() {
    if (isset($_POST['submit']) && check_admin_referer('hy_save_settings_nonce')) {
        update_option('hy_Maps_api_key', sanitize_text_field($_POST['google_api_key']));
        echo '<div class="notice notice-success is-dismissible"><p>Settings saved!</p></div>';
    }
    
    $api_key = get_option('hy_Maps_api_key', '');
    ?>
    <div class="wrap">
        <h1>Cash Offer Form Settings</h1>
        <form method="post" action="">
            <?php wp_nonce_field('hy_save_settings_nonce'); ?>
            <table class="form-table">
                <tr>
                    <th scope="row"><label for="google_api_key">Google Maps API Key</label></th>
                    <td>
                        <input type="text" id="google_api_key" name="google_api_key" value="<?php echo esc_attr($api_key); ?>" class="regular-text" />
                        <p class="description">
                            Get your API key from the <a href="https://console.cloud.google.com/" target="_blank">Google Cloud Console</a>.<br>
                            Ensure you enable <strong>Maps JavaScript API</strong> and <strong>Places API</strong> for your project.
                        </p>
                    </td>
                </tr>
            </table>
            <?php submit_button(); ?>
        </form>
        
        <div class="card" style="max-width: 600px; margin-top: 20px;">
            <h2>How to Use</h2>
            <p>Use the shortcode <code>[hy_multi_form id="your_form_name"]</code> to display the form on any page or post. The <code>id</code> is useful for tracking if you use the form in multiple places.</p>
        </div>
    </div>
    <?php
}