document.addEventListener("DOMContentLoaded", function () {

    /* =====================================
       CURRENT YEAR
       ===================================== */
    const currentYearEl = document.getElementById("currentYear");
    if (currentYearEl) {
        currentYearEl.textContent = new Date().getFullYear();
    }

    /* Admission form: country-code dropdown data */
    const countries = [

        ["Afghanistan", "+93"],
        ["Albania", "+355"],
        ["Algeria", "+213"],
        ["Andorra", "+376"],
        ["Angola", "+244"],
        ["Antigua and Barbuda", "+1"],
        ["Argentina", "+54"],
        ["Armenia", "+374"],
        ["Australia", "+61"],
        ["Austria", "+43"],
        ["Azerbaijan", "+994"],

        ["Bahamas", "+1"],
        ["Bahrain", "+973"],
        ["Bangladesh", "+880"],
        ["Barbados", "+1"],
        ["Belarus", "+375"],
        ["Belgium", "+32"],
        ["Belize", "+501"],
        ["Benin", "+229"],
        ["Bhutan", "+975"],
        ["Bolivia", "+591"],
        ["Bosnia and Herzegovina", "+387"],
        ["Botswana", "+267"],
        ["Brazil", "+55"],
        ["Brunei", "+673"],
        ["Bulgaria", "+359"],
        ["Burkina Faso", "+226"],
        ["Burundi", "+257"],

        ["Cambodia", "+855"],
        ["Cameroon", "+237"],
        ["Canada", "+1"],
        ["Cape Verde", "+238"],
        ["Central African Republic", "+236"],
        ["Chad", "+235"],
        ["Chile", "+56"],
        ["China", "+86"],
        ["Colombia", "+57"],
        ["Comoros", "+269"],
        ["Congo", "+242"],
        ["Costa Rica", "+506"],
        ["Croatia", "+385"],
        ["Cuba", "+53"],
        ["Cyprus", "+357"],
        ["Czech Republic", "+420"],

        ["Denmark", "+45"],
        ["Djibouti", "+253"],
        ["Dominica", "+1"],
        ["Dominican Republic", "+1"],

        ["Ecuador", "+593"],
        ["Egypt", "+20"],
        ["El Salvador", "+503"],
        ["Estonia", "+372"],
        ["Eswatini", "+268"],
        ["Ethiopia", "+251"],

        ["Fiji", "+679"],
        ["Finland", "+358"],
        ["France", "+33"],

        ["Gabon", "+241"],
        ["Gambia", "+220"],
        ["Georgia", "+995"],
        ["Germany", "+49"],
        ["Ghana", "+233"],
        ["Greece", "+30"],
        ["Grenada", "+1"],
        ["Guatemala", "+502"],
        ["Guinea", "+224"],
        ["Guyana", "+592"],

        ["Haiti", "+509"],
        ["Honduras", "+504"],
        ["Hong Kong", "+852"],
        ["Hungary", "+36"],

        ["Iceland", "+354"],
        ["India", "+91"],
        ["Indonesia", "+62"],
        ["Iran", "+98"],
        ["Iraq", "+964"],
        ["Ireland", "+353"],
        ["Israel", "+972"],
        ["Italy", "+39"],

        ["Jamaica", "+1"],
        ["Japan", "+81"],
        ["Jordan", "+962"],

        ["Kazakhstan", "+7"],
        ["Kenya", "+254"],
        ["Kiribati", "+686"],
        ["Kuwait", "+965"],
        ["Kyrgyzstan", "+996"],

        ["Laos", "+856"],
        ["Latvia", "+371"],
        ["Lebanon", "+961"],
        ["Lesotho", "+266"],
        ["Liberia", "+231"],
        ["Libya", "+218"],
        ["Liechtenstein", "+423"],
        ["Lithuania", "+370"],
        ["Luxembourg", "+352"],

        ["Madagascar", "+261"],
        ["Malawi", "+265"],
        ["Malaysia", "+60"],
        ["Maldives", "+960"],
        ["Mali", "+223"],
        ["Malta", "+356"],
        ["Marshall Islands", "+692"],
        ["Mauritania", "+222"],
        ["Mauritius", "+230"],
        ["Mexico", "+52"],
        ["Micronesia", "+691"],
        ["Moldova", "+373"],
        ["Monaco", "+377"],
        ["Mongolia", "+976"],
        ["Montenegro", "+382"],
        ["Morocco", "+212"],
        ["Mozambique", "+258"],
        ["Myanmar", "+95"],

        ["Namibia", "+264"],
        ["Nauru", "+674"],
        ["Nepal", "+977"],
        ["Netherlands", "+31"],
        ["New Zealand", "+64"],
        ["Nicaragua", "+505"],
        ["Niger", "+227"],
        ["Nigeria", "+234"],
        ["North Korea", "+850"],
        ["North Macedonia", "+389"],
        ["Norway", "+47"],

        ["Oman", "+968"],

        ["Pakistan", "+92"],
        ["Palau", "+680"],
        ["Panama", "+507"],
        ["Papua New Guinea", "+675"],
        ["Paraguay", "+595"],
        ["Peru", "+51"],
        ["Philippines", "+63"],
        ["Poland", "+48"],
        ["Portugal", "+351"],

        ["Qatar", "+974"],

        ["Romania", "+40"],
        ["Russia", "+7"],
        ["Rwanda", "+250"],

        ["Saint Kitts and Nevis", "+1"],
        ["Saint Lucia", "+1"],
        ["Samoa", "+685"],
        ["San Marino", "+378"],
        ["Saudi Arabia", "+966"],
        ["Senegal", "+221"],
        ["Serbia", "+381"],
        ["Seychelles", "+248"],
        ["Singapore", "+65"],
        ["Slovakia", "+421"],
        ["Slovenia", "+386"],
        ["Solomon Islands", "+677"],
        ["Somalia", "+252"],
        ["South Africa", "+27"],
        ["South Korea", "+82"],
        ["South Sudan", "+211"],
        ["Spain", "+34"],
        ["Sri Lanka", "+94"],
        ["Sudan", "+249"],
        ["Suriname", "+597"],
        ["Sweden", "+46"],
        ["Switzerland", "+41"],
        ["Syria", "+963"],

        ["Taiwan", "+886"],
        ["Tajikistan", "+992"],
        ["Tanzania", "+255"],
        ["Thailand", "+66"],
        ["Timor-Leste", "+670"],
        ["Togo", "+228"],
        ["Tonga", "+676"],
        ["Trinidad and Tobago", "+1"],
        ["Tunisia", "+216"],
        ["Turkey", "+90"],
        ["Turkmenistan", "+993"],
        ["Tuvalu", "+688"],

        ["Uganda", "+256"],
        ["Ukraine", "+380"],
        ["United Arab Emirates", "+971"],
        ["United Kingdom", "+44"],
        ["United States", "+1"],
        ["Uruguay", "+598"],
        ["Uzbekistan", "+998"],

        ["Vanuatu", "+678"],
        ["Vatican City", "+39"],
        ["Venezuela", "+58"],
        ["Vietnam", "+84"],

        ["Yemen", "+967"],

        ["Zambia", "+260"],
        ["Zimbabwe", "+263"]

    ];



    /* Admission form: load country-code options and select India by default */
    const countrySelect =
        document.getElementById("countryCode");

    if (!countrySelect) {
        console.error("Country select #countryCode not found.");
        return;
    }

    countries.forEach(function (country) {

        const option =
            document.createElement("option");

        option.value = country[1];

        option.textContent =
            `${country[0]} (${country[1]})`;

        option.dataset.country =
            country[0];

        countrySelect.appendChild(option);

    });


    countrySelect.value = "+91";

    /* Admission form: field references and validation */
    const form =
        document.getElementById("admissionForm");

    const fullName =
        document.getElementById("fullName");

    const email =
        document.getElementById("email");

    const phone =
        document.getElementById("phone");

    const neetScore =
        document.getElementById("neetScore");

    if (!form) {

        return;
    }


    const setFormError = (inputElement, message) => {
        const formGroup = inputElement.closest('.form-group');
        const errorElement = formGroup.querySelector('.field-error');
        errorElement.textContent = message;
        formGroup.classList.add('error');
    };

    const clearFormError = (inputElement) => {
        const formGroup = inputElement.closest('.form-group');
        formGroup.classList.remove('error');
    };


    form.addEventListener("submit", function (event) {

        event.preventDefault();

        let isValid = true;

        if (fullName.value.trim() === "") {
            setFormError(fullName, "This field is required.");
            isValid = false;

        } else {
            clearFormError(fullName);

        }

        if (email.value.trim() === "") {

            setFormError(email, "This field is required.");
            isValid = false;

        } else if (!validateEmail(email.value)) {

            setFormError(email, "Please enter a valid email.");
            isValid = false;

        } else {
            clearFormError(email);

        }


        const phoneValue =
            phone.value.replace(/\D/g, "");


        if (phoneValue === "") {
            setFormError(phone, "This field is required.");
            isValid = false;

        } else if (phoneValue.length < 7) {
            setFormError(phone, "Please enter a valid phone number.");
            isValid = false;

        } else {

            clearFormError(phone);

        }

        if (neetScore.value.trim() === "") {

            setFormError(neetScore, "This field is required.");
            isValid = false;

        } else {
            clearFormError(neetScore);
        }

        if (isValid) {

            const selectedCode =
                countrySelect.value;

            const completePhone =
                selectedCode + " " + phoneValue;


            console.log(
                "Full Name:",
                fullName.value
            );

            console.log(
                "Email:",
                email.value
            );

            console.log(
                "Country Code:",
                selectedCode
            );

            console.log(
                "Phone:",
                completePhone
            );

            console.log(
                "NEET Score:",
                neetScore.value
            );


            alert(
                "Form submitted successfully!"
            );

        }

    });


    function validateEmail(email) {

        const pattern =
            /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

        return pattern.test(email);

    }


    if (phone) {

        phone.addEventListener("input", function () {

            this.value =
                this.value.replace(/\D/g, "");

        });

    }


    if (neetScore) {

        neetScore.addEventListener("input", function () {

            this.value =
                this.value.replace(/\D/g, "");

        });

    }


    /* FAQ section: open one answer at a time */
    const faqItems = document.querySelectorAll(".faq-item");
    faqItems.forEach(function (item) {

        const question = item.querySelector(".faq-question");

        question.addEventListener("click", function () {

            const isActive = item.classList.contains("active");

            // Close all FAQs
            faqItems.forEach(function (faq) {
                faq.classList.remove("active");
            });

            // Open clicked FAQ
            if (!isActive) {
                item.classList.add("active");
            }

        });

    });
    /* =====================================
       TABS
       ===================================== */
    const tabButtons = document.querySelectorAll(".admission-tab-btn");
    const tabContents = document.querySelectorAll(".admission-tab-content");
    if (tabButtons.length > 0 && tabContents.length > 0) {
        function openTab(tabNumber) {

            /* Remove active from all buttons */
            tabButtons.forEach(function (button) {
                button.classList.remove("active");
                button.setAttribute("aria-selected", "false");
            });

            /* Hide all contents */
            tabContents.forEach(function (content) {
                content.classList.remove("active");
            });

            /* Active button */
            const activeButton = document.querySelector(
                '.admission-tab-btn[data-tab="' + tabNumber + '"]'
            );

            /* Active content */
            const activeContent = document.querySelector(
                '.admission-tab-content[data-content="' + tabNumber + '"]'
            );

            if (activeButton) {
                activeButton.classList.add("active");
                activeButton.setAttribute("aria-selected", "true");
            }

            if (activeContent) {
                activeContent.classList.add("active");
            }
        }
        tabButtons.forEach(function (button) {

            button.addEventListener("click", function () {

                const tabNumber = this.getAttribute("data-tab");

                /* Mobile accordion behavior */
                if (window.innerWidth <= 767) {

                    const isAlreadyActive =
                        this.classList.contains("active");

                    if (isAlreadyActive) {

                        this.classList.remove("active");
                        this.setAttribute("aria-selected", "false");

                        const content = document.querySelector(
                            '.admission-tab-content[data-content="' +
                            tabNumber +
                            '"]'
                        );

                        if (content) {
                            content.classList.remove("active");
                        }

                        return;
                    }
                }

                openTab(tabNumber);

            });
        });
        /* First tab active on page load */
        openTab("1");
    }

    /* Hostel gallery: image popup, navigation and keyboard controls */
    const hostelItems = Array.from(document.querySelectorAll(".hostel-gallery-item"));
    const hostelPopup = document.getElementById("hostelPopup");
    if (hostelItems.length && hostelPopup) {
        const popupImage = hostelPopup.querySelector(".hostel-popup-image");
        const popupCurrent = document.getElementById("hostelCurrentSlide");
        const popupTotal = document.getElementById("hostelTotalSlide");
        let hostelIndex = 0;
        popupTotal.textContent = hostelItems.length;

        function showHostelImage(index) {
            hostelIndex = (index + hostelItems.length) % hostelItems.length;
            const item = hostelItems[hostelIndex];
            popupImage.src = item.dataset.hostelImage;
            popupImage.alt = item.dataset.hostelAlt;
            popupCurrent.textContent = hostelIndex + 1;
        }

        function closeHostelPopup() {
            hostelPopup.classList.remove("active");
            hostelPopup.setAttribute("aria-hidden", "true");
            document.body.style.overflow = "";
        }

        hostelItems.forEach(function (item, index) {
            item.addEventListener("click", function () {
                showHostelImage(index);
                hostelPopup.classList.add("active");
                hostelPopup.setAttribute("aria-hidden", "false");
                document.body.style.overflow = "hidden";
            });
        });
        hostelPopup.querySelector(".hostel-popup-close").addEventListener("click", closeHostelPopup);
        hostelPopup.querySelector(".hostel-popup-prev").addEventListener("click", function () { showHostelImage(hostelIndex - 1); });
        hostelPopup.querySelector(".hostel-popup-next").addEventListener("click", function () { showHostelImage(hostelIndex + 1); });
        hostelPopup.addEventListener("click", function (event) { if (event.target === hostelPopup) closeHostelPopup(); });
        document.addEventListener("keydown", function (event) {
            if (!hostelPopup.classList.contains("active")) return;
            if (event.key === "Escape") closeHostelPopup();
            if (event.key === "ArrowLeft") showHostelImage(hostelIndex - 1);
            if (event.key === "ArrowRight") showHostelImage(hostelIndex + 1);
        });
    }
});
