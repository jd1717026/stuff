<img width="335" height="496" alt="image" src="https://github.com/user-attachments/assets/07ad8f90-4ca6-447c-aea2-3d8204dca59c" />
<img width="323" height="531" alt="image" src="https://github.com/user-attachments/assets/b1239071-0274-4656-a8da-d2ae81c5e2c9" />
<img width="325" height="440" alt="image" src="https://github.com/user-attachments/assets/d285b535-5d11-4f2d-94cc-37610e96c83a" />
<img width="911" height="275" alt="image" src="https://github.com/user-attachments/assets/4dc6118e-895d-482c-a21c-dc3e678eebd2" />
<img width="824" height="382" alt="image" src="https://github.com/user-attachments/assets/ce0547ab-7529-4aa9-aa6b-87c54d683668" />
(https://github.com/user-attachments/files/26142217/Creating.a.simple.dashboard.pdf)
---
create.sql
CREATE DATABASE testdb IF NOT EXISTS
    DEFAULT CHARACTER SET = 'utf8mb4';

CREATE TABLE products IF NOT EXISTS (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255),
    stock INT
);

CREATE TABLE orders IF NOT EXISTS (
    id INT AUTO_INCREMENT PRIMARY KEY,
    product_id INT,
    quantity INT,
    order_date DATETIME,
    FOREIGN KEY (product_id) REFERENCES products(id)
);

INSERT INTO products (name, stock) VALUES
("Carrots", 120),
("Bananas", 250),
("Apples", 200),
("Milk", 100),
("Beef", 121)

---
dashboard.js

let chart;
let countdown = 10;

function loadDashboard() {
  fetch("../php/get_stock_data.php")
    .then((r) => r.json())
    .then((data) => {
      updateChart(data);
      updateTable(data);
    });
  countdown = 10;
}

function updateChart(data) {
  const ctx = document.getElementById("chart").getContext("2d");

  if (chart) chart.destroy();

  chart = new Chart(ctx, {
    type: "bar",
    data: {
      labels: data.map((i) => i.name),
      datasets: [
        {
          label: "Stock Remaining",
          data: data.map((i) => i.stock_left),
          backgroundColor: "#4CAF50",
          borderRadius: 8,
        },
        {
          label: "Orders",
          data: data.map((i) => i.total_ordered),
          backgroundColor: "#FF9800",
          borderRadius: 8,
        },
      ],
    },
    options: {
      responsive: true,
      animation: {
        duration: 800,
        easing: "easeOutQuart",
      },
      plugins: {
        legend: {
          position: "top",
          labels: { boxWidth: 20, padding: 15 },
        },
        tooltip: {
          backgroundColor: "#333",
          titleColor: "#fff",
          bodyColor: "#fff",
        },
      },
      scales: {
        y: {
          beginAtZero: true,
          ticks: { precision: 0 },
          grid: { color: "rgba(0,0,0,0.08)" },
        },
        x: { grid: { display: false } },
      },
    },
  });
}

function updateTable(data) {
  const tbody = document.querySelector("#tbl tbody");
  tbody.innerHTML = "";
  data.forEach((i) => {
    tbody.innerHTML += `
        <tr>
            <td>${i.name}</td>
            <td>${i.stock}</td>
            <td>${i.total_ordered}</td>
            <td>${i.stock_left}</td>
        </tr>`;
  });
}

function startCountdown() {
  const span = document.getElementById("countdown");
  setInterval(() => {
    countdown--;
    if (countdown <= 0) {
      loadDashboard();
    }
    span.textContent = countdown;
  }, 1000);
}

loadDashboard();
startCountdown();

---
