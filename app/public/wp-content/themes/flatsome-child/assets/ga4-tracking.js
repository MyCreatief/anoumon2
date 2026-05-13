/**
 * Anoumon GA4 custom event tracking.
 *
 * Pusht events naar gtag (geladen door Site Kit, ID GT-NM8CJL6L):
 *   - tel_click       — click op `<a href="tel:...">`
 *   - mailto_click    — click op `<a href="mailto:...">`
 *   - generate_lead   — Contact Form 7 success, of submit van een form met
 *                       `data-ga4-form` attribuut (Gutena Forms etc.).
 *
 * Plus: client-side bot-detectie. navigator.webdriver of bekende headless
 * UA-tokens markeren de sessie als internal voor GA4 Data Filters.
 */
(function () {
    "use strict";

    if (typeof window === "undefined" || !window.document) {
        return;
    }

    function track(name, params) {
        if (typeof window.gtag !== "function") {
            return;
        }
        try {
            window.gtag("event", name, params || {});
        } catch (e) {
            if (window.console && window.console.warn) {
                window.console.warn("anoumon-ga4 " + name + " failed", e);
            }
        }
    }

    function getLinkText(link) {
        var text = link.getAttribute("aria-label") || link.textContent || "";
        return text.replace(/\s+/g, " ").trim().slice(0, 100);
    }

    function trafficTypeFromUa() {
        var nav = window.navigator || {};
        if (nav.webdriver === true) {
            return "internal";
        }
        var ua = nav.userAgent || "";
        if (/HeadlessChrome|Puppeteer|Playwright|Selenium|PhantomJS/i.test(ua)) {
            return "internal";
        }
        return null;
    }

    // Markeer client-side gedetecteerde bots vóór er events gefired worden.
    var trafficType = trafficTypeFromUa();
    if (trafficType) {
        window.dataLayer = window.dataLayer || [];
        window.dataLayer.push({ traffic_type: trafficType });
    }

    // tel: + mailto: link clicks (gedelegeerd voor robuustheid)
    document.addEventListener("click", function (evt) {
        var link = evt.target && evt.target.closest ? evt.target.closest("a[href]") : null;
        if (!link) {
            return;
        }

        var href = link.getAttribute("href") || "";

        if (href.indexOf("tel:") === 0) {
            track("tel_click", {
                link_text: getLinkText(link),
                phone: href.slice(4),
                page_location: window.location.href
            });
        } else if (href.indexOf("mailto:") === 0) {
            track("mailto_click", {
                link_text: getLinkText(link),
                email: href.slice(7).split("?")[0],
                page_location: window.location.href
            });
        }
    }, true);

    // Contact Form 7 succesvolle inzending
    document.addEventListener("wpcf7mailsent", function (evt) {
        var formId = evt && evt.detail && evt.detail.contactFormId ? "cf7-" + evt.detail.contactFormId : "cf7";
        track("generate_lead", {
            form_id: formId,
            form_name: "contact-form-7",
            value: 0,
            currency: "EUR",
            page_location: window.location.href
        });
    });

    // Generieke fallback: elke form met data-ga4-form attribuut fired een
    // generate_lead bij submit. Voor Gutena Forms: voeg `data-ga4-form="naam"`
    // toe op de form via block-instellingen of een filter.
    document.addEventListener("submit", function (evt) {
        var form = evt && evt.target;
        if (!form || form.tagName !== "FORM" || !form.hasAttribute("data-ga4-form")) {
            return;
        }
        track("generate_lead", {
            form_id: form.id || form.getAttribute("data-ga4-form"),
            form_name: form.getAttribute("data-ga4-form") || "form",
            value: 0,
            currency: "EUR",
            page_location: window.location.href
        });
    }, true);
})();
