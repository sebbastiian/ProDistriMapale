import { search } from "./export_search.js";

document.addEventListener("DOMContentLoaded", function () {
    const mysearchp = document.querySelector(".inputsrch");
    const ul_add_lip = document.querySelector("#showlist");
    const myurlp = "/myurl";
    const searchproduct = new search(myurlp, mysearchp, ul_add_lip);
    searchproduct.InputSearch();
});
