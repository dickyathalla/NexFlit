const getData = () => {
  const xhr = new XMLHttpRequest();

  let data = null;
  xhr.onreadystatechange = () => {
    if (xhr.readyState == 4 && xhr.status == 200) {
      data = xhr.response.Search;
      console.log(data);

      let newElement = `
                  <div class="area">
                      <div class="row">
              `;

      data.forEach((element) => {
        newElement += `
                      <a href="./movdtl.php?i=${element.imdbID}">
                          <div class="card">
                              <div>
                                  <img src="${element.Poster}"
                                      alt="${element.Title}" class="card-image">
                                  <h4>${element.Title}</h4>
                                  <p>${element.Year}</p>
                              </div>
                          </div>
                      </a>
                  `;
      });

      newElement += `
                      </div>
                  </div>
              `;
      document.getElementById("content").innerHTML = newElement;
    }
  };

  xhr.responseType = "json";

  const target = new URL("http://www.omdbapi.com");
  const params = {
    apikey: "b14cc9f3",
    s: "batman",
  };

  target.search = new URLSearchParams(params).toString();

  xhr.open("GET", target.href);
  xhr.send();
};

const getDetailData = () => {
  const xhr = new XMLHttpRequest();

  let data = null;
  xhr.onreadystatechange = () => {
    if (xhr.readyState == 4 && xhr.status == 200) {
      data = xhr.response;
      console.log(data);

      let newElement = `
                  <div class="area">
              `;

      newElement += `
                          <div class="card">
                              <div>
                                  <img src="${data.Poster}"
                                      alt="${data.Title}" class="card-image">
                                  <h4>${data.Title}</h4>
                                  <p>Rated: ${data.Rated}</p>
                                  <p>Released: ${data.Released}</p>
                                  <p>Duration: ${data.Runtime}</p>
                              </div>
                          </div>
                      </div>
                  </div>
              `;

      document.getElementById("content").innerHTML = newElement;
    }
  };

  xhr.responseType = "json";

  const target = new URL("http://www.omdbapi.com");

  const url = window.location.href;
  const paramString = url.split("?")[1];
  const queryString = new URLSearchParams(paramString);

  const params = {
    apikey: "b14cc9f3",
  };

  for (const pair of queryString.entries()) {
    params[pair[0]] = pair[1];
  }

  target.search = new URLSearchParams(params).toString();

  xhr.open("GET", target.href);
  xhr.send();
};

const searchData = () => {
  const s = document.getElementById("searchInput").value;

  if (s != "") {
    const xhr = new XMLHttpRequest();

    let data = null;
    xhr.onreadystatechange = () => {
      if (xhr.readyState == 4 && xhr.status == 200) {
        data = xhr.response.Search;
        console.log(xhr.response);

        let newElement = `
                      <div class="area">
                          <div class="row">
                  `;

        data.forEach((element) => {
          newElement += `
                          <a href="./movdtl.php?i=${element.imdbID}">
                              <div class="card">
                                  <div>
                                      <img src="${element.Poster}"
                                          alt="${element.Title}" class="card-image">
                                      <h4>${element.Title}</h4>
                                      <p>${element.Year}</p>
                                  </div>
                              </div>
                          </a>
                      `;
        });

        newElement += `
                          </div>
                      </div>
                  `;
        document.getElementById("content").innerHTML = newElement;
      }
    };

    xhr.responseType = "json";

    const target = new URL("http://www.omdbapi.com");

    const params = {
      apikey: "b14cc9f3",
    };
    params["s"] = s;

    target.search = new URLSearchParams(params).toString();

    xhr.open("GET", target.href);
    xhr.send();
  }
};
