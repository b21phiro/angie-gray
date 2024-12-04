export default class Strapi {

    static STRAPI_URL = "http://192.168.50.161:1331";

    constructor() {}

    static async get(endpoint) {
        const url = `${Strapi.STRAPI_URL}/api/${endpoint}`;
        const response = await fetch(url);
        if (!response.ok) {
            throw new Error(response.statusText);
        }
        const json = await response.json();
        if (!json) {
            throw new Error("No data found");
        }
        return json;
    }

};