export class search {
    constructor(myurlp, mysearchp, ulAddLi) {
        this.url = myurlp;
        this.mysearch = mysearchp;
        this.ulAddLi = ulAddLi;
        this.idLi = "mylist";
        this.pcantidad = document.querySelector("#pcantidad");
    }

    InputSearch() {
        this.mysearch.addEventListener("input", async (e) => {
            e.preventDefault();
            try {
                let token = document.querySelector('meta[name="csrf-token"]').getAttribute("content");
                let minimo_letras = 0;
                let valor = this.mysearch.value;
                if (valor.length > minimo_letras) {
                    let dataSearch = new FormData();
                    dataSearch.append("valor", valor);
                    
                    const response = await fetch(this.url, {
                        headers: {
                            "X-CSRF-TOKEN": token,
                        },
                        method: 'GET',
                        body: dataSearch,
                    });

                    const data = await response.json();
                    console.log(data);
                    // this.Showlist(data, valor);
                } else {
                    this.ulAddLi.style.display = "none";
                }
            } catch (error) {
                console.error("Error:", error);
            }
        });
    }
}
