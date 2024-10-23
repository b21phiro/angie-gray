export default function init() {

    const pathname = window.location.href;

    document.querySelectorAll('.navigation-item').forEach((anchor) => {
        if (pathname === anchor.href) {
            anchor.setAttribute("aria-current", "page");
        } else {
            anchor.removeAttribute("aria-current");
        }
    });

}
