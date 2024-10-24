const FILE_VIEW_ELEMENT_ID = "fileView";
const FILE_VIEW_CLOSE_BUTTON_ELEMENT_ID = "closeFileViewButton";

const MEDIA_UPLOAD_BODY_ELEMENT_ID = "mediaUploads";
const MEDIA_INPUT_ELEMENT_ID = "mediaUploadInput";
const MEDIA_FORM_ELEMENT_ID = "mediaUploadForm";

let fileViewElement;
let fileViewCloseButtonElement;
let fileViewIsVisible = false;

let mediaUploads;
let mediaInputElement;
let mediaFormElement;
const uploadListItems = [];

function openFileView() {
    fileViewIsVisible = true;
}

function closeFileView() {
    fileViewIsVisible = false;
}

async function getUploadedMedia() {
    const API_URL = '/api/media';
    return fetch(API_URL, {
        method: 'GET',
        headers: {
            'Content-Type': 'application/json'
        }
    });
}

function initUploadedMedia() {
    getUploadedMedia()
        .then(res => {
            if (!res.ok) {
                throw new Error(res.message);
            }
            return res.json();
        })
        .then(data => {
            console.log(data);
        })
        .catch((err) => {
            apiFailure(err);
        })
        .finally(() => {
            console.log("Done GET media");
        });
}

async function postMedia(ev) {
    ev.preventDefault();
    const formData = new FormData(mediaFormElement);
    const API_URL = '/api/media';
    return fetch(API_URL, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(formData)
    });
}

function onMediaInputChange(ev) {
    postMedia(ev)
        .then(res => {
            if (!res.ok) {
                throw new Error(res.message);
            }
            return res.json();
        })
        .then(data => {
            console.log(data);
        })
        .catch(err => {
            apiFailure(err);
        })
        .finally(() => {
            console.log("Done POST media");
        });
}

function init() {

    fileViewElement = document.getElementById(FILE_VIEW_ELEMENT_ID);
    if (!fileViewElement) { return couldNotFindElement(FILE_VIEW_ELEMENT_ID); }

    fileViewCloseButtonElement = document.getElementById(FILE_VIEW_CLOSE_BUTTON_ELEMENT_ID);
    if (!fileViewCloseButtonElement) { return couldNotFindElement(FILE_VIEW_CLOSE_BUTTON_ELEMENT_ID); }
    fileViewCloseButtonElement.addEventListener('click', closeFileView);

    mediaUploads = document.getElementById(MEDIA_UPLOAD_BODY_ELEMENT_ID);
    if (!mediaUploads) { return couldNotFindElement(MEDIA_UPLOAD_BODY_ELEMENT_ID); }

    mediaFormElement = document.getElementById(MEDIA_FORM_ELEMENT_ID);
    if (!mediaFormElement) { return couldNotFindElement(MEDIA_FORM_ELEMENT_ID); }
    mediaFormElement.addEventListener('submit', postMedia);

    mediaInputElement = document.getElementById(MEDIA_INPUT_ELEMENT_ID);
    if (!mediaInputElement) { return couldNotFindElement(MEDIA_INPUT_ELEMENT_ID); }
    mediaInputElement.addEventListener('change', onMediaInputChange);

    initUploadedMedia();

}

function couldNotFindElement(elementID) {
    console.error(`Could not find the element ${elementID}\n`);
    return false;
}

function apiFailure(error) {
    console.error(`Failed API: ${error}\n`);
}

window.onload = () => {
  init();
};
