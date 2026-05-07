

// blog and case studies page

document.addEventListener("DOMContentLoaded", function () {

  const searchInput = document.getElementById("searchInput");

  const categoryLinks = document.querySelectorAll(".category-link");

  const blogCards = document.querySelectorAll(".blog-card");

  let activeCategory = "all"; // default



  // ----------------------------

  // Blog Filter Function

  // ----------------------------

  function filterBlogs() {

    let query = searchInput.value.toLowerCase();



    blogCards.forEach(card => {

      let title = card.getAttribute("data-title").toLowerCase();

      let description = card.querySelector(".para")?.innerText.toLowerCase() || "";

      let categories = card.getAttribute("data-category")

        .split(",")

        .map(c => c.trim().toLowerCase());



      // ✅ Search only in title + description

      let matchesSearch =

        title.includes(query) ||

        description.includes(query);



      // ✅ Category filter

      let matchesCategory =

        activeCategory === "all" || categories.includes(activeCategory.toLowerCase());



      if (matchesSearch && matchesCategory) {

        card.style.display = "";

      } else {

        card.style.display = "none";

      }

    });

  }



  // 🔎 Search input filter

  if (searchInput) {

    searchInput.addEventListener("keyup", filterBlogs);

  }



  // 📂 Category filter

  categoryLinks.forEach(link => {

    link.addEventListener("click", function (e) {

      e.preventDefault();

      activeCategory = this.getAttribute("data-category"); // e.g. "AI & Machine Learning"



      // remove previous active

      categoryLinks.forEach(l => l.classList.remove("active"));

      this.classList.add("active");



      filterBlogs();

    });

  });



  // ----------------------------

  // Recent Insights Section

  // ----------------------------

  const recentList = document.querySelector(".recent_list");

  if (recentList) {

    recentList.innerHTML = ""; // clear static content



    blogCards.forEach((card, index) => {

      if (index < 4) { // show latest 4

        const img = card.querySelector("img").getAttribute("src");

        const title = card.querySelector(".title_card").textContent.trim();

        const link = card.querySelector("a").getAttribute("href");

        const date = new Date().toLocaleString('default', {

          month: 'short',

          year: 'numeric'

        });



        const li = document.createElement("li");

        li.innerHTML = `

                  <a href="${link}" class="d-flex" title="${title}">

                    <div class="thumb"><img src="${img}" alt="${title}" title="${title}"></div>

                    <div class="info">

                      <p class="title">${title}</p>

                      <span class="date">${date}</span>

                    </div>

                  </a>

                `;

        recentList.appendChild(li);

      }

    });

  }



});

document.addEventListener("DOMContentLoaded", function () {

  const cardsContainer = document.getElementById("blogCardsContainer");

  const cards = Array.from(cardsContainer.children); // all blog/case cards

  const paginationContainer = document.getElementById("paginationContainer");

  const cardsPerPage = 4;



  let currentPage = 1;

  const totalPages = Math.ceil(cards.length / cardsPerPage);



  function showPage(page) {

    currentPage = page;



    // Hide all

    cards.forEach(card => card.style.display = "none");



    // Show only current slice

    const start = (page - 1) * cardsPerPage;

    const end = start + cardsPerPage;

    cards.slice(start, end).forEach(card => card.style.display = "");



    renderPagination();

  }



  function renderPagination() {

    paginationContainer.innerHTML = "";



    // Prev button

    const prevLi = document.createElement("li");

    prevLi.className = `page-item ${currentPage === 1 ? "disabled" : ""}`;

    prevLi.innerHTML = `<a class="page-link d-none  " href="javascript:void(0);"><i class="fa fa-angle-left"></i></a>`;

    prevLi.addEventListener("click", function (e) {

      e.preventDefault();

      if (currentPage > 1) showPage(currentPage - 1);

    });

    paginationContainer.appendChild(prevLi);



    // Page numbers

    for (let i = 1; i <= totalPages; i++) {

      const li = document.createElement("li");

      li.className = `page-item ${i === currentPage ? "active" : ""}`;

      li.innerHTML = `<a class="page-link" href="javascript:void(0);">${i}</a>`;

      li.addEventListener("click", function (e) {

        e.preventDefault();

        showPage(i);

      });

      paginationContainer.appendChild(li);

    }



    // Next button

    const nextLi = document.createElement("li");

    nextLi.className = `page-item ${currentPage === totalPages ? "disabled" : ""}`;

    nextLi.innerHTML = `<a class="page-link" href="javascript:void(0);"><i class="fa fa-angle-right"></i></a>`;

    nextLi.addEventListener("click", function (e) {

      e.preventDefault();

      if (currentPage < totalPages) showPage(currentPage + 1);

    });

    paginationContainer.appendChild(nextLi);

  }



  // Show first page on load

  showPage(1);

});



// end blog case studies