import Strapi from "@/api/Strapi.js";
import {marked} from "marked";
import sanitize from "sanitize-html";

export default class Markdown {

    content;

    constructor(content) {
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
        const { content } = data;
        return new this(content);
    }

}