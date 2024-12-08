import Strapi from "@/api/Strapi.js";

export default class Photo {

    id;
    description;
    images;

    constructor(id, description, image) {

        this.id = id;
        this.description = description;
        this.images = new Map();

        // Original image.
        this._createImage("original", image);

        // Image formats.
        Object.entries(image.formats).forEach(([format, model]) => {
            this._createImage(format, model);
        });

    }

    _createImage(format, model) {
        let image = new Image(
            model.width,
            model.height
        );
        image.src = Strapi.STRAPI_URL+ "/" + model.url;
        image.alt = model.alternativeText ?? model.name;
        this.images.set(format, image);
    }

    aspect() {
        const image = this.images.get("original");
        return image.width / image.height;
    }

}