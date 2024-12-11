import Strapi from "@/api/Strapi.js";
import {marked} from "marked";
import sanitize from "sanitize-html";

export default class Biography {

    title;
    content;

    constructor(title, content) {
        this.title = title;
        this.content = content;
    }

    async getContentHtml() {
        const parsed = await marked.parse(this.content)
        return sanitize(parsed.toString(), {
            allowedTags: sanitize.defaults.allowedTags.concat([ 'img' ])
        });
    }

    static async get() {
        const { data } = await Strapi.get(`biography`);
        const { title, content } = data;
        return new this(title, content);
    }

}