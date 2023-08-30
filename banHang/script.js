document.addEventListener("DOMContentLoaded", function () {
    const productTable = document.getElementById("productTable");
    const totalAmountCell = document.getElementById("totalAmount");
    const priceFilters = document.getElementById("priceFilters");
    const products = [
        { name: "Nhà giả kim", price: 150000 },
        { name: "Đắc nhân tâm", price: 180000 },
        { name: "Cách nghĩ để thành công", price: 200000 },
        { name: "Quẳng gánh lo đi và vui sông", price: 130000 },
        { name: "Hạt giống tâm hồn", price: 160000 },
        { name: "Đọc vị bất kì ai", price: 220000 },
        { name: "Tâm lý tội phạm", price: 310000 },
    ];

    products.forEach((product, index) => {
        const newRow = productTable.insertRow();
        newRow.innerHTML = `
        <td><input type="checkbox" class="checkbox" data-index="${index}"></td>
        <td>${product.name}</td>
        <td>${product.price} VND</td>
        <td><input type="number" class="quantity" data-index="${index}" disabled></td>
        <td class="subtotal">0 VND</td>
      `;
    });

    const checkboxes = document.querySelectorAll(".checkbox");
    const quantities = document.querySelectorAll(".quantity");
    const subtotals = document.querySelectorAll(".subtotal");

    checkboxes.forEach((checkbox, index) => {
        checkbox.addEventListener("change", function () {
            quantities[index].disabled = !this.checked;
            quantities[index].value = 1;
            updateSubtotal(index);
            updateTotalAmount();
        });
    });

    quantities.forEach((quantity, index) => {
        quantity.addEventListener("input", function () {
            updateSubtotal(index);
            updateTotalAmount();
        });
    });

    const filterButton = document.getElementById("filterButton");
    filterButton.addEventListener("click", function () {
        const priceRangeSelect = document.getElementById("priceRange");
        const selectedRange = priceRangeSelect.value;
        const [minPrice, maxPrice] = selectedRange.split("-").map(Number);

        products.forEach((product, index) => {
            const price = product.price;
            const row = productTable.rows[index + 1]; 
            if (price >= minPrice && price <= maxPrice) {
                row.style.display = "";
            } else {
                row.style.display = "none";
            }
        });

        updateFilteredTotalAmount();
    });

    const priceFilterButton = document.getElementById("priceFilterButton");
    priceFilterButton.addEventListener("click", function () {
        priceFilters.classList.toggle("hidden");
    });

    function updateSubtotal(index) {
        const quantity = quantities[index].value || 0;
        const price = products[index].price;
        const subtotal = quantity * price;
        const subtotalString = subtotal.toLocaleString("it-IT", { style: "currency", currency: "VND" });
        subtotals[index].textContent = `${subtotalString}`;
    }

    function updateTotalAmount() {
        let totalAmount = 0;
        subtotals.forEach((subtotal) => {
            const amount = parseInt(subtotal.textContent.replace(/\./g, ""));
            totalAmount += isNaN(amount) ? 0 : amount;
        });
        const totalAmountString = totalAmount.toLocaleString("it-IT", { style: "currency", currency: "VND" });
        totalAmountCell.textContent = `${totalAmountString}`;
    }

    function updateFilteredTotalAmount() {
        let totalAmount = 0;

        products.forEach((product, index) => {
            const price = product.price;
            const row = productTable.rows[index + 1]; 

            if (row.style.display !== "none") {
                const quantity = quantities[index].value || 0;
                const subtotal = quantity * price;
                totalAmount += subtotal;
            }
        });

        const totalAmountString = totalAmount.toLocaleString("it-IT", { style: "currency", currency: "VND" });
        totalAmountCell.textContent = `${totalAmountString}`;
    }
});
