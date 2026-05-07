// Blog & Case Studies Page Script

document.addEventListener("DOMContentLoaded", function () {

  const searchInput = document.getElementById("searchInput");
  const categoryLinks = document.querySelectorAll(".category-link");
  const cardsContainer = document.getElementById("blogCardsContainer");
  const paginationContainer = document.getElementById("paginationContainer");
  const recentList = document.querySelector(".recent_list");

  const allCards = Array.from(cardsContainer.children);

  const cardsPerPage = 4;

  let currentPage = 1;
  let activeCategory = "all";
  let filteredCards = [...allCards];

  // ----------------------------
  // Create No Result Message
  // ----------------------------

  const noResult = document.createElement("div");
  noResult.className = "col-12 text-center py-5";
  noResult.innerHTML = `
      <h4>No Case Study found</h4>
      <p>Try another keyword or category.</p>
  `;
  noResult.style.display = "none";
  cardsContainer.appendChild(noResult);


  // ----------------------------
  // Filter Function
  // ----------------------------

  function filterBlogs() {

    const query = searchInput ? searchInput.value.toLowerCase() : "";

    filteredCards = allCards.filter(card => {

      const title = card.getAttribute("data-title")?.toLowerCase() || "";
      const description = card.querySelector(".para")?.innerText.toLowerCase() || "";

      const categories = card.getAttribute("data-category")
        ?.split(",")
        .map(c => c.trim().toLowerCase()) || [];

      const matchesSearch =
        title.includes(query) ||
        description.includes(query);

      const matchesCategory =
        activeCategory === "all" ||
        categories.includes(activeCategory.toLowerCase());

      return matchesSearch && matchesCategory;

    });

    currentPage = 1;

    renderPage();
    renderPagination();

  }


  // ----------------------------
  // Render Cards for Page
  // ----------------------------

  function renderPage() {

    allCards.forEach(card => card.style.display = "none");

    if (filteredCards.length === 0) {

      noResult.style.display = "block";
      paginationContainer.innerHTML = "";
      return;

    }

    noResult.style.display = "none";

    const start = (currentPage - 1) * cardsPerPage;
    const end = start + cardsPerPage;

    filteredCards.slice(start, end).forEach(card => {
      card.style.display = "";
    });

  }


  // ----------------------------
  // Pagination
  // ----------------------------

  function renderPagination() {

    paginationContainer.innerHTML = "";

    const totalPages = Math.ceil(filteredCards.length / cardsPerPage);

    if (totalPages <= 1) return;

    // PREV BUTTON
    const prev = document.createElement("li");
    prev.className = `page-item ${currentPage === 1 ? "disabled" : ""}`;

    prev.innerHTML = `<a class="page-link" href="#"><i class="fa fa-angle-left"></i></a>`;

    prev.onclick = function (e) {
      e.preventDefault();
      if (currentPage > 1) {
        currentPage--;
        renderPage();
        renderPagination();
      }
    };

    paginationContainer.appendChild(prev);


    // PAGE NUMBERS
    for (let i = 1; i <= totalPages; i++) {

      const li = document.createElement("li");

      li.className = `page-item ${i === currentPage ? "active" : ""}`;

      li.innerHTML = `<a class="page-link" href="#">${i}</a>`;

      li.onclick = function (e) {
        e.preventDefault();
        currentPage = i;
        renderPage();
        renderPagination();
      };

      paginationContainer.appendChild(li);

    }


    // NEXT BUTTON
    const next = document.createElement("li");

    next.className = `page-item ${currentPage === totalPages ? "disabled" : ""}`;

    next.innerHTML = `<a class="page-link" href="#"><i class="fa fa-angle-right"></i></a>`;

    next.onclick = function (e) {
      e.preventDefault();
      if (currentPage < totalPages) {
        currentPage++;
        renderPage();
        renderPagination();
      }
    };

    paginationContainer.appendChild(next);

  }


  // ----------------------------
  // Search Event
  // ----------------------------

  if (searchInput) {

    searchInput.addEventListener("keyup", function () {
      filterBlogs();
    });

  }


  // ----------------------------
  // Category Filter
  // ----------------------------

  categoryLinks.forEach(link => {

    link.addEventListener("click", function (e) {

      e.preventDefault();

      activeCategory = this.getAttribute("data-category");

      categoryLinks.forEach(l => l.classList.remove("active"));

      this.classList.add("active");

      filterBlogs();

    });

  });


  // ----------------------------
  // Recent Insights
  // ----------------------------

  if (recentList) {

    recentList.innerHTML = "";

    allCards.slice(0, 4).forEach(card => {

      const img = card.querySelector("img")?.getAttribute("src") || "";
      const title = card.querySelector(".title_card")?.textContent.trim() || "";
      const link = card.querySelector("a")?.getAttribute("href") || "#";

      const date = new Date().toLocaleString('default', {
        month: 'short',
        year: 'numeric'
      });

      const li = document.createElement("li");

      li.innerHTML = `
        <a href="${link}" class="d-flex" title="${title}">
          <div class="thumb">
            <img src="${img}" alt="${title}" title="${title}">
          </div>
          <div class="info">
            <p class="title">${title}</p>
            <span class="date">${date}</span>
          </div>
        </a>
      `;

      recentList.appendChild(li);

    });

  }


  // ----------------------------
  // Initial Load
  // ----------------------------

  filterBlogs();

});