import Strapi from "@/api/Strapi.js";
import Photo from "@/models/Photo.js";

export default class Photography {

    _id;
    photos;
    createdAt;
    updatedAt;
    title;

    constructor(id, title, photos, createdAt, updatedAt) {
        this._id = id;
        this.photos = photos;
        this.createdAt = createdAt;
        this.updatedAt = updatedAt;
        this.title = title;
    }

    setPhotos(photos) {
        this.photos = [];
        photos.forEach((model) => {
            let photo = new Photo(
               model.id,
               model.description
            );
            this.photos.push(photo);
        });
    }

    static async getAll() {
        try {
            let result = [];
            const { data } = await Strapi.get('photographies?populate=photos');
            data.forEach((object) => {
                console.log(object);
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
        } catch (error) {
            console.error(error);
        }
    }

}