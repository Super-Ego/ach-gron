// -----------------------------------------------------------------------------
// All the GSAP animations for the website.
// -----------------------------------------------------------------------------

// Default settings
const defaultDuration = 1;
const defaultEasing = "power3.out";

// Data attributes for GSAP animations
const fadeInAnimation = gsap.utils.toArray("[data-animation='fade-in']");
const fadeUpAnimation = gsap.utils.toArray("[data-animation='fade-up']");
const staggerAnimation = gsap.utils.toArray("[data-animation='stagger-in']");

// Custom GSAP function
function GSAPutility(array, start, repeat, options) {
    array.length > 0 &&
        array.forEach((item) => {

            const defaultOptions = {
                scrollTrigger: {
                    trigger: item,
                    start: start,
                    toggleActions: repeat ? "restart none none reverse" : "play none none none",
                    invalidateOnResize: true,
                    toggleClass: "is-visible",
                },
            }

            options = { ...defaultOptions, ...options };
            gsap.to(item, options)
        });
}

jQuery(document).ready(function ($) {

    // Fade in animation
    GSAPutility(fadeInAnimation, "center bottom", false, {
        duration: defaultDuration,
        ease: defaultEasing,
        opacity: 1,
        delay: 0.25
    });

    // Fade up animation
    GSAPutility(fadeUpAnimation, "20% bottom", true, {
        duration: defaultDuration,
        ease: defaultEasing,
        opacity: 1,
        y: 0
    });

    // Stagger in animation
    GSAPutility(staggerAnimation, "20% bottom", false, {
        duration: defaultDuration,
        ease: defaultEasing,
        opacity: 1,
        y: 0,
        stagger: 0.1,
    });

});