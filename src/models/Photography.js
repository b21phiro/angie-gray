import Strapi from "@/api/Strapi.js";
import Photo from "@/models/components/Photo.js";

export default class Photography {

    _id;
    _documentId;
    photos;
    createdAt;
    updatedAt;
    title;

    href;

    constructor(id, documentId, title, photos, createdAt, updatedAt) {
        this._id = id;
        this._documentId = documentId;
        this.photos = photos;
        this.createdAt = createdAt;
        this.updatedAt = updatedAt;
        this.title = title;
        this.href = '/photography/'+this._id;
    }

    getDocumentId() {
        return this._documentId;
    }

    async setPhotos(photos) {
        this.photos = [];
        for (const model of photos) {
            let photo = new Photo(
                model.id,
                model.description,
                model.image
            );
            this.photos.push(photo);
        }
    }

    static async getById(id) {
        const { data } = await Strapi.get(`photographies/${id}?populate[photos][populate]=*`);
        return this._createInstance(data);
    }

    static async getAll() {
        let result = [];
        const { data } = await Strapi.get('photographies?populate[photos][populate]=*');
        data.forEach((object) => {
            result.push(this._createInstance(object));
        });
        return result;
    }

    static _createInstance(object) {
        let photography = new Photography(
            object.id,
            object.documentId,
            object.title,
            object.createdAt,
            object.updatedAt,
        );
        photography.setPhotos(object.photos);
        return photography;
    }

}