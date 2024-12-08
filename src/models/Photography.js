import Strapi from "@/api/Strapi.js";
import Photo from "@/models/components/Photo.js";

export default class Photography {

    _id;
    photos;
    createdAt;
    updatedAt;
    title;

    href;

    constructor(id, title, photos, createdAt, updatedAt) {
        this._id = id;
        this.photos = photos;
        this.createdAt = createdAt;
        this.updatedAt = updatedAt;
        this.title = title;
        this.href = '/photography/'+this._id;
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

    static async getAll() {
        let result = [];
        const { data } = await Strapi.get('photographies?populate[photos][populate]=*');
        data.forEach((object) => {
            let photography = new Photography(
                object.id,
                object.title,
                object.createdAt,
                object.updatedAt,
            );
            photography.setPhotos(object.photos);
            result.push(photography);
        });
        return result;
    }

}