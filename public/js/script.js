// navbar
const menu = document.querySelector(".menu");
menu.addEventListener('click', function (e) {
    const targetMenu = e.target;
    if (targetMenu.classList.contains('menu-nav')) {
        const menuLinkActive = document.querySelector("ul li a.active");
        if (menuLinkActive !== null && targetMenu.getAttribute('href') !== menuLinkActive.getAttribute(
                'href')) {
            menuLinkActive.classList.remove('active');
        }
        targetMenu.classList.add('active');
    }
});
// end

// jumlah barang
let addBtn = document.querySelector('#add');
let subBtn = document.querySelector('#sub');
let qty = document.querySelector('#qtyBox');

addBtn.addEventListener('click', () => {
    qty.value = parseInt(qty.value) + 1;
});

subBtn.addEventListener('click', () => {
    if (qty.value <= 0) {
        qty.value = 0;
    } else {
        qty.value = parseInt(qty.value) - 1;
    }
});
// end